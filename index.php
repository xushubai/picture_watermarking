<?php
header("Content-type: text/html; charset=utf-8");

$list = [1,2,3,4,5,6];
foreach ($list as $key => $value) {
	$dst_path = './'.$value.'.png';
	$dst__path = './a/'.time().' - '.$value.'.png';

	//创建图片的实例
	$dst = imagecreatefromstring(file_get_contents($dst_path));

	//打上文字
	$font = './simsun.ttc';//字体
	$black = imagecolorallocate($dst, 255,0, 0);//字体颜色
	imagefttext($dst, 20, 0, 200, 490, $black, $font, '徐书柏');

	//输出图片
	list($dst_w, $dst_h, $dst_type) = getimagesize($dst_path);
	switch ($dst_type) {
	    case 1://GIF
	        header('Content-Type: image/gif');
	        imagegif($dst);
	        break;
	    case 2://JPG
	        header('Content-Type: image/jpeg');
	        imagejpeg($dst);
	        break;
	    case 3://PNG
	        header('Content-Type: image/png');
	        imagepng($dst,$dst__path);
	        break;
	    default:
	        break;
	}
	imagedestroy($dst);
}
