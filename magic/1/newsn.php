<?
$newsn=htmlspecialchars(addslashes($_POST['newsn']));
$newsn = str_replace("&amp;","&",$newsn);
$login=$_SESSION['login'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<title>Untitled Document</title>
</head>

<body>
<?
mysql_query ("SET NAMES 'cp1251'"); 
mysql_query ("set character_set_client='cp1251'");   
mysql_query ("set character_set_results='cp1251'");   
mysql_query ("set collation_connection='cp1251_general_ci'"); 

if($db["adminsite"]>2){
echo '<div style="width:100%;text-align:center;">
		<h4>Добавление Новостей</h4>
	</div>';
	?>
<form action="" method="post">
<input name="tema" type="text" value="тема" /><br />
<textarea cols=70 rows=6 name=msg class=new>текст</textarea><Br>
<input name="gotxt" type="submit" value="добавить" />
</form>
<?
if(isset($_POST['gotxt'])){
mysql_query("INSERT INTO `newsn` (`name`,`tema`,`text`,`date`) VALUES ('".$login."','".$_POST['tema']."','".$_POST['msg']."','".date('d.m.Y H:i')."')");
print"Новость успешно добавлена!";
}
}
?>
</body>
</html>
