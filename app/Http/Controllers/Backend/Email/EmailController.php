<?php

namespace App\Http\Controllers\Backend\Email;

use App\Http\Controllers\Controller;
use App\Model\Version;
use App\Repositories\EmailRepositories;
use App\Repositories\VersionRepositories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;
use Swift_SmtpTransport;

class EmailController extends Controller
{

    public function index(EmailRepositories $emailRepositories){

        $data = $emailRepositories->getEmailList(auth_user()->id,15);
        $link = $this->link($data);
        return view('backend.email.index',['data'=>$data,'link'=>$link]);

    }

    public function show($id,EmailRepositories $emailRepositories,VersionRepositories $versionRepositories){

        $data = $emailRepositories->getEmailById($id);
        $version = $versionRepositories->getVersionNotEmail();
        return view('backend.email.show',compact('data','version'));


    }

    public function send($id,Request $request,EmailRepositories $emailRepositories,VersionRepositories $versionRepositories){


        $vid = $request->get('version');
        $data = $emailRepositories->getEmailById($id);
        $version = $versionRepositories->getVersionById($vid);

        $view =  view('backend.email.include.send-email-template',['data'=>$data,'version'=>$version])->render();

        $cssToInlineStyles = new CssToInlineStyles();
        $css = file_get_contents(public_path('plugins/layui/css/layui.css'));

        $html =  $cssToInlineStyles->convert(
            $view,
            $css
        );

        $title = $data->subject;
        $content = $html;
        $user = [auth_user()->company_email=>auth_user()->name];
        $to = array_diff(json_decode($data->to,true),$user);
        $cc =  array_diff(json_decode($data->cc,true),$user);
        $replyTo =  array_diff(json_decode($data->replyTo,true),$user);


        $transport = (new Swift_SmtpTransport('smtp.exmail.qq.com', 465,'ssl'))
            ->setUsername(auth_user()->company_email)
            ->setPassword(decrypt(auth_user()->company_password));

        $message = (new \Swift_Message($title))
            ->setFrom($user)
            ->setCc($cc)
            ->setTo(array_merge($to,$replyTo))
            ->setReplyTo($user)
            ->setBody($content,'text/html');


        $mailer = new \Swift_Mailer($transport);
        $ret =  $mailer->send($message);

        \Log::info('发送邮件记录',['ret'=>$ret]);

        if($ret==1){
            Version::where('id','=',$vid)->update(['e_id'=>$id]);
            return $this->success('发送成功');
        }
        return $this->error('发送失败');

    }

    public function synchro(){

        Artisan::call('update:email',['userId'=>auth_user()->id]);
        return redirect()->route('email.index')->withFlashSuccess('Create Success');

    }

}
