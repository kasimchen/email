<?php

namespace App\Http\Controllers\Backend\Topic;

use App\Http\Controllers\Controller;
use PhpImap\Mailbox as ImapMailbox;
use PhpImap\IncomingMail;
use PhpImap\IncomingMailAttachment;
use PhpImap\Mailbox;
use Webklex\IMAP\Client;


class TopicController extends Controller
{

    public function index(){


        return view('backend.topic.index');


        $mailServer="imap.exmail.qq.com"; //IMAP主机
        $mailLink="{{$mailServer}:143}INBOX" ; //imagp连接地址：不同主机地址不同
        $mailUser = config("imap.accounts.default.username"); //邮箱用户名
        $mailPass = config("imap.accounts.default.password");; //邮箱密码

        $mailbox = new Mailbox($mailLink, $mailUser, $mailPass, public_path('attachment'));

// Read all messaged into an array:
        $mailsIds = $mailbox->searchMailbox('ALL');
        if(!$mailsIds) {
            die('Mailbox is empty');
        }

// Get the first message and save its attachment(s) to disk:
        $mail = $mailbox->getMail($mailsIds[1000]);


        dd($mail);

    }

    function matchMailHead($str){
        $headList = array();
        $headArr = array(
            'from',
            'to',
            'date',
            'subject'
        );

        foreach ($headArr as $key){
            if(preg_match('/'.$key.':(.*?)[\n\r]/is', $str,$m)){
                $match = trim($m[1]);
                $headList[$key] = $key=='date'?date('Y-m-d H:i:s',strtotime($match)):$match;
            }
        }
        return $headList;
    }
}
