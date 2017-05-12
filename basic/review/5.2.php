<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 22:09
 *
 * 数组 arrays
 */

//数组初始化
//$arr= array('h'=>'hello','w'=>'world');



$arr =array();
$arr[0] = 'hello';
$arr[1] = 'world';
$arr[2] = 2;

//$arr['h'] = 'hello';


print_r($arr);

echo '<br>';

for($i=0;$i<10;$i++){
    array_push($arr,'Item'.$i);
}
print_r($arr);