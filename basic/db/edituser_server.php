<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 13:30
 */
require_once 'functions.php';
if(empty($_POST['id'])){
    die('id is empty');
}
if(empty($_POST['name'])){
    die('name is empty');
}
if(empty($_POST['age'])){
    die('age is empty');
}
$id = intval($_POST['id']);
$name = $_POST['name'];
$age = intval($_POST['age']);

connectDb();

mysql_query("UPDATE users SET name='$name' ,age=$age WHERE id=$id");
if(mysql_errno()){
    echo mysql_error();
}else{
    header("Location:allusers.php");
}