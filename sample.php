<?php


    //画像読み込み
    $img = imagecreatefrompng('img/body.png');

        //色の指定
    $black = ImageColorAllocate($img, 0x00, 0x00, 0x00);
    $white = ImageColorAllocate($img, 0xFF, 0xFF, 0xFF);

    //文字の描画



    $text = mb_convert_encoding('testestststste', 'UTF-8', 'auto');


     ImageTTFText($img, 32, 0, 200, 200, $black, 'font/mplus-2c-regular.ttf', $text);


    // 画像の出力
    header('Content-Type: image/png');
    ImagePNG($img);

    ?>




