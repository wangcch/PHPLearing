<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/18
 * Time: 0:42
 *
 * 设置数据库的连接属性
 *
 * getAttribute()
 * setAttribute()
 */

try{
    $pdo=new PDO('mysql:host=localhost;dbname=demo','root','');
    echo "ATTR_AUTOCOMMIT:".$pdo->getAttribute(PDO::ATTR_AUTOCOMMIT);

}catch (PDOException $e){
    $e->getMessage();
}