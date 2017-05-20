<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 11:42
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="SELECT id,username FROM user";
    $stmt = $pdo->query($sql);

//    PDOStatement::fetchColumn() 取回数据，则没有办法返回同一行的另外一列
    echo $stmt->fetchColumn(0);
    echo $stmt->fetchColumn(1);

    echo $stmt->rowCount();
}catch (PDOException $exception){
    $exception->getMessage();
}