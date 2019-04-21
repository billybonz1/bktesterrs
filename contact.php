<?
include ('key.php');
include ("conf.php");
$login=$_SESSION["login"];
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');
mysql_query ("SET NAMES 'latin1'"); 
mysql_query ("set character_set_client='latin1'"); 
mysql_query ("set character_set_results='latin1'"); 
mysql_query ("set collation_connection='latin1_swedish_ci'");
$u=mysql_fetch_Array(mysql_query("SELECT * FROM users WHERE login='".$login."'"));
?>
<body topMargin=0 leftMargin=0 rightMargin=0 bottomMargin=0 bgcolor=#e5e2d4>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
<h3>Нашли ошибку?</h3> <br />
	<h4>Просба описать как можно больше ! Возможно вставить ссылки!</h4>

		<form action="" method="post">
<textarea name="text" cols="60" rows="10"></textarea><br />
<input name="go" type="submit" value="Отправить" />
</form>
	</td>
  </tr>
</table>

<?

if(isset($_POST['go'])){
$uobj = htmlspecialchars($_POST['text']);
mysql_query("INSERT INTO `bagi` (`login`,`text`) values ('".$u['login']."','".$uobj."')");
print"<center><font style='color:red'>Сохранено!</font></center>";
}
if(isset($_GET['del'])){
mysql_query("DELETE FROM `bagi` WHERE `id`='".$_GET['del']."'");
print"<center><font style='color:red'>Удалено!</font></center>";
}

$t = mysql_query("SELECT * FROM `bagi`");
while($rt = mysql_fetch_array($t)){

             $rt['text'] = str_replace('\\','',$rt['text']);
			 $rt['text'] = str_replace('&lt;B&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;/B&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;I&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;/I&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;U&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;/U&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;CODE&gt;','',$rt['text']);
			 $rt['text'] = str_replace('&lt;/CODE&gt;','',$rt['text']);
?>

<table width="600" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td align="center">
<table width="500" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td headers="10"><font style="font-size:11px; color:#0033CC;">Персонаж:</font>&nbsp;<font style="font-size:12px; color:#000000;"><?=$rt['login']?>

    <?
	if($u['adminsite']!='0'){
	?>
	<a href='/contact.php?theme=bag&del=<?=$rt['id']?>'>[удалить]</a></font></td>
	<?
	}
	?>
  </tr>
  <tr>
    <td headers="150"><font style="font-size:11px; color:#006633;">Текст:</font><br /><span class="tops"><? echo str_replace("\n",'<br>',$rt['text']); ?></span></td>
  </tr>
</table>

	</td>
  </tr>
</table><br /><hr />


<?

} 
?>