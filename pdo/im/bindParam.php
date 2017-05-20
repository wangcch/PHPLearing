<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 10:03
 * 绑定参数
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="INSERT user(username,password) VALUES(:username,:password)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":username",$username,PDO::PARAM_STR);
    $stmt->bindParam(":password",$password,PDO::PARAM_STR);

    $username="demo4";
    $password=md5('demo');
    $stmt->execute();
    $username="demo5";
    $password=md5('demo');
    $stmt->execute();
    echo $stmt->rowCount();
}catch (PDOException $e){
    $e->getMessage();
}