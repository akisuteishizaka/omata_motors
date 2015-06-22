#!/bin/bash
#
# @(#) DNS_update.sh ver,2.0 2011/03/17
#
# DNSサーバーにIPアドレスを通知するスクリプト
# HTTPのベーシック認証を使用しています
#

#---- 設定開始 ----#
#内部インターフェース定義
LAN=ppp0

#自宅サーバーDNS名定義
DNS_SRV=kurachano.mydns.jp

#DNSユーザーID、パスワード設定。
USER=mydns73659
PASS=oe6qQyM2

#認証URL設定。
URL=http://www.mydns.jp/login.html

#---- 設定終了 ----#

#---- ユーザー定義関数定義開始 ----#
#グローバルIPアドレス修得#
ASK_WAN(){
        ifconfig ${LAN} | grep inet | sed -e 's/  */ /g' -e 's/[^0-9. ]//g' | awk '{print $1}'
}

#DNSサーバーにIPアドレス問い合わせ#
ASK_DNS(){
        nslookup ${DNS_SRV} | grep Address | tail -n 1 | sed  -e 's/[^0-9.]//g'
}
#----ユーザー定義関数定義完了  ----#

# 互いのIPアドレスが違った場合にIPアドレス更新
if [ `ASK_WAN` != `ASK_DNS` ]; then
    wget  ${URL} --http-user=${USER} --http-passwd=${PASS} --spider
    echo "IPアドレス更新しました。"
  else
    echo "IPアドレスを更新しませんでした。"
fi
#--終了--#
