<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/10
 * Time: 19:50
 *
 * 生成图片
 */

$img = imagecreate(400,300);
imagecolorallocate($img,255,255,255);

imageellipse($img,200,200,50,50,imagecolorallocate($img,255,0,0));

header('Content-type:image/png');
imagepng($img);