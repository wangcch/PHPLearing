<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/17
 * Time: 13:11
 *
 */
header('content-type:text/html;charset=utf-8');
try {
    $pdo = new PDO('mysql:host=localhost;dbname=demo', 'root', '');

//    $sql=<<<EOF
//    INSERT users(name,age) VALUE('demo3',3),
//    ('demo4',4),
//    ('demo5',5);
//EOF;
    $sql="INSERT users(name,age) VALUE('demo6',6);";
    $res=$pdo->exec($sql);
    echo 'Affect rows:'.$res.'<br>';
    echo 'lastInsertID:'.$pdo->lastInsertId();

}catch (PDOException $e){
    echo $e->getMessage();
}