<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 0:11
 */

header('content-type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=md5($_POST['password']);
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
//    $sql="SELECT * FROM　user WHERE username='{$username}' AND password='{$password}'";

    $username=$pdo->quote($username);//返回带引号的字符串，过滤字符串中的特殊字符
    $sql="SELECT * FROM　user WHERE username={$username} AND password='{$password}'";
    $stmt=$pdo->query($sql);
    echo $stmt->rowCount();
}catch (PDOException $e){
    $e->getMessage();
}