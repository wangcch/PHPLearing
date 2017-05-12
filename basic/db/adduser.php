<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 10:36
 */

if(!isset($_POST['name'])){
    die('user name not define');
}

if (!isset($_POST['age'])){
    die('user age not define');
}

$name = $_POST['name'];
if(empty($name)){
    die('user name is empty');
}
$age = $_POST['age'];
if(empty($age)){
    die('user age is emtpy');
}

require_once 'functions.php';

connectDb();
$age = intval($age);
mysql_query("INSERT INTO users(name,age) VALUES ('$name',$age)");
if(mysql_errno()){
    echo mysql_error();
}else {
    header("Location:allusers.php");
}