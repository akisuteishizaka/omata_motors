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
<title>オマタモータース リンク</title>
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
<div id="pag_name">リンク<hr /></div>
<div id="contents">
<div id="link_list"><h2>リンク集</h2>
	<h3>メーカーリンク</h3>
		<table border="1" summary="link_cat1">
		<col class="col1" />
		<col class="col2" />
		<tr><td><a href="http://www.honda.co.jp/motor/">本田技研工業</a></td><td>本田技研工業ウェブページ</td></tr>
		<tr><td><a href="http://www.yamaha-motor.jp/mc/">ヤマハ発動機</a></td><td>ヤマハ発動機ウェブページ</td></tr>
		<tr><td><a href="http://www1.suzuki.co.jp/motor/index.html">スズキ自動車</a></td><td>スズキ自動車ウェブページ</td></tr>
		<tr><td><a href="http://www.kawasaki-motors.com/mc/">川崎重工</a></td><td>川崎重工ウェブページ</td></tr>
		</table>
<!--	<h3>関連コンテンツリンク</h3>
		<table border="1" summary="link_cat2">
		<col class="col1" />
		<col class="col2" />
		<tr><td><a href="http://omata.mydns.jp/~o.m.m/">O.M.M</a></td><td>工事中です。</td></tr>
		</table>
-->
	<h3>リンク</h3>
<?php link_read(); ?>
</div>
</div>
<div id="footer">
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
</script>
</div></body>
</html>