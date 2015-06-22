<?php
	#共通変数読み込み
	require "./../config.php";

function link_write(){
	$name = $_POST['name'];
	$com = $_POST['com'];
	$url = $_POST['url'];

	global $link_file;
#指定ファイルに追記
	$fp = @fopen("./../$link_file", 'a+');
	echo $link_file;
	fputs ($fp, "<tr><td><a href=\"".$url."\">".$name."</a></td><td>".$com."</td></tr>\n");
	fclose($fp);
}
?>