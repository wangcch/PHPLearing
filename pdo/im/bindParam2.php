<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 10:13
 */
header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="INSERT user(username,password) VALUE(?,?)";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(1,$username);
    $stmt->bindParam(2,$passowrd);
    $username="demo6";
    $passowrd=md5('demo');
    $stmt->execute();
    echo $stmt->rowCount();
}catch (PDOException $exception){
    $exception->getMessage();
}