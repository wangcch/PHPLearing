<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 9:56
 *
 * connect mysqli
 */
header('content-type:text/html;charset=utf-8');

//$mysqli = new mysqli('localhost', 'root', '');
////print_r($mysqli);
//$mysqli->select_db('demo');


//$mysqli = new mysqli();
//$mysqli->connect('localhost','root','');
//print_r($mysqli);


$mysqli = new mysqli('localhost','root','','demo');
//print_r($mysqli);
if($mysqli->connect_errno){
    die('Connect error'.$mysqli->connect_error);
}

//调用属性与函数

echo $mysqli->client_info;
echo '<br>';
echo $mysqli->get_client_info();

//mysqlnd 5.0.11-dev - 20120503 - $Id: 76b08b24596e12d4553bd41fc93cccd5bac2fe7a $
//mysqlnd 5.0.11-dev - 20120503 - $Id: 76b08b24596e12d4553bd41fc93cccd5bac2fe7a $