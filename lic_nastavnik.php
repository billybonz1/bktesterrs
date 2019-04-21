<?
include ('key.php');
include ("functions.php");
include ("conf.php");
Header("Cache-Control: no-cache, must-revalidate"); // говорим браузеру что-бы он не кешировал эту страницу
Header("Pragma: no-cache");
$login=$_SESSION["login"];

$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');
	
	$user = mysql_fetch_array(3mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
?>



<head>

	<meta http-equiv="content-type" content="text/html; charset=windows-1251">
	<meta http-equiv="cache-control" content="no-cache">
	<meta http-equiv="pragma" content="no-cache">
	<meta http-equiv="expires" content="0">

	<link href="/c/common.css" rel="stylesheet" type="text/css">

<link type="text/css" href="/ch/css/online.css" rel="stylesheet">
	<link href="/c/contextmenu.css" rel="stylesheet" type="text/css">
	
	

  <script src="sl.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery-ui.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.browser.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.cookie.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.tooltip.mod.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.pnotify.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.placeholder.js" type="text/javascript"></script>
	<script src="/j/jquery/jquery.countdown.js" type="text/javascript"></script>
	<script src="/j/swfobject-2.2.js" type="text/javascript"></script>
<script src="/j/char.js" type="text/javascript"></script>
<script src="/j/n/user_v2.js" type="text/javascript"></script>
<script src="/j/common.js" type="text/javascript"></script>
<SCRIPT LANGUAGE="JavaScript" SRC="js/dialog_030_ru.js" charset="windows-1251"></SCRIPT>
<SCRIPT src='commoninf.js' charset="windows-1251"></SCRIPT>
<SCRIPT src="js/main_097_ru.js" charset="windows-1251"></SCRIPT>

</HEAD>
<td class="right-col">
					<div class="right-col-inner right-col-float">
<table class="quick-user-info block">
		
	</table>
	</tbody>
	</table>
	<div id="hint3" class="ahint"></div>
					</div>
		       </td>
		    </tr>
		</tbody>
	</table>	

<?
$target = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));

if($_GET['agr']) { 

if ($user['login']==$target['login']) {
$mess = "Вы не можете себя обучать";
}

elseif (!$target) {
$mess = "Персонаж '{$_POST[target]}' не найден";
}
elseif ($target['level'] > 4) {
$mess = "Невозможно обучaть персонажа выше 4 уровня";
}
elseif ($target['nastavnik2']==1) {
$mess = "У персонажа '{$_POST[target]}' уже есть наставник";
}
else{
$mess = "Отправлено предложение на обучение персонажу '{$_POST[target]}'";

mysql_query("INSERT INTO `transfer` (`id`,`login`,`target`,`money`) values ('NULL','{$user['login']}','{$_POST['target']}','0');");}}
?>	



<body class="main-content">

<?if($mess){?>
<div class="top-error">
		<fieldset>
			<legend>Внимание!</legend>
			<div class="error-content"><?echo $mess;?></div>
		</fieldset>
	</div>
		<?}?>	

	<table class="main-table">
	
		<tr>
			<td>
				
                        
				<center><div id="online-room-name">Наставничество</div></center>
				
			<center>
							
				<div class="roll-tabs">
				
				
	
					<div class="tabs-content" style="width: 250px;">


<table class="table-list">
<tr>
<td style="width 500px;" class="name">Очков наставничества</td>
				<td><?=$user['nastavnik_money']?></td>
				</tr>

</center>
</table>	
<br>
<table class="table-list">
				
<center><a href="javascript:nastavnik('lic_nastavnik.php?agr=1', 'Принять в ученики', 'target', '<?=$_POST['target']?>','');" id="save-kit-link"><b>[Принять в ученики]</b></a></center>


		


<?
$trr = mysql_query("SELECT * FROM `users` WHERE `nastavnik_name` = '{$user['login']}';");
		
		while($row = mysql_fetch_array($trr)){
		
		?>

	
<tr>
<td valign=top>
<span class="nick"><?if($row['align']==0){echo"<img alt='' class='empty' src=\"/i/null.gif\">";}?> <?if($row['top']>0){echo"<img class=\"top\" src=\"i/tops/top.gif\" title=\"ТОП\">";}?><?if($row['align']>0){echo"<img class=\"align\" src=\"i/align".$row['align'].".gif\" title='".$_GET['altext']."'>";}?><?php if ($row['klan'] <> '') { echo '<img class="klan" src="i/klan/'.$row['klan'].'.gif" title="'.$user['klan'].'">'; } ?> <span class="nick"><span oncontextmenu="OpenMenu(event,0)"><b class='name side-0' onclick=top.AddTo('<?=$row['login']?>')><?if($row['battle']>0){echo"<b class='name side-0 battle'>";}?><?=$row['login']?></b></B><span class="level"> [<?=$row['level']?>]</span><?if($row['sex']) { if($row['sex']=='M'){echo "<a class=\"info\" href=inf.php?login={$row['login']} target=_blank> <IMG SRC=i/infM.gif WIDTH=12 HEIGHT=12 title='Информация о персонаже'></a>";} else {if($row['sex']=='F')echo "<a class=\"info\" href=inf.php?login={$row['login']} target=_blank> <IMG SRC=i/infF.gif WIDTH=12 HEIGHT=12 title='Информация о персонаже'>";}}?></a></span></tr></td><br>
<?}?> 

</center>
</table>	

</body>
</html>