<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/6
 * Time: 21:34
 *
 * 流程控制
 */

function getLevel($score){
    if ($score>90){
        return "优秀";
    }elseif ($score>80){
        return "良好";
    }else{
        return "还好";
    }
}

echo getLevel(95);

echo "<br>";
echo intval(9.5);
echo "<br>";
echo intval(9.4);