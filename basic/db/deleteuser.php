<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 18:04
 */

if(empty($_GET['id'])){
    die('id id empty');
}
require_once 'functions.php';
connectDb();
$id=intval($_GET['id']);

mysql_query("DELETE FROM users WHERE id = $id");
if (mysql_errno()){
    die('Fail to delete user with id $id');
}else{
    header("Location:allusers.php");
}