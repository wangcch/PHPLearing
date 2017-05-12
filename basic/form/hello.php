<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/11
 * Time: 18:53
 */

if(isset($_GET['name'])&&$_GET['name']){
    echo 'hello '.$_GET['name'];
}else{
    echo '请输入名字';
}