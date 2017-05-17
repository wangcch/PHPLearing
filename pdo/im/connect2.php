<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/17
 * Time: 8:50
 *
 */

try{
    $dsn="uri:file://F:\PhpStormProject\PHPLearning\pdo\im\dsn.txt";
    $username='root';
    $password='';
    $pdo = new PDO($dsn,$username,$password);
    var_dump($pdo);
}catch (PDOException $e){
    echo $e->getMessage();
}
