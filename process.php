<?php

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

$name_x = 71;
$name_y = 205;

$twitter_x = 33;
$twitter_y = 251;

$prp_x = 290;
$prp_y = 293;

$debut_x = 555;
$debut_y = 221;
$regular_x = 555;
$regular_y = 253;
$pro_x = 555;
$pro_y = 284;
$master_x = 555;
$master_y = 314;
$masplus_x = 555;
$masplus_y = 324;

$all_full_x = 740;
$all_full_y = 340;
$rating_x = 740;
$rating_y = 235;

//現在の最大曲数を入力しておく
$music_max = 33;
$music_max_masplus = 0;

//受け渡された文字列を代入
// ex) $name = mb_convert_encoding('秋雨', 'UTF-8', 'auto');
$p_rank = null;
$name = null;
$twitter = null;
$prp = null;
$debut = null;
$regular = null;
$pro = null;
$master = null;
$masplus = null;

//以下デバッグ用----------------------------
$p_rank = 80;
$name = mb_convert_encoding('秋雨', 'UTF-8', 'auto');
$twitter = mb_convert_encoding('Slime_hatena', 'UTF-8', 'auto');
$prp = mb_convert_encoding('645', 'UTF-8', 'auto');
$debut = 30;
$regular = 11;
$pro = 31;
$master = 30;
$masplus = 0;
$rating = mb_convert_encoding('5.00', 'UTF-8', 'auto');
//デバッグ用ここまで---------------------------

//全曲を出す処理
$all = $debut + $regular + $pro + $master;
$all_max = ($music_max * 4) + $music_max_masplus;

//全体達成率を百分率で

$percent_all = 0;
if ($all >= 0) {
    $percent_all = round(($all / $all_max) * 100, 2);
}

//フルコン数が１桁の時に空白を入れる処理
if ($debut < 10) {
    $debut = ' ' . $debut;
}

if ($regular < 10) {
    $regular = ' ' . $regular;
}

if ($pro < 10) {
    $pro = ' ' . $pro;
}

if ($master < 10) {
    $master = ' ' . $master;
}

//フルコン曲数を 30 / 30みたいにする
$r_debut = $debut . ' / ' . $music_max;
$r_regular = $regular . ' / ' . $music_max;
$r_pro = $pro . ' / ' . $music_max;
$r_master = $master . ' / ' . $music_max;
$r_masplus = $masplus . ' / ' . $music_max_masplus;
$r_all = $all . ' / ' . $all_max . ' (' . $percent_all . '%)';
$r_rating = 'Rating : ' . $rating;

//P名の文字数を判断してフォントサイズ変える処理
$name_characters = mb_strlen($name);
//文字数取得
if ($name_characters <= 5) {
    $name_size = 40;
} elseif ($name_characters <= 7) {
    $name_size = 32;
} else {
    $name_size = 24;
}

//画像読み込み
$img = imagecreatefrompng('img/body.png');

//色の指定
$white = ImageColorAllocate($img, 0xFF, 0xFF, 0xFF);
$black = ImageColorAllocate($img, 0x00, 0x00, 0x00);
//rate 0
$pink = ImageColorAllocate($img, 0xDA, 0x70, 0x6D);
//rate 3
$purple = ImageColorAllocate($img, 0x80, 0x00, 0x80);
//rate 5
$blue = ImageColorAllocate($img, 0x41, 0x69, 0xE1);
//rate 7
$green = ImageColorAllocate($img, 0x00, 0x80, 0x00);
//rate 10
$yellow = ImageColorAllocate($img, 0xBD, 0xB7, 0x6B);
//rate 12
$red = ImageColorAllocate($img, 0xDC, 0x14, 0x3C);
//rate 14
$dark_purple = ImageColorAllocate($img, 0x48, 0x3D, 0x8B);
//rate 15

//rateで色変更
//              時間がなかったのでだいぶヤバい実装の仕方してる
$rate_clolor = $black;//rate 0

if ($rating < 5) {//rate 3

    $rate_clolor = $pink;

} elseif ($rating > 7) {//rate 5

    $rate_clolor = $purple;

} elseif ($rating > 10) {//rate 7

    $rate_clolor = $green;

} elseif ($rating > 12) {   //rate 10

    $rate_clolor = $yellow;

} elseif ($rating > 14) {//rate 12

    $rate_clolor = $red;

} elseif ($rating > 15) {//rate 14

} else {            //rate 15
    $rate_clolor = $dark_purple;

}

//フォントの指定
$font = 'font/mplus-2c-regular.ttf';

//文字の描写
ImageTTFText($img, $name_size, 0, $name_x, $name_y, $black, 'font/mplus-2c-regular.ttf', $name);
//P名
ImageTTFText($img, 26, 0, $twitter_x, $twitter_y, $black, 'font/mplus-2c-regular.ttf', $twitter);
//Twitter
ImageTTFText($img, 24, 0, $prp_x, $prp_y, $black, 'font/mplus-2c-regular.ttf', $prp);
//PRP
ImageTTFText($img, 20, 0, $debut_x, $debut_y, $black, 'font/mplus-2c-regular.ttf', $r_debut);
//Debut
ImageTTFText($img, 20, 0, $regular_x, $regular_y, $black, 'font/mplus-2c-regular.ttf', $r_regular);
//Regular
ImageTTFText($img, 20, 0, $pro_x, $pro_y, $black, 'font/mplus-2c-regular.ttf', $r_pro);
//Pro
ImageTTFText($img, 20, 0, $master_x, $master_y, $black, 'font/mplus-2c-regular.ttf', $r_master);
//Master
ImageTTFText($img, 75, 0, $all_full_x, $all_full_y, $black, 'font/mplus-2c-regular.ttf', $r_all);
//All
ImageTTFText($img, 52, 0, $rating_x, $rating_y, $rate_clolor, 'font/mplus-2c-regular.ttf', $r_rating);
//Rating

// 画像の出力
header('Content-Type: image/png');
ImagePNG($img);
?>