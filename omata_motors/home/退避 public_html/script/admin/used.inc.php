<?php
#アップロード先ディレクトリ
	$updir = "./../../used/";
#出力先のサイズ設定
	$out_w = 640;
	$out_h = 480;
#画像クオリティ。初期値75らしい。
	$q = 75;


function img_cre($img,$id){
#グローバル変数、トリミングサイズ定義
	global 	$out_w,$out_h,$updir,$q;
	$trm_w = $out_w / 2;
	$trm_h = $out_h / 2;
#jpegファイル新規作成
	$dst = imagecreatetruecolor($out_w,$out_h);
#配列要素数取得
if(is_array($img)){
#出力場所定義
	$output = $updir.$id."_img_etc.jpg";
	$cnt = count($img);
	switch($cnt){
		case "4";
			$cnt--;
			list($img_w,$img_h)=getimagesize($_FILES["$img[$cnt]"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img[$cnt]"]["tmp_name"]);
			imagecopyresampled($dst,$src,$trm_w,$trm_h,0,0,$trm_w,$trm_h,$img_w,$img_h);
		case "3";
			$cnt--;
			list($img_w,$img_h)=getimagesize($_FILES["$img[$cnt]"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img[$cnt]"]["tmp_name"]);
			imagecopyresampled($dst,$src,0,$trm_h,0,0,$trm_w,$trm_h,$img_w,$img_h);
		case "2";
			$cnt--;
			list($img_w,$img_h)=getimagesize($_FILES["$img[$cnt]"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img[$cnt]"]["tmp_name"]);
			imagecopyresampled($dst,$src,$trm_w,0,0,0,$trm_w,$trm_h,$img_w,$img_h);
			$cnt--;
			list($img_w,$img_h)=getimagesize($_FILES["$img[$cnt]"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img[$cnt]"]["tmp_name"]);
			imagecopyresampled($dst,$src,0,0,0,0,$trm_w,$trm_h,$img_w,$img_h);
			break;
		default;
			$cnt--;
			list($img_w,$img_h)=getimagesize($_FILES["$img[$cnt]"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img[$cnt]"]["tmp_name"]);
			imagecopyresampled($dst,$src,0,0,0,0,$out_w,$out_h,$img_w,$img_h);
			break;
	}
}else{
			$output = $updir.$id."_".$img.".jpg";
			list($img_w,$img_h)=getimagesize($_FILES["$img"]["tmp_name"]);
			$src = @imagecreatefromjpeg($_FILES["$img"]["tmp_name"]);
			imagecopyresampled($dst,$src,0,0,0,0,$out_w,$out_h,$img_w,$img_h);
}
#ファイル保存 
	imagejpeg($dst,$output,$q);
}


function img_conv($img,$id,$fnm,$opt){
#グローバル変数、トリミングサイズ定義
	global $out_w,$out_h,$updir,$q;
	$trm_w = $out_w / 2;
	$trm_h = $out_h / 2;
#出力場所定義
	$output = $updir.$id.$fnm.".jpg";
#アップロードされたファイルの解像度取得
	list($img_w,$img_h)=getimagesize($_FILES["$img"]["tmp_name"]);
	#アップロードされたファイルを開く
	$src = @imagecreatefromjpeg($_FILES["$img"]["tmp_name"]);
	switch($opt){
		case "0";
			#1枚絵上書き
			#指定サイズイメージ作成
			$dst = imagecreatetruecolor($out_w,$out_h);
			imagecopyresampled($dst,$src,0,0,0,0,$out_w,$out_h,$img_w,$img_h);
			break;
		case "1";
			#4分割、指定箇所に挿入
			$dst = imagecreatetruecolor($output);
			imagecopyresampled($dst,$src,0,0,0,0,$trm_w,$trm_h,$img_w,$img_h);
			break;
		case "2";
			#4分割、指定箇所に挿入
			$dst = @imagecreatefromjpeg($output);
			imagecopyresampled($dst,$src,$trm_w,0,0,0,$trm_w,$trm_h,$img_w,$img_h);
			break;
		case "3";
			#4分割、指定箇所に挿入
			$dst = @imagecreatefromjpeg($output);
			imagecopyresampled($dst,$src,0,trm_h,0,0,$trm_w,$trm_h,$img_w,$img_h);
			break;
		case "4";
			#4分割、指定箇所に挿入
			$dst = @imagecreatefromjpeg($output);
			imagecopyresampled($dst,$src,$trm_w,$trm_h,0,0,$trm_w,$trm_h,$img_w,$img_h);
			break;
		}
#ファイル保存 
	imagejpeg($dst,$output,$q);
}

function insert_db(){
	#SQL基本情報取得
	require "./../sql_config.php";

	#	#全角文字→半角変換しつつ送信されたデータ取得
	$name = mb_convert_kana($_POST['name'], "a", "UTF-8");
	$year = mb_convert_kana($_POST['year'], "n", "UTF-8");
	$maker_code = mb_convert_kana($_POST['maker_code'], "n", "UTF-8");
	$color = $_POST['color'];
	$mileage = mb_convert_kana($_POST['mileage'], "n", "UTF-8");
	$displacement = mb_convert_kana($_POST['displacement'], "n", "UTF-8");
	$insurance = mb_convert_kana($_POST['insurance'], "n", "UTF-8");
	$type_code = $_POST['type_code'];
	$price = mb_convert_kana($_POST['price'], "n", "UTF-8");


	#データが空っぽだったときのための空白処理
	if($name == NULL)
		 $name = '名称不明';
	if($year == NULL)
		 $year = '0';
	if($maker_code == NULL)
		 $maker_code = '99';
	if($color == NULL)
		 $color = '不明';
	if($mileage == NULL)
		 $mileage = '0';
	if($displacement == NULL)
		 $displacement = '0';
	if($insurance == NULL)
		 $insurance = '無し';
	if($type_code == NULL)
		 $type_code = '99';
	if($price == '0' or $price == NULL){
		 $price = 'ASK';
	}else{
		 $price = $price."万円";
	}
#排気量からクラスコード計算
	if($displacement == NULL){
			$class_code = '99';
	}elseif($displacement <= 50){
			$class_code = '1';
	}elseif($displacement <= 125){
			$class_code = '2';
	}elseif($displacement <= 250){
			$class_code = '3';
	}elseif($displacement <= 400){
			$class_code = '4';
	}elseif($displacement <= 750){
			$class_code = '5';
	}else{
			$class_code = '6';
	}

	echo $name, $year, $maker_code, $color, $mileage, $displacement, $insurance ,$type_code ,$class_code, $price;
#データベースアクセス
	$link = mysql_connect($sever, $usr_name, $pass) or die("false");
	mysql_select_db($db_name, $link);
#コマンド実行
	mysql_query("insert into main_table(name, year, maker_code, color, mileage, displacement, insurance, type_code, class_code, price) values('$name', $year, $maker_code, '$color', $mileage, $displacement, '$insurance' ,$type_code ,$class_code, '$price');" ,$link);
#最後に追加したID取得
	$last_id = mysql_insert_id($link);
	mysql_query("insert into access_count(id) values ($last_id);" ,$link);
#データベース閉じ
	mysql_close($link);
#最終追加ID返却
	return $last_id;
}

function del_db(){
	#SQL基本情報取得
	require "./../sql_config.php";

	$id = $_POST['id'];
	echo $id;

	$link = mysql_connect($sever, $usr_name, $pass) or die("false");
	mysql_select_db($db_name, $link);
#コマンド実行
	mysql_query("delete from main_table where id=$id;" ,$link);
	mysql_query("delete from access_count where id=$id;" ,$link);
#データベース閉じ
	mysql_close($link);
#画像ファイル、コメントファイル削除。
#画像、コメントファイル格納場所取得
	global $updir;
	$file_dir = $updir.$id."_";
	#idのファイル存在チェック、削除
	if(file_exists($file_dir."img_left.jpg"))
		unlink($file_dir."img_left.jpg");
	if(file_exists($file_dir."img_right.jpg"))
		unlink($file_dir."img_right.jpg");
	if(file_exists($file_dir."img_meter.jpg"))
		unlink($file_dir."img_meter.jpg");
	if(file_exists($file_dir."img_etc.jpg"))
		unlink($file_dir."img_etc.jpg");
	if(file_exists($file_dir."comment.dat"))
		unlink($file_dir."comment.dat");

}

function used_comment($id){
	global $updir;
	$comment = $_POST['comment'];
	if($comment != NULL){
		$comment = str_replace("\r\n", "\r", $comment); //Windowsの改行コードを置き換え
		$comment = str_replace("\r", "\n", $comment); //Machintoshの改行コードを置き換え
		$comment = str_replace("\n", "<br />", $comment); //\nを<br>に置き換え 
		$fp = @fopen($updir.$id."_comment.dat", 'w+');
		fputs ($fp, $comment);
		fclose($fp);
	}
}

function db_update(){
#設定ファイル取得
	require "./../sql_config.php";
#POST取得
	$id = $_POST['id'];
	$fix_code = $_POST['fix_code'];
	$value = $_POST['value'];

#値段変更時の文字列追加
	if($fix_code == "price"){
		if($value == NULL or $value == 0 ){
			 $value = 'ASK';
		}else{
			 $value = $value."万円";
		}
	}

	if($value != NULL && id != NULL){
		$link = mysql_connect($sever, $usr_name, $pass) or die("false");
		mysql_select_db($db_name, $link);
	#コマンド実行
		mysql_query("update main_table set $fix_code='$value' where id=$id;" ,$link);

	#排気量からクラスコード計算
		if($fix_code == "displacement"){
			$fix_code="class_code";
			if($value <= 50){
				$value = '1';
			}elseif($value <= 125){
					$value = '2';
			}elseif($value <= 250){
					$value = '3';
			}elseif($value <= 400){
					$value = '4';
			}elseif($value <= 750){
					$value = '5';
			}else{
					$value = '6';
			}
		mysql_query("update main_table set $fix_code='$value' where id=$id;" ,$link);
		}
	#データベース閉じ
		mysql_close($link);
	}
}
?>