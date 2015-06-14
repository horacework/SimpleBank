function beforeSubmit(form){
	if(form.cardNum.value.length != 8){
		alert('卡号需为8位，请重新输入！');
		form.cardNum.focus();
		return false;
	}
	if(form.password1.value.length!=6){
		alert('密码需为6位，请重新输入！');
		form.password1.focus();
		return false;
	}
	if(form.password1.value!=form.password2.value) {
		alert('你两次输入的密码不一致，请重新输入！');
		form.password2.focus();
		return false;
	}
	if(form.startmoney.value==''){
		alert('初始金额不能为空！');
		form.startmoney.focus();
		return false;
	}
	if(form.username.value==''){
		alert('用户名不能为空！');
		form.username.focus();
		return false;
	}
	return true;
}