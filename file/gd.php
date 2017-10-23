<?php
// 随机文字
function getStr(){
  $text=array('a','s','e','r','3','5','6','8','h','j','u','7');
}
//随机颜色
function getColor($image)
{
    $red=mt_rand(0, 255);
    $green=mt_rand(0, 255);
    $blue=mt_rand(0, 255);
    return imagecolorallocate($image, $red, $green, $blue);
}
//随机画线
function drawLine($image, $x, $y, $num)
{
    for ($i=0; $i<$num; $i++) {
        $x1=mt_rand(0, $x);
        $y1=mt_rand(0, $y);
        $x2=mt_rand(0, $x);
        $y2=mt_rand(0, $y);
        imageline($image, $x1, $y1, $x2, $y2, getColor($image));
    }
}
//随机画点
function drawPoint($image, $x, $y, $num)
{
    for ($i=0; $i<$num; $i++) {
        $xr=mt_rand(0, $x);
        $yr=mt_rand(0, $y);
        imagesetpixel($image, $xr, $yr, getColor($image));
    }
}

//创建背景图像
$img=imagecreatetruecolor(400, 400);
// 2.选择颜色
// $color =imagecolorallocate($img, 255, 0, 0);
//填充图像
imagefill($img, 0, 0, getColor($img));
drawLine($img, 400, 400, 10);//必须放在填充之后
drawPoint($img, 400, 400, 2000);
$arr=imagettfbbox(40,20,'font.ttf','helleo');
imagettftext($img,40,20,abs($arr[4]),abs($arr[5]),getColor($img),'font.ttf','helleo');
header('content-type:image/png');
imagepng($img);