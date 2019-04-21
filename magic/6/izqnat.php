<?include("key.php");
$login=$_SESSION['login'];
$target=htmlspecialchars(addslashes($_POST['target']));
if(!empty($target))
{
	$q=mysql_query("select * from users where login='".$target."'");
	$res=mysql_fetch_array($q);
	if(!$res)
	{
		echo "Персонаж <B>".$target."</B> не найден в базе данных.";
	}
	else if ($res['login']=="СОЗДАТЕЛЬ")
	{
		echo "Редактирование богов запрещено высшей силой!";
	}
	else
	{	
		mysql_query("UPDATE users SET orden='',admin_level='0',parent_temp='',adminsite='',dealer='',sponsor='0',vip='0',otdel='' WHERE login='".$target."'");
		say("toall","Персонаж <b>".$target."</b> изгнан из ордена <b>Истинный Мрак.</b>",$login);
		echo "Персонаж <B>".$target."</B> изгнан из ордена Истинный Мрак.";
	}
}
?>
