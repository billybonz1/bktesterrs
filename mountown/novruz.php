<?
include ("time.php");
$login=$_SESSION['login'];
?>
<body style="background-image: url(img/index/novruz.jpg);background-repeat:no-repeat;background-position:top right">
<h3>Поздравляем с Новруз Байрамом</h3>
<TABLE width=100% border=0>
<tr valign=top>
	<td width=100%>
		<input type=button onclick="location.href='main.php?act=go&level=novruz_go'" value="Пещера Праздничная" style="background-color:#AA0000; color: white;">
	</td>
	<td align=right nowrap>
		<input type=button onclick="location.href='main.php?act=go&level=okraina'" value="Вернуться" class="newbut" >
		<input type=button onclick="location.href='main.php?act=none'" value="Обновить" class="newbut" >
	</td>
</tr>
</TABLE>

<TABLE width=100% border=0>
<tr>
<td>
<?
	if ($_GET['action']=="del" && is_numeric($_GET['id']) && $db["admin_level"]>=1)
	{
		mysql_query("UPDATE novruz SET text='<font color=#ff0000><i>Удалено Стражом порядка ".$login."</i></font>' WHERE id='".(int)$_GET['id']."'");
	}
	############################################################################
	if ($_GET["action"]=="get_heart" && $db["id"])
	{
		//cerwenbelerde
		if (date(n)==3 && date(j)==13)
		{
			$have_gift=mysql_fetch_array(mysql_query("SELECT * FROM hediyye WHERE owner='".$db["id"]."'"));
			if (!$have_gift)
			{
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','94','scroll','magic','20','1','Администрации UFC')");#Восстановление энергии 1000HP 
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','176','scroll','magic','20','1','Администрации UFC')");#Восстановление маны 1000MN 
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','61','scroll','magic','5','1','Администрации UFC')");#Воскрешение 
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','116','scroll','magic','5','1','Администрации UFC')");#Клонирование
				
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','220','scroll','magic','50','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Жизни
					
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','239','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Зелье Пронзающих Игл
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','240','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Зелье Сверкающих Лезвий
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','241','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Зелье Свистящих Секир
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','242','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Зелье Тяжелых Молотов
					
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','235','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Ветра
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','236','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Морей
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','237','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Песков
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','238','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Пламени
				
				mysql_query("INSERT INTO hediyye(owner) VALUES('".$db["id"]."')");
				$msg="Вы получили подарки...</b>.";
			}
			else $msg="Вы уже получили свой подарок...";
		}
		else $msg="Еще не время - 13.03.2012!";
	}
	############################################################################
	if ($_GET['action']=="getpodarka")
	{
		if (date(n)==3 && (date(j)>=19 && date(j)<=25))
		{	
			$findpodarka = mysql_fetch_array(mysql_query("SELECT count(*) FROM novruzpodarka WHERE login='".$login."' and type=2"));
			if (!$findpodarka[0])
			{
				
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','224','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Нектар Отрицания
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','111','scroll','magic','10','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Зелье Неуязвимости
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','220','scroll','magic','50','1','Администрации UFC','".(time()+30*24*3600)."')");#Большое Эликсир Жизни
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','94','scroll','magic','75','1','Администрации UFC')");#Восстановление энергии 1000HP 
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','176','scroll','magic','50','1','Администрации UFC')");#Восстановление маны 1000MN 

				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','52','scroll','magic','10','1','Администрации UFC')");#Тактика Крови
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','53','scroll','magic','10','1','Администрации UFC')");#Тактика Защиты
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','54','scroll','magic','10','1','Администрации UFC')");#Тактика Ответа
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','55','scroll','magic','10','1','Администрации UFC')");#Тактика Боя
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','258','scroll','magic','10','1','Администрации UFC')");#Тактика Парирования

				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','61','scroll','magic','10','1','Администрации UFC')");#Воскрешение
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','116','scroll','magic','10','1','Администрации UFC')");#Клонирование
				mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author) VALUES ('".$login."','4','scroll','magic','10','1','Администрации UFC')");#Нападение

				if ($_GET["type"]=="mag")
				{
					mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','225','scroll','magic','5','1','Администрации UFC','".(time()+30*24*3600)."')");#Снадобье Забытых Магистров
					mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','228','scroll','magic','15','1','Администрации UFC','".(time()+30*24*3600)."')");#Ледяной Интеллект
				}
				else
				{
					mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','226','scroll','magic','5','1','Администрации UFC','".(time()+30*24*3600)."')");#Снадобье Забытых Мастеров 
					mysql_query("INSERT INTO inv(owner, object_id, object_type, object_razdel, iznos_max, gift, gift_author,term) VALUES ('".$login."','227','scroll','magic','15','1','Администрации UFC','".(time()+30*24*3600)."')");#Сила Великана
				} 

				mysql_query("INSERT INTO novruzpodarka (login,type) VALUES('$login','2')");
				$msg="Поздравляем с Новруз Байрамом!!!";
			}
			else $msg="Вы уже получали подарок!";
		}
		else $msg="Еще не время! (19.03.2012-25.03.2012)";
	}
	############################################################################
	if (isset($_POST['text']) && $_POST['text']!="")
	{
		$text=htmlspecialchars(addslashes($_POST['text']));
		$text = wordwrap(trim($text), 40, " ",1);
		$next_time=time()+24*3600;
		$now=time();
		$find = mysql_fetch_array(mysql_query("SELECT * FROM novruz WHERE login='".$login."' ORDER BY time DESC LIMIT 1"));
		$my_time=$find['time'];
		if ($my_time<=$now)
		{
			mysql_query("INSERT INTO novruz (text,login,time) VALUES ('".$text."','".$login."','".$next_time."')");
			$msg="Ваше сообщение добавлено.";
		}
		else
		{
			$msg="Ещё: ".convert_time($my_time);
		}
	}
	//type=1  Ad gunu
	//type=2  New Year
	
	echo "<font style='color:#ff0000'>".$msg."</font><br/>";
	//----------------------------------novruz-------------------------------------------------------------------
	echo "<center>";
	//echo "<img src='img/upakovka/11.gif' onmouseover=\"slot_view('<b>От всей души</b>');\" onmouseout=\"slot_hide();\" style='cursor:hand;' onclick=\"location.href='?action=get_heart'\"> ";
	echo "<img src='img/upakovka/warrior.gif' onmouseover=\"slot_view('<b>Подарок Для Воина!</b>');\" onmouseout=\"slot_hide();\" style='cursor:hand;' onclick=\"location.href='?action=getpodarka&type=warrior'\"> ";
	echo "<img src='img/upakovka/mag.gif' 	onmouseover=\"slot_view('<b>Подарок Для Мага!</b>');\" onmouseout=\"slot_hide();\" style='cursor:hand;' onclick=\"location.href='?action=getpodarka&type=mag'\">";
	echo "</center>";

	//----------------------------------novruz-------------------------------------------------------------------

	$page=(int)abs($_GET['page']);
	$table = mysql_query("SELECT * FROM novruz");
	$page_cnt=mysql_num_rows($table);
	$cnt=$page_cnt; // общее количество записей во всём выводе
	$rpp=15; // кол-во записей на страницу
	$rad=2; // сколько ссылок показывать рядом с номером текущей страницы (2 слева + 2 справа + активная страница = всего 5)

	$links=$rad*2+1;
	$pages=ceil($cnt/$rpp);
	if ($page>0) { echo "<a href=\"?page=0\">«««</a> | <a href=\"?page=".($page-1)."\">««</a> |"; }
	$start=$page-$rad;
	if ($start>$pages-$links) { $start=$pages-$links; }
	if ($start<0) { $start=0; }
	$end=$start+$links;
	if ($end>$pages) { $end=$pages; }
	for ($i=$start; $i<$end; $i++) 
	{
		if ($i==$page) 
		{
			echo "<b style='color:#ff0000'><u>";
		} 
		else 
		{
			echo "<a href=\"?page=$i\">";
		}
		echo $i;
		if ($i==$page) 
		{
			echo "</u></b>";
		} 
		else 
		{
			echo "</a>";
		}
		if ($i!=($end-1)) { echo " | "; }
	}
	if ($pages>$links && $page<($pages-$rad-1)) { echo " ... <a href=\"?page=".($pages-1)."\">".($pages-1)."</a>"; }
	if ($page<$pages-1) { echo " | <a href=\"?page=".($page+1)."\">»»</a> | <a href=\"?page=".($pages-1)."\">»»»</a>"; }

	$limit = $rpp;
	$eu = $page*$limit;
	echo "<br>";
	$SSS = mysql_query("SELECT novruz.id as ids, novruz.text, novruz.date, users.login, users.id, users.level, users.orden, users.admin_level, users.dealer, users.clan_short, users.clan FROM novruz LEFT JOIN users on users.login=novruz.login ORDER BY novruz.date DESC limit $eu, $limit");
	while($DATA = mysql_fetch_array($SSS))
	{
		$DATA['text']=str_replace("&amp;","&",$DATA['text']);
		$DATA['text']=str_replace("&amp;","&",$DATA['text']);
		$delid=$DATA['ids'];
		echo "<font class=date>".$DATA["date"]."</font> ";
		echo "<script>drwfl('".$DATA['login']."', '".$DATA['id']."', '".$DATA['level']."', '".$DATA['dealer']."', '".$DATA['orden']."', '".$DATA['admin_level']."', '".$DATA['clan_short']."', '".$DATA['clan']."');</script>";
		echo " - ".$DATA['text'];				
		echo (($db['orden']==1)?"&nbsp; <a href='?action=del&id=$delid'><img src='img/del.gif'></a>":"");
		echo "<br>";
	}
		echo '
		<form method="POST">
			Ваше пожелание:	<input type=text name="text" value="" maxlength="1024" size=50> <input type="submit" name="add" value=" Добавить ">
		</form>';

?>
</td>
</tr>
</table>