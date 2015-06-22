<?php
function get_name(){
	include "./../sql_config.php";
#テーブル宣言
	echo "<table border=\"1\" summary=\"access count name\"><tr><td>車種名</td></tr>";
	#ソートの指定
	${order}= "order by main_table.id";
	#データベース展開
	$link = mysql_connect($sever, $usr_name, $pass) or die("接続失敗");
	mysql_select_db($db_name, $link);
	#クエリ実行
	$res = mysql_query("select id, name from main_table ${order};" ,$link);
	#配列に格納、出力
	while($row = mysql_fetch_array($res, MYSQL_NUM)){
		extract($row);
		echo "<tr><td><a href=\"./../../viewer.php?id=".$row[0]."\">".$row[1]."</a></td></tr>\n";
	}
	#テーブル閉じ
		echo '</table>';
		mysql_close($link);
}
function get_cnt(){
#初期出力日数定義
	$day_cnt = 10;
#日付指定取得
	$sel_day = $_POST['sel_day'];
#初回読み込み対応。
	if($sel_day != NULL && $sel_day >= 0)
		#30日分読み込み
		$day_cnt = 30;
	$sel_day = date('z') -$sel_day;

	#データベース定義取得
	include "./../sql_config.php";
	#テーブル出力
	echo "<table border=\"1\" summary=\"access count data\">\n";
	#データベース読み込み
	$link = mysql_connect($sever, $usr_name, $pass) or die("接続失敗");
	mysql_select_db($db_name, $link);

	#引き出す日付指定変数作成&テーブル出力
	for($i=0;$i<$day_cnt;$i++){
		$day = $sel_day - $i;
	#dayが-になった=年をまたぐ場合の処理
		if($day < 0){
			#去年を取得
			$last_year = date('Y')-1;
			#365日分を追加。去年が閏年だった場合、さらに+1日
			$day = $day +365+date('L', $last_year);
		}
		#CSVで変数格納
		${column} = " , `".$day."`".${column};
		#日付を計算して出力
		$day = $i-$day_cnt+$sel_day-date('z')+1;
		echo "<td>".date("m/d",strtotime("$day day"))."</td>";
	}
		echo "</tr>\n";
	#ソートの指定
	${order}= "order by main_table.id";
	#クエリ実行
	$res = mysql_query("select main_table.id ${column} from main_table, access_count where main_table.id = access_count.id ${order};" ,$link);
	#配列に格納、出力
	while($row = mysql_fetch_array($res, MYSQL_NUM)){
		extract($row);
		echo "<tr>";
#idと車種出力
		for($i=1;$i<=($day_cnt);$i++){
			echo "<td>".$row[$i]."</td>";
		}
		echo "</tr>\n";
	}
	#テーブル閉じ
		echo '</table>';
		mysql_close($link);
}
?>