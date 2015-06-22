<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="robots" content="noindex" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./css/pop_up.css" type="text/css" />
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="start index" href="./index.php" />
	<link rel="bookmark" href="url" />
	<link rel="help" href="./help.php" />
<?php require("./script/config.php"); ?>
	<script type="text/javascript" src="./script/script.js"></script>
<title>オマタモータース お問い合わせフォーム</title>
</head>
<body><div id="pop_up">
<div id="pag_name">お問い合わせフォーム<hr /></div>
<div id="contents">
<?php
	session_start();
	if($_POST['mailto'] == "conf" && $_POST['mail_addr'] == $_POST['mail_addr_2']){
		$_SESSION['que_type'] = $_POST['que_type'];
		$_SESSION['text'] = $_POST['text'];
		$_SESSION['mail_addr'] = $_POST['mail_addr'];
		$_SESSION['mailto'] = "send";
		echo '<p class="center">入力確認</p>
			<div id="input_chk">
			<p><span class="txt_small">お問い合わせ項目</span><br />'.$_SESSION['que_type'].'</p>
			<p><span class="txt_small">返信用メールアドレス</span><br />'.$_SESSION['mail_addr'].'</p>
			<p><span class="txt_small">お問い合わせ内容</span><br />'.str_replace("\n", "<br />",$_SESSION['text']).'</p>
			</div>
			<p>入力内容をご確認の上、送信を押してください。<br />内容に間違いを見つけた場合、下のフォームを編集して再度確認ボタンを押してください。</p>
			<input type="button" value="送信" onClick="location.href=\'./contact_form.php\'"><hr />';
	}else{
		switch($_SESSION['mailto']){
			case "send":
				#メール文字エンコード
				mb_language("Ja") ;
				mb_internal_encoding("UTF-8") ;
				#ヘッダーフッター取得
				$mail_head = file_get_contents("./script/mailhead.dat");
				$mail_foot = file_get_contents("./script/mailfoot.dat");
				#メールアドレス取得
				$mailto = $_SESSION['mail_addr'];
				#件名定義
				$subject = "【オマタモータース】 お問い合わせありがとうございます。";
				#本文作成
				$content = $mail_head."\nお問い合わせ内容　:　".$_SESSION['que_type']."\n".$_SESSION['text']."\n".$mail_foot;
				#送信者、第五引数定義、最初はオマタモータースへ送信。
				$parameter="-f ".$_SESSION['mail_addr'];
				$mailfrom="From:" .mb_encode_mimeheader($_SESSION['mail_addr']);
				#メール送信 オマタモータースへ
				mb_send_mail('omata.r.f@fgo.jp','ホームページ 問い合わせ',$content,$mailfrom,$parameter);
				#おきゃーさんへ。送信者をオマタモータースへ、第五引数も再定義
				$mailfrom="From:" .mb_encode_mimeheader("オマタモータース") ."<omata.r.f@fgo.jp>";
				$parameter="-f omata.r.f@fgo.jp";
				#メール送信。
				if(mb_send_mail($mailto,$subject,$content,$mailfrom,$parameter)){
					echo "送信完了しました。<br /><input type=\"submit\" onClick=\"window.close()\" value=\"ウインドウを閉じる\">";
				}else{
					echo "送信失敗<br /><input type=\"submit\" onClick=\"window.close()\" value=\"ウインドウを閉じる\">";
				}
				$stat = "exit";
				#セッション変数を全て解除する
				$_SESSION = array();
				#セッションを切断するにはセッションクッキーも削除する。
				if (isset($_COOKIE[session_name()])) {
					setcookie(session_name(), '', time()-42000, '/');
				}
				#セッションを破壊する
				session_destroy();
				break;
			default:
				break;
		}
	}
	if($stat != "exit"){
		echo '<form method="post" action="./contact_form.php" id="mail_form" onsubmit="return mail_form_chk()">
			<div id="form_if_area">
				<p>お問い合わせ項目<br />
				<select name="que_type">
					<option value="お見積り" selected="selected">お見積りの問い合わせ</option>
					<option value="車体に関するお問い合わせ" >車体に関するお問い合わせ</option>
					<option value="店舗に関するお問い合わせ" >店舗に関するお問い合わせ</option>
					<option value="その他" >その他</option>
				</select></p>
				<p>返信用メールアドレス<br /><input type="text" name="mail_addr" class="mail_add" value="'.$_POST['mail_addr'].'" /><br />
				返信用メールアドレス確認<br /><input type="text" name="mail_addr_2" class="mail_add" value="'.$_POST['mail_addr_2'].'" /></p>
				<p>お問い合わせ内容<br /><textarea name="text" rows="15" cols="80" class="text_area">'.$_POST['text'].'</textarea></p>
			<input type="hidden" name="mailto" value="conf" />
			</div>
			<script type="text/javascript">document.writeln(\'<input type="submit" value="確認" />\')</script>
			<noscript><p>javascriptを有効にしてください</p></noscript>
		</form>';
	}
?>

</div>
<script type="text/javascript">
history.forward();
</script>
</div></body>
</html>