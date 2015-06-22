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
<title>オマタモータース 管理画面 リンク管理</title>
</head>
<body><div id="all">
<?php 
#フォームからデータが送られて、初めて関数、変数を読み込むので注意。
$up = $_POST['update'];

if($up == "update"){
	#外部ファイルからユーザー定義関数、変数読み込み
	require "./link.inc.php";
	# フォームからテキスト、アップデートの引数を受け取ったときに処理。
	link_write();
}else{
#空押しエンター対処。
}
?>
<h1>管理画面</h1>
<h2>新着情報</h2>
<form method="post" action="./link.php">
	<div id="link_form">
		ホームページ名<input type="text" name="name" size="60" /><br />
		URL:<input type="text" name="url" size="60" /><br />
		コメント<input type="text" name="com" size="60" /><br />
		<input type="hidden" name="update" value="update" />
		<input type="submit" value="送信する" />
	</div>
</form>
<a href="./index.php">管理画面 トップヘ戻る</a>
</div></body>
</html>