<?php
 session_start();
 if(!$_GET['q']) return;
 $im = imagecreatetruecolor(40,40);
 $black = imagecolorallocate($im, 200,200,200);
 $text_color = imagecolorallocate($im,255,255,255);
 $code = '23456789ABCDEFGHJKLMNPQRSTWXYZabcdefghijkmnpqrstuvwxyz';
 $code = $code[rand(0,strlen($code)-1)];
 for ($i = 0; $i < 120; $i++) {
    imagesetpixel($im, rand(0, 40), rand(0, 40), $black);
}
imagestring($im,10,10,10,$code,$text_color);
 imagejpeg($im);
 imagedestroy($im);
 Header("Content-type: image/png");
 $_SESSION['auth'.$_GET['q']] = $code;
?>