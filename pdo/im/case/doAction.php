<?php
header('content-type:text/html;charset=utf-8');
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/22
 * Time: 21:48
 */
require_once 'swiftmailer-master/lib/swift_required.php';
require_once 'config.php';
require_once 'PdoMysql.class.php';

$act=$_GET['act'];
$username=addslashes($_POST['username']);
$password=md5($_POST['password']);
$email=$_POST['email'];
$PdoMySQL=new PdoMySQL();
if ($act='reg'){
    $regtime=time();
    $token=md5($username.$password.$regtime);
    $token_exptime=$regtime+24*3600;
    $data=compact('username','password','email','token','token_exptime','regtime');
    $res=$PdoMySQL->add($data,$TABLE);
    $lastInsertId=$PdoMySQL->getLastInsertId();
    if ($res){
        $transport=Swift_SmtpTransport::newInstance('smtp.qq.com',25);
        $transport->setUsername('stamp612@qq.com');
        $transport->setPassword($emailPassword);

        $mailer=Swift_Mailer::newInstance($transport);
        $message=Swift_Message::newInstance();
        $message->setFrom(array("stamp612@qq.com"=>'demo'));
        $message->setTo(array($email=>'user'));
        $message->setSubject('激活邮件');

        $url="http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?act=active&token={$token}";
        $urlEncode=urlencode($url);

        $str=<<<EOF
        亲爱的{$username},您好！<br>
        点击此链接激活账号，有效时间为24小时。<br>
        <a href="{$url}">{$urlEncode}</a>
EOF;
        $message->setBody("{$str}",'text/html','utf-8');
        try{
            if ($mailer->send($message)){
                echo "恭喜您{$username}注册成功，请到请到邮箱激活";
                echo '<meta http-equiv="refresh" content="3; url=index.php#tologin"/>';
            }else{
                $PdoMySQL->delete($TABLE,'id='.$lastInsertId);
                echo '注册失败，请重新注册';
                echo '<meta http-equiv="refresh" content="3; url=index.php#toregister"/>';
            }
        }catch (Swift_SwiftException $e){
            echo '邮件发送错误'.$e->getMessage();
        }


    }else{
        $PdoMySQL->throw_excption('用户注册失败，3秒跳转到注册页面');
        echo '<meta http-equiv="refresh" content="3; url=index.php#toregister"/>';
    }

}elseif ($act='login'){
    $row=$PdoMySQL->find($TABLE,"username='{$username}' AND password='{$password}'",'status');
    if ($row['status']){
        echo '请先激活，后登录';
    }else{
        echo '登录成功';
    }
}elseif ($act='active'){
    $token=addslashes($_GET['token']);
    $row=$PdoMySQL->find($TABLE,"token='{$token}' AND status=0",array('id','token_exptime'));
    $now=time();
    if ($now>$row['token_exptime']){
        echo '激活时间过期，请重新登录激活';
    }else{
        $res=$PdoMySQL->update(array('status'=>1),$TABLE,'id='.$row['id']);
        if ($res){
            echo "激活成功，3秒后跳转到登录界面";
            echo '<meta http-equiv="refresh" content="3; url=index.php#tologin"/>';
        }else{
            echo '激活失败';
        }
    }

}
