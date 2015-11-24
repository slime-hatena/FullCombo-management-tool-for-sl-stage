<?php

// 更新時に真っ先に変えなきゃいけないゾーン
$version = "ver." . "151125";
$rating_all = 2245; // 全曲のレベルを足した数値
$music_max = 36;  //全曲数
$music_max_masplus = 0; //マスプラの曲数

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

// 受け渡された文字列を代入
$name = mb_convert_encoding ( $_POST ["name"], 'UTF-8', 'auto' );
$p_rank = mb_convert_encoding ( $_POST ["p_rank"], 'UTF-8', 'auto' );
$twitter = mb_convert_encoding ( $_POST ["twitter"], 'UTF-8', 'auto' );
$prp = mb_convert_encoding ( $_POST ["prp"], 'UTF-8', 'auto' );
$rating = 0;
$p_rank = $_POST ["p_rank"];

// 後で使う変数をわかりやすくここで定義しておく
$debut = 0;
$regular = 0;
$pro = 0;
$master = 0;
$masplus = 0;

// 画像読み込み
$img = imagecreatefrompng ( 'img/body.png' );
$img_stamp = imagecreatefrompng ( 'img/stamp.png' );
$img_ss = imagecreatefrompng ( 'img/ss.png' );
$img_s = imagecreatefrompng ( 'img/s.png' );
$img_a = imagecreatefrompng ( 'img/a.png' );
$img_b = imagecreatefrompng ( 'img/b.png' );
$img_c = imagecreatefrompng ( 'img/c.png' );
$img_d = imagecreatefrompng ( 'img/d.png' );
$img_e = imagecreatefrompng ( 'img/e.png' );
$img_f = imagecreatefrompng ( 'img/f.png' );

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

		// ratingを求める処理
		$rating += $id_lv;
	}
}

// ratingの演算
$r_rating = round ( ($rating / $rating_all) * 15, 2 );

// rateで色変更
// 時間がなかったのでだいぶヤバい実装の仕方してる
// 何回も x<$<y で書いてるのは見てたらだんだん意味がわからなくなってきたのでわかりやすいようにそうしておく

$rate_clolor = $black;
// rate 0

if (3.00 <= $r_rating && $r_rating < 5.00) { // rate 3

	$rate_clolor = $pink;
} elseif (5.00 <= $r_rating && $r_rating < 7.00) { // rate 5

	$rate_clolor = $orange;
} elseif (7.00 <= $r_rating && $r_rating < 10.00) { // rate 7

	$rate_clolor = $blue;
} elseif (10.00 <= $r_rating && $r_rating < 12.00) { // rate 10

	$rate_clolor = $green;
} elseif (12.00 <= $r_rating && $r_rating < 14.00) { // rate 12

	$rate_clolor = $yellow;
} elseif (14.00 <= $r_rating && $r_rating < 15.00) { // rate 14

	$rate_clolor = $red;
} elseif (15.00 <= $r_rating) { // rate 15

	$rate_clolor = $dark_purple;
}

// 全曲を出す処理
$all = $debut + $regular + $pro + $master + $masplus;
$all_max = ($music_max * 4) + $music_max_masplus;

// 全体達成率を百分率で

$percent_all = 0;
if ($all >= 0) {
	$percent_all = round ( ($all / $all_max) * 100, 2 );
}

// Twitter用テンプレ生成
$tweet = $name . "さんのフルコンボ曲数は" . $all . "/" . $all_max . "(" . sprintf ( '%.2f', $percent_all ) . "％) " . " , Ratingは" . sprintf ( '%.2f', $r_rating  ). "です。fcManagementTool 4 sl-stage｜http://svr.aki-memo.net/FullCombo-management-tool-for-sl-stage/form.html";

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
$r_all = $all . ' / ' . $all_max . ' (' . sprintf ( '%.2f', $percent_all ) . '%)';
$r_rating = 'Rating : ' . sprintf ( '%.2f', $r_rating );

// P名の文字数を判断してフォントサイズ変える処理
// 文字数取得
if (mb_strlen ( $name ) <= 5) {
	$name_size = 40;
} elseif (mb_strlen ( $name ) <= 7) {
	$name_size = 32;
} else {
	$name_size = 24;
}

// フォントの指定
$font = 'font/mplus-2c-regular.ttf';

// プロデユーサーランクを合成する処理
switch ($p_rank) {
	case "SS" :
		imagecopy ( $img, $img_ss, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "S" :
		imagecopy ( $img, $img_s, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "A" :
		imagecopy ( $img, $img_a, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "B" :
		imagecopy ( $img, $img_b, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "C" :
		imagecopy ( $img, $img_c, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "D" :
		imagecopy ( $img, $img_d, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "E" :
		imagecopy ( $img, $img_e, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
	case "F" :
		imagecopy ( $img, $img_f, $p_rank_x, $p_rank_y, 0, 0, 61, 61 );
		break;
}

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
ImageTTFText ( $img, 14, 0, 720, 3164, $black, $font, $version );

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
<title>result - fcManagementTool 4 sl-stage</title>
<meta name="viewport"
	content="width=device-width; initial-scale=1.0; maximum-scale=1.0; maximum-scale=10; user-scalable=1">
<title>クリックするとクリップボードにコピー</title>
<script language="JavaScript">
</script>
</head>



<body bgcolor="#EFEFEF" text="#000000">


	<a href="twitter://post?message=<?php echo $tweet; ?> %23デレステ"><img
		src="img/tweetbutton.png" height="30" alt="ツイートする"></a>
	<p style="font-size: 12px;">
		画像を保存してから押してください。<br /> 公式クライアントがインストールされている必要があります。<br />
		ツイート欄が開いたら画像を添付してツイートしてください。<br /> <br />
		現在一部の端末から画像が保存できない現象を確認しています。お手数ですがスクリーンショットでの代用をお願いします。<br />
		保存できない場合は<a href="https://twitter.com/Slime_hatena" target=_blank>@Slime_hatena</a>に端末、ブラウザ名をお知らせいただけると助かります。
	</p>

	<hr>
	<p style="font-size: 12px;">
		以下コピペ用<br /> 公式クライアントをインストールしていない時などにお使いください。
	</p>


	<p style="font-size: 9px"><?php echo $tweet; ?> #デレステ</p>

	<hr>

	<img style="width: 100%;"
		src="data:image/png;base64,<?php echo $content; ?>" alt="img" />




</body>
</html>