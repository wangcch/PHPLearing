<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 18:42
 *
 * PDO 对象初始化
 */

//$mysqli = new mysqli("localhost",'root','','demo');

try{
//    $pdo = new PDO('mysql:host=localhost;dbname=demo','root','');
//    $pdo = new PDO('uri:mysqlPdo.ini','root','');
    $pdo = new PDO('uri:mysqlPdo.ini','root','');

}catch (PDOException $exception){
    die('connection failed'.$exception->getMessage());
}
//print_r($pdo);// PDO Object()


