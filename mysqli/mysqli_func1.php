<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/16
 * Time: 12:41
 *
 * mysqli 面向过程编程
 */

$link = mysqli_connect('localhost','root','','demo') or die("Connect Error:".mysqli_connect_errno().":".mysqli_connect_error());
//print_r($link);
mysqli_set_charset($link,'UTF8');

$sql = "INSERT users(name,age) VALUES('demo',20)";
$res = mysqli_query($link,$sql);
if ($res){
    echo 'Affected_Rows:'.mysqli_affected_rows($link);
}else{
    echo 'connect error:'.mysqli_connect_errno().':'.mysqli_connect_error();
}

mysqli_close($link);