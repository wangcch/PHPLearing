<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/10
 * Time: 20:00
 *
 * 添加图片水印
 */

$img = imagecreatefromjpeg('mm.jpg');
imagestring($img,4,5,5,'theyear.space',imagecolorallocate($img,0,255,0));

header('Content-type:image/jpeg'); //也可以输出png格式

imagejpeg($img);