<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/18
 * Time: 0:03
 */

try{
    $pdo=new PDO('mysql:host=localhost;dbname:demo','root','');
    $sql="INSERT users(name,age1) VALUE('demo',10)";
    $res=$pdo->exec($sql);
    if ($res==false){
        //return SQLSTATE
        echo $pdo->errorCode();//3D000
        echo '<br>';
        print_r($pdo->errorInfo());//Array ( [0] => 3D000 [1] => 1046 [2] => No database selected )
    }



}catch (PDOException $e){
    $e->getMessage();
}