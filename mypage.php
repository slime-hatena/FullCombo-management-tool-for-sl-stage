<?php include("header.php");

echo "<p>いろいろと表示されなければログインに失敗している可能性が高いです。<br />どうしても解決しなければブラウザを完全に終了して再度ログインしてみてください</p>";

echo "<p>      string(19) Rate limit exceeded みたいな表記があればAPI制限です。<br>どうしようもないので２０分後ぐらいに再アクセスしてみてください。</p>";
$access_token = $_SESSION['access_token'];

 echo "<pre>";
 echo var_dump( $user );
 echo "</pre>";

?>