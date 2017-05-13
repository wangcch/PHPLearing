<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/13
 * Time: 13:35
 *
 */
require_once 'config.php';

$sql = "SELECT id,name,age FROM users";
$mysqli_result = $mysqli->query($sql);
//print_r($mysqli_result);

if ($mysqli_result && $mysqli_result->num_rows>0){
      // >>all
//    $rows = $mysqli_result->fetch_all();
//    $rows = $mysqli_result->fetch_all(MYSQLI_NUM);//索引
//    $rows = $mysqli_result->fetch_all(MYSQLI_ASSOC);//关联
//    $rows = $mysqli_result->fetch_all(MYSQLI_BOTH);
//    print_r($rows);
//
//    echo '<br>';
//
//    //move the pointer
//    $mysqli_result->data_seek(0);
//    // >>single
//    $row = $mysqli_result->fetch_assoc();
//    print_r($row);

    while($row = $mysqli_result->fetch_assoc()){
        print_r($row);
        echo '<br>';
    }

    $mysqli_result->free();//  or  close()  free_result()

}else{
    echo "error or no data";
}