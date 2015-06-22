<?php
	#共通変数読み込み
	require "./../config.php";

function cal_edit(){
#postで送られてきた変数の受け取り
#	$day = $_POST['day']; // 日にちが入ってますよ。
#	$mon = $_POST['mon']; // これが直接編集するファイルが送られてくるはず。
#	$sch = $_POST['sch']; // 
#	$up = $_POST['update']; // 隠し属性。
	global $day, $up;
#up変数、日付が指定範囲内の処理分岐
	if(preg_match("/[0-9]{1,2}/", $day) && $up == "update"){
	#月によってファイル名を変更 1:今月 2:来月 3:再来月
	global $cal1, $cal2, $cal3, $mon, $sch;

	switch($mon){
		case "1";
			$fnm = $cal1;
			break;
		case "2";
			$fnm = $cal2;
			break;
		case "3";
			$fnm = $cal3;
			break;
		}

		#ファイルを開く。ダメだったら強制リセット
		$fp = @fopen("./../$fnm", 'r+') or shell_exec("./cal_reset.sh");
		#ファイルの全データを読みとり、変数内に格納
		$str = file_get_contents("./../$fnm");
		#指定した日付のクラスを変更
		$txt = "<td class=\"$sch\">$day</td>";
		$str = ereg_replace("<td class=\"[a-z]{3}\">$day</td>","<td class=\"$sch\">$day</td>" , $str);

		#ファイルに書き出し、ファイルを閉じる
		fputs($fp, $str);
		fclose($fp);

	} elseif($up == "reset"){
		#upにリセットが入っていた場合、リセットシェルスクリプト実行。
		shell_exec("./cal_reset.sh");
		echo "リセットしました。";
	}
}?>
