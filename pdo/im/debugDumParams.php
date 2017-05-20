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
    $sql='INSERT user(username,password) VALUE(?,?)';
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(1,$username,PDO::PARAM_STR);
    $stmt->bindParam(2,$password,PDO::PARAM_STR);
    $username='demo8';
    $password=md5('demo');
    $stmt->execute();
    $stmt->debugDumpParams();
}catch (PDOException $e){
    $e->getMessage();
}