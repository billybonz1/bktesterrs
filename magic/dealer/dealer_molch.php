<?include("key.php");
define("SILENT", 60);
$login=$_SESSION['login'];
$target=htmlspecialchars(addslashes($_POST['target']));
$reason=htmlspecialchars(addslashes($_POST['reason']));
if(!empty($target))
{
	if($db["dealer"])
	{
		$result=mysql_query("select * from users where login='".$target."'");
		$res=mysql_fetch_array($result);
		mysql_free_result($result);
		if(!$res)
		{
			echo "Персонаж <B>".$target."</B> не найден в базе данных.";
			die();
		}
		if ($res['login']=="СОЗДАТЕЛЬ")
		{
			echo "Редактирование богов запрещено высшей силой!";
			die();
		}
		if ($res['shut']>time())
		{
			echo "На персонажа <b>".$res["login"]."</b> уже заложена заклятие молчания!";
			die();
		}
		if ($db["adminsite"]!=5)
		{	
			if($res['adminsite']>=5 || $res["admin_level"]>=9 )
			{
				echo "Редактирование богов запрещено высшей силой!";
				die();
			}
		}	
		$d=date("H.i");
		$time2=time()+SILENT*60;
		mysql_query("UPDATE users SET shut='".$time2."',shut_reason='".$reason."' WHERE login='".$res['login']."'");

		$hours=floor(SILENT/60);
		$minutes=SILENT-$hours*60;

		if($hours>0)
		{
			if($hours==2 || $hours==24)
			{
				$hours_d="$hours часа";
			}
			else
			{
				$hours_d="$hours часов";
			}
			$minutes_d="";
		}
		else
		{
			$hours_d="";
			$minutes_d="$minutes минут";
		}
		$pref=$db["sex"];
		if($pref=="female")
		{
			$prefix="а";
		}
		else
		{
			$prefix="";
		}
		if ($reason!="")
		{	
			$reson="<b>Причина:</b> <i>".$reason."</i>";	
		}
		else $reson="";	 
		say("toall","Диллер игры <b>&quot".$login."&quot</b> использовал$prefix заклятие молчания на персонажа <b>&quot".$res['login']."&quot</b> на $hours_d $minutes_d. $reson",$login);
		history($target,"Молчанка на ".SILENT." мин.",$reson,$ip,$login);
		history($login,"Молчанка на ".SILENT." мин.",$reson,$ip,$target);
		$time_d = $hours_d."  ".$minutes_d;
		echo "Кляп засунут в рот <b>".$target."</b>. Он будет молчать ".$time_d ;
	}	
}
?>
