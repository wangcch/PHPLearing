<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 9:20
 */

header('content-type:text/html;charset=utf-8');
$username=$_POST['username'];
$password=md5($_POST['password']);
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="select * from user where username=:username and password=:passwoed";
    $stmt=$pdo->prepare($sql);
    $stmt->execute(array(":username"=>$username,":password"=>$password));
    echo $stmt->rowCount();
}catch (PDOException $e){
    $e->getMessage();
}