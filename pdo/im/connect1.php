<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/16
 * Time: 13:57
 *
 * 连接数据库
 * 1.通参数形式连接数据库
 * 2.通过uri形式连接数据库
 * 3.通过配置文件形式连接数据库
 *
 */

try{
    $dsn="mysql:host=localhost;dbname=demo";
    $username='root';
    $password='';
    $pdo=new PDO($dsn,$username,$password);
    var_dump($pdo);
}catch (PDOException $e){
    echo $e->getMessage();
}