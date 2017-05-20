<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/20
 * Time: 11:40
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql='SELECT * FROM user WHERE username=:username AND password=:password';
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':username',$username,PDO::PARAM_STR);
    $stmt->bindParam(':password',$password,PDO::PARAM_STR);
    $username='demo8';
    $password=md5('demo');
    $stmt->execute();
    $stmt->debugDumpParams();
}catch (PDOException $e){
    $e->getMessage();
}