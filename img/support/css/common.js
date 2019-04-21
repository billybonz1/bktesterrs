function ismaxlength(obj){
var mlength=obj.getAttribute? parseInt(obj.getAttribute("maxlength")) : ""
if (obj.getAttribute && obj.value.length>mlength)
obj.value=obj.value.substring(0,mlength)
}

function setCurrentLang(langCode){
	var date = new Date();
	date.setTime(date.getTime()+(365*24*60*60*1000)); // 365 days
	var expires = "; expires="+date.toGMTString();

	document.cookie = "spLang="+langCode+expires+"; path=/";
	
	window.location.reload();
}

function setFilter(filterID){
	document.cookie="spFilter="+ filterID +"; path=/";
	document.location.reload();
}

function setCatFilter(obj){
	document.cookie="spCatFilter="+ obj.value +"; path=/";
	document.location.reload();
	//showCatFilter();
}

function checkForm(formID){
	
	var categoryId = formID.message_type.value;
	
	if(categoryId > 1000){
		alert(l.selectCategory);
		return false;
	}
	
	return confirm(l.confirmCategory + topicNames[categoryId]);
	
	//return true;
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
}

msg = new function(){
	
	this.moveDlg = function(){
		document.getElementById('changeCategoryDlg').style.display = '';
		document.getElementById('changeCategoryBtn').style.display = 'none';
	};

	this.moveCancel = function(){
		document.getElementById('changeCategoryDlg').style.display = 'none';
		document.getElementById('changeCategoryBtn').style.display = '';
	};

	this.closeDlg = function(){
		document.getElementById('closeTopicDlg').style.display = '';
		document.getElementById('closeTopicBtn').style.display = 'none';
	};

	this.closeCancel = function(){
		document.getElementById('closeTopicDlg').style.display = 'none';
		document.getElementById('closeTopicBtn').style.display = '';
	};

	
	this.moveDo = function(f){
		if(checkForm(f)){
			return true;
		}
		return false;
	}
	
	this.Do = function(f){
		return true;
	}

}

//showCatFilter();