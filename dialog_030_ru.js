
function closehint(){
	document.getElementById('hint4').style.visibility='hidden';
    Hint3Name='';
}
function findlogin(title, name, mtype, addon) {
var s = '';
s='<form method=post name=slform><table width="100%" cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
	'Укажите логин персонажа:<small><br />(можно щелкнуть по логину в чате)</small></td></tr><tr><td width="50%" align="right" style="padding-left:5"><input style="width: 100%" type="text" name="'+name+'" onClick="top.game.changeni('+ name +');" id='+ name +'></td><TD width=50%><input type=image SRC="#IMGSRC#" width="27" height="20" onClick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);">'+(addon?addon:'')+'</td></tr></table></form>';

s = crtmagic(mtype, title, s);
document.getElementById('hint4').innerHTML = s;
top.game.changeni(name);
document.getElementById('hint4').style.visibility = 'visible';
document.getElementById('hint4').style.left = '100px';
document.getElementById('hint4').style.top = '50px';
document.getElementById(name).focus();
Hint3Name = name;
}
function save_complect(title, name, mtype, addon) {
var s = '';
s='<form method=post name=slform><table width="100%" cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
	'Введите название комплекта:</td></tr><tr><td width="50%" align="right" style="padding-left:5"><input style="width: 100%" type="text" name="'+name+'"  id='+ name +'></td><TD width=50%><input type=image SRC="#IMGSRC#" width="27" height="20" onClick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);">'+(addon?addon:'')+'</td></tr></table></form>';

s = crtmagic(mtype, title, s);
document.getElementById('hint4').innerHTML = s;
document.getElementById('hint4').style.visibility = 'visible';
document.getElementById('hint4').style.left = '100px';
document.getElementById('hint4').style.top = '50px';
document.getElementById(name).focus();
Hint3Name = name;
}
function dconfirm(title, script, text, mtype) {
	var s;

	s='<form action="'+script+'" method=POST name=slform><table border=0 width=100% cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
	text+'</TD></TR><TR><TD width=50% align=left><INPUT TYPE="button" name="tmpname423" value="Да" style="width:70%" onclick="if (!top.game.is_qlaunch) { slform.submit(); } else { top.game.QLaunchQuery(slform.use.value); closehint(); } "></TD><TD width=50% align=right><INPUT type=button style="width:70%" value="Нет" onclick="closehint();"></TD></TR></FORM></TABLE>';

	s = crtmagic(mtype, title, s);
	document.getElementById("hint4").innerHTML = s;

	document.getElementById("hint4").style.visibility = 'visible';
	document.getElementById("hint4").style.left = '100px';
	document.getElementById("hint4").style.top = '50px';
	document.getElementById("hint4").focus();
	Hint3Name = name;
}
function useMagick(title, name, mtype, url) { 
var s = '';
s='<form method=post name=slform action="'+url+'"><table width="100%" cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
	'Укажите логин персонажа:<small><br />(можно щелкнуть по логину в чате)</small></td></tr><tr><td width="50%" align="right" style="padding-left:5"><input style="width: 100%" type="text" name="'+name+'" onClick="top.game.changeni('+ name +');" id='+ name +'></td><TD width=50%><input type=image SRC="#IMGSRC#" width="27" height="20" onClick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);"></td></tr></table></form>';

s = crtmagic(mtype, title, s);
document.getElementById('hint4').innerHTML = s;
top.game.changeni(name);
document.getElementById('hint4').style.visibility = 'visible';
document.getElementById('hint4').style.left = '100px';
document.getElementById('hint4').style.top = '50px';
document.getElementById(name).focus();
Hint3Name = name;
}
function useSharp(title, name, mtype, url) { 
var s = '';
s='<form method=post name=slform action="'+url+'"><table width="100%" cellspacing="0" cellpadding="2"><tr><td colspan=2>'+
	'Введите название предмета:</td></tr><tr><td width="50%" align="right" style="padding-left:5"><input style="width: 100%" type="text" name="'+name+'" onClick="top.game.changeni('+ name +');" id='+ name +'></td><TD width=50%><input type=image SRC="#IMGSRC#" width="27" height="20" onClick="slform.'+name+'.value=fixspaces(slform.'+name+'.value);"></td></tr></table></form>';

s = crtmagic(mtype, title, s);
document.getElementById('hint4').innerHTML = s;
top.game.changeni(name);
document.getElementById('hint4').style.visibility = 'visible';
document.getElementById('hint4').style.left = '100px';
document.getElementById('hint4').style.top = '50px';
document.getElementById(name).focus();
Hint3Name = name;
}
function foundmagictype (mtypes) {
	if (mtypes) {
		mtypes=mtypes+"";
		if (mtypes.indexOf(',') == -1) return parseInt(mtypes);
		var s=mtypes.split(',');
		var found=0;
		var doubl=0;
		var maxfound=0;

		for (i=0; i < s.length; i++) {
			var k=parseInt(s[i]);
			if (k > maxfound) {
				found=i + 1;
				maxfound=k;
				doubl=0;
			} else {
				if (k == maxfound) {doubl=1;}
			}
		}
		if (doubl) {return 0};

		return found;
	}
	return 0;
}

function crtmagic(mtype, title, body, subm) {
	
	mtype=foundmagictype(mtype);

var names=new Array(
'neitral',17, 6, 14, 17, 14, 7,0,0, 3,
'fire', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'water', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'air', 57, 30, 33, 20, 21, 14, 11, 12, 0,
'earth', 57,30, 33, 20, 21, 14, 11, 12, 0,
'white', 51, 25, 46, 44, 44, 10, 5, 5, 0,
'gray', 51, 25, 46, 44, 44, 10, 5, 5, 0,
'black', 51, 25, 46, 44, 44, 10, 5, 5, 0);
var colors=new Array('B1A993','DDD5BF', 'ACA396','D3CEC8', '96B0C6', 'BDCDDB', 'AEC0C9', 'CFE1EA', 'AAA291', 'D5CDBC', 'BCBBB6', 'EFEEE9', '969592', 'DADADA', '72726B', 'A6A6A0');

while (body.indexOf('#IMGSRC#')>=0) body = body.replace('#IMGSRC#', '/i/misc/dmagic/'+names[mtype*10]+'_30.gif');
var s='<table width="270" border="0" align="center" cellpadding="0" cellspacing="0">'+
	'<tr>'+
	'<td width="100%">'+
	'<table width="100%"  border="0" cellspacing="0" cellpadding="0">'+
	'<tr><td>'+
		'<table width="100%" border="0" cellpadding="0" cellspacing="0">'+
		'<tr>'+
		'<td width="'+names[mtype*10+1]+'" align="left"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_03.gif" width="'+names[mtype*10+1]+'" height="'+names[mtype*10+2]+'"></td>'+
		'<td width="100%" align="right" background="/i/misc/dmagic/b'+names[mtype*10]+'_05.gif"></td>'+
		'<td width="'+names[mtype*10+3]+'" align="right"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_07.gif" width="'+names[mtype*10+3]+'" height="'+names[mtype*10+2]+'"></td>'+
		'</tr>'+
		'</table></td>'+
	'</tr>'+
	'<tr><td>'+
		'<table width="100%" border="0" cellspacing="0" cellpadding="0">'+
		'<tr>'+
			(names[mtype*10+7]?'<td width="'+names[mtype*10+7]+'"><SPAN style="width:'+names[mtype*10+7]+'">&nbsp;</SPAN></td>':'')+
			'<td width="5" background="/i/misc/dmagic/b'+names[mtype*10]+'_17.gif">&nbsp;</td>'+
			'<td width="100%">'+
			'<table width="100%" border="0" cellspacing="0" cellpadding="0">'+
			'<tr><td bgcolor="#'+colors[mtype*2]+'"'+(names[mtype*10+9]?' style="padding-top: '+names[mtype*10+9]+'"':'')+' >'+
			'<table border=0 width=100% cellspacing="0" cellpadding="0"><td style="padding-left: 20" align=center><B>'+title+
			'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint();"><img src="/i/clear.gif" width=13 height=13 alt="">&nbsp;</td></table>'+
			'</td></tr>'+
			'<tr>'+
				'<td align="center" bgcolor="#'+colors[mtype*2+1]+'">'+body+
			'</tr>'+
			'</table></td>'+
			'<td width="5" background="/i/misc/dmagic/b'+names[mtype*10]+'_19.gif">&nbsp;</td>'+
			(names[mtype*10+8]?'<td width="'+names[mtype*10+8]+'"><SPAN style="width:'+names[mtype*10+8]+'">&nbsp;</SPAN></td></td>':'')+
			'</tr>'+
		'</table></td>'+
	'</tr>'+
	'<tr><td>'+
		'<table width="100%"  border="0" cellpadding="0" cellspacing="0">'+
		'<tr>'+
			'<td width="'+names[mtype*10+4]+'" align="left"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_27.gif" width="'+names[mtype*10+4]+'" height="'+names[mtype*10+6]+'"></td>'+
			'<td width="100%" align="right" background="/i/misc/dmagic/b'+names[mtype*10]+'_29.gif"></td>'+
			'<td width="'+names[mtype*10+5]+'" align="right"><img src="/i/misc/dmagic/b'+names[mtype*10]+'_31.gif" width="'+names[mtype*10+5]+'" height="'+names[mtype*10+6]+'"></td>'+
		'</tr>'+
		'</table></td>'+
	'</tr>'+
	'</table></td>'+
'</tr>'+
'</table>';

	return s;
}
