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
<title>オマタモータース 中古車情報</title>
</head>
<body><div id="all">
<div id="logo_area">
	<a href="./index.php"><img src="./img/om_logo.jpg" width="250" height="85" alt="omata morotrs logo" class="flo_left" /></a>
	<a href="./custom.php"><img src="./img/orf_logo.gif" width="182" height="85" alt="omata racing factory logo" class="flo_left" /></a>
</div>
<div class="navi gloval">
	<ul><li class="gnavi01"><a href="./index.php">トップ</a></li>
		<li class="gnavi02"><a href="./store.php">店舗情報</a></li>
		<li class="gnavi03"><a href="./used.php">商品情報</a></li>
		<li class="gnavi04"><a href="./custom.php">カスタム</a></li>
		<li class="gnavi05"><a href="./link.php">リンク</a></li>
</ul></div>
<div id="pag_name">中古情報<hr /></div>
<div id="contents">
<div id="viewer"><noscript><p>JavaScriptを有効にしてください。</p></noscript>
<?php
#引数読み込み
	$id = $_GET['id']; 

#外部設定ファイル関数読み込み
	require "./script/sql_config.php";
#	global $sever, $usr_name, $pass, $db_name;
#データベース読み込み
	$link = mysql_connect($sever, $usr_name, $pass) or die("接続失敗");
	mysql_select_db($db_name, $link);
#読み込みカラム指定
${column} = "main_table.name, main_table.year ,main_table.maker_code ,main_table.color ,main_table.mileage ,main_table.displacement ,main_table.insurance, main_table.price, maker_code.maker ";
#SQLクエリ実行
$res = mysql_query("select ${column} from main_table, maker_code where id=$id and main_table.maker_code=maker_code.maker_code;" ,$link);

#クエリ結果変数格納
while( $row = mysql_fetch_array( $res, MYSQL_ASSOC ) ){
	extract($row);
}
#アクセスカウント
	$cnt_date = date('z');
	$res = mysql_query("update access_count set `$cnt_date`=`$cnt_date`+1 where id=$id;" ,$link);

mysql_close($link);
?>
<h1><?php echo $name; ?></h1>
	<div id="image" class="flo_left">
		<img id="large_img" src="./used/<?php echo $id; ?>_img_left.jpg" width="640" height="480" alt="left view" />
	</div>
	<div id="thumbnail" class="flo_right">
		<ul>
		<li><img src="./used/<?php echo $id; ?>_img_left.jpg" width="128" height="96" alt="left view" onmouseover="change_img('./used/<?php echo $id; ?>_img_left.jpg')" /></li>
		<li><img src="./used/<?php echo $id; ?>_img_right.jpg" width="128" height="96" alt="right view" onmouseover="change_img('./used/<?php echo $id; ?>_img_right.jpg')" /></li>
		<li><img src="./used/<?php echo $id; ?>_img_meter.jpg" width="128" height="96" alt="meter view" onmouseover="change_img('./used/<?php echo $id; ?>_img_meter.jpg')" /></li>
		<?php
		if(file_exists("./used/".$id."_img_etc.jpg"))
			echo "<li><img src=\"./used/".$id."_img_etc.jpg\" width=\"128\" height=\"96\" alt=\"etc view\" onmouseover=\"change_img('./used/".$id."_img_etc.jpg')\" /></li>";
		?>
		</ul>
	</div>
	<div id="price" class="flo_clear">
		車体価格:
		<span class="price"><?php echo $price; ?></span>
	</div>
	<div id="details">
		<table border="1" summary="details">
		<colgroup>
			<col class="item" />
			<col class="detail" />
			<col class="item" />
			<col class="detail" />
		</colgroup>
		<tr>
			<td>年式</td><td><?php echo $year; ?>年</td>
			<td>色</td><td><?php echo $color; ?></td>
		</tr>
		<tr>
			<td>走行距離</td><td><?php echo $mileage; ?>km</td>
			<td>排気量</td><td><?php echo $displacement; ?>cc</td>
		</tr>
		<tr>
			<td>メーカー</td><td><?php echo $maker; ?></td>
			<td>車検/保険</td><td><?php echo $insurance; ?></td>
		</tr>
		</table>
	</div>
	<div id="sale_comment">
		<?php
			if(file_exists("./used/".$id."_comment.dat")){
				include "./used/".$id."_comment.dat";
			}else{
				echo "コメントはありません。";
			}
			?>
	</div>
	<div class="flo_left">お問い合わせは左の管理番号を添えて<a href="./contact.php">こちら</a>のお問い合わせフォームまでお問い合わせください。</div>
	<div class="flo_right txt_small">管理番号 : <?php echo $id; ?></div>

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