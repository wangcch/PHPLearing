<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 10:09
 */

require_once 'config.php';

function connectDb(){
//    return mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
    $conn = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PW);
    if(!$conn){
        die('Can not connect db');
    }
    mysql_select_db('demo');
    return $conn;

}