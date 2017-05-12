<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/11
 * Time: 21:48
 */

session_start();
$_SESSION['name'] = 'jiekexueyuan';

session_destroy();
header('Location:a.php');

//echo session_id(); //不固定 不唯一