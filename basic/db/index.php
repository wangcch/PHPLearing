<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/12
 * Time: 9:51
 */

$conn = @mysql_connect('localhost','root','');

if($conn){

//    echo 'succes';
    mysql_select_db('demo',$conn);
    $result = mysql_query('SELECT * FROM users ');

//    $result_arr = mysql_fetch_assoc($result);
//    print_r($result_arr);
//    echo 'length:'.mysql_num_rows($result);
    if($result) {
        $data_count = mysql_num_rows($result);
        for ($i = 0; $i < $data_count; $i++) {
            print_r(mysql_fetch_assoc($result));
        }
    }

}else{
    echo 'error';
}
