<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/17
 * Time: 8:56
 */

try{
    //php.ini\  pdo.dsn.name="mysql:host=localhost;dbname=demo"
    $dsn='name';
    $username='root';
    $password='';
    $pdo=new PDO($dsn,$username,$password);
    var_dump($pdo);
}catch (PDOException $e){
    $e->getMessage();
}