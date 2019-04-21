<?
$login=$_SESSION['login'];
unwear_full($login);
$have_elik=mysql_fetch_Array(mysql_query("SELECT * FROM effects WHERE user_id=".$db["id"]." and type='jj'"));
if ($have_elik)
{
	mysql_query("UPDATE users SET hp_all=hp_all-".$have_elik["add_hp"]." WHERE login='".$db["login"]."'");
	mysql_query("DELETE FROM effects WHERE id=".$have_elik["id"]);
	history($login,"Действие Эликсира","Действие Эликсира <b>«Жажда жизни+?»</b> закончилось",$db["remote_ip"],"Комната Знахаря");
	talk($db["login"],"Действие Эликсира <b>«Жажда жизни+?»</b> закончилось!!!",$db);
}
##############################################################################3
$expstats = array(
		/*   nextup,=>summstats,sumvinosl*/
		"20" => array (3,3),
		"45" => array (4,3),
		"75" => array (5,3),
		"110" => array (6,3),//level 1
		"160" => array (9,4),
		"215" => array (10,4),
		"280" => array (11,4),
		"350" => array (12,4),
		"410" => array (13,4),//level 2
		"530" => array (16,5),
		"670" => array (17,5),
		"830" => array (18,5),
		"950" => array (19,5),
		"1100" => array (20,5),
		"1300" => array (21,5),//level 3
		"1450" => array (24,6),
		"1650" => array (25,6),
		"1850" => array (26,6),
		"2050" => array (27,6),
		"2200" => array (28,6),
		"2500" => array (29,6),
		"2900" =>array( 34,7), //4лвл
		"3350" =>array( 35,7),
		"3800" =>array( 36,7),
		"4200" =>array( 37,7),
		"4600" =>array( 38,7),
		"5000" =>array( 39,7),
		"6000" =>array( 42,8), //5лвл
		"7000" =>array( 43,8),
		"8000" =>array( 44,8),
		"9000" =>array( 45,8),
		"10000" =>array( 46,8),
		"11000" =>array( 47,8),
		"12000" =>array( 48,8),
		"12500" =>array( 49,8),
		"14000" =>array( 52,9), //6лвл
		"15500" =>array( 53,9),
		"17000" =>array( 54,9),
		"19000" =>array( 55,9),
		"21000" =>array( 56,9),
		"23000" =>array( 57,9),
		"27000" =>array( 58,9),
		"30000" =>array( 59,9),
		"60000" =>array( 64,10), //7лвл
		"75000" =>array( 65,10),
		"150000" =>array( 66,10),
		"175000" =>array( 67,10),
		"200000" =>array( 68,10),
		"225000" =>array( 69,10),
		"250000" =>array( 70,10),
		"260000" =>array( 71,10),
		"280000" =>array( 72,10),
		"300000" =>array( 73,10),
		"400000" =>array( 78,11),//8лвл
		"500000" =>array( 78,11),
		"600000" =>array( 78,11),
		"700000" =>array( 78,11),
		"800000" =>array( 78,11),
		"900000" =>array( 78,11),
		"1000000" =>array( 78,11),
		"1200000" =>array( 78,11),
		"1500000" =>array( 78,11),
		"1750000" =>array( 79,11),
		"2000000" =>array( 80,11),
		"2175000" =>array( 81,11),
		"2300000" =>array( 82,11),
		"2400000" =>array( 83,11),
		"2500000" =>array( 84,11),
		"2600000" =>array( 85,11),
		"2800000" =>array( 86,11),
		"3000000" =>array( 87,11),
		"6000000" =>array( 94,13),//9лвл
		"6500000" =>array( 95,13),
		"7500000" =>array( 96,13),
		"8500000" =>array( 97,13),
		"9000000" =>array( 98,13),
		"9250000" =>array( 99,13),
		"9500000" =>array( 100,13),
		"9750000" =>array( 101,13),
		"9900000" =>array( 102,13),
		"10000000" =>array( 103,13),
		"13000000" =>array( 112,16),//10лвл
		"14000000" =>array( 114,16),
		"15000000" =>array( 116,16),
		"16000000" =>array( 118,16),
		"17000000" =>array( 120,16),
		"17500000" =>array( 122,16),
		"18000000" =>array( 124,16),
		"19000000" =>array( 126,16),
		"19500000" =>array( 128,16),
		"20000000" =>array( 130,16),
        "30000000" =>array( 132,16),
        "32000000" =>array( 135,16),
        "34000000" =>array( 137,16),
        "35000000" =>array( 139,16),
        "36000000" =>array( 142,16),
        "38000000" =>array( 144,16),
        "40000000" =>array( 146,16),
        "42000000" =>array( 149,16),
        "44000000" =>array( 151,16),
        "45000000" =>array( 153,16),
        "46000000" =>array( 155,16),
        "48000000" =>array( 157,16),
        "50000000" =>array( 159,16),
        "52000000" =>array( 161,16),
        "55000000" =>array( 171,17),//11лвл
        "60000000" =>array( 172,18),
        "65000000" =>array( 173,19),
        "70000000" =>array( 174,20),
        "75000000" =>array( 175,21),
        "80000000" =>array( 176,22),
        "85000000" =>array( 177,23),
        "90000000" =>array( 178,24),
        "95000000" =>array( 179,25),
        "100000000" =>array( 180,26),
        "120000000" =>array( 195,26),
		"200000000" =>array( 210,27),
        "500000000" =>array( 211,27),
    	"1000000000" =>array( 212,27),
    	"10000000000" =>array( 213,27)
);


$price_masttery=$db["level"]*30;
$price_all_stat=$db["level"]*50;
$price_stat=50;

if ($db["level"]<18)$price_masttery=0;
if ($db["level"]<18)$price_all_stat=0;
if ($db["level"]<18)$price_stat=0;
$tmp=md5(time());
//----------------------dropmastery-------------------------------------------------------------	
if ($_POST['dropmastery'])
{
	if ($db['money']<$price_masttery) 
	{
		$mess="У вас нет столько денег!";
	}
	else
	{
		mysql_query("UPDATE users SET money=money-$price_masttery, umenie=level+add_umenie+1,phisic_vl=0,castet_vl=0,sword_vl=0,axe_vl=0,hummer_vl=0,copie_vl=0,staff_vl=0,fire_magic=0,earth_magic=0,water_magic=0,air_magic=0,svet_magic=0,tma_magic=0,gray_magic=0 WHERE login='".$login."'");
		$mess="Удачно скинуты Умения. Вам это стоило ".$price_masttery." Зл.";
		history($login,"Сбросить Навыки",$mess,$db["remote_ip"],"Комната Знахаря");
	}
	$db = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE login='".$login."'"));
}
//-----------------------dropstats---------------------------------------------------	

if ($_POST['dropstats'])
{
	if ($db['money']<$price_all_stat) 
	{
		$mess="У вас нет столько денег!";
	}
	else
	{
		mysql_query("UPDATE users SET money=money-$price_all_stat, ups=".$expstats[$db['next_up']][0]."+add_ups,sila=3,lovkost=3,udacha=3,power=".$expstats[$db['next_up']][1].",hp=1,hp_all=".($expstats[$db['next_up']][1]*6).",intellekt=0,vospriyatie=0,duxovnost=0,mana=0,mana_all=0 WHERE login='".$login."'");
		$mess="Удачно скинуты Параметры. Вам это стоило ".$price_all_stat." Зл.";
		history($login,"Сбросить Параметры",$mess,$db["remote_ip"],"Комната Знахаря");
	}
	$db = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE login='".$login."'"));
}

//-----------------------------------------------------------------------------------
if ($_POST['movestat']) 
{
	$mf1=$_REQUEST['stat'];
	$mf2=$_REQUEST['statchange'];
	if ($mf1==$mf2)
	{
		$mess="Стат нельзя перекинуть в самого себя.";
	}
	else if (($mf1=="sila" && $db[$mf1]<4) || ($mf1=="lovkost" && $db[$mf1]<4)||($mf1=="udacha" && $db[$mf1]<4)||($mf1=="power" && $db[$mf1]<=$expstats[$db['next_up']][1])||($mf1=="vospriyatie" && $db[$mf1]<1)||($mf1=="intellekt" && $db[$mf1]<1)||($mf1=="duxovnost" && $db[$mf1]<1))
	{
		$mess="Невозможно перераспределить статы ниже минимального уровня.";
	}
	else if ($db["money"]<$price_stat)
	{
		$mess="У вас нет столько денег!";
	}	
	else if ($mf1=="power")
	{
		mysql_query("UPDATE users SET power=power-1, hp_all=hp_all-6,money=money-$price_stat, $mf2=$mf2+1 WHERE login='".$login."'");
		$mess="Удачно переброшен стат. Вам это стоило ".$price_stat." Зл.";
	}
	else if ($mf2=="power")
	{
		mysql_query("UPDATE users SET $mf1=$mf1-1,power=power+1,money=money-$price_stat, hp_all=hp_all+6 WHERE login='".$login."'");
		$mess="Удачно переброшен стат. Вам это стоило ".$price_stat." Зл.";
	}
	else if ($mf1=="vospriyatie")
	{
		mysql_query("UPDATE users SET vospriyatie=vospriyatie-1, mana_all=mana_all-10, money=money-$price_stat, $mf2=$mf2+1 WHERE login='".$login."'");
		$mess="Удачно переброшен стат. Вам это стоило ".$price_stat." Зл.";
	}
	else if ($mf2=="vospriyatie")
	{
		mysql_query("UPDATE users SET $mf1=$mf1-1, vospriyatie=vospriyatie+1, money=money-$price_stat, mana_all=mana_all+10 WHERE login='".$login."'");
		$mess="Удачно переброшен стат. Вам это стоило ".$price_stat." Зл.";
	}
	else
	{
		mysql_query("UPDATE users SET $mf1=$mf1-1,$mf2=$mf2+1,money=money-$price_stat WHERE login='".$login."'");
		$mess="Удачно переброшен стат. Вам это стоило ".$price_stat." Зл.";
	}
	$db = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE login='".$login."'"));
}
//-----------------------------------------------------------------------------------	

$money = sprintf ("%01.2f", $db["money"]);
$platina = sprintf ("%01.2f", $db["platina"]);
?>
<h3>Комната Знахаря</h3>
<TABLE width=100% cellspacing=0 cellpadding=0><tr><td><b style=color:#ff0000><?=$mess;?>&nbsp;</b></td><td align=right>У вас в наличии: <B><?echo $money;?></b> зл. <b><?echo $platina;?></b> пл.</td></tr></table>
<div align=right>
	<input type=button value="Обновить" class=new onClick="javascript:location.href='main.php?act=none'">
	<input type=button value="Выход" class=new onClick="javascript:location.href='main.php?act=go&level=remesl'">
</div>
<table align=center width=100%>
<tr>
<td width=100% valign=top>
<FORM method=POST action="?act=none">
<FIELDSET><LEGEND><b>Навыки владения оружием и магией</b></LEGEND>
<TABLE width=98% align=center>
<TD>
У вас есть шанс  забыть старое ради нового (<?=$price_masttery?> Зл.): <INPUT type=submit name='dropmastery' value='Сбросить Навыки' onclick="return confirm('Вы действительно хотите сбросить умения?')"><BR><BR>
</TABLE>
</FIELDSET>
</FORM>


<FORM method=POST action="?act=none">
<FIELDSET><LEGEND><b>Параметры персонажа</b></LEGEND>
<TABLE width=98% align=center>
<TD>
У вас есть шанс  забыть старое ради нового (<?=$price_all_stat?> Зл.): <INPUT type=submit name='dropstats' value='Сбросить Параметры' onclick="return confirm('Вы действительно хотите сбросить все Параметры до минимального уровня?')"><BR><BR>
</TABLE>
</FIELDSET>
</FORM>
<!--	
<FIELDSET>
<LEGEND><b>Параметры</b></LEGEND>
	<table align=center width=100%>
	<tr>
	<td valign=center>
		
		Сила : <?echo $db['sila'];?><br>
		Ловкость : <?echo $db['lovkost'];?><br>
		Удача : <?echo $db['udacha'];?><br>
		Выносливость : <?echo $db['power'];?><br>
		Интеллект :	<?echo $db['intellekt'];?><br>
		Восприятие : <?echo $db['vospriyatie'];?><br>
		<?
			if ($db['level']>9)
			{	
			?>
				Духовность : <?echo $db['duxovnost'];?><br>	
			<?
			}
		?>
			<br>
		
		<form method="post" action="?<?=$tmp?>">
		Перенести <select name="stat">
			<option value="sila">Сила
			<option value="lovkost">Ловкость
			<option value="udacha">Удача
			<option value="power">Выносливость
			<option value="intellekt">Интеллект	
			<option value="vospriyatie">Восприятие
			<?if($db['level']>9) {?><option value="duxovnost">Духовность<?}?>
		</select>
		в <select name="statchange">
			<option value="sila">Сила (<?=$price_stat;?>  зл.)
			<option value="lovkost">Ловкость (<?=$price_stat;?>  зл.)
			<option value="udacha">Удача (<?=$price_stat;?>  зл.)
			<option value="power">Выносливость (<?=$price_stat;?>  зл.)
			<option value="intellekt">Интеллект (<?=$price_stat;?>  зл.)
			<option value="vospriyatie">Восприятие (<?=$price_stat;?>  зл.)
			<?if($db['level']>9) {?><option value="duxovnost">Духовность (<?=$price_stat;?>  зл.)<?}?>
			
		</select>
		<br>Роспись: <input type="submit" name="movestat" value=" Согласен " onclick="return confirm('Вы уверены в своем выборе?')">
		</form>
	</td>	
	</tr>
	</table>
</FIELDSET>
!-->
</td>
<td align=right> 
	<img src="img/index/stat.gif" border=0>	
</td>
</tr>
</table>
