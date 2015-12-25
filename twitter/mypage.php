<?php

session_start();

require_once 'common.php';
require_once 'twitteroauth/autoload.php';

use Abraham\TwitterOAuth\TwitterOAuth;

//セッションに入れておいたさっきの配列
$access_token = $_SESSION['access_token'];

//OAuthトークンとシークレットも使って TwitterOAuth をインスタンス化
$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);


//ユーザー情報をGET
 $user = $connection->get("account/verify_credentials");

//GETしたユーザー情報をvar_dump

//var_dump( $user );

 // ユーザーネームを取得
 echo "<pre>";
 echo $user -> screen_name;
 echo "</pre>";

//画像投稿処理
/*
$media_id = $connection->upload("media/upload", array("media" => 'test.png'));

$parameters = array(
    'status' => '画像投稿',
    'media_ids' => $media_id->media_id_string,
);
$result = $connection->post('statuses/update', $parameters);
var_dump($result)
*/

?>