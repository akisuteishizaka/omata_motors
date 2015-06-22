<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./../../css/admin.css" type="text/css" />
	<link rel="shortcut icon" href="favicon.ico" />
	<link rel="start index" href="./index.php" />
	<link rel="bookmark" href="url" />
	<link rel="help" href="./help.php" />
<?php require("./cal.inc.php"); ?>
<title>オマタモータース 管理画面 カレンダー</title>
</head>
<body><div id="all">
<?php

	#postで送られてきた変数の受け取り
	$day = $_POST['day'];
	$mon = $_POST['mon'];
	$sch = $_POST['sch'];
	$up = $_POST['update'];

	#初回読み込み対策。
	if($up != NULL){
		cal_edit();
	}
?>
<h1>管理画面</h1>
<h2>カレンダー管理</h2>
<div id="calendar">
	<?php read_cal("../../$cal1"); read_cal("../../$cal2"); read_cal("../../$cal3"); ?>
</div>
<form method="post" action="./cal.php">
	<div id="cal_form" class="flo_clear">
		<select name="mon">
			<option value="1" selected="selected">今月</option>
			<option value="2">来月</option>
			<option value="3">再来月</option>
		</select>
		<input type="text" name="day" size="1" /><hr />
		<input type="radio" name="sch" value="fir" checked="checked" /><span class="fir">午前休業</span>
		<input type="radio" name="sch" value="lat" /><span class="lat">午後休業</span>
		<input type="radio" name="sch" value="off" /><span class="off">休業日</span>
		<input type="radio" name="sch" value="non" /><span class="non">通常営業</span>
		<input type="hidden" name="update" value="update" />
		<input type="submit" value="確認" />
	</div>
</form>
<form method="post" action="./cal.php">
	<div id="cal_res" class="flo_right">
		<input type="hidden" name="update" value="reset" />
		<input type="submit" value="リセット" />
	</div>
</form>
<div>
	<a href="./index.php">管理画面 トップヘ戻る</a>
</div>
</div></body>
</html>