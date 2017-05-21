<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/21
 * Time: 1:48
 *
 * ENGINE=innoDB
 */

header('content-type:text/html;charset=utf-8');
try{
    $options=array(PDO::ATTR_AUTOCOMMIT,0);
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');

    var_dump($pdo->inTransaction());//false
    $pdo->beginTransaction();
    var_dump($pdo->inTransaction());//true

    $sql1='UPDATE account SET money=money+200 WHERE name="king"';
    $sql2='UPDATE account SET money=money-200 WHERE name="queen"';
    $res1=$pdo->exec($sql1);
    if ($res1==0) {
        throw new PDOException('转账失败');
    }
    $res2=$pdo->exec($sql2);
    if ($res2==0){
        throw new PDOException('接收失败');
    }
    $pdo->commit();

}catch (PDOException $e){
    $pdo->rollBack();
    $e->getMessage();
}