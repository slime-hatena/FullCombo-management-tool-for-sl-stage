<?php
require_once 'twitter/common.php';
require_once 'twitter/twitteroauth/autoload.php';
use Abraham\TwitterOAuth\TwitterOAuth;


	include ("header.php");

	$access_token = $_SESSION ['access_token'];

	// OAuthトークンとシークレットも使って TwitterOAuth をインスタンス化
	$connection = new TwitterOAuth ( CONSUMER_KEY, CONSUMER_SECRET, $access_token ['oauth_token'], $access_token ['oauth_token_secret'] );

	$media_id = $connection->upload ( "media/upload", array (
			"media" => $_POST ["file_name"]
	) );

	$parameters = array (
			'status' => $_POST ["Insert"]. " " .$_POST ["tweet"]. " #デレステ",
			'media_ids' => $media_id->media_id_string
	);
	$result = $connection->post ( 'statuses/update', $parameters );

	echo "<br />ツイートを試みました。Twitterを確認してみてください。<br /><hr>";


	?>
<img style="width: 100%;"
	src="<?php echo $_POST ["file_name"]; ?>" alt="img" />
<?php

	include ("footer.html");

?>
</body>
</html>
