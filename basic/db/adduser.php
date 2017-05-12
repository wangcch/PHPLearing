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
$age = $_POST['age'];
