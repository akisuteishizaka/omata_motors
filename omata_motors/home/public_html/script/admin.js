function check(){
	var flag = 0;
	if(document.getElementById("inc_form").name.value == ""){
		flag = 1;
	}else if(document.getElementById("inc_form").color.value == ""){
		flag = 1;
	}else if(document.getElementById("inc_form").img_left.value == ""){
		flag = 1;
	}else if(document.getElementById("inc_form").img_right.value == ""){
		flag = 1;
	}else if(document.getElementById("inc_form").img_meter.value == ""){
		flag = 1;
	}

	if(flag){
		window.alert('車体左右、メーター写真、名前、色は必須項目です。');
		return false;
	}else{
		document.forms[0].button1.disabled = true;
		return true; // 送信を実行
	}
}

function button_check(){
	form.disabled = true;
}

function del_check(){
	if(window.confirm('指定IDの情報を削除します')){
		return true;
	}else{	
		return false;
	}
}
