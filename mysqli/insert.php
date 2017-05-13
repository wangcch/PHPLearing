<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 12:56
 */

$mysqli = new mysqli('localhost','root','','demo');
if($mysqli->connect_errno){
    die('Connect error'.$mysqli->connect_error);
}

$mysqli->set_charset('utf8');

//single sql
$sql = "INSERT users(name,age) VALUES('mysqli',1)";
//$sql = "INSERT users(name,age) VALUES('mysqli',1),('demo1',1),('demo2',2)";

//update
//$sql = "UPDATE users SET age=22 WHERE id='2' ";
$res = $mysqli->query($sql);

if ($res){
    echo 'success '.$mysqli->insert_id;
}else{
    echo 'error '.$mysqli->errno.':'.$mysqli->error;
}

$mysqli->close();