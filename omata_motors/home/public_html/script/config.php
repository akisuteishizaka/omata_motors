<?php
#カレンダーファイル名定義
	$cal1 = "calendar";
	$cal2 = "calendar_2";
	$cal3 = "calendar_3";
#お知らせファイル名定義
	$info = "info.dat";
#トピックスファイル名定義
	$topic = "topic.dat";
#リンク集格納ファイル名定義
	$link_file = "link.dat";

function read_cal($fnm){
#上位ディレクトリから読み込まれる前提
	echo '<table border="1" summary="calendar">';
	include("./script/".$fnm);
	echo '</table>';
	}

function read_info(){
	global $info;
#上位ディレクトリから読み込まれる前提
	include ("./script/".$info);
	}

function topic(){
	global $topic;
#ファイル存在確認。ない場合処理の脱出
	if(file_exists("./script/".$topic)){
	#上位ディレクトリから読み込まれる前提
		echo '<div id="topic">';
		include ("./script/".$topic);
		echo '</div>';
		}
	}

function link_read(){
	global $link_file;
	echo '<table border="1" summary="link table"><col class="col1" /><col class="col2" />';
	include("./script/".$link_file);
	echo '</table>';

}
?>