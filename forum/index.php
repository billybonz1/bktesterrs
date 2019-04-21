<link rel="icon" href="/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
<?
session_start();
include"../conf.php";
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');
mysql_query ("SET NAMES 'cp1251'"); 
mysql_query ("set character_set_client='cp1251'");   
mysql_query ("set character_set_results='cp1251'");   
mysql_query ("set collation_connection='cp1251_general_ci'"); 
$login=$_SESSION['login'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Форум - OLD-BK.COM | Воинственный мир </title>
<style type="text/css">
<!--
<style>
body {
	background-color: #3d3d3b;
	margin-left: 0px;
	margin-top: 0px;
	margin-bottom: 0px;
	margin-right: 0px;
}
.style1 {
	color: #990000;
	font-weight: bold;
}
.style8 {
	color:#990000;
	font-size: 10pt;
	font-family: Verdana, Arial, Tahoma, Sans-serif, Helvetica;
}
.style14 {color: #CC0000}
.style6 {color: #DFD3A3; font-size: 9px}
SELECT {
	BORDER-RIGHT: #b0b0b0 1pt solid; BORDER-TOP: #b0b0b0 1pt solid; MARGIN-TOP: 1px; FONT-SIZE: 10px; MARGIN-BOTTOM: 2px; BORDER-LEFT: #b0b0b0 1pt solid; COLOR: #191970; BORDER-BOTTOM: #b0b0b0 1pt solid; FONT-FAMILY: MS Sans Serif
}
TEXTAREA {
	BORDER-RIGHT: #b0b0b0 1pt solid; BORDER-TOP: #b0b0b0 1pt solid; MARGIN-TOP: 1px; FONT-SIZE: 10px; MARGIN-BOTTOM: 2px; BORDER-LEFT: #b0b0b0 1pt solid; COLOR: #191970; BORDER-BOTTOM: #b0b0b0 1pt solid; FONT-FAMILY: MS Sans Serif
}
INPUT {
	BORDER-RIGHT: #b0b0b0 1pt solid; BORDER-TOP: #b0b0b0 1pt solid; MARGIN-TOP: 1px; FONT-SIZE: 10px; MARGIN-BOTTOM: 2px; BORDER-LEFT: #b0b0b0 1pt solid; COLOR: #191970; BORDER-BOTTOM: #b0b0b0 1pt solid; FONT-FAMILY: MS Sans Serif
}
.inup {
	
	BORDER-RIGHT: #302F2A 1px double; BORDER-TOP: #302F2A 1px double; FONT-SIZE: 8pt; BORDER-LEFT: #302F2A 1px double; COLOR: #000000; BORDER-BOTTOM: #302F2A 1px double; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #DED7BD
}
.btn {
	BORDER-RIGHT: #817a63 1px double; BORDER-TOP: #817a63 1px double; FONT-SIZE: 7.5pt; BORDER-LEFT: #817a63 1px double; COLOR: #dfddd3; BORDER-BOTTOM: #817a63 1px double; FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif; BACKGROUND-COLOR: #2b2b18
}
body,td,th {
	font-family: Verdana, Arial, Tahoma, Sans-serif, Helvetica;
	font-size: 10pt;
	color: #000000;
}
.style22 {
	font-size: 10px;
	color: #364875;
}
.style24 {font-size: x-small; color: #364875; }
.style25 {font-size: x-small}
.стиль2 {color: #8f0000; font-weight: bold; font-size: 16px; }
.style2 {
	color: #990000;
	font-weight: bold;
	font-size: 16px;
}
.page_select {
	text-decoration: underline;
}
.dmsg {
	color:#990000;
	font-weight: bold;
	padding: 5px;
	border: thin solid #FF0000;
}
.acom {
	color:#990000;
	font-weight: normal;
	padding: 3px;
	border: thin solid #CCCCCC;
	background-color: #ECE9D8;
}
.tops {
	color: #666666;
}
-->
</style>
<?
function info($name, $id, $level, $dealer, $align, $rang, $klan, $klanid)
{
	if ($align == 1) $al = "Стражи порядка";
	if ($align == 2) $al = "Вампиры";
	if ($align == 3) $al = "Орден Равновесия";
	if ($align == 4) $al = "Орден Света";
	if ($align == 5) $al = "Тюремный заключеный";
	if ($align == 6) $al = "Истинный Мрак";
	if ($align == 7) $al = "Исчадие Хаоса";
	if ($align == 100) $al = "Смертные";
	
	if ($align>0) $s.="<img src='/img/orden/".$align."/".$rang.".gif'  alt='".$al."' border='0' /></a> ";
	if ($dealer>0) $s.="<img src='/img/orden/dealer.gif' border=0 alt=\"Диллер игры\">";

	if ($klan) $s.="<a href='/clan_inf.php?clan=".$klan."' target='_blank'><img src='/img/clan/".$klan.".gif'  alt='Ханство ".$klanid."' border='0' /></A>";
	$s.="<b>".$name."</b>";
	if ($level!=-1) $s.=" [".$level."]";
	if ($id!=-1) $s.=" <a href='/info.php?log=".$name."' target='_blank'><img src='/img/index/h.gif' alt='Инф. о ".$name."' border='0' /></a>";

print"".$s."";
}
?>
</head>

<body bgcolor="#000000" topmargin=0 leftmargin=0 marginheight=0 marginwidth=0>
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<table width="100%" height="135" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="40%" background="../img/first/my-2_02.png" style="background-repeat: repeat-x;">&nbsp;</td>
    <td align="center"><img src='../img/first/my-2_03.png' /></td>
    <td width="40%" background="../img/first/my-2_04.png" style="background-repeat: repeat-x;">&nbsp;</td>
  </tr>
</table>

	</td>
  </tr>
  <tr>
    <td background="../images/31.gif" align="center" height="500" valign="top">
	
				<!--////////////////////////////////////////////////////-->
<?

$yy=mysql_query("SELECT forum_shut,login,id,level,dealer,orden,admin_level,clan_short,clan FROM `users` WHERE `login`='".$login."'");
$db = mysql_fetch_array($yy);
if($db['admin_level']>=10){$propusk=1;}
?>

<br />
<?
if(empty($login)){
print"<br /><font style='font-size:12px; color:red'>Вы не авторизованы.</font><br />";
}else{
?>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="right"><?
info($db['login'],$db['id'],$db['level'],$db['dealer'],$db['orden'],$db['admin_level'],$db['clan_short'],$db['clan']);
?></td>
  </tr>
</table>

<? } ?>

<?
$forumv = mysql_query('SELECT * FROM `forum_tema` order by date desc LIMIT 5');
?>
<table width="70%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	<table width="100%" border="1" cellspacing="0" cellpadding="0" bordercolor="#000000">
	<tr>
    <td bgcolor="#999999"><b style="font-size:12px; color:#003399">Последние обсуждения</b></td>
    <td bgcolor="#999999"><b style="font-size:12px; color:#003399">В форуме</b></td>
    <td bgcolor="#999999"><b style="font-size:12px; color:#003399">Автор</b></td>
  </tr>
<?
while($hhn = mysql_fetch_array($forumv)){
$fr=mysql_fetch_array(mysql_query("SELECT `tema` FROM `forum` WHERE `id`='".$hhn['id_forum']."'"));
$yys=mysql_query("SELECT login,id,level,dealer,orden,admin_level,clan_short,clan FROM `users` WHERE `login`='".$hhn['avtor']."'");
$dbs = mysql_fetch_array($yys);
?>
  <tr>
    <td align="left" bgcolor="#CCCCCC">&nbsp;<a href='?forum=<?=$hhn['id_forum']?>&tema=<?=$hhn['id']?>' style="color: #0066CC"><?=$hhn['tema']?></a></td>
    <td align="left" bgcolor="#CCCCCC">&nbsp;<a href='?forum=<?=$hhn['id_forum']?>' style="color: #006600"><?=$fr['tema']?></a></td>
    <td align="left" bgcolor="#CCCCCC">&nbsp;<?=info($dbs['login'],$dbs['id'],$dbs['level'],$dbs['dealer'],$dbs['orden'],$dbs['admin_level'],$dbs['clan_short'],$dbs['clan']);?></td>
  </tr>
<?
}
?>
</table>

	</td>
  </tr>
</table><br />

	
<?
if(!isset($_GET['forum'])){

if(isset($_POST['text']) and $_POST['text']!=''){
$date = date('d.m.Y H:i');
$rr=mysql_query("INSERT INTO `forum` (tema,opis)VALUES('".$_POST['tema']."','".$_POST['text']."')");

print"<font style='font-size:12px; color:red'><center>Ваш форум удачно добавлен.</center></font>";

}

?>	
	<table width="70%" border="1" cellspacing="0" cellpadding="0"  align="center" valign="top" bordercolor="#000000">
  <tr>
    <td height="25" align="center" bgcolor="#999999"> <font style="font-size:12px; color:#000000;"><b>Форум</b> OLD-BK.COM | Воинственный мир </font></td>
  </tr>
<?
if($propusk==1 and isset($_GET['dels'])){
mysql_query("DELETE FROM `forum` WHERE `id`='".(int)$_GET['dels']."'");
print"<font style='font-size:12px; color:red'><center>Этот форум был удален.</center></font>";
}
$fo = mysql_query("SELECT * FROM `forum`");
while($forum=mysql_fetch_array($fo)){
?>
  <tr>
    <td height="50" align="left" bgcolor="#CCCCCC">
	&nbsp;<a href="?forum=<?=$forum['id']?>"><font style="font-size:13px; color: #006600;"><b><?=$forum['tema']?></b></font></a> 
	<?
	if($propusk==1){
	print'&nbsp;<a href="?dels='.$forum["id"].'"><font style="font-size:13px; color:#990000;">Удалить</font></a> ';
	}
	?>
	
	<br />
	&nbsp;<font style="font-size:12px; color:#333333;"><?=$forum['opis']?></font>
	</td>
  </tr>
<?
}
?>
</table>

<? 
if($propusk==1){
?> 
<table bgcolor="#999999" width="70%" border="0" cellspacing="0" cellpadding="0" style=" border-bottom:2px solid #000000; border-left:2px solid #000000; border-right:2px solid #000000;" align="center">
  <tr>
    <td>
	<form id="POSTF" name="POSTF" method="post" action="">
          <table align="center" cellpadding="5" cellspacing="0" style="border-style: outset; border-width:0">
            <tr>
              <td colspan="2"><h4 id="response">Создать Форум</h4></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%">
			  <tr><td><input class="inup" name="tema" type="text" value="Тема" size="80" maxlength="255" /></td></tr>
                  <tr>
                    <td align="center">				
					<textarea class="inup" id="answer" rows="12" name="text" cols="84" wrap="virtual">Техт</textarea>
					</td>                   
                  </tr>
              </table></td>
            </tr>

            <tr>
              <td><small> Разрешается использование тегов форматирования текста:<br />
                    <font color="990000">&lt;b&gt;</font><b>жирный</b><font color="990000">&lt;/b&gt; &lt;i&gt;</font><i>наклонный</i><font color="990000">&lt;/i&gt; &lt;u&gt;</font><U>подчеркнутый</u><font color="990000">&lt;/u&gt;</font>,<br />
                а для выделения текста программ, используйте <font color="990000">&lt;code&gt; ... &lt;/code&gt;</font><br />
                и не забывайте закрывать теги! <font color="990000">&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/code&gt;</font> :) </small> </td>
              <td valign="top" align="left">
                <input type="submit" class="btn" value="Создать" onclick="this.disabled='disabled'; POSTF.submit();" name="add3" />
              </td>
            </tr>
          </table>
        </form>
			</td>
  </tr>
</table>
<?
}

}else if(isset($_GET['forum']) and !isset($_GET['tema'])){

/////////////создание темы
if(isset($_POST['text']) and $_POST['text']!=''){
$date = date('d.m.Y H:i');
$rr=mysql_query("INSERT INTO `forum_tema` (id_forum,tema,avtor,date,sost)VALUES('".(int)$_GET['forum']."','".$_POST['tema']."','".$login."','".$date."','1')");
$rr = mysql_insert_id();
$rr1=mysql_query("INSERT INTO `forum_otvet` (id_forum,id_tema,avtor,date,text)VALUES('".(int)$_GET['forum']."','".$rr."','".$login."','".$date."','".$_POST['text']."')");

print "<font style='font-size:12px; color:red'><center>Ваша тема удачно добавлена.</center></font>";

}
$foruma = mysql_fetch_array(mysql_query('SELECT `tema` FROM `forum` WHERE `id`="'.(int)$_GET['forum'].'"'));
?>

<table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="left"><a href="/forum"><font style="font-size:12px; color:#000000;"><b>Форум</b> OLD-BK.COM | Воинственный мир </font></a><b> » </b><font style="font-size:12px; color:#000000;"><?=$foruma['tema']?></font></td>
  </tr>
   <tr>
    <td align="center">&nbsp;
<?
print'Стр:';

$fg = mysql_query("SELECT * FROM `forum_tema` WHERE `id_forum`='".(int)$_GET['forum']."' order by date desc");
$l=0;
while($fh=mysql_fetch_array($fg)){

$n[$l] = $fh['id'];

$l++;
}

$ty = ceil($l/30);
for($h=1; $h<=$ty; $h++){
print" <a href='/forum/index.php?forum=".(int)$_GET['forum']."&str=$h'>".$h."</a>";
}

if(empty($_GET['str'])){$st=0;$stt=30;}else{$st=$_GET['str']*30-30;$stt=$_GET['str']*30;}
if($st<0){$st=0;}
if($stt>$l){$stt=$l;}

?>
</td>
  </tr>
</table>

<table width="70%" border="1" cellspacing="0" cellpadding="0" align="center" valign="top" bordercolor="#000000">
  <tr>
    <td width="60%" height="25" bgcolor="#999999">&nbsp;<b>Тема</b></td>
    <td width="20%" height="25" bgcolor="#999999">&nbsp;<b>Дата</b></td>
    <td width="20%" height="25" bgcolor="#999999">&nbsp;<b>Автор</b></td>
  </tr>
<?

if($propusk==1 and isset($_GET['deld'])and $_GET['deld']!=1){
mysql_query("DELETE FROM `forum_tema` WHERE `id`='".(int)$_GET['deld']."'");
$error = "<font style='font-size:12px; color:red'><center>Эта тема была удалена.</center></font>";
}
if($propusk==1 and isset($_GET['z'])){
$rra=mysql_query("UPDATE `forum_tema` SET `sost`='2' WHERE `id`='".(int)$_GET['z']."'");
}
if($propusk==1 and isset($_GET['a'])){
$rra=mysql_query("UPDATE `forum_tema` SET `sost`='1' WHERE `id`='".(int)$_GET['a']."'");
}

//////////////
for($p=$st; $p<$stt; $p++){
///////////////
$fos = mysql_query("SELECT * FROM `forum_tema` WHERE `id`='".(int)$n[$p]."' and `id_forum`='".(int)$_GET['forum']."'");
$forum_tema=mysql_fetch_array($fos);
//////////

$f=1; $g=0;
//while(){
$g++;
$yya=mysql_query("SELECT login,id,level,dealer,orden,admin_level,clan_short,clan FROM `users` WHERE `login`='".$forum_tema['avtor']."'");
$dba = mysql_fetch_array($yya);

if($f>2){$f=1;}

if($f==1){$nn = '#CCCCCC';}
if($f==2){$nn = '#B6B6B6';}
if($propusk==0){
if($forum_tema['sost']==1){
$title = '<img src="/forum/ico/a.gif" title="Открыта" />';
}else{
$title = '<img src="/forum/ico/z.gif" title="Закрыта" />';
}
}else{
if($forum_tema['sost']==1){
$title = '<a href="?forum='.(int)$_GET['forum'].'&z='.$forum_tema['id'].'"><img src="/forum/ico/a.gif" title="Открыта" border=0/></a>';
}else{
$title = '<a href="?forum='.(int)$_GET['forum'].'&a='.$forum_tema['id'].'"><img src="/forum/ico/z.gif" title="Закрыта" border=0/></a>';
}
}
?> 
  <tr>
    <td height="25" bgcolor="<?=$nn?>"><!--темы-->
<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="5%" style="border-right:1px solid #000000;" align="center"><?=$title?></td>
    <td width="95%" align="left">&nbsp;<a href="?forum=<?=(int)$_GET['forum']?>&tema=<?=$forum_tema['id']?>"><font style="font-size:12px; color: #0000CC;"><?=$forum_tema['tema']?></font></a>
	<?
	if($propusk==1){
	print'&nbsp;<a href="?forum='.(int)$_GET['forum'].'&deld='.$forum_tema['id'].'"><font style="font-size:13px; color:#990000;">Удалить</font></a> ';
	}
	?>
	</td>
  </tr>
</table>
</td>
    <td height="25" bgcolor="<?=$nn?>"><!--дата-->&nbsp;<b><?=$forum_tema['date']?></b></td>
    <td height="25" bgcolor="<?=$nn?>"><!--автор-->&nbsp;<b><?=info($dba['login'],$dba['id'],$dba['level'],$dba['dealer'],$dba['orden'],$dba['admin_level'],$dba['clan_short'],$dba['clan']);?></b></td>
  </tr>
<?
$f++;
}

?>
</table>
<table width="70%" border="0" cellspacing="0" cellpadding="0" bgcolor="#999999" style=" border-bottom:2px solid #000000; border-left:2px solid #000000; border-right:2px solid #000000;" align="center">
  <tr>
    <td>
<? 
if(!empty($login)){
if($db['forum_shut']=='0' or $db['forum_shut']<=time()){
if(isset($_POST['add'])){
?> 
<form id="POSTF" name="POSTF" method="post" action="">
          <table align="center" cellpadding="5" cellspacing="0" style="border-style: outset; border-width:0">
            <tr>
              <td colspan="2"><h4 id="response">Создать тему</h4></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%">
			  <tr><td><input class="inup" name="tema" type="text" value="Тема" size="80" maxlength="70" /></td></tr>
                  <tr>
                    <td align="center">				
					<textarea class="inup" id="answer" rows="12" name="text" cols="84" wrap="virtual">Техт</textarea>
					</td>                   
                  </tr>
              </table></td>
            </tr>

            <tr>
              <td><small> Разрешается использование тегов форматирования текста:<br />
                    <font color="990000">&lt;b&gt;</font><b>жирный</b><font color="990000">&lt;/b&gt; &lt;i&gt;</font><i>наклонный</i><font color="990000">&lt;/i&gt; &lt;u&gt;</font><U>подчеркнутый</u><font color="990000">&lt;/u&gt;</font>,<br />
                а для выделения текста программ, используйте <font color="990000">&lt;code&gt; ... &lt;/code&gt;</font><br />
                и не забывайте закрывать теги! <font color="990000">&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/code&gt;</font> :) </small> </td>
              <td valign="top" align="left">
                <input type="submit" class="btn" value="Создать" onclick="this.disabled='disabled'; POSTF.submit();" name="add3" />
              </td>
            </tr>
          </table>
        </form>
		<?
}else{
?>
<form id="POSTH" name="POSTH" action="" method="post">
	<center><input name="add" type="hidden" value="" /><input type="submit" class="btn" value="Создать" onclick="this.disabled='disabled'; POSTH.submit();" name="add" /></center></form>
<?	
}
}else{ print"<font style='font-size:12px; color:#990000;'><center>На вас наложена форумная молчанка!</center></font>";}
}else{
?>
<center>Вы не авторизованы!</center>
<?
}
?>
	</td>
  </tr>
</table>
<?
}else if(isset($_GET['forum']) and isset($_GET['tema'])){

$foruma = mysql_fetch_array(mysql_query('SELECT `tema` FROM `forum` WHERE `id`="'.(int)$_GET['forum'].'"'));
$forumas = mysql_fetch_array(mysql_query('SELECT `id`,`tema`,`date`,`sost` FROM `forum_tema` WHERE `id`="'.(int)$_GET['tema'].'" and `id_forum`="'.(int)$_GET['forum'].'"'));
?>
<table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
  <tr>
    <td align="left"><a href="/forum"><font style="font-size:12px; color:#000000;"><b>Форум</b> OLD-BK.COM | Воинственный мир </font></a> <b>» </b><a href="?forum=<?=(int)$_GET['forum']?>"><font style="font-size:12px; color:#000000;"><?=$foruma['tema']?></font></a> » </b><font style="font-size:12px; color:#000000;"><?=$forumas['tema']?></font></td>
  </tr>
   <tr>
    <td align="center"><?
if(isset($_GET['del'])){
mysql_query("DELETE FROM `forum_otvet` WHERE `id`='".(int)$_GET['del']."'");
print"<font style='font-size:12px; color:red'><center>Этот ответ был удален.</center></font><br />";
}
if(isset($_POST['text']) and $_POST['text']!=''){
$date = date('d.m.Y H:i');
$rr=mysql_query("INSERT INTO `forum_otvet` (id_forum,id_tema,avtor,date,text)VALUES('".(int)$_GET['forum']."','".(int)$_GET['tema']."','".$login."','".$date."','".$_POST['text']."')");
$tt=mysql_query("UPDATE `forum_tema` SET date='".$date."',avtor='".$login."' WHERE `id`='".$forumas['id']."'");


if($rr){
print"<font style='font-size:12px; color:red'><center>Ваш ответ удачно добавлен.</center></font><br />";
}else{
print"<font style='font-size:12px; color:red'><center>Ваш ответ не добавлен.</center></font><br />";
}
}
print'Стр:';

$fg2 = mysql_query("SELECT * FROM `forum_otvet` WHERE `id_tema`='".(int)$_GET['tema']."' and `id_forum`='".(int)$_GET['forum']."'");
$l2=0;
while($fh2=mysql_fetch_array($fg2)){

$n2[$l2] = $fh2['id'];

$l2++;
}

$ty2 = ceil($l2/10);
for($h2=1; $h2<=$ty2; $h2++){
print" <a href='/forum/index.php?forum=".(int)$_GET['forum']."&&tema=".(int)$_GET['tema']."&str=$h2'>".$h2."</a>";
}

if(empty($_GET['str'])){$st2=0;$stt2=10;}else{$st2=$_GET['str']*10-10;$stt2=$_GET['str']*10;}
if($st2<0){$st2=0;}
if($stt2>$l2){$stt2=$l2;}

?></td>
  </tr>
</table>
<?
if(isset($_POST['redak']) and $_POST['redak']!=''){
$date = date('d.m.Y H:i');
$rr=mysql_query("UPDATE `forum_otvet` SET `text`='".$_POST['redak']."',`edit_login`='".$login."',`edit_date`='".$date."' WHERE `id`='".(int)$_GET['red']."'");
if($rr){
print"<font style='font-size:12px; color:red'><center>Ваш ответ удачно отредактирован.</center></font>";
}else{
print"<font style='font-size:12px; color:red'><center>Ваш ответ не отредактирован.</center></font>";
}

}
if(isset($_GET['red']) and !isset($_POST['redak'])){
$dosa = mysql_query("SELECT * FROM `forum_otvet` WHERE `id_tema`='".(int)(int)$_GET['tema']."' and `id_forum`='".(int)(int)$_GET['forum']."' and `id`='".(int)(int)(int)$_GET['red']."'");
$forum_otveta=mysql_fetch_array($dosa)
?>
<table width="70%" border="0" cellspacing="0" cellpadding="0" style=" border-top:2px solid #000000; border-left:2px solid #000000; border-right:2px solid #000000;" align="center">
  <tr>
    <td>
	 <form id="POSTX" name="POSTX" method="post" action="">
          <table align="center" cellpadding="5" cellspacing="0" style="border-style: outset; border-width:0">
            <tr>
              <td colspan="2"><h4 id="response">Редактировать ответ</h4></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%">
                  <tr>
                    <td align="center"><textarea class="inup" id="answer" rows="12" name="redak" cols="84" wrap="virtual"><?=$forum_otveta['text']?></textarea></td>
                    
                  </tr>
              </table></td>
            </tr>

            <tr>
        
              <td valign="top" align="center">
                <input type="submit" class="btn" value="Редактировать" onclick="this.disabled='disabled'; POSTX.submit();" name="add3" />
              </td>
            </tr>
          </table>
        </form>
	</td>
  </tr>
</table>

<?
}
?>
<table width="70%" border="1" cellspacing="0" cellpadding="0" align="center" bordercolor="#000000">
  <tr>
    <td width="25%" bgcolor="#999999"><!--автор-->&nbsp;<b>Автор</b></td>
    <td width="75%" align="left" bgcolor="#999999"><!--тема-->
	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="100%" style="border-right:1px solid #000000;">&nbsp;<b>Тема:</b> <font style="font-size:11px; color: #000099"><?=$forumas['tema']?></font></td>
  </tr>
</table>

	</td>
<?

//////////////
for($p=$st2; $p<$stt2; $p++){
///////////////
$dos = mysql_query("SELECT * FROM `forum_otvet` WHERE `id_tema`='".(int)$_GET['tema']."' and `id_forum`='".(int)$_GET['forum']."' and `id`='".(int)$n2[$p]."'");
$forum_otvet=mysql_fetch_array($dos);
//////////



$yyd=mysql_query("SELECT login,id,level,dealer,orden,admin_level,clan_short,clan FROM `users` WHERE `login`='".$forum_otvet['avtor']."'");
$dbd = mysql_fetch_array($yyd);

  $forum_otvet['text'] = str_replace('\\','',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;B&gt;','<b>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;/B&gt;','</b>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;I&gt;','<i>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;/I&gt;','</i>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;U&gt;','<u>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;/U&gt;','</u>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;CODE&gt;','<code>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace('&lt;/CODE&gt;','</code>',$forum_otvet['text']);
  $forum_otvet['text'] = str_replace("\n",'<br>',$forum_otvet['text']);
?>

  </tr>
  <tr>
    <td align="left" valign="top" bgcolor="#CCCCCC" >&nbsp;<b><?=info($dbd['login'],$dbd['id'],$dbd['level'],$dbd['dealer'],$dbd['orden'],$dbd['admin_level'],$dbd['clan_short'],$dbd['clan']);?></b>
	
	<?
	if($propusk=='1'){
	?>
	<br /><br /><a href="?forum=<?=(int)$_GET['forum']?>&tema=<?=(int)$_GET['tema']?>&del=<?=$forum_otvet['id']?>">Удалить</a>
	<br /><a href="?forum=<?=(int)$_GET['forum']?>&tema=<?=(int)$_GET['tema']?>&red=<?=$forum_otvet['id']?>">Редактировать</a><br /><br />
	<?
	}
	?>
	
	
	</td>
    <td align="left" bgcolor="#CCCCCC">
	<table width="100%" height="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="15">&nbsp;<b style="font-size:10px;">Дата:</b> <font style="font-size:9px; color:#000099;"><?=$forum_otvet['date']?></font></td>
  </tr>
  <tr>
    <td><br />&nbsp;<?=$forum_otvet['text']?><br /><br />
	<?
	if(!empty($forum_otvet['edit_login'])){
$yyk=mysql_query("SELECT login,id,level,dealer,orden,admin_level,clan_short,clan FROM `users` WHERE `login`='".$forum_otvet['edit_login']."'");
$dbk = mysql_fetch_array($yyk);
	?>
	&nbsp;<font style="font-size:10px; color:#000000">Текст отредактировал: <b><?=info($dbk['login'],$dbk['id'],$dbk['level'],$dbk['dealer'],$dbk['orden'],$dbk['admin_level'],$dbk['clan_short'],$dbk['clan']);?></b>  в <b><?=$forum_otvet['edit_date']?></b></font>
	<br /><br />
	<?
	}
	?>
</td>
  </tr>
</table>

	
	
	</td>
  </tr>
<?
}
?>
</table>

<table bgcolor="#999999" width="70%" border="0" cellspacing="0" cellpadding="0" style=" border-bottom:2px solid #000000; border-left:2px solid #000000; border-right:2px solid #000000;" align="center">
  <tr>
    <td>
<? 
if(!empty($login)){
if($forumas['sost']==1){
if($db['forum_shut']==0 or $db['forum_shut']<=time()){
?> 
<form id="POSTF" name="POSTF" method="post" action="">
          <table align="center" cellpadding="5" cellspacing="0" style="border-style: outset; border-width:0" bgcolor="#999999">
            <tr>
              <td colspan="2" align="center"><h4 id="response">Написать ответ</h4></td>
            </tr>
            <tr>
              <td colspan="2"><table width="100%">
                  <tr>
                    <td align="center"><textarea class="inup" id="answer" rows="12" name="text" cols="84" wrap="virtual"></textarea></td>
                    
                  </tr>
              </table></td>
            </tr>

            <tr>
              <td><small> Разрешается использование тегов форматирования текста:<br />
                    <font color="990000">&lt;b&gt;</font><b>жирный</b><font color="990000">&lt;/b&gt; &lt;i&gt;</font><i>наклонный</i><font color="990000">&lt;/i&gt; &lt;u&gt;</font><U>подчеркнутый</u><font color="990000">&lt;/u&gt;</font>,<br />
                а для выделения текста программ, используйте <font color="990000">&lt;code&gt; ... &lt;/code&gt;</font><br />
                и не забывайте закрывать теги! <font color="990000">&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/code&gt;</font> :) </small> </td>
              <td valign="top" align="left">
                <input type="submit" class="btn" value="Добавить" onclick="this.disabled='disabled'; POSTF.submit();" name="add3" />
              </td>
            </tr>
          </table>
        </form>
		<?
}else{ print"<font style='font-size:12px; color:#990000;'><center>На вас наложена форумная молчанка!</center></font>";}
}else{ print"<font style='font-size:12px; color:#990000;'><center>Тема закрыта!</center></font>";}
}else{
?>
<center>Вы не авторизованы!</center>
<?
}
?>
	</td>
  </tr>
</table>



		
<?
}
?>
<br />
	</td>
  </tr>
</table>


			<!--////////////////////////////////////////////////////-->
	
	</td>
  </tr>
  <tr>
    <td align="center" bgcolor="#000000"><span class="style6">Copyright © 2013 «UFC 
»</span></td>
  </tr>
</table>

</body>
</html>
