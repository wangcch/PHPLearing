<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/7
 * Time: 23:22
 */
//
//JSON format
//[1,2,3,"hello",[4,5,6]];
//{"h":"hello","w":"world",[1,2,3]}

//encode >>>>>>>>>>>>>>>>

$arr = array(1,2,3,'Hello','PHPLearning',array('h'=>'hello','w'=>'world'));
print_r($arr);
echo "<br>";
echo json_encode($arr);
//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => Hello [4] => PHPLearning [5] => Array ( [h] => hello [w] => world ) )
//[1,2,3,"Hello","PHPLearning",{"h":"hello","w":"world"}]


echo '<br>';

//decode >>>>>>>>>>>>>>>>>

$jsonStr = '{"h":"hello","w":"world"}';
$obj = json_decode($jsonStr);
print_r($obj);
echo '<br>';
echo $obj->h;
