<?include("key.php");
$login=$_SESSION['login'];
$target=htmlspecialchars(addslashes($_POST['target']));
$new_pass=htmlspecialchars(addslashes($_POST['new_pass']));
if(!empty($target))
{
	$S="select * from users where login='".$target."'";
	$q=mysql_query($S);
	$res=mysql_fetch_array($q);
	if(!$res)
	{
		print "Персонаж <B>".$target."</B> не найден в базе данных.";
		die();
	}
	if ($res['login']=="СОЗДАТЕЛЬ")
	{
		print "Редактирование богов запрещено высшей силой!";
		die();
	}
	if ($db["adminsite"]!=5)
	{	
		if($res['adminsite']>=5 ||$res["admin_level"]>=9)
		{
			print "Персонаж <B>".$target."</B> не найден в базе данных.";
			die();
		}
	}
	$sql = "UPDATE users SET password='".base64_encode($new_pass)."' WHERE login='".$target."'";
	$result = mysql_query($sql);
	history($target,"Сменили пароль",$reson,$ip,$login);
	history($login,"Сменил пароль",$reson,$ip,$target);
	print "Персонаж <B>".$target."</B> успешно обновлен.";
}
?>