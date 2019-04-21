function errtrap(nick)
{
	if (window.opener) 
	{ 
		document.write('<IMG SRC=img/arrow3.gif ALT="Приватное сообщение" onclick="window.opener.top.AddToPrivate(\''+nick+'\')" style="cursor:pointer;">');
	}
}


function MoveHint(ev) 
{
    if (!ev) ev = window.event;
    var hint1 = document.getElementById('slot_info');
	if (hint1 && hint1.style.visibility == 'visible') 
	{
		SetPosition(ev);
	}
	return(true);
}


document.onmousemove=MoveHint;

function SetPosition(event)
{	
    if (!event) 
    {
		event = window.event;
	}
    var element=document.getElementById('slot_info');
	
    if (element && event) 
    {
		var x, y;
		var clientX = event.clientX;
		var clientY = event.clientY;
		
		var bodyHeight = document.documentElement.offsetHeight ? document.documentElement.offsetHeight : document.body.offsetHeight;
		if(window.innerHeight) 
		{
			bodyHeight = window.innerHeight;
		}
		var bodyWidth = document.documentElement.offsetWidth ? document.documentElement.offsetWidth : document.body.offsetWidth;
		if(window.innerWidth) 
		{
			bodyWidth = window.innerWidth;
		}

		var _scrollX = window.scrollX ? window.scrollX : (document.documentElement.scrollLeft ? document.documentElement.scrollLeft : document.body.scrollLeft);
		var _scrollY = window.scrollY ? window.scrollY : (document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop);
		
		if(clientX + element.clientWidth + 20 >= bodyWidth) 
		{
			x = _scrollX + clientX - element.clientWidth - 10
		} else 
		{
			x = clientX + _scrollX + 10;
		}
		
		if(clientY + element.clientHeight + 20 >= bodyHeight) 
		{
			y = _scrollY + bodyHeight - element.clientHeight - 20;
		} 
		else 
		{
			y = clientY + _scrollY + 20;
		}
		  
		  
		element.style.left = x;
		element.style.top = y;
    }
}

function slot_view(text)
{
	var s;
	s='<table cellspacing=0 cellpadding=0 border=0 width=300>'+
		'<tr>'+
			'<td align=right valign=bottom><img src="img/design/border-1x1.gif" width=10 height=10 border=0 hspace=0 vspace=0></td>'+
			'<td style="background:url(img/design/border-h.gif) repeat-x bottom left"></td>'+
			'<td align=left valign=bottom><img src="img/design/border-3x1.gif" width=10 height=10 border=0 hspace=0 vspace=0></td>'+
		'</tr>'+
		'<tr>'+
			'<td style="background:url(img/design/border-v.gif) repeat-y top right"></td>'+
			'<td style="padding: 3px; width:100%;" class="l1"><font style="font-size: 9pt;">'+text+'</font></td>'+
			'<td style="background:url(img/design/border-v.gif) repeat-y top left"></td>'+
		'</tr>'+
		'<tr>'+
			'<td align=right valign=top><img src="img/design/border-1x3.gif" width=10 height=10 border=0 hspace=0 vspace=0></td>'+
			'<td style="background:url(img/design/border-h.gif) repeat-x top left"></td>'+
			'<td align=left valign=top><img src="img/design/border-3x3.gif" width=10 height=10 border=0 hspace=0 vspace=0></td>'+
		'</tr>'+
		'</table>';
	var element=document.getElementById('slot_info');
	element.innerHTML=s;	
	SetPosition();
	element.style.visibility='visible';
}
function slot_view1(text)
{
	var s;
	s='<table width="300" cellpadding="2" cellspacing="2" class="l1" style="border:1px solid #CEBBAA; z-index:900; padding:0px;" >';
	s+='<tr><td><FONT STYLE="FONT-SIZE: 8pt;" color="#000000">'+text+'</FONT></td></tr>';
	s+='</table>';
	var element=document.getElementById('slot_info');
	element.innerHTML=s;	
	SetPosition();
	element.style.visibility='visible';
}

function slot_hide()
{ 
	var element=document.getElementById('slot_info');
	element.style.visibility='hidden'; 
}	

function view_item (img,w,h,hint,style,item_id,magic_id) 
{
	var s="";
	if (magic_id>0)s="<a href='battle.php?use_spell="+magic_id+"'>";
	else if (item_id)s="<a href='thing.php?item_id="+item_id+"' target=_blank>";
	document.write(s+"<img src='img/"+img+"' "+style+" border=0 width='"+w+"' height='"+h+"' onmouseover=\"slot_view('"+hint+"');\" onmouseout=\"slot_hide();\"></a>");
}
function view_item_inv (img,w,h,hint,item_id) 
{
	var s="";
	if (item_id)s="<a href='main.php?act=unwear&item_id="+item_id+"'>";
	document.write(s+"<img src='img/"+img+"' border=0 width='"+w+"' height='"+h+"' onmouseover=\"slot_view('"+hint+"');\" onmouseout=\"slot_hide();\"></a>");
}

function DrawGift(name, title, text, from)
{
  var s = ('<IMG SRC="img/'+name+'" onmouseover="slot_view(\'');
  s+="<b><center>"+title+"</center></b><br>";
  if (text)s+=text+"<br>";
  s += "<div align=right>"+from + '</div>\');" onmouseout="slot_hide();">';
  document.writeln(s);
}

function city_view(text)
{
	var s;
	s='<table width=200 cellpadding=2 cellspacing=2 bgcolor="#E4F2DF" style="border: 1px solid #A0C3FC;opacity: 0.90;	filter: alpha(opacity:90);" >';
	s+='<tr><td align=center ><FONT STYLE="FONT-SIZE: 10pt;">'+text+'</FONT></td></tr>';
	s+='</table>';
	var element=document.getElementById('city_info');
	element.innerHTML=s;
	
	x = window.event.clientX + document.body.scrollLeft- element.offsetWidth + 10;
	y = event.clientY + document.body.scrollTop + 10;

    element.style.left = x + 'px';
    element.style.top = y + 'px';
	element.style.visibility='visible';
}

function city_hide()
{ 
	var element=document.getElementById('city_info');
	element.style.visibility='hidden'; 
}	