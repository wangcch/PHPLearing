<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 9:54
 *
 * 预处理语句占位符的使用
 */

header('content-type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=md5($_POST['password']);
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="select * from user where username=? and password=?";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array($username,$password));
    echo $stmt->rowCount();
}catch (PDOException $e){
    $e->getMessage();
}