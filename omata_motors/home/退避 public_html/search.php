<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="robots" content="noindex" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="start index" href="./index.php" />
	<link rel="bookmark" href="url" />
	<link rel="help" href="./help.php" />
<?php require("./script/config.php"); ?>
	<script type="text/javascript" src="./script/script.js"></script>
<title>オマタモータース 中古車情報 検索結果</title>
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
<div id="pag_name">中古情報 検索結果<hr /></div>
<div id="contents">
<div id="search_result">
<!-- 検索結果表示 -->
<?php
#取得関数整頓処理
#名前取得
if($_POST['name'] != NULL){
	${name} = $_POST['name'];
	${search_key} = "name like '".${name}."%'";
}
#排気量取得。複数取得可能?
if(isset($_POST['haiki'])){
	${haiki} = $_POST['haiki'];
	${cnt} = count(${haiki});
#一時的に変数内へ構文を挿入
	${tmp} = "(";
#要素数-1回の構文作成ループ
	for(${i}=0;${i}<${cnt}-1; ${i}++){
		${tmp} = ${tmp}."class_code='".${haiki}[$i]."' or ";
	}
#最終回にはorは不要なので閉じる
	${tmp} = ${tmp}."class_code='".${haiki}[$i]."')";
#search_keyに挿入。代入済みの場合は追記
	if(${search_key} !== NULL)
		${search_key} = ${search_key}." and";
	${search_key} = "${search_key} ${tmp}";
}
#車種タイプ所得
if(isset($_POST['type'])){
	${type} = $_POST['type'];
	${cnt} = count(${type});
#一時的に変数内へ構文を挿入
	${tmp} = "(";
#要素数-1回の構文作成ループ
	for(${i}=0;${i}<${cnt}-1; ${i}++){
		${tmp} = ${tmp}."type_code='".${type}[$i]."' or ";
	}
#最終回にはorは不要なので閉じる
	${tmp} = ${tmp}."type_code='".${type}[$i]."')";
#search_keyに挿入。代入済みの場合は追記
	if(${search_key} !== NULL)
		${search_key} = ${search_key}." and";
	${search_key} = "${search_key} ${tmp}";
}
#メーカ所得
#データベースの使用上、main_table.を追加。これだけ
if(isset($_POST['maker'])){
	${maker} = $_POST['maker'];
	${cnt} = count(${maker});
#一時的に変数内へ構文を挿入
	${tmp} = "(";
#要素数-1回の構文作成ループ
	for(${i}=0;${i}<${cnt}-1; ${i}++){
		${tmp} = ${tmp}."main_table.maker_code='".${maker}[$i]."' or ";
	}
#最終回にはorは不要なので閉じる
	${tmp} = ${tmp}."main_table.maker_code='".${maker}[$i]."')";
#search_keyに挿入。代入済みの場合は追記
	if(${search_key} !== NULL)
		${search_key} = ${search_key}." and";
	${search_key} = "${search_key} ${tmp}";
}
#------------------------------------------
#外部設定ファイル関数読み込み
	require "./script/sql_config.php";
	global $sever, $usr_name, $pass, $db_name;
#データベース読み込み
	$link = mysql_connect($sever, $usr_name, $pass) or die("接続失敗");
	mysql_select_db($db_name, $link);

#引き出すカラム指定
${column} = "main_table.id, main_table.name, main_table.year, main_table.maker_code, main_table.color, main_table.mileage, main_table.displacement, main_table.type_code ,main_table.insurance, main_table.class_code, main_table.price, maker_code.maker";
#ソートの指定
${order}= "order by displacement asc, maker_code asc";
#クエリ実行
if(${search_key} != NULL){
	$res = mysql_query("select ${column} from main_table, maker_code where ${search_key} and main_table.maker_code=maker_code.maker_code ${order};" ,$link);
	#テーブル出力
		echo "<table border=\"1\" summary=\"search result\"><colgroup><col class=\"name\" /><col class=\"price\" /><col class=\"color\" /><col class=\"maker_code\" /><col class=\"year\" /><col class=\"mileage\" /><col class=\"displacement\" /><col class=\"insurance\" /></colgroup><tr><th>名前</th><th>車体価格</th><th>色</th><th>メーカー</th><th>年式</th><th>走行距離</th><th>排気量</th><th>車検/保険</th></tr>";
	#連想配列に格納、出力
	while($row = mysql_fetch_array($res, MYSQL_ASSOC)){
		extract($row);
		echo "<tr><td><a href=\"./viewer.php?id=".$id."\">".$name."</a></td><td>".$price."</td><td>".$color."</td><td>".$maker."</td><td>".$year."年</td><td>".$mileage."km</td><td>".$displacement."cc</td><td>".$insurance."</td></tr>";
	}
	#テーブル閉じ
		echo '</table>';
}else{
	echo "条件を入力してください";
}
?>
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
</script>
</div></body>
</html>