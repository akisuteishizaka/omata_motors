<?php
#ユーザー定義関数、変数ファイル読み込み
	require "./used.inc.php";

#データベース新規作成
	$alt = $_POST['alt_db'];
		switch($alt){
			case "db_insert":
				#データベースに新規挿入、戻り値は挿入したデータのID
				$last_id = insert_db();
				echo $last_id;
				#画像生成。車体左右、メーターまわりは定型固定出力。
				$img_inf = (getimagesize($_FILES["img_left"]["tmp_name"]));
				if($img_inf[2] == "2")
					img_cre(img_left,$last_id);
				$img_inf = (getimagesize($_FILES["img_right"]["tmp_name"]));
				if($img_inf[2] == "2")
					img_cre(img_right,$last_id);
				$img_inf = (getimagesize($_FILES["img_meter"]["tmp_name"]));
				if($img_inf[2] == "2")
					img_cre(img_meter,$last_id);
				#引渡し画像個数計算後、画像生成。
				for($cnt=1; $cnt<=4; $cnt++){
					$img_inf = (getimagesize($_FILES["img_etc".$cnt]["tmp_name"]));
					if($img_inf[2] == "2")
					$img_etc[] = "img_etc".$cnt;
				}
				if($img_etc != NULL)
					img_cre($img_etc,$last_id);

				#コメント挿入
				used_comment($last_id);
				break;
			case "db_delete":
				#POSTされたidを取得しカラム削除
				del_db();
				break;
			case "db_update":
				#POSTされたidを取得しカラム削除
				db_update();
		}
?>
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
	<h1>管理画面</h1>
	<h2>中古情報 車体データベース管理</h2>
	<h3>新規作成</h3>
	<div id="used_inc">
		<form method="post" action="./used.php" enctype="multipart/form-data" id="inc_form" onsubmit="return check(this)">
		<div>
			車体左側<input type="file" name="img_left" /><br />
			車体右側<input type="file" name="img_right" /><br />
			メーター<input type="file" name="img_meter" /><br />
			その他1<input type="file" name="img_etc1" /><br />
			その他2<input type="file" name="img_etc2" /><br />
			その他3<input type="file" name="img_etc3" /><br />
			その他4<input type="file" name="img_etc4" /><br />
		</div>
		<div id="details">
			<table border="1" summary="details">
			<colgroup>
				<col class="item" />
				<col class="detail" />
				<col class="item" />
				<col class="detail" />
			</colgroup>
			<tr><th colspan="4">車体名称:<input type="text" name="name" maxlength="50" /></th></tr>
			<tr><td>車体価格</td><td colspan="3"><input type="text" name="price" maxlength="5" />万円</td></tr>
			<tr>
				<td>年式</td><td><input type="text" name="year" maxlength="5" />年</td>
				<td>色</td><td><input type="text" name="color" maxlength="10" /></td>
			</tr>
			<tr>
				<td>走行距離</td><td><input type="text" name="mileage" maxlength="6" />km</td>
				<td>排気量</td><td><input type="text" name="displacement" maxlength="4" />cc</td>
			</tr>
			<tr>
				<td>メーカー</td><td><select size="1" name="maker_code">
					<option value="1" selected="selected">ホンダ</option>
					<option value="2">ヤマハ</option>
					<option value="3">スズキ</option>
					<option value="4">カワサキ</option>
					<option value="99">不明</option>
				</select></td>
				<td>車検/保険</td><td><input type="text" name="insurance" maxlength="10" /></td>
			</tr>
			</table>
			<select name="type_code" size="1">
				<option value="1" selected="selected">ロードスポーツ / ストリート</option>
				<option value="2">フルカウル</option>
				<option value="3">オフロード</option>
				<option value="6">クルーザー / アメリカン</option>
				<option value="4">スクーター</option>
				<option value="5">ビジネス</option>
				<option value="99">不明</option>
			</select>
		</div>
		<div id="used_comment">
			コメント<textarea name="comment" cols="60" rows="5"></textarea>
		</div>
		<input type="hidden" name="alt_db" value="db_insert" />
		<input type="submit" value="確認"  name="button1"/>
		</form>
	</div>
	<div id="used_up">
	<h3>データベース修正</h3>
	<form method="post" action="./used.php" enctype="multipart/form-data">
		<div>
			id<input type="text" name="id" maxlength="20" />
			<select size="1" name="fix_code">
				<option value="name" selected="selected">車体名</option>
				<option value="price">車体価格</option>
				<option value="year">年式</option>
				<option value="color">色</option>
				<option value="mileage">走行距離</option>
				<option value="displacement">排気量</option>
				<option value="insurance">保険</option>
				<option value="maker_code">メーカー</option>
				<option value="type_code">タイプ</option>
			</select>
		<input type="text" name="value" maxlength="20" />
		<input type="hidden" name="alt_db" value="db_update" />
		<input type="submit" value="更新" />
		</div>
		<div>メーカーコード
			<ul>
				<li>1 → ホンダ</li>
				<li>2 → ヤマハ</li>
				<li>3 → ズスキ</li>
				<li>4 → カワサキ</li>
				<li>99 → 不明</li>
			</ul>
		</div>
		<div>タイプコード
			<ul>
				<li>1 → ロードスポーツ / ストリート</li>
				<li>2 → フルカウル</li>
				<li>3 → オフロード</li>
				<li>4 → スクーター</li>
				<li>5 → ビジネス</li>
				<li>6 → クルーザー / アメリカン</li>
				<li>99 → 不明</li>
			</ul>
		</div>
	</form>
	</div>
	<h3>ID指定削除</h3>
	<div id="used_del">
	<form method="post" action="./used.php" enctype="multipart/form-data" onsubmit="return del_check()">
		<div>
			<input type="text" name="id" maxlength="20" />
			<input type="hidden" name="alt_db" value="db_delete" />
			<input type="submit" value="削除" />
		</div>
	</form>
	</div>
<a href="./index.php">管理ページ トップヘ戻る</a>
</div></body>
</html>