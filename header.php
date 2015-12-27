<?php
session_start ();
require_once 'twitter/common.php';
require_once 'twitter/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>fcManagementTool 4 sl-stage ver2</title>
<link rel="stylesheet" type="text/css" href="form.css">
<link rel="stylesheet" type="text/css" href="check.css">
<link rel="stylesheet" type="text/css" href="accordion.css">

<script type="text/javascript" src="js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="js/cookiesave.js"></script>
<script src="js/accordion.js"></script>

<script type="text/javascript">
	CookieSave.expires = 360 * 24 * 60 * 60 * 1000;
</script>

<meta name="viewport"
	content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;">


<script type="text/javascript">
	$(function() {
		$('.checkAll').on('change', function() {
			$('.' + this.id).prop('checked', this.checked);
		});
	});
</script>

<link
	href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"
	rel="stylesheet">

<!-- favicon -->
<link rel="shortcut icon" href="img/icon/favicon.ico">
<!-- iOS Safari -->
<link rel="apple-touch-icon" sizes="120x120"
	href="img/icon/apple-touch-icon.png">
<!-- iOS Safari(旧) / Android標準ブラウザ(一部) -->
<link rel="apple-touch-icon-precomposed"
	href="img/icon/apple-touch-icon.png">
<!-- Android標準ブラウザ(一部) -->
<link rel="shortcut icon" href="img/icon/apple-touch-icon.png">
<!-- Android Chrome -->
<link rel="icon" sizes="120x120" href="img/icon/apple-touch-icon.png">

<!--  アコーディオンメニュー用 -->
<script type="text/javascript">
	function demo02() {
		$(this).toggleClass("active").next().slideToggle(300);
	}
	$(".switch .toggle").click(demo02);
</script>

</head>

<body>

	<div class="demo demo04 switch">
		<ul>
			<li><a class="toggle menu">
					<h1 style="font-size: 1.4rem">fcManagementTool 4 sl-stage</h1>
			</a>
				<ul class="inner child child01">
					<li><a href="twitter/login.php"><span style="color: #6CADDE;"><i
								class="fa fa-twitter"></i></span>ログイン画面を開く</a></li>

					<li><a href="index.php">topページ</a></li>
					<li>tool ver. : beta 2.0<br /> img ver. : 151226
					</li>
					<li><a
						href="https://github.com/Slime-hatena/FullCombo-management-tool-for-sl-stage/releases"
						target="_blank">更新履歴(Github)</a></li>
					<li><a href="policy.php">免責事項 ・ プライバシーポリシー</a></li>
					<li><a href="license.php">ライセンス</a></li>
				</ul></li>
		</ul>
	</div>

	<noscript>
		<div style="color: red">
			<b>JavaScriptが無効になっています。サイトの大部分が正常に表示できない可能性があります。</b>
		</div>
	</noscript>


	<span style="color: #6CADDE; font-size: 1.2rem"><i
		class="fa fa-twitter"></i></span>
	<?php
	// セッションに入れておいたさっきの配列
	if (isset ( $_SESSION ['access_token'] )) {
		$access_token = $_SESSION ['access_token'];

		// OAuthトークンとシークレットも使って TwitterOAuth をインスタンス化
		$connection = new TwitterOAuth ( CONSUMER_KEY, CONSUMER_SECRET, $access_token ['oauth_token'], $access_token ['oauth_token_secret'] );

		// ユーザー情報をGET
		$user = $connection->get ( "account/verify_credentials" );

		// ユーザーネームを取得
		echo "ログイン中です：@";
		echo $user->screen_name;
	} else {
		echo "ログインしていないか、セッションの有効期限が切れています。<a href=\"twitter/login.php\">ログイン</a>してください。";
	}

	?>