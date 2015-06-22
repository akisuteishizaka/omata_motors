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
<?php require "./topic.inc.php"; ?>
<title>オマタモータース 管理画面</title>
</head>
<body><div id="all">
<?php
	$txt = $_POST['txt'];
	$url = $_POST['url'];
	$img = $_POST['img'];
	$up = $_POST['update'];

#フォームからデータが送られて、初めて関数、変数を読み込むので注意。
if($txt != NULL && $up == "update"){
	#外部ファイルからユーザー定義関数、変数読み込み
	# フォームからテキスト、アップデートの引数を受け取ったときに処理。
	topic_w();
}elseif($up == "del"){
	#ファイル消去
	topic_d();
}else{#空押しエンター対処。
}?>
<h1>管理画面</h1>
<h2>トピック管理</h2>
<?php
 	global $topic;
#ファイル存在確認。ない場合処理の脱出
	if(file_exists("./../".$topic)){
	#上位ディレクトリから読み込まれる前提
		echo '<div id="topic">';
		include ("./../".$topic);
		echo '</div>';
	}else{
		echo '<div>公開中のトピックはありません。</div>';
	}
?>
<form method="post" action="./topic.php">
	<div id="topic_form">
		<textarea name="txt" cols="60" rows="5"></textarea><br />
		URL:<input type="text" name="url" size="60" /><br />
		<input type="hidden" name="update" value="update" />
		<input type="submit" value="送信する" />
	</div>
</form>

<form method="post" action="./topic.php">
	<div class="flo_right">
		<input type="hidden" name="update" value="del" />
		<input type="submit" value="消去" />
	</div>
</form>
<a href="./index.php">管理ページ トップヘ戻る</a>
</div></body>
</html>