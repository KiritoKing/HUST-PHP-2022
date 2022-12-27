<?php
$img = imagecreatetruecolor(100, 100);//宽(x)高(y)为100

$black = imagecolorallocate($img, 0, 0, 0);
$red = imagecolorallocate($img, 255, 0, 0);
$green = imagecolorallocate($img, 0, 255, 0);
$yellow = imagecolorallocate($img, 255, 242, 59);

imagedestroy($img);//释放内存
