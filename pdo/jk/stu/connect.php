<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/26
 * Time: 13:53
 */

try{
    $pdo = new PDO('mysql:host=localhost;dbname=demo','root','');
}catch (PDOException $e){
    die("连接失败".$e->getMessage());
}