<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/18
 * Time: 0:36
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="SELECT id,name,age FROM users";
    $stmt=$pdo->prepare($sql);
    $res=$stmt->execute();
//    if($res){
//        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
//            print_r($row);
//            echo '<hr>';
//        }
//    }

//    $rows=$stmt->fetchAll(PDO::FETCH_ASSOC);
//    print_r($rows);

    echo '<hr>';

    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $rows=$stmt->fetchAll();
    print_r($rows);


}catch (PDOException $e){
    $e->getMessage();
}