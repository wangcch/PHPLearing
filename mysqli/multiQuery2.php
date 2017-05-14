<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/14
 * Time: 20:01
 */

require_once 'config.php';

$sql = "SELECT id,name,age FROM users;";
$sql .= "SELECT * FROM demo.users;";
$sql .= "SELECT NOW();";

//use_result()  store_result()   获得第一条产生的结果集
//mote_results()  检测是否有更多的结果集
//next_result()   将结果指针向下移动一位

if ($mysqli->multi_query($sql)){
    do{
        if($mysqli_result = $mysqli->store_result()){
            $rows[] = $mysqli_result->fetch_all(MYSQLI_ASSOC);
        }
    }while($mysqli->more_results() && $mysqli->next_result());
}else{
    echo $mysqli->error;
}

print_r($rows);

$mysqli->close();
