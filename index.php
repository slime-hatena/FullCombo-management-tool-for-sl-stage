<?php include("header.php"); ?>

<h2 style="font-size: 18px">デレステのフルコン状況を画像に纏めます。</h2>
<p>
	入力内容はお使いの端末のCookieを使用して保存されます。<br>
	保存期間は360日ですがCookieの削除等をしてしまうと消えてしまうのでご注意ください。
</p>
<p>
	サーバー側でどの曲をフルコンしているか(twitterログイン時のみ)、アクセスログを記録しています。<br>
	各データは記名での公開はいたしません。ご了承いただける場合のみご利用ください。<br> <br>
	メニューから免責事項・プライバシーポリシーを一読してからご利用ください。
</p>
<h3>以下のフォームを入力して送信してください。</h3>
<form action="process.php" id="main" method="post" name="main">
	<p>
		P名<br> &ensp;<input maxlength="10" name="name" size="20" type="text"><br>
		Twitter<br> &ensp;＠ <input maxlength="15" name="twitter" size="15"
			type="text"
			value="<?php if (isset ( $user->screen_name )) { echo $user->screen_name; } ?>">
		<br> PRP<br> &ensp;<input maxlength="4" name="prp" size="4"
			type="text"><br> PLv<br> &ensp;<input maxlength="4" name="plv"
			size="4" type="text"><br> ゲームid<br> &ensp;<input maxlength="9"
			name="game_id" size="11" type="text"><br> <span
			style="font-size: 85%"><b>PRPとPLv ゲームidは入力されていないと*に置き換わります。</b></span>
	</p>
	P Rank<br> &ensp;<select name="p_rank">
		<option value="F">F : 見習いプロデューサー</option>
		<option value="E">E : 駆け出しプロデューサー</option>
		<option value="D">D : 新米プロデューサー</option>
		<option value="C">C : 普通プロデューサー</option>
		<option value="B">B : 中堅プロデューサー</option>
		<option value="A">A : 敏腕プロデューサー</option>
		<option value="S">S : 売れっ子プロデューサー</option>
		<option value="SS">SS : 超売れっ子プロデューサー</option>
	</select>
	<p></p>
	<p>
		<b>生成する難易度を選択してください</b><br> &ensp; <select name="limit_1">
			<option disabled>--Master--</option>
			<option selected value="28">28</option>
			<option value="27">27</option>
			<option value="26">26</option>
			<option value="25">25</option>
			<option value="24">24</option>
			<option value="23">23</option>
			<option value="22">22</option>
			<option value="21">21</option>
			<option value="20">20</option>
			<option disabled>--Pro--</option>
			<option value="19">19</option>
			<option value="18">18</option>
			<option value="17">17</option>
			<option value="16">16</option>
			<option value="15">15</option>
			<option disabled>--Regular--</option>
			<option value="14">14</option>
			<option value="13">13</option>
			<option value="12">12</option>
			<option value="11">11</option>
			<option value="10">10</option>
			<option disabled>--Debut--</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option value="5">5</option>
		</select> から <select name="limit_2">
			<option disabled>--Master--</option>
			<option value="28">28</option>
			<option value="27">27</option>
			<option value="26">26</option>
			<option value="25">25</option>
			<option value="24">24</option>
			<option value="23">23</option>
			<option value="22">22</option>
			<option value="21">21</option>
			<option value="20">20</option>
			<option disabled>--Pro--</option>
			<option value="19">19</option>
			<option value="18">18</option>
			<option value="17">17</option>
			<option value="16">16</option>
			<option value="15">15</option>
			<option disabled>--Regular--</option>
			<option value="14">14</option>
			<option value="13">13</option>
			<option value="12">12</option>
			<option value="11">11</option>
			<option value="10">10</option>
			<option disabled>--Debut--</option>
			<option value="9">9</option>
			<option value="8">8</option>
			<option value="7">7</option>
			<option value="6">6</option>
			<option selected value="5">5</option>
		</select> までを生成する。<br> <span style="font-size: 80%;">上から４つ目以降の難易度は小さめに表示されます<br>
			たくさん選ぶとはみ出るかもしれません(ごめんなさい、その場合は教えて下さい。)<br>
			選択していない難易度でも総合評価には含まれます。(別々にしろという要望が多ければ対応するかもしれません)
		</span>
	</p>
	<p>
		集計方法：<select name="limited_1">
			<option value="All">全楽曲で生成する</option>
			<option value="Limited">限定楽曲を除く</option>
			<option value="Event">先行解禁曲を除く</option>
		</select><br> "限定楽曲を除く"はススメオトメなどを含む限定タブにある曲全てを集計しません。<br>
		曜日違いで出てない曲の状況がわからない時に使ってください。<br> <br>
		"先行解禁曲を除く"はCDのシリアルコードやイベント達成での先行解禁曲を集計しません。</span>
	</p>
	<table cellpadding="5" cellspacing="1" rules="cols">
		<tr>
			<th class="heading">-</th>
			<td class="heading">Debut</td>
			<td class="heading">Regular</td>
			<td class="heading">Pro</td>
			<td class="heading">Master</td>
		</tr>
		<tr>
			<th class="heading">難易度ごとに全てチェック</th>
			<td><input class="checkAll" id="Debut" type="checkbox"></td>
			<td><input class="checkAll" id="Regular" type="checkbox"></td>
			<td><input class="checkAll" id="Pro" type="checkbox"></td>
			<td><input class="checkAll" id="Master" type="checkbox"></td>
		</tr>
		<tr>
			<th class="index" id="bg01">
				<div class="wrapper">お願い!シンデレラ</div>
			</th>
			<td><input class="Debut" id="01_1" name="arr[]" type="checkbox"
				value="05_0"></td>
			<td><input class="Regular" id="01_2" name="arr[]" type="checkbox"
				value="10_0"></td>
			<td><input class="Pro" id="01_3" name="arr[]" type="checkbox"
				value="15_0"></td>
			<td><input class="Master" id="01_4" name="arr[]" type="checkbox"
				value="20_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg02">
				<div class="wrapper">とどけ！アイドル</div>
			</th>
			<td><input class="Debut" id="02_1" name="arr[]" type="checkbox"
				value="05_1"></td>
			<td><input class="Regular" id="02_2" name="arr[]" type="checkbox"
				value="11_0"></td>
			<td><input class="Pro" id="02_3" name="arr[]" type="checkbox"
				value="15_1"></td>
			<td><input class="Master" id="02_4" name="arr[]" type="checkbox"
				value="21_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg03">
				<div class="wrapper">輝く世界の魔法</div>
			</th>
			<td><input class="Debut" id="03_1" name="arr[]" type="checkbox"
				value="07_0"></td>
			<td><input class="Regular" id="03_2" name="arr[]" type="checkbox"
				value="13_0"></td>
			<td><input class="Pro" id="03_3" name="arr[]" type="checkbox"
				value="18_0"></td>
			<td><input class="Master" id="03_1" name="arr[]" type="checkbox"
				value="25_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg04">
				<div class="wrapper">We're the friends!</div>
			</th>
			<td><input class="Debut" id="04_1" name="arr[]" type="checkbox"
				value="06_0"></td>
			<td><input class="Regular" id="04_2" name="arr[]" type="checkbox"
				value="12_0"></td>
			<td><input class="Pro" id="04_3" name="arr[]" type="checkbox"
				value="16_0"></td>
			<td><input class="Master" id="04_4" name="arr[]" type="checkbox"
				value="22_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg05">
				<div class="wrapper">メッセージ</div>
			</th>
			<td><input class="Debut" id="05_1" name="arr[]" type="checkbox"
				value="07_1"></td>
			<td><input class="Regular" id="05_2" name="arr[]" type="checkbox"
				value="13_1"></td>
			<td><input class="Pro" id="05_3" name="arr[]" type="checkbox"
				value="16_1"></td>
			<td><input class="Master" id="05_4" name="arr[]" type="checkbox"
				value="25_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg39">
				<div class="wrapper">Snow Wings</div>
			</th>
			<td><input class="Debut" id="39_1" name="arr[]" type="checkbox"
				value="08_20"></td>
			<td><input class="Regular" id="39_2" name="arr[]" type="checkbox"
				value="14_13"></td>
			<td><input class="Pro" id="39_3" name="arr[]" type="checkbox"
				value="17_16"></td>
			<td><input class="Master" id="39_4" name="arr[]" type="checkbox"
				value="26_12"></td>
		</tr>
		<tr>
			<th class="index" id="bg06">
				<div class="wrapper">S(mile)ING!</div>
			</th>
			<td><input class="Debut" id="06_1" name="arr[]" type="checkbox"
				value="06_1"></td>
			<td><input class="Regular" id="06_2" name="arr[]" type="checkbox"
				value="11_1"></td>
			<td><input class="Pro" id="06_3" name="arr[]" type="checkbox"
				value="15_2"></td>
			<td><input class="Master" id="06_4" name="arr[]" type="checkbox"
				value="21_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg07">
				<div class="wrapper">Never say never</div>
			</th>
			<td><input class="Debut" id="07_1" name="arr[]" type="checkbox"
				value="06_2"></td>
			<td><input class="Regular" id="07_2" name="arr[]" type="checkbox"
				value="12_1"></td>
			<td><input class="Pro" id="07_3" name="arr[]" type="checkbox"
				value="17_0"></td>
			<td><input class="Master" id="07_4" name="arr[]" type="checkbox"
				value="25_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg08">
				<div class="wrapper">ミツボシ☆☆★</div>
			</th>
			<td><input class="Debut" id="08_1" name="arr[]" type="checkbox"
				value="08_0"></td>
			<td><input class="Regular" id="08_2" name="arr[]" type="checkbox"
				value="12_2"></td>
			<td><input class="Pro" id="08_3" name="arr[]" type="checkbox"
				value="17_1"></td>
			<td><input class="Master" id="08_4" name="arr[]" type="checkbox"
				value="24_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg09">
				<div class="wrapper">おねだりShall We~?</div>
			</th>
			<td><input class="Debut" id="09_1" name="arr[]" type="checkbox"
				value="08_1"></td>
			<td><input class="Regular" id="09_2" name="arr[]" type="checkbox"
				value="13_2"></td>
			<td><input class="Pro" id="09_3" name="arr[]" type="checkbox"
				value="18_1"></td>
			<td><input class="Master" id="09_4" name="arr[]" type="checkbox"
				value="25_3"></td>
		</tr>
		<tr>
			<th class="index" id="bg10">
				<div class="wrapper">Twilight Sky</div>
			</th>
			<td><input class="Debut" id="10_1" name="arr[]" type="checkbox"
				value="07_2"></td>
			<td><input class="Regular" id="10_2" name="arr[]" type="checkbox"
				value="13_3"></td>
			<td><input class="Pro" id="10_3" name="arr[]" type="checkbox"
				value="18_2"></td>
			<td><input class="Master" id="10_4" name="arr[]" type="checkbox"
				value="24_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg11">
				<div class="wrapper">DOKIDOKIリズム</div>
			</th>
			<td><input class="Debut" id="11_1" name="arr[]" type="checkbox"
				value="08_2"></td>
			<td><input class="Regular" id="11_2" name="arr[]" type="checkbox"
				value="13_4"></td>
			<td><input class="Pro" id="11_3" name="arr[]" type="checkbox"
				value="17_2"></td>
			<td><input class="Master" id="11_4" name="arr[]" type="checkbox"
				value="24_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg12">
				<div class="wrapper">風色メロディ</div>
			</th>
			<td><input class="Debut" id="12_1" name="arr[]" type="checkbox"
				value="06_3"></td>
			<td><input class="Regular" id="12_2" name="arr[]" type="checkbox"
				value="11_2"></td>
			<td><input class="Pro" id="12_3" name="arr[]" type="checkbox"
				value="16_2"></td>
			<td><input class="Master" id="12_4" name="arr[]" type="checkbox"
				value="23_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg13">
				<div class="wrapper">ましゅまろ☆キッス</div>
			</th>
			<td><input class="Debut" id="13_1" name="arr[]" type="checkbox"
				value="08_3"></td>
			<td><input class="Regular" id="13_2" name="arr[]" type="checkbox"
				value="13_5"></td>
			<td><input class="Pro" id="13_3" name="arr[]" type="checkbox"
				value="18_3"></td>
			<td><input class="Master" id="13_4" name="arr[]" type="checkbox"
				value="24_3"></td>
		</tr>
		<tr>
			<th class="index" id="bg14">
				<div class="wrapper">あんずのうた</div>
			</th>
			<td><input class="Debut" id="14_1" name="arr[]" type="checkbox"
				value="09_0"></td>
			<td><input class="Regular" id="14_2" name="arr[]" type="checkbox"
				value="14_0"></td>
			<td><input class="Pro" id="14_3" name="arr[]" type="checkbox"
				value="19_0"></td>
			<td><input class="Master" id="14_4" name="arr[]" type="checkbox"
				value="28_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg15">
				<div class="wrapper">華蕾夢ミル狂詩曲～魂ノ導～</div>
			</th>
			<td><input class="Debut" id="15_1" name="arr[]" type="checkbox"
				value="06_4"></td>
			<td><input class="Regular" id="15_2" name="arr[]" type="checkbox"
				value="13_6"></td>
			<td><input class="Pro" id="15_3" name="arr[]" type="checkbox"
				value="18_4"></td>
			<td><input class="Master" id="15_4" name="arr[]" type="checkbox"
				value="27_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg16">
				<div class="wrapper">ショコラ・ティアラ</div>
			</th>
			<td><input class="Debut" id="16_1" name="arr[]" type="checkbox"
				value="06_5"></td>
			<td><input class="Regular" id="16_2" name="arr[]" type="checkbox"
				value="13_7"></td>
			<td><input class="Pro" id="16_3" name="arr[]" type="checkbox"
				value="18_5"></td>
			<td><input class="Master" id="16_4" name="arr[]" type="checkbox"
				value="26_0"></td>
		</tr>
		<tr>
			<th class="index" id="bg28">
				<div class="wrapper">ヴィーナスシンドローム</div>
			</th>
			<td><input class="Debut" id="28_1" name="arr[]" type="checkbox"
				value="08_8"></td>
			<td><input class="Regular" id="28_2" name="arr[]" type="checkbox"
				value="14_5"></td>
			<td><input class="Pro" id="28_3" name="arr[]" type="checkbox"
				value="19_4"></td>
			<td><input class="Master" id="28_4" name="arr[]" type="checkbox"
				value="26_4"></td>
		</tr>
		<tr>
			<th class="index" id="bg30">
				<div class="wrapper">Romantic Now</div>
			</th>
			<td><input class="Debut" id="30_1" name="arr[]" type="checkbox"
				value="08_10"></td>
			<td><input class="Regular" id="30_2" name="arr[]" type="checkbox"
				value="14_7"></td>
			<td><input class="Pro" id="30_3" name="arr[]" type="checkbox"
				value="19_5"></td>
			<td><input class="Master" id="30_4" name="arr[]" type="checkbox"
				value="27_3"></td>
		</tr>
		<tr>
			<th class="index" id="bg32">
				<div class="wrapper">You're stars shine on me</div>
			</th>
			<td><input class="Debut" id="32_1" name="arr[]" type="checkbox"
				value="06_8"></td>
			<td><input class="Regular" id="32_2" name="arr[]" type="checkbox"
				value="12_5"></td>
			<td><input class="Pro" id="32_3" name="arr[]" type="checkbox"
				value="16_5"></td>
			<td><input class="Master" id="32_4" name="arr[]" type="checkbox"
				value="23_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg34">
				<div class="wrapper">TOKIMEKIエスカレート</div>
			</th>
			<td><input class="Debut" id="34_1" name="arr[]" type="checkbox"
				value="09_5"></td>
			<td><input class="Regular" id="34_2" name="arr[]" type="checkbox"
				value="14_9"></td>
			<td><input class="Pro" id="34_3" name="arr[]" type="checkbox"
				value="19_6"></td>
			<td><input class="Master" id="34_4" name="arr[]" type="checkbox"
				value="28_4"></td>
		</tr>
		<tr>
			<th class="index" id="bg35">
				<div class="wrapper">Naked Romance</div>
			</th>
			<td><input class="Debut" id="35_1" name="arr[]" type="checkbox"
				value="07_5"></td>
			<td><input class="Regular" id="35_2" name="arr[]" type="checkbox"
				value="13_16"></td>
			<td><input class="Pro" id="35_3" name="arr[]" type="checkbox"
				value="17_12"></td>
			<td><input class="Master" id="35_4" name="arr[]" type="checkbox"
				value="26_9"></td>
		</tr>
		<tr>
			<th class="index" id="bg36">
				<div class="wrapper">Angel Breeze</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="09_6"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="14_11"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="17_14"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="24_7"></td>
		</tr>
		<tr>
			<th class="index" id="bg38">
				<div class="wrapper">アップルパイ・プリンセス</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="09_9"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="11_5"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="17_15"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="23_3"></td>
		</tr>
		<tr>
			<th class="index" id="bg41">
				<div class="wrapper">エヴリデイドリーム</div>
			</th>
			<td><input class="Debut" id="41_1" name="arr[]" type="checkbox"
				value="08_22"></td>
			<td><input class="Regular" id="41_2" name="arr[]" type="checkbox"
				value="13_18"></td>
			<td><input class="Pro" id="41_3" name="arr[]" type="checkbox"
				value="17_17"></td>
			<td><input class="Master" id="41_4" name="arr[]" type="checkbox"
				value="25_7"></td>
		</tr>
		<tr>
			<th class="index" id="bg42">
				<div class="wrapper">Bright Blue</div>
			</th>
			<td><input class="Debut" id="42_1" name="arr[]" type="checkbox"
				value="06_9"></td>
			<td><input class="Regular" id="42_2" name="arr[]" type="checkbox"
				value="11_6"></td>
			<td><input class="Pro" id="42_3" name="arr[]" type="checkbox"
				value="16_6"></td>
			<td><input class="Master" id="42_4" name="arr[]" type="checkbox"
				value="23_4"></td>
		</tr>
						<tr>
			<th class="limited" id="bg43">
				<div class="wrapper">Rockin' Emotion</div>
			</th>
			<td><input class="Debut" id="43_1" name="arr[]" type="checkbox"
				value="09_10"></td>
			<td><input class="Regular" id="43_2" name="arr[]" type="checkbox"
				value="13_22"></td>
			<td><input class="Pro" id="43_3" name="arr[]" type="checkbox"
				value="18_15"></td>
			<td><input class="Master" id="43_4" name="arr[]" type="checkbox"
				value="26_15"></td>
		</tr>
		<tr>
			<th class="index" id="bg17">
				<div class="wrapper">Star!!</div>
			</th>
			<td><input class="Debut" id="17_1" name="arr[]" type="checkbox"
				value="06_6"></td>
			<td><input class="Regular" id="17_2" name="arr[]" type="checkbox"
				value="12_3"></td>
			<td><input class="Pro" id="17_3" name="arr[]" type="checkbox"
				value="16_3"></td>
			<td><input class="Master" id="17_4" name="arr[]" type="checkbox"
				value="25_4"></td>
		</tr>
		<tr>
			<th class="index" id="bg18">
				<div class="wrapper">夕映えプレゼント</div>
			</th>
			<td><input class="Debut" id="18_1" name="arr[]" type="checkbox"
				value="08_4"></td>
			<td><input class="Regular" id="18_2" name="arr[]" type="checkbox"
				value="14_1"></td>
			<td><input class="Pro" id="18_3" name="arr[]" type="checkbox"
				value="18_6"></td>
			<td><input class="Master" id="18_4" name="arr[]" type="checkbox"
				value="26_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg19">
				<div class="wrapper">Memories</div>
			</th>
			<td><input class="Debut" id="19_1" name="arr[]" type="checkbox"
				value="06_7"></td>
			<td><input class="Regular" id="19_2" name="arr[]" type="checkbox"
				value="11_3"></td>
			<td><input class="Pro" id="19_3" name="arr[]" type="checkbox"
				value="16_4"></td>
			<td><input class="Master" id="19_4" name="arr[]" type="checkbox"
				value="22_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg20">
				<div class="wrapper">LEGNE 仇なす剣 光の旋律</div>
			</th>
			<td><input class="Debut" id="20_1" name="arr[]" type="checkbox"
				value="09_1"></td>
			<td><input class="Regular" id="20_2" name="arr[]" type="checkbox"
				value="14_2"></td>
			<td><input class="Pro" id="20_3" name="arr[]" type="checkbox"
				value="19_1"></td>
			<td><input class="Master" id="20_4" name="arr[]" type="checkbox"
				value="28_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg21">
				<div class="wrapper">Happy×2 Days</div>
			</th>
			<td><input class="Debut" id="21_1" name="arr[]" type="checkbox"
				value="08_5"></td>
			<td><input class="Regular" id="21_2" name="arr[]" type="checkbox"
				value="13_8"></td>
			<td><input class="Pro" id="21_3" name="arr[]" type="checkbox"
				value="17_3"></td>
			<td><input class="Master" id="21_4" name="arr[]" type="checkbox"
				value="23_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg22">
				<div class="wrapper">LET'S GO HAPPY!!</div>
			</th>
			<td><input class="Debut" id="22_1" name="arr[]" type="checkbox"
				value="07_3"></td>
			<td><input class="Regular" id="22_2" name="arr[]" type="checkbox"
				value="13_9"></td>
			<td><input class="Pro" id="22_3" name="arr[]" type="checkbox"
				value="18_7"></td>
			<td><input class="Master" id="22_4" name="arr[]" type="checkbox"
				value="27_1"></td>
		</tr>
		<tr>
			<th class="index" id="bg23">
				<div class="wrapper">ΦωΦver！！</div>
			</th>
			<td><input class="Debut" id="23_1" name="arr[]" type="checkbox"
				value="08_6"></td>
			<td><input class="Regular" id="23_2" name="arr[]" type="checkbox"
				value="12_4"></td>
			<td><input class="Pro" id="23_3" name="arr[]" type="checkbox"
				value="17_4"></td>
			<td><input class="Master" id="23_4" name="arr[]" type="checkbox"
				value="26_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg24">
				<div class="wrapper">できたて Evo！Revo！Generation！</div>
			</th>
			<td><input class="Debut" id="24_1" name="arr[]" type="checkbox"
				value="07_4"></td>
			<td><input class="Regular" id="24_2" name="arr[]" type="checkbox"
				value="11_4"></td>
			<td><input class="Pro" id="24_3" name="arr[]" type="checkbox"
				value="19_2"></td>
			<td><input class="Master" id="24_4" name="arr[]" type="checkbox"
				value="26_3"></td>
		</tr>
		<tr>
			<th class="index" id="bg25">
				<div class="wrapper">GOIN'!!</div>
			</th>
			<td><input class="Debut" id="25_1" name="arr[]" type="checkbox"
				value="09_2"></td>
			<td><input class="Regular" id="25_2" name="arr[]" type="checkbox"
				value="13_10"></td>
			<td><input class="Pro" id="25_3" name="arr[]" type="checkbox"
				value="17_5"></td>
			<td><input class="Master" id="25_4" name="arr[]" type="checkbox"
				value="27_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg26">
				<div class="wrapper">Shine!!</div>
			</th>
			<td><input class="Debut" id="26_1" name="arr[]" type="checkbox"
				value="08_7"></td>
			<td><input class="Regular" id="26_2" name="arr[]" type="checkbox"
				value="14_3"></td>
			<td><input class="Pro" id="26_3" name="arr[]" type="checkbox"
				value="18_8"></td>
			<td><input class="Master" id="26_4" name="arr[]" type="checkbox"
				value="25_5"></td>
		</tr>
		<tr>
			<th class="index" id="bg29">
				<div class="wrapper">夢色ハーモニー</div>
			</th>
			<td><input class="Debut" id="28_1" name="arr[]" type="checkbox"
				value="08_9"></td>
			<td><input class="Regular" id="28_2" name="arr[]" type="checkbox"
				value="14_6"></td>
			<td><input class="Pro" id="28_3" name="arr[]" type="checkbox"
				value="18_9"></td>
			<td><input class="Master" id="28_4" name="arr[]" type="checkbox"
				value="26_5"></td>
		</tr>
		<tr>
			<th class="index" id="bg27">
				<div class="wrapper">Trancing Pulse</div>
			</th>
			<td><input class="Debut" id="27_1" name="arr[]" type="checkbox"
				value="09_3"></td>
			<td><input class="Regular" id="27_2" name="arr[]" type="checkbox"
				value="14_4"></td>
			<td><input class="Pro" id="27_3" name="arr[]" type="checkbox"
				value="19_3"></td>
			<td><input class="Master" id="27_4" name="arr[]" type="checkbox"
				value="28_2"></td>
		</tr>
		<tr>
			<th class="index" id="bg33">
				<div class="wrapper">流れ星キセキ</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="08_17"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="14_10"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="17_11"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="26_8"></td>
		</tr>
		<tr>
			<th class="index" id="bg31">
				<div class="wrapper">M@GIC☆</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="08_11"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="14_8"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="18_10"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="28_3"></td>
		</tr>
		<tr>
			<th class="limited" id="bg51">
				<div class="wrapper">ススメ☆オトメ ~jewel parade~</div>
			</th>
			<td><input class="Debut" id="51_1" name="arr[]" type="checkbox"
				value="08_12"></td>
			<td><input class="Regular" id="51_2" name="arr[]" type="checkbox"
				value="13_11"></td>
			<td><input class="Pro" id="51_3" name="arr[]" type="checkbox"
				value="18_11"></td>
			<td><input class="Master" id="51_4" name="arr[]" type="checkbox"
				value="25_6"></td>
		</tr>
		<tr>
			<th class="limited" id="bg52">
				<div class="wrapper">
					ススメ☆オトメ ~jewel parade~<br> Cute Side.
				</div>
			</th>
			<td><input class="Debut" id="52_1" name="arr[]" type="checkbox"
				value="08_13"></td>
			<td><input class="Regular" id="52_2" name="arr[]" type="checkbox"
				value="13_12"></td>
			<td><input class="Pro" id="52_3" name="arr[]" type="checkbox"
				value="17_6"></td>
			<td><input class="Master" id="52_4" name="arr[]" type="checkbox"
				value="24_4"></td>
		</tr>
		<tr>
			<th class="limited" id="bg53">
				<div class="wrapper">
					ススメ☆オトメ ~jewel parade~<br> Cool Side.
				</div>
			</th>
			<td><input class="Debut" id="53_1" name="arr[]" type="checkbox"
				value="08_14"></td>
			<td><input class="Regular" id="53_2" name="arr[]" type="checkbox"
				value="13_13"></td>
			<td><input class="Pro" id="53_3" name="arr[]" type="checkbox"
				value="17_7"></td>
			<td><input class="Master" id="53_4" name="arr[]" type="checkbox"
				value="24_5"></td>
		</tr>
		<tr>
			<th class="limited" id="bg54">
				<div class="wrapper">
					ススメ☆オトメ ~jewel parade~<br> Passion Side.
				</div>
			</th>
			<td><input class="Debut" id="54_1" name="arr[]" type="checkbox"
				value="08_15"></td>
			<td><input class="Regular" id="54_2" name="arr[]" type="checkbox"
				value="13_14"></td>
			<td><input class="Pro" id="54_3" name="arr[]" type="checkbox"
				value="17_8"></td>
			<td><input class="Master" id="54_4" name="arr[]" type="checkbox"
				value="24_6"></td>
		</tr>
		<tr>
			<th class="limited" id="bg91">
				<div class="wrapper">アタシポンコツアンドロイド</div>
			</th>
			<td><input class="Debut" id="91_1" name="arr[]" type="checkbox"
				value="08_16"></td>
			<td><input class="Regular" id="91_2" name="arr[]" type="checkbox"
				value="12_6"></td>
			<td><input class="Pro" id="91_3" name="arr[]" type="checkbox"
				value="17_9"></td>
			<td><input class="Master" id="91_4" name="arr[]" type="checkbox"
				value="26_6"></td>
		</tr>
		<tr>
			<th class="limited" id="bg92">
				<div class="wrapper">Nation Blue</div>
			</th>
			<td><input class="Debut" id="92_1" name="arr[]" type="checkbox"
				value="09_4"></td>
			<td><input class="Regular" id="92_2" name="arr[]" type="checkbox"
				value="13_15"></td>
			<td><input class="Pro" id="92_3" name="arr[]" type="checkbox"
				value="17_10"></td>
			<td><input class="Master" id="92_4" name="arr[]" type="checkbox"
				value="26_7"></td>
		</tr>
		<tr>
			<th class="limited" id="bg93">
				<div class="wrapper">Orange Sapphire</div>
			</th>
			<td><input class="Debut" id="93_1" name="arr[]" type="checkbox"
				value=08_18></td>
			<td><input class="Regular" id="93_2" name="arr[]" type="checkbox"
				value="13_17"></td>
			<td><input class="Pro" id="93_3" name="arr[]" type="checkbox"
				value="17_13"></td>
			<td><input class="Master" id="93_4" name="arr[]" type="checkbox"
				value="26_10"></td>
		</tr>
		<tr>
			<th class="limited" id="bg37">
				<div class="wrapper">ゴキゲンParty Night!</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="08_19"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="14_12"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="18_12"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="26_11"></td>
		</tr>
		<tr>
			<th class="limited" id="bg55">
				<div class="wrapper">
					ゴキゲンParty Night!<br> Cute Side.
				</div>
			</th>
			<td><input class="Debut" id="55_1" name="arr[]" type="checkbox"
				value="08_23"></td>
			<td><input class="Regular" id="55_2" name="arr[]" type="checkbox"
				value="13_19"></td>
			<td><input class="Pro" id="55_3" name="arr[]" type="checkbox"
				value="17_18"></td>
			<td><input class="Master" id="55_4" name="arr[]" type="checkbox"
				value="25_8"></td>
		</tr>
		<tr>
			<th class="limited" id="bg56">
				<div class="wrapper">
					ゴキゲンParty Night!<br> Cool Side.
				</div>
			</th>
			<td><input class="Debut" id="55_1" name="arr[]" type="checkbox"
				value="08_24"></td>
			<td><input class="Regular" id="55_2" name="arr[]" type="checkbox"
				value="13_20"></td>
			<td><input class="Pro" id="55_3" name="arr[]" type="checkbox"
				value="17_19"></td>
			<td><input class="Master" id="55_4" name="arr[]" type="checkbox"
				value="25_9"></td>
		</tr>
		<tr>
			<th class="limited" id="bg57">
				<div class="wrapper">
					ゴキゲンParty Night!<br> Passion Side.
				</div>
			</th>
			<td><input class="Debut" id="55_1" name="arr[]" type="checkbox"
				value="08_25"></td>
			<td><input class="Regular" id="55_2" name="arr[]" type="checkbox"
				value="13_21"></td>
			<td><input class="Pro" id="55_3" name="arr[]" type="checkbox"
				value="17_20"></td>
			<td><input class="Master" id="55_4" name="arr[]" type="checkbox"
				value="25_10"></td>
		</tr>
		<tr>
			<th class="limited" id="bg94">
				<div class="wrapper">パステルピンクの恋</div>
			</th>
			<td><input class="Debut" id="94_1" name="arr[]" type="checkbox"
				value="08_26"></td>
			<td><input class="Regular" id="94_2" name="arr[]" type="checkbox"
				value="14_15"></td>
			<td><input class="Pro" id="94_3" name="arr[]" type="checkbox"
				value="18_14"></td>
			<td><input class="Master" id="94_4" name="arr[]" type="checkbox"
				value="26_14"></td>
		</tr>
		<tr>
			<th class="limited" id="bg40">
				<div class="wrapper">Tulip</div>
			</th>
			<td><input class="Debut" id="31_1" name="arr[]" type="checkbox"
				value="08_21"></td>
			<td><input class="Regular" id="31_2" name="arr[]" type="checkbox"
				value="14_14"></td>
			<td><input class="Pro" id="31_3" name="arr[]" type="checkbox"
				value="18_13"></td>
			<td><input class="Master" id="31_4" name="arr[]" type="checkbox"
				value="26_13"></td>
		</tr>
				<tr>
			<th class="limited" id="bg44">
				<div class="wrapper">Absolute Nine</div>
			</th>
			<td><input class="Debut" id="44_1" name="arr[]" type="checkbox"
				value="09_11"></td>
			<td><input class="Regular" id="44_2" name="arr[]" type="checkbox"
				value="13_23"></td>
			<td><input class="Pro" id="44_3" name="arr[]" type="checkbox"
				value="18_16"></td>
			<td><input class="Master" id="44_4" name="arr[]" type="checkbox"
				value="26_16"></td>
		</tr>
	</table>
	<br>
	<p>
		<b>生成後の処理を選択してください</b><br> <label for="download"><input checked
			id="download" name="process" type="radio" value="download">画像をダウンロードする</label><br>
        <?php
								// セッションに入れておいたさっきの配列
								if (isset ( $_SESSION ['access_token'] )) {
									$access_token = $_SESSION ['access_token'];
									// 取得できたらツイートを選択できるように
									echo "<label for=\"tweet\"><input type=\"radio\" name=\"process\" id=\"tweet\"
                        value=\"tweet\" > ツイートする</label>";
								} else {

									echo "<span style=\"font-size: 80%;\">ツイートする場合はTwitterへのログインが必要です。</span>";
								}
								?></p>
	<script async
		src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js">
        </script>
	<!-- http://svr.aki-memo.net/FullCombo-management-tool-for-sl-stage/form.html -->
	<ins class="adsbygoogle" data-ad-client="ca-pub-5232158002747798"
		data-ad-format="auto" data-ad-slot="5731797260" style="display: block"></ins>
	<script>
            (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
	<br>
	<p>ページ上部のメニューにある免責事項、プライバシーポリシーをよくお読みになって同意いただける場合のみご使用ください。</p>
	<p style="font-size: 0.5rem;">
		<input class="btn" type="submit" value="送信する"> <input class="btn"
			style="margin-left: 20px;" type="reset" value="リセット">
	</p>
</form>
<hr>
<p style="font-size: 13px;">
	不具合報告やご意見などは<a href="https://twitter.com/Slime_hatena">Twitter</a>または<a
		href="https://github.com/Slime-hatena/FullCombo-management-tool-for-sl-stage/issues">Github
		Issues</a>にお気軽にどうぞ。<br> TwitterのDMはフォローしていなくても送れると思います。
</p>
<p style="font-size: 13px;">
	サーバーの維持費を少しでも軽減するため広告を設置させていただきました。ご理解の程よろしくおねがいします。</p>
<p style="font-size: 9px;">
	現在は入力されたデータの収集はしていませんが、今後○○のフルコンレートは○○%みたいな機能を実装したいなとは思ってます。予定ですが。</p><?php include("footer.html"); ?>
</body>
</html>