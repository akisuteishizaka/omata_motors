// 
function js_chk(){
	document.getElementById('js_chk').src="./img/js_on.gif";
}

//
function google_map(){
    document.getElementById('map').innerHTML = '<iframe width="600" height="400" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.jp/maps?f=q&amp;source=s_q&amp;hl=ja&amp;geocode=&amp;q=%E5%B1%B1%E6%A2%A8%E7%9C%8C%E5%AF%8C%E5%A3%AB%E5%90%89%E7%94%B0%E5%B8%82%E6%96%B0%E5%B1%8B+%E5%B0%8F%E4%BF%A3%E3%83%A2%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%B9&amp;aq=0&amp;sll=35.469006,138.803887&amp;sspn=0.00935,0.021007&amp;brcurrent=3,0x601961485f4b9a4f:0x77ad3ed1e788d3fd,0&amp;ie=UTF8&amp;hq=%E5%B0%8F%E4%BF%A3%E3%83%A2%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%B9&amp;hnear=%E5%B1%B1%E6%A2%A8%E7%9C%8C%E5%AF%8C%E5%A3%AB%E5%90%89%E7%94%B0%E5%B8%82%E6%96%B0%E5%B1%8B&amp;cid=4181605578132295083&amp;ll=35.469478,138.80024&amp;spn=0.048932,0.102997&amp;z=13&amp;output=embed&amp;iwloc=B"></iframe><br /><small><a href="http://maps.google.co.jp/maps?f=q&amp;source=embed&amp;hl=ja&amp;geocode=&amp;q=%E5%B1%B1%E6%A2%A8%E7%9C%8C%E5%AF%8C%E5%A3%AB%E5%90%89%E7%94%B0%E5%B8%82%E6%96%B0%E5%B1%8B+%E5%B0%8F%E4%BF%A3%E3%83%A2%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%B9&amp;aq=0&amp;sll=35.469006,138.803887&amp;sspn=0.00935,0.021007&amp;brcurrent=3,0x601961485f4b9a4f:0x77ad3ed1e788d3fd,0&amp;ie=UTF8&amp;hq=%E5%B0%8F%E4%BF%A3%E3%83%A2%E3%83%BC%E3%82%BF%E3%83%BC%E3%82%B9&amp;hnear=%E5%B1%B1%E6%A2%A8%E7%9C%8C%E5%AF%8C%E5%A3%AB%E5%90%89%E7%94%B0%E5%B8%82%E6%96%B0%E5%B1%8B&amp;cid=4181605578132295083&amp;ll=35.469478,138.80024&amp;spn=0.048932,0.102997&amp;z=13" style="color:#0000FF;text-align:left">大きな地図で見る</a></small><br />';
}

//
function change_img(ado){
	document.getElementById('large_img').src=ado;
}

function contact_form_open(){
	window.open("./contact_form.php", "contact_form", "width=640,height=480");
}


function mail_form_chk(){
	var flag = 0;
	if(document.getElementById("mail_form").mail_addr.value != document.getElementById("mail_form").mail_addr_2.value){
		flag = 1;
		window.alert('メールアドレスを確認してください');
		return false;
	}
	if(document.getElementById("mail_form").text.value == ""){
		flag = 1;
		window.alert('テキスト入力を確認してください');
		return false;
	}
	return true; // 送信を実行
}
