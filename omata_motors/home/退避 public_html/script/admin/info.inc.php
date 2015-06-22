<?php
	#共通変数読み込み
	require "./../config.php";

	#旧情報件数指定(指定値+1が保存される)
	$inf_cnt = 10;

function info_w(){
	global $info, $txt, $url,$inf_cnt;
#ログを変数内に格納するためにファイルを開く
	$fp = @fopen("./../$info", 'r');
#既存のファイルからファイルの末端もしくは指定数の新着を取得
	while(!feof($fp)){
		if($cnt>=$inf_cnt) break;
		$old = $old.fgets($fp);
		$cnt++;
		}
	fclose($fp);
#URLに入力があった場合のリンク化
	if($url != NULL){
		$txt = "<a href=\"".$url."\">".$txt."</a>";
		}
#日にちを追加して、テキストを書き込み。新着→旧情報を書き出し。
	$fp = @fopen("./../$info", 'w+');
	$txt = "<h4>".$txt."</h4>";
	$txt = str_replace("\r\n", "\r", $txt); //Windowsの改行コードを置き換え
	$txt = str_replace("\r", "\n", $txt); //Machintoshの改行コードを置き換え
	$txt = str_replace("\n", "<br />", $txt); //\nを<br>に置き換え 
	$txt = "<h3>".date("Y/m/d")."</h3>".$txt."\n";
	fputs ($fp, $txt);
	fputs ($fp, $old);
	fclose($fp);
}

function info_edit(){}
function info_view(){}
?>