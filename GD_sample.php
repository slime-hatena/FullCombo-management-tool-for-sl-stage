<?php
$img = ImageCreate(100,100);
$black = ImageColorAllocate($img, 0x00, 0x00, 0x00);
ImageFilledRectangle($img, 0,0, 100,100, $black);

header('Content-Type: image/png');
ImagePNG($img);
?>






<img src="script/simple-png.php">