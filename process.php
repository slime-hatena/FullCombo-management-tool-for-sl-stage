<?php
    // ライブラリのロード



    // わざとらしくLVごとにx-pxを指定
    //                          最高に頭悪い書き方なので後で改修したい
    $lv_28 = 366;
    $lv_27 = 118 + $lv_28;
    $lv_26 = 118 + $lv_27;
    $lv_25 = 120 + $lv_26;
    $lv_24 = 116 + $lv_25;
    $lv_23 = 117 + $lv_24;
    $lv_22 = 121 + $lv_23;
    $lv_21 = 119 + $lv_22;
    $lv_20 = 116 + $lv_21;
    $lv_19 = 121 + $lv_20;
    $lv_18 = 115 + $lv_19;
    $lv_17 = 121 + $lv_18;
    $lv_16 = 115 + $lv_17;
    $lv_15 = 120 + $lv_16;
    $lv_14 = 117 + $lv_15;
    $lv_13 = 116 + $lv_14;
    $lv_12 = 124 + $lv_13;
    $lv_11 = 116 + $lv_12;
    $lv_10 = 116 + $lv_11;
    $lv_9 = 121 + $lv_10;
    $lv_8 = 116 + $lv_9;
    $lv_7 = 116 + $lv_8;
    $lv_6 = 121 + $lv_7;
    $lv_5 = 121 + $lv_6;

    $song_1st_x = 131;



    // 各要素の位置を指定
    $p_rank_x = 4;
    $p_rank_y = 154;

    $name_x = 75;
    $zname_y = 160;

    $twitter_x = 10;
    $twitter_y = 225;

    $prp_x = 300;
    $prp_y = 270;

    $debut_x = 555;
    $debut_y = 200;
    $regular_x = 555;
    $regular_y = 234;
    $pro_x = 555;
    $pro_y = 264;
    $master_x = 555;
    $master_y = 294;
    $masplus_x = 555;
    $masplus_y = 324;

    $all_full_x = 767;
    $all_full_y = 151;
    $rating_x = 767;
    $rating_y = 280;

//    $font = 'font/mplus-2c-regular.ttf';


//画像読み込み
$img = imagecreatefrompng('img/body.png');
header('Content-Type: image/png');
ImagePNG($img);

//文字の描画
$text = mb_convert_encoding('1145148101919', 'UTF-8', 'auto');

$black = ImageColorAllocate($img, 0x00, 0x00, 0x00);
ImageTTFText($img, 16, 0, 5, 200, $black, 'font/mplus-2c-regular.ttf' , $text);


// 画像の出力
header('Content-Type: image/png');
ImagePNG($img);
?>




    ?>

<html>

<img src="process.php">
</html>