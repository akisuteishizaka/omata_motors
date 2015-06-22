#!/bin/bash

#	カレンダーユーティリティ
# 今月と来月のカレンダーを作るシェルスクリプト
# 共通の関数は./cal_confから読み込み。

#-- 使用方法
# ./cal_utl "引数"
# 引数	reset	カレンダー再構築(初期化、リセット)
# 引数	chan_mon 	カレンダーを一月進める。再来月の生成。

#シェルスクリプトの絶対パスを取得
DIR=$(cd $(dirname $0);pwd)

#-- 変数定義開始 --#

#外部共通関数読み込み
. ${DIR}/cal_utl.conf
# 今月カレンダーファルル名	file_name
# 来月カレンダーファイル名	file_name2
# カレンダーファイル格納場所	file_dir

#外部タグ添付スクリプト読み込み
. ${DIR}/cal_creator

# 今月変数定義
mon=`date "+%m %Y"`

# 来月変数定義
next_mon=`date --date="+1 month" "+%m %Y"`
after_next_mon=`date --date="+2 month" "+%m %Y"`

#-- 変数定義終了 --#

case $1 in
	reset)
	#リセットの場合
	#今月分書き出し
	TAGGING ${file_name} ${mon}
	#来月分書き出し
	TAGGING ${file_name2} ${next_mon}
	TAGGING ${file_name3} ${after_next_mon}
	;;
	chan_mon)
	#月変わり。ファイル名変更。来月>今月 再来月>来月。
	mv -f ${file_dir}${file_name2} ${file_dir}${file_name}
	mv -f ${file_dir}${file_name3} ${file_dir}${file_name2}
	#再来月生成
	TAGGING ${file_name3} ${after_next_mon}
	;;
esac
