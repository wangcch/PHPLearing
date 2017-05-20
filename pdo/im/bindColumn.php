<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/19
 * Time: 11:04
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    $sql="SELECT id,username FROM user";
    $stmt=$pdo->prepare($sql);
    $stmt->execute();
    //绑定一列到一个PHP变量
    $stmt->bindColumn(1,$id);
    $stmt->bindColumn(2,$username);

    while($stmt->fetch(PDO::FETCH_BOUND)){
        echo "id:".$id." username:".$username.'<hr>';
    }

    echo $stmt->rowCount();
}catch (PDOException $exception){
    $exception->getMessage();
}