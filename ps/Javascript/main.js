function themeSettingWithButton() {

	const userInterfaceThemeIcon= document.getElementById('userInterfaceThemeIcon');

	if(localStorage.getItem('themeValue'== null)){
		localStorage.setItem('themeValue',1);
	}				
	let localData_themeValue =localStorage.getItem('themeValue');
	if(localData_themeValue == 1){
		userInterfaceThemeIcon.innerHTML='Dark';
		document.body.classList.remove('userThemeDark');
	}else if(localData_themeValue == 0){
		userInterfaceThemeIcon.innerHTML='Light';
		document.body.classList.add('userThemeDark');
	}

	userInterfaceThemeIcon.onclick= function () {
		document.body.classList.toggle('userThemeDark');
		if(document.body.classList.contains('userThemeDark')){
			userInterfaceThemeIcon.innerHTML='Light';
			localStorage.setItem('themeValue',0);
		}else{
			userInterfaceThemeIcon.innerHTML='Dark';
			localStorage.setItem('themeValue',1);
		}
	}

}

function themeSettingWithoutButton() {

	let localData_themeValue =localStorage.getItem('themeValue');
	if(localData_themeValue == 1){
		document.body.classList.remove('userThemeDark');
	}else if(localData_themeValue == 0){
		document.body.classList.add('userThemeDark');
	}

}