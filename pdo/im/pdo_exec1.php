<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/17
 * Time: 9:28
 */
header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
//    $sql="SELECT id,username,password FROM user";
    $sql="INSERT user(username,password) VALUES('demo','".md5('demo')."');";

    $res=$pdo->exec($sql);
    var_dump($res);
    echo $res;

}catch (PDOException $e){
    echo $e->getMessage();
}