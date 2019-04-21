
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="Content-Language" content="ru">
	<meta http-equiv="Cache-Control" content="no-cache, max-age=0, must-revalidate, no-store">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">
</head>

<style type="text/css">
	body { background:#faeede; font-size:9pt; font-weight:normal; font-family:Verdana; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px;}
	dl.tabs { border-bottom:1px solid #aaa; margin:4px 0px 0px 0px; padding:0px 0px 0px 2px; }
	dl.tabs dt { border:1px solid #f0f0f0; color:#aaa; cursor:pointer; display:inline; margin:0px 0px 0px 3px; padding:0px 5px 0px 5px; }
	dl.tabs dt.active { border-top:2px solid #aaa; border-right:1px solid #aaa; border-bottom:1px solid #f0f0f0; border-left:1px solid #aaa; color:#000; }
	dl.tabs dt.inactive { border:1px solid #aaa; color:#aaa; }
	dl.tabs dt.light { border:1px solid #aaa; color:#ff0000;}
</style>
<script>
function change(type)
{
	if (type==1)
	{
		top.chat_turn=1;
		document.getElementById('all').className = 'active';
		document.getElementById('system').className = 'inactive';
		document.getElementById('trade').className = 'inactive';
		top.frames['talk'].document.F1.text.value='';
		top.frames.ch.frames["chat"].document.getElementById('mes').style.display = 'block';
		top.frames.ch.frames["chat"].document.getElementById('mes1').style.display = 'none';
		top.frames.ch.frames["chat"].document.getElementById('mes2').style.display = 'none';
	}
	else if (type==2)
	{
		top.chat_turn=2;
		document.getElementById('system').className = 'active';
		document.getElementById('all').className = 'inactive';
		document.getElementById('trade').className = 'inactive';
		top.frames.ch.frames["chat"].document.getElementById('mes').style.display = 'none';	
		top.frames.ch.frames["chat"].document.getElementById('mes1').style.display = 'block';
		top.frames.ch.frames["chat"].document.getElementById('mes2').style.display = 'none';
	}
	else if (type==3)
	{
		top.chat_turn=3;
		document.getElementById('system').className = 'inactive';
		document.getElementById('all').className = 'inactive';
		document.getElementById('trade').className = 'active';
		top.frames['talk'].document.F1.text.value='';
		top.AddToTrade('trade');
		top.frames.ch.frames["chat"].document.getElementById('mes').style.display = 'none';	
		top.frames.ch.frames["chat"].document.getElementById('mes1').style.display = 'none';
		top.frames.ch.frames["chat"].document.getElementById('mes2').style.display = 'block';
	}
	top.scrl(0);
	top.talk.F1.text.focus();

}
</script>
<body topmargin=0 marginheight=0 leftmargin=0 rightmargin=0>
<dl id="tabs" class="tabs">
	<dt class="active" onclick="change(1);" id = "all">Общий Чат</dt>
	<dt class="inactive" onclick="change(2);" id = "system">Системные сообщения</dt>
	<dt class="inactive" onclick="change(3);" id = "trade">Торговля</dt>
</dl>
</body>
</html>