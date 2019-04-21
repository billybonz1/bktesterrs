<?include("key.php");
$login=$_SESSION['login'];
$target=htmlspecialchars(addslashes($_POST['target']));
if(!empty($target))
{	
	if($db["orden"]==1 && $db["admin_level"]>=3)
	{
		$q=mysql_query("select * from users where login='".$target."'");
		$res=mysql_fetch_array($q);
		if(!$res)
		{
			echo "Персонаж <B>".$target."</B> не найден в базе данных.";
		}
		else 
		{	
			mysql_query("UPDATE users SET forum_shut='0' WHERE login='".$target."'");
			say("toall","Представитель порядка <b>&laquo;".$login."&raquo;</b> снял форумную молчанку с персонажа <b>&laquo;".$target."&raquo;</b>.",$login);
			history($target,"сняли заклятие молчания",$reson,$ip,$login);
			history($login,"снял заклятие молчания",$reson,$ip,$target);
			echo "Заклятие молчания снято.";
		}
	}
}
?>
