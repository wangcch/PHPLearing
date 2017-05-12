<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 21:49
 *
 * 逻辑运算 logic
 */

//== != || &&

function traceNum(){
    for($i=0;$i<=100;$i++){
        if($i%2==0 && $i%3==0){
            echo $i."<br>";
        }
    }

}

traceNum();