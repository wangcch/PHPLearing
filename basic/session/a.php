<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 0:06
 */

session_start();

//echo $_SESSION['name'];

if (isset($_SESSION['name'])){
    echo $_SESSION['name'];
}else{
    echo 'null';
}