<?php

namespace App\Console\Commands;

use App\Model\User;
use App\Repositories\UserRepositories;
use Illuminate\Console\Command;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use PhpImap\Mailbox;
use App\Jobs\ReceiveMailInfo;


class UpdateEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:email {userId}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '更新用户邮箱';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $userId = $this->argument('userId');
        $user = User::whereId($userId)->first();

        //获取当前游标
        $userRepo = new UserRepositories();
        $email = $userRepo->getLastEmail($user->id);

        $mailServer="imap.exmail.qq.com"; //IMAP主机
        $mailLink="{{$mailServer}:143}INBOX" ; //imagp连接地址：不同主机地址不同
        $mailUser = $user->company_email;
        $mailPass = decrypt($user->company_password);

        $mailbox = new Mailbox($mailLink, $mailUser, $mailPass, public_path('attachment'));
        $mailsIds = $mailbox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

        $last_id = 0;
        if(!empty($email)){
            $last_id = $email->e_id;
        }

        foreach ($mailsIds as $id){

            if($id<=$last_id) continue;
            dispatch(new ReceiveMailInfo($id,$user->id,$mailUser,$mailPass));

        }

    }
}
