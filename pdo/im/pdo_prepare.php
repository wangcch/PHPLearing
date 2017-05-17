<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/18
 * Time: 0:24
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="SELECT id,name,age FROM users WHERE name='demo6'";
    //准备SQL语句
    $stmt=$pdo->prepare($sql);

    //执行预处理语句
    $res=$stmt->execute();
    var_dump($res);

    $row=$stmt->fetch();
    print_r($row);


}catch (PDOException $e){
    $e->getMessage();
}