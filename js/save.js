function beforeSubmit(form){
	if(form.startmoney.value==''||form.startmoney.value<=0||form.startmoney.value>=1000000000){
		alert('输入金额非法！');
		form.startmoney.focus();
		return false;
	}
	return true;
}