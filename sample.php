<?php


    //画像読み込み
    $img = imagecreatefrompng('img/body.png');

    //文字の描画

        $font = 'font/mplus-2c-regular.ttf';

    $text = mb_convert_encoding('testestststste', 'UTF-8', 'auto');





    // 画像の出力
    header('Content-Type: image/png');
    ImagePNG($img);

    ?>




    ?>

<html>

<img src="process.php">
</html>