<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 22:27
 */

require_once 'include.php';
$username = $_POST['username'];
$username = $mysqli->escape_string($username);
$password = md5($_POST['password']);

$sql = "INSERT user(username,password) VALUES('{$username}','{$password}')";
$res = $mysqli->query($sql);
if($res){
    $insert_id = $mysqli->insert_id;
    echo "<script type='text/javascript'> alert('添加成功，你是网站的第{$insert_id}用户');location.href='userlist.php';</script>";
}else{
    echo "<script type='text/javascript'> alert('添加失败，请重新添加');location.href='insert.php';</script>";
}