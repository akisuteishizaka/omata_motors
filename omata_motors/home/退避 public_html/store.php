<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="start index" href="./index.php" />
	<link rel="bookmark" href="url" />
	<link rel="help" href="./help.php" />
<?php require("./script/config.php"); ?>
	<script type="text/javascript" src="./script/script.js"></script>
<title>オマタモータース 店舗案内</title>
</head>
<body><div id="all">
<div id="logo_area">
	<a href="./index.php"><img src="./img/om_logo.jpg" width="250" height="85" alt="omata morotrs logo" class="flo_left"  /></a>
	<a href="./custom.php"><img src="./img/orf_logo.gif" width="182" height="85" alt="omata racing factory logo" class="flo_left"  /></a>
</div>

<div class="navi gloval">
	<ul><li class="gnavi01"><a href="./index.php">トップ</a></li>
		<li class="gnavi02"><a href="./store.php">店舗情報</a></li>
		<li class="gnavi03"><a href="./used.php">商品情報</a></li>
		<li class="gnavi04"><a href="./custom.php">カスタム</a></li>
		<li class="gnavi05"><a href="./link.php">リンク</a></li>
</ul></div>
<div id="pag_name">店舗情報<hr /></div>
<div id="contents">
	<div id="lovalnavi" class="flo_left">
		<div id="calendar">営業カレンダー
		<?php read_cal("$cal1"); read_cal("$cal2"); ?>
		<span class="fir">午前休業</span><br /><span class="lat">午後休業</span><br /><span class="off">終日業日</span><br />
		JavaScript : <img src="./img/js_off.gif" width="43" height="23" alt="javascript check" id="js_chk" />
		</div>
	</div>
<div id="main" class="flo_right">
	<h2>オマタモータース</h2>
		<div id="store_info">
			<table border="0" summary="address">
			<col class="col1" />
			<col class="col2" />
			<tr><th colspan="2" abbr="omata_add">店舗情報</th></tr>
			<tr><td>住所</td><td><span class="txt_small">〒403-0006</span><br />山梨県富士吉田市新屋348-1</td></tr>
			<tr><td>TEL</td><td>0555-22-4829</td></tr>
			<tr><td>FAX</td><td>0555-22-4829</td></tr>
			<tr><td>定休日</td><td>年始5日間<br /><span class="txt_small">※年始5日以外は不定休のため、左の営業カレンダーをご確認ください</span></td></tr>
			<tr><td>営業時間</td><td>10:30～20:00</td></tr>
			</table>
			<br />
			<table border="0" summary="qualification">
			<col class="col1" />
			<col class="col2" />
			<tr><th colspan="2" abbr="omata_qua">資格情報</th></tr>
			<tr><td>古物商</td><td><!-- xx年x月x日交付 -->山梨県公安委員会 第471131900023</td></tr>
			<tr><td>二輪整備士資格</td><td>二級整備士 一人、三級整備士、一人</td></tr>
			</table>
		</div>
	<h2>アクセスマップ</h2>
		<div id="map"><img src="./img/map.gif" alt="omata morotrs map" width="500" height="400" /></div>
		<div class="flo_left"><img src="./img/parking.jpg" alt="omata morotrs parking" width="299" height="273" /></div>
		<div>駐車場は、店舗から道路を挟んで反対側にあります。</div>
		<div class="flo_clear">店舗の隣に駐車場がありますが、近隣の住人が利用していますのでそちらの駐車場はご利用なさらないようにお願いします。</div>
		<h3>中央自動車道 河口湖I.Cからのアクセス方法</h3>
		<span class="highway">中央道 河口湖I.C</span> → <span class="route">国道 139号線</span> → <span class="route">国道 138号線</span><br />
			<ol>
				<li>中央自動車道 河口湖I.C下車後、国道139号線を山中湖方面へ進んでください。</li>
				<li>国道139号線を直進し、国道138号線へ進んでください。</li>
				<li>国道138号線もそのまま直進してください。</li>
				<li>1km程先、緩やかな右カーブの途中の右側に店舗があります。</li>
			</ol>
				<p id="caution"><span class="cau_indx cau_cau">※河口湖I.C方面からアクセスの場合、注意点があります。</span><br />
				高速出口からおよそ2km程進みますと、<dfn class="cau_cau">上宿交差点</dfn>があります。<br />
				上宿交差点を直進していただくことで国道138号線へ進むことが出来ますが、<span class="cau_cau">左側通行帯が左折専用</span>になっています。<br />
				直前にそのことに気づいた車両が車線変更を行うことが多々あります。予め右側通行帯を走行し、無理のない運転を心がけることをおすすめします。<br />
				</p>
		<h3>東富士五湖道路 山中湖I.Cからのアクセス方法</h3>
		<span class="highway">東富士五湖道路 山中湖I.C</span> → <span class="route">国道 138号線</span><br />
			<ol>
				<li>東富士五湖道路 山中湖I.C下車後、国道138号線を富士吉田方面へ進んでください。</li>
				<li>富士見バイパス南交差点先、緩やかな左カーブ途中の左側に店舗があります。</li>
			</ol>
	<h2>スタッフ紹介</h2>

	</div>
</div>
<div id="footer" class="flo_clear">
	<hr />
<div class="navi foot_navi">
	<ul>
	<li><a href="./index.php">ホーム</a></li>
	<li><a href="./store.php">店舗情報</a></li>
	<li><a href="./sitemap.php">サイトマップ</a></li>
	<li><a href="./contact.php">お問い合わせ</a></li>
	<li><a href="./help.php">当サイトのご利用にあたって</a></li>
	<li><a href="./policy.php">プライバシーポリシー</a></li>
	</ul>
</div>
<p>Copyright &copy; 2011 omata motors</p>
</div>
<script type="text/javascript">
	js_chk();
	google_map();
</script>
</div></body>
</html>