<?php

// わざとらしくLVごとにx-pxを指定
$lv_map = array (
		28 => 370,
		27 => 484,
		26 => 602,
		25 => 722,
		24 => 838,
		23 => 955,
		22 => 1076,
		21 => 1188,
		20 => 1304,
		19 => 1426,
		18 => 1537,
		17 => 1660,
		16 => 1775,
		15 => 1895,
		14 => 2008,
		13 => 2125,
		12 => 2245,
		11 => 2359,
		10 => 2473,
		9 => 2595,
		8 => 2709,
		7 => 2825,
		6 => 2944,
		5 => 3064
);

$song_1st_x = 119;

// 各要素の位置を指定
$p_rank_x = 4;
$p_rank_y = 154;

$name_x = 71;
$name_y = 205;

$twitter_x = 33;
$twitter_y = 250;

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

// 現在の最大曲数を入力しておく
$music_max = 33;
$music_max_masplus = 0;

// 受け渡された文字列を代入
$name = mb_convert_encoding ( $_POST["name"], 'UTF-8', 'auto' );

$p_rank = mb_convert_encoding ( $_POST["p_rank"], 'UTF-8', 'auto' );
$twitter = mb_convert_encoding ( $_POST["twitter"], 'UTF-8', 'auto' );;
$prp = mb_convert_encoding ( $_POST["prp"], 'UTF-8', 'auto' );

//後で使う変数をわかりやすくここで定義しておく
$debut = 0;
$regular = 0;
$pro = 0;
$master = 0;
$masplus = 0;

// 以下デバッグ用----------------------------
$rating = 14.97;
// デバッグ用ここまで---------------------------

// 画像読み込み
$img = imagecreatefrompng ( 'img/body.png' );
$img_stamp = imagecreatefrompng ( 'img/stamp.png' );

// 色の指定
$white = ImageColorAllocate ( $img, 0xFF, 0xFF, 0xFF );
$black = ImageColorAllocate ( $img, 0x00, 0x00, 0x00 );
$pink = ImageColorAllocate ( $img, 0xDA, 0x70, 0x6D );
$orange = ImageColorAllocate ( $img, 0xff, 0x9b, 0x38 );
$blue = ImageColorAllocate ( $img, 0x41, 0x69, 0xE1 );
$green = ImageColorAllocate ( $img, 0x00, 0x80, 0x00 );
$yellow = ImageColorAllocate ( $img, 0xBD, 0xB7, 0x6B );
$red = ImageColorAllocate ( $img, 0xDC, 0x14, 0x3C );
$dark_purple = ImageColorAllocate ( $img, 0x48, 0x3D, 0x8B );

// rateで色変更
// 時間がなかったのでだいぶヤバい実装の仕方してる
// 何回も x<$<y で書いてるのは見てたらだんだん意味がわからなくなってきたのでわかりやすいようにそうしておく

$rate_clolor = $black;
// rate 0

if (3.00 <= $rating && $rating < 5.00) { // rate 3

	$rate_clolor = $pink;
} elseif (5.00 <= $rating && $rating < 7.00) { // rate 5

	$rate_clolor = $orange;
} elseif (7.00 <= $rating && $rating < 10.00) { // rate 7

	$rate_clolor = $blue;
} elseif (10.00 <= $rating && $rating < 12.00) { // rate 10

	$rate_clolor = $green;
} elseif (12.00 <= $rating && $rating < 14.00) { // rate 12

	$rate_clolor = $yellow;
} elseif (14.00 <= $rating && $rating < 15.00) { // rate 14

	$rate_clolor = $red;
} elseif (15.00 <= $rating) { // rate 15

	$rate_clolor = $dark_purple;
}

// P名の文字数を判断してフォントサイズ変える処理
// 文字数取得
if (mb_strlen ( $name ) <= 5) {
	$name_size = 40;
} elseif (mb_strlen ( $name ) <= 7) {
	$name_size = 32;
} else {
	$name_size = 24;
}

// ここから画像に画像を合成する処理

if (isset ( $_POST ['arr'] )) {
	foreach ( $_POST ['arr'] as $key => $value ) {

		$get_val = $value;

		if (substr ( $get_val, 0, 1 ) == 0) { // 1桁目が"0"の時は2桁目のみを参照する処理
			$id_lv = substr ( $get_val, 1, 1 );
		} else {
			$id_lv = substr ( $get_val, 0, 2 );
		}

		$id_column = substr ( $get_val, - 2 );

		imagecopy ( $img, $img_stamp, $song_1st_x + (120 * ($id_column - 1)), $lv_map [$id_lv], 0, 0, 121, 100 );

		// 合計曲数を出す処理
		if ($id_lv <= 9) {
			$debut ++;
		} elseif ($id_lv <= 14) {
			$regular ++;
		} elseif ($id_lv <= 19) {
			$pro ++;
		} elseif ($id_lv <= 28) {
			$master ++;
		} elseif ($id_lv) {
			$masplus ++;
		}
	}
}

// 全曲を出す処理
$all = $debut + $regular + $pro + $master;
$all_max = ($music_max * 4) + $music_max_masplus;

// 全体達成率を百分率で

$percent_all = 0;
if ($all >= 0) {
	$percent_all = round ( ($all / $all_max) * 100, 2 );
}

// フルコン数が１桁の時に空白を入れる処理
// そのうち簡素化したい
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

// フルコン曲数を 30 / 30みたいにする
$r_debut = $debut . ' / ' . $music_max;
$r_regular = $regular . ' / ' . $music_max;
$r_pro = $pro . ' / ' . $music_max;
$r_master = $master . ' / ' . $music_max;
$r_masplus = $masplus . ' / ' . $music_max_masplus;
$r_all = $all . ' / ' . $all_max . ' (' . $percent_all . '%)';
$r_rating = 'Rating : ' . sprintf ( '%.2f', $rating );

// フォントの指定
$font = 'font/mplus-2c-regular.ttf';

// 文字の描写
ImageTTFText ( $img, $name_size, 0, $name_x, $name_y, $black, $font, $name );
// P名
ImageTTFText ( $img, 24, 0, $twitter_x, $twitter_y, $black, $font, $twitter );
// Twitter
ImageTTFText ( $img, 24, 0, $prp_x, $prp_y, $black, $font, $prp );
// PRP
ImageTTFText ( $img, 20, 0, $debut_x, $debut_y, $black, $font, $r_debut );
// Debut
ImageTTFText ( $img, 20, 0, $regular_x, $regular_y, $black, $font, $r_regular );
// Regular
ImageTTFText ( $img, 20, 0, $pro_x, $pro_y, $black, $font, $r_pro );
// Pro
ImageTTFText ( $img, 20, 0, $master_x, $master_y, $black, $font, $r_master );
// Master
ImageTTFText ( $img, 75, 0, $all_full_x, $all_full_y, $black, $font, $r_all );
// All
ImageTTFText ( $img, 52, 0, $rating_x, $rating_y, $rate_clolor, $font, $r_rating );
// Rating

// 画像をbase64でimgタグに突っ込むための処理
ob_start ();
imagePNG ( $img );
$content = base64_encode ( ob_get_contents () );
ob_end_clean ();

// ファイル消しておわり
imagedestroy ( $img );
imagedestroy ( $img_stamp );

?>

<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="utf-8">
<title>process.php</title>
</head>

<body bgcolor="#EFEFEF" text="#000000">
	<p>
		<font size="8">以下の画像を保存してお使いください。</font>
	</p>
	<img src="data:image/png;base64,<?php echo $content; ?>" alt="img" />

</body>
</html>