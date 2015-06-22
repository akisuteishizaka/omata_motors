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
<title>オマタモータース 中古車情報</title>
</head>
<body><div id="all">
<div id="logo_area">
	<a href="./index.php"><img src="./img/om_logo.jpg" width="250" height="85" alt="omata morotrs logo" class="flo_left" /></a>
	<a href="./custom.php"><img src="./img/orf_logo.gif" width="182" height="85" alt="omata racing factory logo" class="flo_left" /></a>
</div>

<div class="navi gloval">
	<ul><li class="gnavi01"><a href="./index.php">トップ</a></li>
		<li class="gnavi02"><a href="./store.php">店舗情報</a></li>
		<li class="gnavi03"><a href="./used.php">商品情報</a></li>
		<li class="gnavi04"><a href="./custom.php">カスタム</a></li>
		<li class="gnavi05"><a href="./link.php">リンク</a></li>
</ul></div>
<div id="pag_name">中古車情報<hr /></div>
<div id="contents">
<div id="search">
	<h1>中古車情報</h1>
<!--	<h2>オススメ!!</h2> -->
		<p>記載情報だけでなく、各メーカー新車、中古車お取り寄せできます。お問い合わせください</p>
	<h2>検索</h2>
		<form action="./search.php" method="post">
		<div id="search_from">
		<div id="search_name">
			<span class="txt_small">車種名</span><br />
			<input type="text" name="name" value="" size="40" accesskey="3" tabindex="3" />
		</div>
		<div id="search_checkbox">
		<div>
			<span class="txt_small">排気量</span><br />
			<input type="checkbox" name="haiki[]" value="1" accesskey="5" tabindex="5" />～50cc<br />
			<input type="checkbox" name="haiki[]" value="2" accesskey="6" tabindex="6" />51cc ～ 125cc<br />
			<input type="checkbox" name="haiki[]" value="3" accesskey="7" tabindex="7" />126cc ～ 250cc<br />
			<input type="checkbox" name="haiki[]" value="4" accesskey="8" tabindex="8" />251cc ～ 400cc<br />
			<input type="checkbox" name="haiki[]" value="5" accesskey="9" tabindex="9" />401cc ～ 750cc<br />
			<input type="checkbox" name="haiki[]" value="6" accesskey="a" tabindex="10" />751cc ～<br />
		</div>
		<div>
			<span class="txt_small">タイプ</span><br />
			<input type="checkbox" name="type[]" value="1" accesskey="b" tabindex="11" />ロードスポーツ / ストリート<br />
			<input type="checkbox" name="type[]" value="2" accesskey="c" tabindex="12" />フルカウル<br />
			<input type="checkbox" name="type[]" value="3" accesskey="d" tabindex="13" />オフロード<br />
			<input type="checkbox" name="type[]" value="6" accesskey="e" tabindex="14" />クルーザー(アメリカン)<br />
			<input type="checkbox" name="type[]" value="4" accesskey="f" tabindex="15" />スクーター<br />
			<input type="checkbox" name="type[]" value="5" accesskey="g" tabindex="16" />ビジネス<br />
		</div>
		<div>
			<span class="txt_small">メーカー</span><br />
			<input type="checkbox" name="maker[]" value="1" accesskey="h" tabindex="17" />ホンダ<br />
			<input type="checkbox" name="maker[]" value="2" accesskey="i" tabindex="18" />ヤマハ<br />
			<input type="checkbox" name="maker[]" value="3" accesskey="j" tabindex="19" />スズキ<br />
			<input type="checkbox" name="maker[]" value="4" accesskey="k" tabindex="20" />カワサキ<br />
		</div>
		</div>
		<div class="flo_clear button_area">
			<input type="submit" value="検索" accesskey="l" tabindex="21" class="button" />
		</div>
		</div>
		</form>
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
</script>
</div></body>
</html>