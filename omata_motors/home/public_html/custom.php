<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./css/orf_style.css" type="text/css" />
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="start index" href="./index.php" />
	<link rel="bookmark" href="url" />
	<link rel="help" href="./help.php" />
<?php require("./script/config.php"); ?>
	<script type="text/javascript" src="./script/script.js"></script>
<title>オマタモータース カスタム</title>
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
<div id="pag_name">カスタム<hr /></div>
<div id="contents">
	<div id="lovalnavi" class="flo_left">
		<div id="calendar">営業カレンダー
		<?php read_cal("$cal1"); read_cal("$cal2"); ?>
		<span class="fir">午前休業</span><br /><span class="lat">午後休業</span><br /><span class="off">休業日</span><br />
		JavaScript : <img src="./img/js_off.gif" width="43" height="23" alt="javascript check" id="js_chk" />
		</div>
	</div>
<div id="main" class="flo_right">
ただいま製作中です。しばらくお待ち下さい。
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