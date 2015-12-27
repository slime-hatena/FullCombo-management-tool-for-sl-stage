<?php include("header.php"); ?>


	<h2 style="font-size: 18px">デレステのフルコン状況を画像に纏めます。</h2>
	<p>
		入力内容はお使いの端末のCookieを使用して保存されます。<br />
		保存期間は360日ですがCookieの削除等をしてしまうと消えてしまうのでご注意ください。
	</p>

	<p>
		使用条件等はページ下部に記述してあるライセンスの通りです。<br /> 使用する前に目を通して同意いただける場合はお使いください。
	</p>



	<h3>以下のフォームを入力して送信してください。</h3>

	<form name="main" method="post" action="process.php">

		<p>
			P名<br /> &ensp;<input type="text" name="name" size="20"
				maxlength="10"><br /> Twitter<br /> &ensp;＠ <input type="text"
				name="twitter" size="15" maxlength="15"
				value="<?php
				if (isset ( $user->screen_name )) {
					echo $user->screen_name;
				}
				?>"> <br /> PRP<br /> &ensp;<input type="text" name="prp" size="4"
				maxlength="4"> <br /> PLv<br /> &ensp;<input type="text" name="plv"
				size="4" maxlength="4"> <br /> ゲームid<br /> &ensp;<input type="text"
				name="game_id" size="11" maxlength="9"> <br /> P Rank<br /> &ensp;<select
				name="p_rank">
				<option value="F">F : 見習いプロデューサー</option>
				<option value="E">E : 駆け出しプロデューサー</option>
				<option value="D">D : 新米プロデューサー</option>
				<option value="C">C : 普通プロデューサー</option>
				<option value="B">B : 中堅プロデューサー</option>
				<option value="A">A : 敏腕プロデューサー</option>
				<option value="S">S : 売れっ子プロデューサー</option>
				<option value="SS">SS : 超売れっ子プロデューサー</option>
			</select>

		</p>

		<p>
			<b>生成する難易度を選択してください</b><br /> &ensp; <select name="limit_1">
				<option disabled>--Master--</option>
				<option value="28" selected>28</option>
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
				<option value="28">28</option>
				<option value="27">27</option>
				<option value="26">26</option>
				<option value="25">25</option>
				<option value="24">24</option>
				<option value="23">23</option>
				<option value="22">22</option>
				<option value="21">21</option>
				<option value="20" selected>20</option>
				<option disabled>--Pro--</option>
				<option value="19">19</option>
				<option value="18">18</option>
				<option value="17">17</option>
				<option value="16">16</option>
				<option value="15">15</option>
				<option disabled>--,Regular--</option>
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
			</select> までを生成する。<br /> <span style="font-size: 80%;">
				上から４つ目以降の難易度は小さめに表示されます<br /> たくさん選ぶとはみ出るかもしれません(ごめんなさい)<br />
				選択していない難易度でも総合評価には含まれます。(別々にしろという要望が多ければ対応するかもしれません)
			</span>
		</p>

		<p>
			集計方法：<select name=limited_1>
				<option value="All">全楽曲で生成する</option>
				<option value="Limited">限定楽曲を除く</option>
				<option value="CD">先行解禁曲を除く</option>
			</select><br /> <span style="font-size: 80%;">
				"限定楽曲を除く"はススメオトメなどを含む限定タブにある曲全てを集計しません。<br />
				曜日違いで出てない曲の状況がわからない時に使ってください。<br />
				"先行解禁曲を除く"はCDのシリアルコードやイベント達成での先行解禁曲を集計しません。
			</span>

		</p>



		<table cellspacing="1" cellpadding="5" rules="cols">
			<tr>
				<th class="heading">-</th>
				<td class="heading">Debut</td>
				<td class="heading">Regular</td>
				<td class="heading">Pro</td>
				<td class="heading">Master</td>
			</tr>
			<tr>
				<th class="heading">難易度ごとに全てチェック</th>
				<td><input type="checkbox" id="Debut" class="checkAll"></td>
				<td><input type="checkbox" id="Regular" class="checkAll"></td>
				<td><input type="checkbox" id="Pro" class="checkAll"></td>
				<td><input type="checkbox" id="Master" class="checkAll"></td>
			</tr>

			<tr class="bg01">
				<th class="index"><div class="wrapper">お願い!シンデレラ</div></th>
				<td><input id="01_1" class="Debut" type="checkbox" name="arr[]"
					value="05_0"></td>
				<td><input id="01_2" class="Regular" type="checkbox" name="arr[]"
					value="10_0"></td>
				<td><input id="01_3" class="Pro" type="checkbox" name="arr[]"
					value="15_0"></td>
				<td><input id="01_4" class="Master" type="checkbox" name="arr[]"
					value="20_0"></td>
			</tr>
			<tr class="bg02">
				<th class="index"><div class="wrapper">とどけ！アイドル</div></th>
				<td><input id="02_1" class="Debut" type="checkbox" name="arr[]"
					value="05_1"></td>
				<td><input id="02_2" class="Regular" type="checkbox" name="arr[]"
					value="11_0"></td>
				<td><input id="02_3" class="Pro" type="checkbox" name="arr[]"
					value="15_1"></td>
				<td><input id="02_4" class="Master" type="checkbox" name="arr[]"
					value="21_0"></td>
			</tr>
			<tr class="bg03">
				<th class="index"><div class="wrapper">輝く世界の魔法</div></th>
				<td><input id="03_1" class="Debut" type="checkbox" name="arr[]"
					value="07_0"></td>
				<td><input id="03_2" class="Regular" type="checkbox" name="arr[]"
					value="13_0"></td>
				<td><input id="03_3" class="Pro" type="checkbox" name="arr[]"
					value="18_0"></td>
				<td><input id="03_1" class="Master" type="checkbox" name="arr[]"
					value="25_0"></td>
			</tr>
			<tr class="bg04">
				<th class="index"><div class="wrapper">We're the friends!</div></th>
				<td><input id="04_1" class="Debut" type="checkbox" name="arr[]"
					value="06_0"></td>
				<td><input id="04_2" class="Regular" type="checkbox" name="arr[]"
					value="12_0"></td>
				<td><input id="04_3" class="Pro" type="checkbox" name="arr[]"
					value="16_0"></td>
				<td><input id="04_4" class="Master" type="checkbox" name="arr[]"
					value="22_0"></td>
			</tr>
			<tr class="bg05">
				<th class="index"><div class="wrapper">メッセージ</div></th>
				<td><input id="05_1" class="Debut" type="checkbox" name="arr[]"
					value="07_1"></td>
				<td><input id="05_2" class="Regular" type="checkbox" name="arr[]"
					value="13_1"></td>
				<td><input id="05_3" class="Pro" type="checkbox" name="arr[]"
					value="16_1"></td>
				<td><input id="05_4" class="Master" type="checkbox" name="arr[]"
					value="25_1"></td>
			</tr>
			<tr class="bg06">
				<th class="index"><div class="wrapper">S(mile)ING!</div></th>
				<td><input id="06_1" class="Debut" type="checkbox" name="arr[]"
					value="06_1"></td>
				<td><input id="06_2" class="Regular" type="checkbox" name="arr[]"
					value="11_1"></td>
				<td><input id="06_3" class="Pro" type="checkbox" name="arr[]"
					value="15_2"></td>
				<td><input id="06_4" class="Master" type="checkbox" name="arr[]"
					value="21_1"></td>
			</tr>
			<tr class="bg07">
				<th class="index"><div class="wrapper">Never say never</div></th>
				<td><input id="07_1" class="Debut" type="checkbox" name="arr[]"
					value="06_2"></td>
				<td><input id="07_2" class="Regular" type="checkbox" name="arr[]"
					value="12_1"></td>
				<td><input id="07_3" class="Pro" type="checkbox" name="arr[]"
					value="17_0"></td>
				<td><input id="07_4" class="Master" type="checkbox" name="arr[]"
					value="25_2"></td>
			</tr>
			<tr class="bg08">
				<th class="index"><div class="wrapper">ミツボシ☆☆★</div></th>
				<td><input id="08_1" class="Debut" type="checkbox" name="arr[]"
					value="08_0"></td>
				<td><input id="08_2" class="Regular" type="checkbox" name="arr[]"
					value="12_2"></td>
				<td><input id="08_3" class="Pro" type="checkbox" name="arr[]"
					value="17_1"></td>
				<td><input id="08_4" class="Master" type="checkbox" name="arr[]"
					value="24_0"></td>
			</tr>
			<tr class="bg09">
				<th class="index"><div class="wrapper">おねだりShall We~?</div></th>
				<td><input id="09_1" class="Debut" type="checkbox" name="arr[]"
					value="08_1"></td>
				<td><input id="09_2" class="Regular" type="checkbox" name="arr[]"
					value="13_2"></td>
				<td><input id="09_3" class="Pro" type="checkbox" name="arr[]"
					value="18_1"></td>
				<td><input id="09_4" class="Master" type="checkbox" name="arr[]"
					value="25_3"></td>
			</tr>
			<tr class="bg10">
				<th class="index"><div class="wrapper">Twilight Sky</div></th>
				<td><input id="10_1" class="Debut" type="checkbox" name="arr[]"
					value="07_2"></td>
				<td><input id="10_2" class="Regular" type="checkbox" name="arr[]"
					value="13_3"></td>
				<td><input id="10_3" class="Pro" type="checkbox" name="arr[]"
					value="18_2"></td>
				<td><input id="10_4" class="Master" type="checkbox" name="arr[]"
					value="24_1"></td>
			</tr>
			<tr class="bg11">
				<th class="index"><div class="wrapper">DOKIDOKIリズム</div></th>
				<td><input id="11_1" class="Debut" type="checkbox" name="arr[]"
					value="08_2"></td>
				<td><input id="11_2" class="Regular" type="checkbox" name="arr[]"
					value="13_4"></td>
				<td><input id="11_3" class="Pro" type="checkbox" name="arr[]"
					value="17_2"></td>
				<td><input id="11_4" class="Master" type="checkbox" name="arr[]"
					value="24_2"></td>
			</tr>
			<tr class="bg12">
				<th class="index"><div class="wrapper">風色メロディ</div></th>
				<td><input id="12_1" class="Debut" type="checkbox" name="arr[]"
					value="06_3"></td>
				<td><input id="12_2" class="Regular" type="checkbox" name="arr[]"
					value="11_2"></td>
				<td><input id="12_3" class="Pro" type="checkbox" name="arr[]"
					value="16_2"></td>
				<td><input id="12_4" class="Master" type="checkbox" name="arr[]"
					value="23_0"></td>
			</tr>
			<tr class="bg13">
				<th class="index"><div class="wrapper">ましゅまろ☆キッス</div></th>
				<td><input id="13_1" class="Debut" type="checkbox" name="arr[]"
					value="08_3"></td>
				<td><input id="13_2" class="Regular" type="checkbox" name="arr[]"
					value="13_5"></td>
				<td><input id="13_3" class="Pro" type="checkbox" name="arr[]"
					value="18_3"></td>
				<td><input id="13_4" class="Master" type="checkbox" name="arr[]"
					value="24_3"></td>
			</tr>
			<tr class="bg14">
				<th class="index"><div class="wrapper">あんずのうた</div></th>
				<td><input id="14_1" class="Debut" type="checkbox" name="arr[]"
					value="09_0"></td>
				<td><input id="14_2" class="Regular" type="checkbox" name="arr[]"
					value="14_0"></td>
				<td><input id="14_3" class="Pro" type="checkbox" name="arr[]"
					value="19_0"></td>
				<td><input id="14_4" class="Master" type="checkbox" name="arr[]"
					value="28_0"></td>
			</tr>
			<tr class="bg15">
				<th class="index"><div class="wrapper">華蕾夢ミル狂詩曲～魂ノ導～</div></th>
				<td><input id="15_1" class="Debut" type="checkbox" name="arr[]"
					value="06_4"></td>
				<td><input id="15_2" class="Regular" type="checkbox" name="arr[]"
					value="13_6"></td>
				<td><input id="15_3" class="Pro" type="checkbox" name="arr[]"
					value="18_4"></td>
				<td><input id="15_4" class="Master" type="checkbox" name="arr[]"
					value="27_0"></td>
			</tr>
			<tr class="bg16">
				<th class="index"><div class="wrapper">ショコラ・ティアラ</div></th>
				<td><input id="16_1" class="Debut" type="checkbox" name="arr[]"
					value="06_5"></td>
				<td><input id="16_2" class="Regular" type="checkbox" name="arr[]"
					value="13_7"></td>
				<td><input id="16_3" class="Pro" type="checkbox" name="arr[]"
					value="18_5"></td>
				<td><input id="16_4" class="Master" type="checkbox" name="arr[]"
					value="26_0"></td>
			</tr>
			<tr class="bg28">
				<th class="index"><div class="wrapper">ヴィーナスシンドローム</div></th>
				<td><input id="28_1" class="Debut" type="checkbox" name="arr[]"
					value="08_8"></td>
				<td><input id="28_2" class="Regular" type="checkbox" name="arr[]"
					value="14_5"></td>
				<td><input id="28_3" class="Pro" type="checkbox" name="arr[]"
					value="19_4"></td>
				<td><input id="28_4" class="Master" type="checkbox" name="arr[]"
					value="26_4"></td>
			</tr>
			<tr class="bg30">
				<th class="index"><div class="wrapper">Romantic Now</div></th>
				<td><input id="30_1" class="Debut" type="checkbox" name="arr[]"
					value="08_10"></td>
				<td><input id="30_2" class="Regular" type="checkbox" name="arr[]"
					value="14_7"></td>
				<td><input id="30_3" class="Pro" type="checkbox" name="arr[]"
					value="19_5"></td>
				<td><input id="30_4" class="Master" type="checkbox" name="arr[]"
					value="27_3"></td>
			</tr>
			<tr class="bg32">
				<th class="index"><div class="wrapper">You're stars shine on me</div></th>
				<td><input id="32_1" class="Debut" type="checkbox" name="arr[]"
					value="06_8"></td>
				<td><input id="32_2" class="Regular" type="checkbox" name="arr[]"
					value="12_5"></td>
				<td><input id="32_3" class="Pro" type="checkbox" name="arr[]"
					value="16_5"></td>
				<td><input id="32_4" class="Master" type="checkbox" name="arr[]"
					value="23_2"></td>
			</tr>
			<tr class="bg34">
				<th class="index"><div class="wrapper">TOKIMEKIエスカレート</div></th>
				<td><input id="34_1" class="Debut" type="checkbox" name="arr[]"
					value="09_5"></td>
				<td><input id="34_2" class="Regular" type="checkbox" name="arr[]"
					value="14_9"></td>
				<td><input id="34_3" class="Pro" type="checkbox" name="arr[]"
					value="19_6"></td>
				<td><input id="34_4" class="Master" type="checkbox" name="arr[]"
					value="28_4"></td>
			</tr>
			<tr class="bg17">
				<th class="index"><div class="wrapper">Star!!</div></th>
				<td><input id="17_1" class="Debut" type="checkbox" name="arr[]"
					value="06_6"></td>
				<td><input id="17_2" class="Regular" type="checkbox" name="arr[]"
					value="12_3"></td>
				<td><input id="17_3" class="Pro" type="checkbox" name="arr[]"
					value="16_3"></td>
				<td><input id="17_4" class="Master" type="checkbox" name="arr[]"
					value="25_4"></td>
			</tr>
			<tr class="bg18">
				<th class="index"><div class="wrapper">夕映えプレゼント</div></th>
				<td><input id="18_1" class="Debut" type="checkbox" name="arr[]"
					value="08_4"></td>
				<td><input id="18_2" class="Regular" type="checkbox" name="arr[]"
					value="14_1"></td>
				<td><input id="18_3" class="Pro" type="checkbox" name="arr[]"
					value="18_6"></td>
				<td><input id="18_4" class="Master" type="checkbox" name="arr[]"
					value="26_1"></td>
			</tr>
			<tr class="bg19">
				<th class="index"><div class="wrapper">Memories</div></th>
				<td><input id="19_1" class="Debut" type="checkbox" name="arr[]"
					value="06_7"></td>
				<td><input id="19_2" class="Regular" type="checkbox" name="arr[]"
					value="11_3"></td>
				<td><input id="19_3" class="Pro" type="checkbox" name="arr[]"
					value="16_4"></td>
				<td><input id="19_4" class="Master" type="checkbox" name="arr[]"
					value="22_1"></td>
			</tr>
			<tr class="bg20">
				<th class="index"><div class="wrapper">LEGNE 仇なす剣 光の旋律</div></th>
				<td><input id="20_1" class="Debut" type="checkbox" name="arr[]"
					value="09_1"></td>
				<td><input id="20_2" class="Regular" type="checkbox" name="arr[]"
					value="14_2"></td>
				<td><input id="20_3" class="Pro" type="checkbox" name="arr[]"
					value="19_1"></td>
				<td><input id="20_4" class="Master" type="checkbox" name="arr[]"
					value="28_1"></td>
			</tr>
			<tr class="bg21">
				<th class="index"><div class="wrapper">Happy×2 Days</div></th>
				<td><input id="21_1" class="Debut" type="checkbox" name="arr[]"
					value="08_5"></td>
				<td><input id="21_2" class="Regular" type="checkbox" name="arr[]"
					value="13_8"></td>
				<td><input id="21_3" class="Pro" type="checkbox" name="arr[]"
					value="17_3"></td>
				<td><input id="21_4" class="Master" type="checkbox" name="arr[]"
					value="23_1"></td>
			</tr>
			<tr class="bg22">
				<th class="index"><div class="wrapper">LET'S GO HAPPY!!</div></th>
				<td><input id="22_1" class="Debut" type="checkbox" name="arr[]"
					value="07_3"></td>
				<td><input id="22_2" class="Regular" type="checkbox" name="arr[]"
					value="13_9"></td>
				<td><input id="22_3" class="Pro" type="checkbox" name="arr[]"
					value="18_7"></td>
				<td><input id="22_4" class="Master" type="checkbox" name="arr[]"
					value="27_1"></td>
			</tr>
			<tr class="bg23">
				<th class="index"><div class="wrapper">ΦωΦver！！</div></th>
				<td><input id="23_1" class="Debut" type="checkbox" name="arr[]"
					value="08_6"></td>
				<td><input id="23_2" class="Regular" type="checkbox" name="arr[]"
					value="12_4"></td>
				<td><input id="23_3" class="Pro" type="checkbox" name="arr[]"
					value="17_4"></td>
				<td><input id="23_4" class="Master" type="checkbox" name="arr[]"
					value="26_2"></td>
			</tr>
			<tr class="bg24">
				<th class="index"><div class="wrapper">できたて Evo！Revo！Generation！</div></th>
				<td><input id="24_1" class="Debut" type="checkbox" name="arr[]"
					value="07_4"></td>
				<td><input id="24_2" class="Regular" type="checkbox" name="arr[]"
					value="11_4"></td>
				<td><input id="24_3" class="Pro" type="checkbox" name="arr[]"
					value="19_2"></td>
				<td><input id="24_4" class="Master" type="checkbox" name="arr[]"
					value="26_3"></td>
			</tr>
			<tr class="bg25">
				<th class="index"><div class="wrapper">GOIN'!!</div></th>
				<td><input id="25_1" class="Debut" type="checkbox" name="arr[]"
					value="09_2"></td>
				<td><input id="25_2" class="Regular" type="checkbox" name="arr[]"
					value="13_10"></td>
				<td><input id="25_3" class="Pro" type="checkbox" name="arr[]"
					value="17_5"></td>
				<td><input id="25_4" class="Master" type="checkbox" name="arr[]"
					value="27_2"></td>
			</tr>
			<tr class="bg26">
				<th class="index"><div class="wrapper">Shine!!</div></th>
				<td><input id="26_1" class="Debut" type="checkbox" name="arr[]"
					value="08_7"></td>
				<td><input id="26_2" class="Regular" type="checkbox" name="arr[]"
					value="14_3"></td>
				<td><input id="26_3" class="Pro" type="checkbox" name="arr[]"
					value="18_8"></td>
				<td><input id="26_4" class="Master" type="checkbox" name="arr[]"
					value="25_5"></td>
			</tr>
			<tr class="bg29">
				<th class="index"><div class="wrapper">夢色ハーモニー</div></th>
				<td><input id="28_1" class="Debut" type="checkbox" name="arr[]"
					value="08_9"></td>
				<td><input id="28_2" class="Regular" type="checkbox" name="arr[]"
					value="14_6"></td>
				<td><input id="28_3" class="Pro" type="checkbox" name="arr[]"
					value="18_9"></td>
				<td><input id="28_4" class="Master" type="checkbox" name="arr[]"
					value="26_5"></td>
			</tr>
			<tr class="bg27">
				<th class="index"><div class="wrapper">Trancing Pulse</div></th>
				<td><input id="27_1" class="Debut" type="checkbox" name="arr[]"
					value="09_3"></td>
				<td><input id="27_2" class="Regular" type="checkbox" name="arr[]"
					value="14_4"></td>
				<td><input id="27_3" class="Pro" type="checkbox" name="arr[]"
					value="19_3"></td>
				<td><input id="27_4" class="Master" type="checkbox" name="arr[]"
					value="28_2"></td>
			</tr>
			<tr class="bg51">
				<th class="limited"><div class="wrapper">ススメ☆オトメ ~jewel parade~</div></th>
				<td><input id="51_1" class="Debut" type="checkbox" name="arr[]"
					value="08_12"></td>
				<td><input id="51_2" class="Regular" type="checkbox" name="arr[]"
					value="13_11"></td>
				<td><input id="51_3" class="Pro" type="checkbox" name="arr[]"
					value="18_11"></td>
				<td><input id="51_4" class="Master" type="checkbox" name="arr[]"
					value="25_6"></td>
			</tr>
			<tr class="bg52">
				<th class="limited"><div class="wrapper">
						ススメ☆オトメ ~jewel parade~ <br />Cute Side.
					</div></th>
				<td><input id="52_1" class="Debut" type="checkbox" name="arr[]"
					value="08_13"></td>
				<td><input id="52_2" class="Regular" type="checkbox" name="arr[]"
					value="13_12"></td>
				<td><input id="52_3" class="Pro" type="checkbox" name="arr[]"
					value="17_6"></td>
				<td><input id="52_4" class="Master" type="checkbox" name="arr[]"
					value="24_4"></td>
			</tr>
			<tr class="bg53">
				<th class="limited"><div class="wrapper">
						ススメ☆オトメ ~jewel parade~ <br />Cool Side.
					</div></th>
				<td><input id="53_1" class="Debut" type="checkbox" name="arr[]"
					value="08_14"></td>
				<td><input id="53_2" class="Regular" type="checkbox" name="arr[]"
					value="13_13"></td>
				<td><input id="53_3" class="Pro" type="checkbox" name="arr[]"
					value="17_7"></td>
				<td><input id="53_4" class="Master" type="checkbox" name="arr[]"
					value="24_5"></td>
			</tr>
			<tr class="bg54">
				<th class="limited"><div class="wrapper">
						ススメ☆オトメ ~jewel parade~ <br />Passion Side.
					</div></th>
				<td><input id="54_1" class="Debut" type="checkbox" name="arr[]"
					value="08_15"></td>
				<td><input id="54_2" class="Regular" type="checkbox" name="arr[]"
					value="13_14"></td>
				<td><input id="54_3" class="Pro" type="checkbox" name="arr[]"
					value="17_8"></td>
				<td><input id="54_4" class="Master" type="checkbox" name="arr[]"
					value="24_6"></td>
			</tr>
			<tr class="bg91">
				<th class="limited"><div class="wrapper">アタシポンコツアンドロイド</div></th>
				<td><input id="91_1" class="Debut" type="checkbox" name="arr[]"
					value="08_16"></td>
				<td><input id="91_2" class="Regular" type="checkbox" name="arr[]"
					value="12_6"></td>
				<td><input id="91_3" class="Pro" type="checkbox" name="arr[]"
					value="17_9"></td>
				<td><input id="91_4" class="Master" type="checkbox" name="arr[]"
					value="26_6"></td>
			</tr>
			<tr class="bg92">
				<th class="limited"><div class="wrapper">Nation Blue</div></th>
				<td><input id="92_1" class="Debut" type="checkbox" name="arr[]"
					value="09_4"></td>
				<td><input id="92_2" class="Regular" type="checkbox" name="arr[]"
					value="13_15"></td>
				<td><input id="92_3" class="Pro" type="checkbox" name="arr[]"
					value="17_10"></td>
				<td><input id="92_4" class="Master" type="checkbox" name="arr[]"
					value="26_7"></td>
			</tr>
			<tr class="bg31">
				<th class="limited"><div class="wrapper">M@GIC☆</div></th>
				<td><input id="31_1" class="Debut" type="checkbox" name="arr[]"
					value="08_11"></td>
				<td><input id="31_2" class="Regular" type="checkbox" name="arr[]"
					value="14_8"></td>
				<td><input id="31_3" class="Pro" type="checkbox" name="arr[]"
					value="18_10"></td>
				<td><input id="31_4" class="Master" type="checkbox" name="arr[]"
					value="28_3"></td>
			</tr>
			<tr class="bg33">
				<th class="limited"><div class="wrapper">流れ星キセキ</div></th>
				<td><input id="31_1" class="Debut" type="checkbox" name="arr[]"
					value="08_17"></td>
				<td><input id="31_2" class="Regular" type="checkbox" name="arr[]"
					value="14_10"></td>
				<td><input id="31_3" class="Pro" type="checkbox" name="arr[]"
					value="17_11"></td>
				<td><input id="31_4" class="Master" type="checkbox" name="arr[]"
					value="26_8"></td>
			</tr>

		</table>
		<br />

		<p>
			<b>生成後の処理を選択してください</b><br /> <label for="download"><input
				type="radio" name="process" id="download" value="download" checked>画像をダウンロードする</label><br>
	<?php
	// セッションに入れておいたさっきの配列
	if (isset ( $_SESSION ['access_token'] )) {
		$access_token = $_SESSION ['access_token'];
		// 取得できたらツイートを選択できるように
		echo "<label for=\"tweet\"><input type=\"radio\" name=\"process\" id=\"tweet\"
				value=\"tweet\"> ツイートする</label>";
	} else {
		echo "<label for=\"tweet\"><input type=\"radio\" name=\"process\" id=\"tweet\"
				value=\"tweet\" disabled> ツイートする</label><br />";
		echo "<span style=\"font-size: 80%;\">ツイートする場合はTwitterへのログインが必要です。</span>";
	}
	?>
		</p>

		<script async
			src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
		<!-- http://svr.aki-memo.net/FullCombo-management-tool-for-sl-stage/form.html -->
		<ins class="adsbygoogle" style="display: block"
			data-ad-client="ca-pub-5232158002747798" data-ad-slot="5731797260"
			data-ad-format="auto"></ins>
		<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
		</script>
		<br />

		<p>
			<input class="btn" type="submit" value="送信する"> <input class="btn"
				style="margin-left: 20px;" type="reset" value="リセット">
		</p>


	</form>


<hr />

	<p style="font-size: 13px;">
		権利者様からの申立て等は速やかに対応します。<br /> <br /> Ratingの計算式は " (
		フルコン曲のレベル合計÷全曲のレベル合計 ) ×15 "です。<br />不具合報告やご意見などは<a
			href="https://twitter.com/Slime_hatena">Twitter</a>または<a
			href="https://github.com/Slime-hatena/FullCombo-management-tool-for-sl-stage/issues">Github
			Issues</a>にお気軽にどうぞ。<br />TwitterのDMはフォローしていなくても送れると思います。
	</p>
	<p style="font-size: 13px;">サーバーの維持費を少しでも軽減するため広告を設置させていただきました。ご理解の程よろしくおねがいします。</p>
	<p style="font-size: 9px;">現在は入力されたデータの収集はしていませんが、今後○○のフルコンレートは○○%みたいな機能を実装したいなとは思ってます。予定ですが。
	</p>


<?php include("footer.html"); ?>

</body>
</html>