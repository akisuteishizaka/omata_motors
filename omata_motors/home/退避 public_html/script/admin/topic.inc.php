<?php
	#共通変数読み込み
	require "./../config.php";

function topic_w(){
	global $topic, $txt, $url;

	$txt = str_replace("\n", "<br />", $txt);
#画像とURLに入力があった場合の画像のリンク化
	if($url != NULL && $img != NULL){
		$img = "<a href=\"".$url."\"><img src=\"".$img."\"></a>";
		$txt = $img."<br />".$txt;
	}
#画像なし、URL入力ありの場合のテキストリンク化
	if($url != NULL && $img == NULL)
		$txt = "<a href=\"".$url."\">".$txt."</a>";

	$fp = @fopen("./../$topic", 'w+');
	fputs ($fp, $txt);
	fclose($fp);
}

function topic_d(){
	global $topic;
#ファイル消去
	unlink("./../$topic");
}
?>