<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 11:02
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="INSERT user(username,password) VALUE(?,?)";
    $stmt=$pdo->prepare($sql);
    $username="demo7";
    $passowrd=md5('demo');
    $stmt->bindValue(1,$username);
    $stmt->bindValue(2,$passowrd);
    $stmt->execute();
    echo $stmt->rowCount();
}catch (PDOException $exception){
    $exception->getMessage();
}