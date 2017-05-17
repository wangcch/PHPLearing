<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/18
 * Time: 0:12
 */

header('content-type:text/html;charset=utf-8');
try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
//    $sql="SELECT * FROM users WHERE id=1";
    $sql="SELECT id,name,age FROM users";

    $stmt=$pdo->query($sql);
    var_dump($stmt);
    echo '<hr>';
    foreach ($stmt as $row){
        echo 'name:'.$row['name'].'<br>';
        echo "age:".$row['age'].'<br>';
        echo '<hr>';
    }


}catch (PDOException $e){
    $e->getMessage();
}