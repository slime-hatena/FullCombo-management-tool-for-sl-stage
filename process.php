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

    $name_x = 71;
    $name_y = 210;

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

    $all_full_x = 767;
    $all_full_y = 151;
    $rating_x = 767;
    $rating_y = 280;

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
    $prp = mb_convert_encoding('3340', 'UTF-8', 'auto');;
    $debut = 33;
    $regular = 22;
    $pro = 11;
    $master = 1;
    $masplus = 0;
    //デバッグ用ここまで---------------------------

    //フルコン数が１桁の時に空白を入れる処理
    //                                  masterしかつくってない

    if ($master < 10) {

        $master = ' ' . $master;

    }

    //フルコン曲数を 30 / 30みたいにする
    $r_debut = $debut . ' / ' . $music_max;
    $r_regular = $regular . ' / ' . $music_max;
    $r_pro = $pro . ' / ' . $music_max;
    $r_master = $master . ' / ' . $music_max;
    $r_masplus = $masplus . ' / ' . $music_max_masplus;

    //画像読み込み
    $img = imagecreatefrompng('img/body.png');

   //色の指定
    $black = ImageColorAllocate($img, 0x00, 0x00, 0x00);
    $white = ImageColorAllocate($img, 0xFF, 0xFF, 0xFF);

    //フォントの指定
    $font = 'font/mplus-2c-regular.ttf';



    //文字の描写
    ImageTTFText($img, 46, 0, $name_x, $name_y, $black,'font/mplus-2c-regular.ttf', $name); //P名
    ImageTTFText($img, 26, 0, $twitter_x, $twitter_y, $black,'font/mplus-2c-regular.ttf', $twitter); //Twitter
    ImageTTFText($img, 24, 0, $prp_x, $prp_y, $black,'font/mplus-2c-regular.ttf', $prp); //PRP
    ImageTTFText($img, 20, 0, $debut_x, $debut_y, $black,'font/mplus-2c-regular.ttf', $r_debut); //Debut
    ImageTTFText($img, 20, 0, $regular_x, $regular_y, $black,'font/mplus-2c-regular.ttf', $r_regular); //Regular
    ImageTTFText($img, 20, 0, $pro_x, $pro_y, $black,'font/mplus-2c-regular.ttf', $r_pro); //Pro
    ImageTTFText($img, 20, 0, $master_x, $master_y, $black,'font/mplus-2c-regular.ttf', $r_master); //Master

    // 画像の出力
    header('Content-Type: image/png');
    ImagePNG($img);

    ?>