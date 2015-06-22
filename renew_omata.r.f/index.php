<?php echo'<?xml version="1.0" encoding="UTF-8"?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ja" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<meta name="keywords" content="おまたレーシングファクトリー,オマタモータース,バイク,カスタム" /> 
<meta name="description" content="" /> 
<meta name="robots" content="index" />
	<link rev="made" href="mailto:hoge@hoge" />
	<link rel="stylesheet" href="./css/style.css" type="text/css" />
	<link rel="stylesheet" href="./css/latale.css" type="text/css" />
	<link rel="shortcut icon" href="./favicon.ico" />
	<link rel="start index" href="./index.php" />
<title>オマタレーシングファクトリー</title>
</head>
<body>
<div id="all">
<div id="g_navi">
	<ul>
		<li class="gnavi01"><a href="./index.php?page=index">▲ top</a></li>
	</ul>
</div>
<div id="main_txt">
<?php 
	$page = $_REQUEST['page'];
	$page = './tips/'.$page.'.dat';
	if(file_exists($page)){
		readfile($page);
		fclose($fp);
	}else{
		readfile("./tips/index.dat");
		break;
	}
?>
</div>	
<div id="footer">
</div>
</div>
</body>
</html>