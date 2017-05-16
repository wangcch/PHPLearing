<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/16
 * Time: 13:19
 *
 * 面向过程的预处理
 */

$link = mysqli_connect('localhost','root','','demo') or die("connect error:".mysqli_errno().":".mysqli_error());
mysqli_set_charset($link,'UTF8');
$sql = "INSERT users(name,age) VALUES(?,?)";
$stmt = mysqli_prepare($link,$sql);

$name='demo2';
$age=10;
mysqli_stmt_bind_param($stmt,"si",$name,$age);
$res=mysqli_stmt_execute($stmt);
var_dump($res);
mysqli_close($link);