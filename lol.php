<?
session_start();
if ($_GET["act"]=="exit")
{
	if ($_SESSION["session_user_id"]!="")
	{
		session_destroy();
	}
}
include "conf.php";
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');
mysql_query ("SET NAMES 'cp1251'"); 
mysql_query ("set character_set_client='cp1251'"); 
mysql_query ("set character_set_results='cp1251'"); 
mysql_query ("set collation_connection='cp1251_general_ci'"); 


//Высчитываем кол-во страниц с новостями. 6 новостей на страницу...
$res = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS num FROM newsn"));

$all_news_count = $res["num"];
$pages_count = $all_news_count / 6;
$pages_count = ceil($pages_count);
$pages_array = array();

//Для каждой страницы выбираем ID первой новости на странице.. (ничего умнее не придумал)
$pages_array[0] = $all_news_count;
for($i=1; $i<$pages_count; $i++)
{
	$pages_array[$i] = $pages_array[$i-1] - 6;
}

//Номер страницы.
if(empty($page)) {$page = 0;}

//Ну... поехали.. вы таскиваем все новости тока для нужной страницы

//ID новостей которые мы покажем
$start_id = $pages_array[$page];
$end_id = $start_id - 6;

//print "$start_id <br> $end_id";

$news = mysql_query("SELECT * FROM newsn WHERE id<=$start_id AND id>$end_id ORDER BY id DESC");
$news_array = array();
$news_count=0;

//Погнали заполнять массив...
while($data = mysql_fetch_array($news))
{
	$news_array[$news_count] = $data;
	$news_count++;
}
?>
<html>
<head>
<meta name="Keywords" content="игра, играть, игрушки, онлайн, диалоговый, интернет, Интернет, РПГ, RPG, фантазия, фэнтези, меч, топор, магия, кулак, удар, блок, атака, защита, королевство грез, королевство грёз, бой, битва, отдых, обучение, развлечение, виртуальная реальность, рыцарь, маг, знакомства, чат, лучший, форум, свет, тьма, bk, БК, игры, банк, магазин, клан">
<meta name="Description" content="Отличная RPG онлайн игра посвященная боям и магии. Красивый дизайн, приятная атмосфера, захватывающее развитие Персонажа, активное противостояние Света и Тьмы.">
<TITLE>Королевство Грёз - Онлайн Игра</TITLE>
<meta name="verify-v1" content="keHxnD3S3FlJazHr4HnKJ8ESZFHIAxM5ccAilL6iJLY=" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<style type="text/css">
  .newshead{ font-size: 12px; font-style: normal; height: 15px; font-family: Tahoma; }   
  .newsbody{ font-size: 12px; font-style: normal; height: 15px; font-family: Tahoma; } 
  .butstyle1 { padding-right: 25px }  
  .center a{
	padding:2px 5px;
	font-size: 12px; font-style: normal; height: 15px; font-family: Tahoma; 
	background:#635854;
	border:1px solid #c7c7c7;
	color:#FFFFFF;
	text-decoration:none;
	margin:0 1px;
}

	.news A:link {color: black}
	.news A:visited {color: black}
	.news A:active {color: black}
	.news A:hover {text-decoration: underline overline; color: black;}

 .center a:hover{
 background:#d5d1bd;
 border:1px solid #666;
}
 .center.active{
 background:#666;
 border:1px solid #666;
 color:#fff;
}
</style>
<SCRIPT LANGUAGE="JavaScript">
if (document.images)
{
   Bimage0_normal        = new Image();
   Bimage0_normal.src    = "img/first/but_reg1.jpg";
   Bimage0_over          = new Image();
   Bimage0_over.src      = "img/first/but_reg2.jpg";
   Bimage1_normal        = new Image();
   Bimage1_normal.src    = "img/first/but_f1.jpg";
   Bimage1_over          = new Image();
   Bimage1_over.src      = "img/first/but_f2.jpg";
   Bimage2_normal        = new Image();
   Bimage2_normal.src    = "img/first/but_b1.jpg";
   Bimage2_over          = new Image();
   Bimage2_over.src      = "img/first/but_b2.jpg";
   Bimage3_normal        = new Image();
   Bimage3_normal.src    = "img/first/but_z1.jpg";
   Bimage3_over          = new Image();
   Bimage3_over.src      = "img/first/but_z2.jpg";
   Bimage4_normal        = new Image();
   Bimage4_normal.src    = "img/first/but_top1.jpg";
   Bimage4_over          = new Image();
   Bimage4_over.src      = "img/first/but_top2.jpg";
   Bimage5_normal        = new Image();
   Bimage5_normal.src    = "img/first/but_clan1.jpg";
   Bimage5_over          = new Image();
   Bimage5_over.src      = "img/first/but_clan2.jpg";
   Bimage6_normal        = new Image();
   Bimage6_normal.src    = "img/first/but_psw1.jpg";
   Bimage6_over          = new Image();
   Bimage6_over.src      = "img/first/but_psw2.jpg";
   Bimage7_normal        = new Image();
   Bimage7_normal.src    = "img/first/soft1.jpg";
   Bimage7_over          = new Image();
   Bimage7_over.src      = "img/first/soft2.jpg";
}

function switchimages(sName,nEvent) {
if (document.images)
 {
  if (nEvent == 0) sVal = 'normal';
  else if (nEvent == 1) sVal = 'over';
  else if (nEvent == 2) sVal = 'click';
  else return;
  sObj = eval(sName + '_' + sVal + ".src");
  if (document.images[sName])
  document.images[sName].src = sObj;
 }
}
</SCRIPT>
</head>
<body bgcolor="#FFF1C5" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">

<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" id="Table_01">
	<tr>
		<td background="img/first/my-1_02.jpg" style="background-repeat: repeat-x;" >&nbsp;
			
		</td>
		<td width="894" height="255">
			<table  border="0" cellspacing="0" cellpadding="0">
				<tr>
					<td rowspan="2" width="274" height="255">
						<embed height="255" width="274" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="always" name="Sound" wmode="transparent" scale="noscale" quality="high" src="/img/first/kdreams1.swf"/></td>
					<td width="109" height="169">
						<img src="img/first/my-1_04.jpg" width="109" height="169" alt=""></td>
					<td width="163" height="169" >
					
							<div style="position:relative;">
							<div><img src="img/first/my-1_122.png" width="163" height="169" alt=""></div>
							</DIV>
										</td>
					<td colspan="2" width="118" height="169">
						<img src="img/first/my-1_06.jpg" alt="" width="118" height="169" border="0"></td>
						<td rowspan="2"  width="229" height="255">
						<embed height="255" width="229" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="always" name="Sound" wmode="transparent" scale="noscale" quality="high" src="/img/first/kdreams3.swf"/></td>
				</tr>
				<tr>
					<td colspan="4" width="390" height="86">
						<embed height="86" width="390" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" allowscriptaccess="always" name="Sound" wmode="transparent" scale="noscale" quality="high" src="/img/first/my-1_10.jpg"/></td>
				</tr>
			</table>
		</td>
		<td background="img/first/my-1_08.jpg" style="background-repeat: repeat-x;">&nbsp;
			
		</td>
	</tr>
	<tr>
		<td background="img/first/my12_22.png"  style="background-repeat: repeat;">&nbsp;
			
		</td width="894">
		<td>
			
				<table  border="0" cellspacing="0" cellpadding="0">
				<tr valign="top">
					<td rowspan="2" background="img/first/my-1_20.png" width="274" align="right">
						<table border=0 cellspacing=0 cellpadding=0 background="img/first/left_b.jpg" width="274" height="256" border="0" align="top">
							<tr><td>
								<TABLE border=0 style="position:relative; left:117px;">
								<TR><TD align="center">
							
								<a href="reg1.php"  onMouseOver=" switchimages('Bimage0',1); return true" onMouseOut=" switchimages('Bimage0',0); return true">
								<img name="Bimage0" src="img/first/but_reg1.jpg" title="Регистрация персонажа" border="0"></a><br>
																<a href="/forum" target=_blank onMouseOver=" switchimages('Bimage1',1); return true" onMouseOut=" switchimages('Bimage1',0); return true">
								<img name="Bimage1" src="img/first/but_f1.jpg" title="Форум" border="0"></a><br>
								<a href="lib/helper.html"  target=_blank onMouseOver=" switchimages('Bimage2',1); return true" onMouseOut=" switchimages('Bimage2',0); return true">
								<img name="Bimage2" src="img/first/but_b1.jpg" title="Библиотека" border="0"></a><br>
								<a href="lib/law.html" target=_blank onMouseOver=" switchimages('Bimage3',1); return true" onMouseOut=" switchimages('Bimage3',0); return true">
								<img name="Bimage3" src="img/first/but_z1.jpg" title="Законы Королевства" border="0"></a><br>
								<a href="/top.php?act=pers" target=_blank onMouseOver=" switchimages('Bimage4',1); return true" onMouseOut=" switchimages('Bimage4',0); return true">
								<img name="Bimage4" src="img/first/but_top1.jpg" title="Рейтинг персонажей" border="0"></a><br>
								<a href="/top.php?act=clan" target=_blank onMouseOver=" switchimages('Bimage5',1); return true" onMouseOut=" switchimages('Bimage5',0); return true">
								<img name="Bimage5" src="img/first/but_clan1.jpg" title="Кланы" border="0"></a><br>
								<a href="/lol.php" onMouseOver=" switchimages('Bimage6',1); return true" onMouseOut=" switchimages('Bimage6',0); return true">
								<img name="Bimage6" src="img/first/but_psw1.jpg" title="Забыли пароль?" border="0"></a><br>

								
								
								</TD></TR>
								
								</TABLE>
						</tr></td></table>
<table><tr><td></td></tr>	</table>


</td>

					<td width="357" background="img/first/my-1_13.png" height="43">
					

					</td>
					<td width="263" height="43">
						<a href='/index.php'><img src="img/first/my-1_14.png" alt="" width="263" height="43" border="0"></a></td>
				</tr>
				<tr valign="top">
					<td colspan="2" width="620" background="img/first/my-1_17.png" >
						
						<span class="news">
						<table align="left" width="565" height="500" cellspacing="2" cellpadding="2" border="0">
						 <tr><td>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe frameborder=0 src="<?=$sait?>/remind.php" width="80%" height="70%"> </iframe>
</td></tr>


					</table>	
						</span>
					</td>
				</tr>
				</tr>
					<td colspan="3" background="img/first/my-1_25.png" width="894" height="33" >
					<table align="left">
						<tr>
						<td width="130"><br></td>
						<td>
												<!--Rating@Mail.ru COUNTER--><script language="JavaScript" type="text/javascript"><!--
d=document;var a='';a+=';r='+escape(d.referrer)
js=10//--></script><script language="JavaScript1.1" type="text/javascript"><!--
a+=';j='+navigator.javaEnabled()
js=11//--></script><script language="JavaScript1.2" type="text/javascript"><!--
s=screen;a+=';s='+s.width+'*'+s.height
a+=';d='+(s.colorDepth?s.colorDepth:s.pixelDepth)
js=12//--></script><script language="JavaScript1.3" type="text/javascript"><!--
js=13//--></script><script language="JavaScript" type="text/javascript"><!--
d.write('<a href="http://top.mail.ru/jump?from=1091379"'+
' target="_top"><img src="http://d7.ca.b0.a1.top.mail.ru/counter'+
'?id=1091379;t=83;js='+js+a+';rand='+Math.random()+
'" alt="Рейтинг@Mail.ru"'+' border="0" height="18" width="88"/><\/a>')
if(11<js)d.write('<'+'!-- ')//--></script><noscript><a
target="_top" href="http://top.mail.ru/jump?from=1091379"><img
src="http://d7.ca.b0.a1.top.mail.ru/counter?js=na;id=1091379;t=83"
border="0" height="18" width="88"
alt="Рейтинг@Mail.ru"/></a></noscript><script language="JavaScript" type="text/javascript"><!--
if(11<js)d.write('--'+'>')//--></script><!--/COUNTER-->
						</td>
						</tr>
						
						</table>
						
						</td>
				</tr>
			</table>
			
		</td>
		<td background="img/first/my-1_15.png"  style="background-repeat: repeat;">&nbsp;
			
		</td>		

	</tr>
		<tr>
		<td height="12" colspan="3"  background="img/first/my-1_26.png" style="background-repeat: repeat-x;"> </td>
	</tr>




</table>


</body>
</html>