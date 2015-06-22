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
	<script type="text/javascript" src="./../admin.js"></script>
<title>オマタモータース 管理画面</title>
</head>
<body><div id="all">
<div id="statistics">
	<div id="stat_name" class="flo_left">
		<?php include "./statistics.inc.php"; get_name(); ?>
	</div>
	<div id="stat_cnt" class="flo_right">
		<?php get_cnt(); ?>
	</div>
	<div class="flo_clear">
		<form method="post" enctype="multipart/form-data" action="./statistics.php">
		<div>
			<select size="1" name="sel_day">
				<option value="-1" selected="selected">直近</option>
				<option value="0">～30日前</option>
				<option value="30">30～60日前</option>
				<option value="60">60～90日前</option>
				<option value="90">90～120日前</option>
				<option value="120">120～150日前</option>
				<option value="150">120～150日前</option>
			</select>
			<input type="submit" value="表示切替">
		</div>
		</form>	
	</div>
</div>
<a href="./index.php">管理ページ トップヘ戻る</a>
</div>
<script type="text/javascript">
</script>
</body>
</html>