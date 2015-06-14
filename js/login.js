function beforeSubmit(form){
	if(form.cardNum.value.length != 8){
		alert('卡号需为8位，请重新输入！');
		form.cardNum.focus();
		return false;
	}
	if(form.password.value.length!=6){
		alert('密码需为6位，请重新输入！');
		form.password.focus();
		return false;
	}
	return true;
}