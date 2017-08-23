<?php

namespace App\Jobs;

use App\Component\CacheManager;
use App\Component\CommonHelper;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;


class ReceiveMailInfo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    private $eId;
    private $userId;
    private $userName;
    private $userPassword;

    public function __construct($eId,$userId,$userName,$userPassword)
    {

        $this->eId = $eId;
        $this->userId = $userId;
        $this->userName = $userName;
        $this->userPassword = $userPassword;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $mailServer="imap.exmail.qq.com"; //IMAP主机
        $mailLink="{{$mailServer}:143}INBOX" ; //imagp连接地址：不同主机地址不同


        $mailbox = new ImapMailbox($mailLink, $this->userName, $this->userPassword, public_path('attachment'));

        $mail = $mailbox->getMail($this->eId,false);
        unset($mail->headersRaw);



        $email_user[$mail->fromAddress] = $mail->fromName;
        $email_user = array_merge($email_user,$mail->to);


        $cahceManager = new CacheManager();
        $emails = $cahceManager->getAllEmail();

        $insert_db_email_user = array();
        foreach ($email_user as $key=>$name){
            if(!isset($emails[$key])){
                $insert_db_email_user[] = array('name'=>$name,'email'=>$key);
            }
        }

        if(!empty($insert_db_email_user)){
            \DB::table('email_users')->insert($insert_db_email_user);
            $cahceManager->deleteEmail();
        }


        //附件替换
        $commonHelper = new CommonHelper();
        $attachements = $mail->getAttachments();
        $attachements_array  = array();
        $old_attachements_array = array();
        if(!empty($attachements)){
            foreach ($attachements as $key=>$item){

                $old_attachements_array[] = "cid:".$key;
                $mime = mime_content_type($item->filePath);
                $ext = $commonHelper->get_type_by_mime($mime);

                $old_path  = $item->filePath;
                $new_path = $item->filePath.'.'.$ext;
                rename($old_path,$new_path);

                $attachements_array[$key] = env('APP_URL').str_replace(public_path(),'',$new_path);

            }
        }


        $textHtml = $mail->textHtml;
        $mail_item = array();
        $mail_item['date'] = $mail->date;
        $mail_item['subject'] = $mail->subject;
        $mail_item['fromName'] = $mail->fromName;
        $mail_item['fromAddress'] = $mail->fromAddress;
        $mail_item['to'] = json_encode($mail->to);
        $mail_item['cc'] = json_encode($mail->cc);
        $mail_item['replyTo'] = json_encode($mail->replyTo);
        $mail_item['textPlain'] = $mail->textPlain;
        $mail_item['textHtml'] = str_replace($old_attachements_array,$attachements_array,$textHtml);
        $mail_item['origin_textHtml'] = $textHtml;
        $mail_item['attachment'] = json_encode(array_values($attachements_array));
        $mail_item['user_id'] = $this->userId;
        $mail_item['e_id'] = $mail->id;

        $exits = \DB::table('email')
            ->where('e_id','=',$mail->id)
            ->where('user_id','=',$this->userId)
            ->count(['id']);


        if(!empty($exits)) exit(0);


        \DB::table('email')
            ->insert($mail_item);

        \Log::notice('更新一封邮件');


    }
}
