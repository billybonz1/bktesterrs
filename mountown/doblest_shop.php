<?
$login=$_SESSION["login"];
include("time.php");
//***************************************************************************
if ($db["shoptime"]<time() && !$db["adminsite"])
{
	Header("Location: main.php?act=go&level=warcrypt");
	die();
}
//***************************************************************************
$item_Array=array(452,514,515,608,908);
$item_Array_str="(452,514,515,608,908)";

$magic_Array=array(96,235,236,237,238,239,240,241,242);
$magic_Array_str="(96,235,236,237,238,239,240,241,242)";
//***************************************************************************
if ($_GET["buy_magic"])
{
	$_POST['shop']=true;
	$_GET['otdel']="magic";
	$item_id=(int)$_GET["buy_magic"];
	$r=mysql_fetch_array(mysql_query("SELECT * FROM scroll WHERE id='".$item_id."'"));
	if(!$r)
	{
		$msg="Вещь не найдена в магазине.";
	}
	else
	{
		$del_time= time() + $r["del_time"]*24*3600;
		$price_gos = $r["price"];
		$price = sprintf ("%01.2f", $price_gos);

		if ($db["doblest"]<$price)
		{
			$msg="У вас нет такой суммы!";
		}
		else 
		{
			mysql_query("LOCK TABLES inv WRITE");
			mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,iznos_max,term,podzemka) VALUES ('".$login."','".$item_id."','scroll','magic','".$r["iznos_max"]."','".$del_time."','1')");
			mysql_query("UNLOCK TABLES");
			mysql_query("UPDATE users SET doblest=doblest-$price WHERE login='".$login."'");
			$db["doblest"]=$db["doblest"]-$price;
			$msg="Вы удачно купили  <b>&laquo;".$r["name"]."&raquo;</b> за <b>".$price." Доблесть</b>";
			history($login,'Купил',$msg, $db["remote_ip"],'Магазин Доблести');
		}
	}
}
//***************************************************************************
if ($_GET["buy"])
{	
	$_POST['shop']=true;
	$item_id=(int)$_GET["buy"];
	if (!in_Array($item_id,$item_Array))
	{
		$msg="Вещь не найдена в магазине.";
	}
	else
	{
		$buy_item=mysql_fetch_array(mysql_query("SELECT * FROM paltar WHERE id='".$item_id."'"));
		if(!$buy_item)
		{
			$msg="Вещь не найдена в магазине.";
		}
		else if ($db["doblest"]<$buy_item["price"])
		{
			$msg="У Вас нет достаточной суммы для покупки этой вещи!";
		}
		else
		{
			mysql_query("LOCK TABLES inv WRITE");
			mysql_query("INSERT INTO `inv` (`id`, `owner`, `img`, `object_id`, `object_type`, `object_razdel`, `name`,  `mass`, `price`, `gos_price`, `min_sila`, `min_lovkost`, `min_udacha`, `min_power`, `min_intellekt`, `min_vospriyatie`, `min_level`, `min_sword_vl`, `min_staff_vl`, `min_axe_vl`, `min_fail_vl`, `min_knife_vl`, `min_spear_vl`,`min_fire`,`min_water`,`min_air`,`min_earth`,`min_svet`,`min_tma`,`min_gray`,`add_fire`, `add_water`, `add_air`, `add_earth`, `add_svet`, `add_tma`, `add_gray`, `add_sila`, `add_lovkost`, `add_udacha`, `add_intellekt`, `add_duxovnost`, `add_hp`, `add_mana`, `protect_head`, `protect_arm`, `protect_corp`, `protect_poyas`, `protect_legs`, `protect_rej`, `protect_drob`, `protect_kol`, `protect_rub`, `protect_fire`, `protect_water`, `protect_air`, `protect_earth`, `protect_svet`, `protect_tma`, `protect_gray`,`protect_mag`,`protect_udar`, `shieldblock`, `krit`, `akrit`, `uvorot`, `auvorot`, `parry`, `counter`, `add_rej`, `add_drob`, `add_kol`, `add_rub`, `ms_udar`, `ms_krit`, `ms_mag`, `ms_fire`, `ms_water`, `ms_air`, `ms_earth`, `ms_svet`, `ms_tma`, `ms_gray`, `ms_rej`, `ms_drob`, `ms_kol`, `ms_rub`, `iznos_max`, `min_attack`, `max_attack`, `proboy`, `add_oruj`, `add_sword_vl`, `add_staff_vl`, `add_axe_vl`, `add_fail_vl`, `add_knife_vl`, `add_spear_vl`, `need_orden`, `sex`, `art`, `podzemka`, `is_personal`, `personal_owner`, `noremont`, `two_hand`, `second_hand`,  `add_fire_att`, `add_air_att`, `add_watet_att`, `add_earth_att`, `edited`) 
				VALUES (NULL, '".$login."','".$buy_item["img"]."' ,'".$buy_item["id"]."', '".$buy_item["object"]."', 'obj', '".$buy_item["name"]."', '".$buy_item["mass"]."', '".$buy_item["price"]."', '".$buy_item["price"]."', '".$buy_item["min_sila"]."', '".$buy_item["min_lovkost"]."', '".$buy_item["min_udacha"]."', '".$buy_item["min_power"]."', '".$buy_item["min_intellekt"]."', '".$buy_item["min_vospriyatie"]."', '".$buy_item["min_level"]."', '".$buy_item["min_sword_vl"]."', '".$buy_item["min_staff_vl"]."', '".$buy_item["min_axe_vl"]."', '".$buy_item["min_fail_vl"]."', '".$buy_item["min_knife_vl"]."', '".$buy_item["min_spear_vl"]."', '".$buy_item["min_fire"]."','".$buy_item["min_water"]."','".$buy_item["min_air"]."','".$buy_item["min_earth"]."','".$buy_item["min_svet"]."','".$buy_item["min_tma"]."','".$buy_item["min_gray"]."', '".$buy_item["add_fire"]."', '".$buy_item["add_water"]."', '".$buy_item["add_air"]."', '".$buy_item["add_earth"]."', '".$buy_item["add_svet"]."', '".$buy_item["add_tma"]."', '".$buy_item["add_gray"]."', '".$buy_item["add_sila"]."', '".$buy_item["add_lovkost"]."', '".$buy_item["add_udacha"]."', '".$buy_item["add_intellekt"]."', '".$buy_item["add_duxovnost"]."', '".$buy_item["add_hp"]."', '".$buy_item["add_mana"]."', '".$buy_item["protect_head"]."', '".$buy_item["protect_arm"]."', '".$buy_item["protect_corp"]."', '".$buy_item["protect_poyas"]."', '".$buy_item["protect_legs"]."', '".$buy_item["protect_rej"]."', '".$buy_item["protect_drob"]."', '".$buy_item["protect_kol"]."', '".$buy_item["protect_rub"]."', '".$buy_item["protect_fire"]."', '".$buy_item["protect_water"]."', '".$buy_item["protect_air"]."', '".$buy_item["protect_earth"]."', '".$buy_item["protect_svet"]."', '".$buy_item["protect_tma"]."', '".$buy_item["protect_gray"]."', '".$buy_item["protect_mag"]."', '".$buy_item["protect_udar"]."','".$buy_item["shieldblock"]."','".$buy_item["krit"]."', '".$buy_item["akrit"]."', '".$buy_item["uvorot"]."', '".$buy_item["auvorot"]."', '".$buy_item["parry"]."', '".$buy_item["counter"]."', '".$buy_item["add_rej"]."', '".$buy_item["add_drob"]."', '".$buy_item["add_kol"]."', '".$buy_item["add_rub"]."', '".$buy_item["ms_udar"]."', '".$buy_item["ms_krit"]."', '".$buy_item["ms_mag"]."', '".$buy_item["ms_fire"]."', '".$buy_item["ms_water"]."', '".$buy_item["ms_air"]."', '".$buy_item["ms_earth"]."', '".$buy_item["ms_svet"]."', '".$buy_item["ms_tma"]."', '".$buy_item["ms_gray"]."', '".$buy_item["ms_rej"]."', '".$buy_item["ms_drob"]."', '".$buy_item["ms_kol"]."', '".$buy_item["ms_rub"]."', '".$buy_item["iznos_max"]."', '".$buy_item["min_attack"]."', '".$buy_item["max_attack"]."', '".$buy_item["proboy"]."','".$buy_item["add_oruj"]."' ,'".$buy_item["add_sword_vl"]."', '".$buy_item["add_staff_vl"]."', '".$buy_item["add_axe_vl"]."', '".$buy_item["add_fail_vl"]."', '".$buy_item["add_knife_vl"]."', '".$buy_item["add_spear_vl"]."', '".$buy_item["need_orden"]."', '".$buy_item["sex"]."', '".$buy_item["art"]."', '1', '".$buy_item["is_personal"]."', '".$buy_item["personal_owner"]."', '".$buy_item["noremont"]."', '".$buy_item["two_hand"]."', '".$buy_item["second_hand"]."',  '".$buy_item["add_fire_att"]."', '".$buy_item["add_air_att"]."', '".$buy_item["add_watet_att"]."', '".$buy_item["add_earth_att"]."', '".$buy_item["edited"]."');");
			mysql_query("UNLOCK TABLES");
			mysql_query("UPDATE users SET doblest=doblest-".$buy_item["price"]." WHERE login='".$login."'");
			$db["doblest"]=$db["doblest"]-$buy_item["price"];
			$msg="Вы удачно купили <b>&laquo;".$buy_item["name"]."&raquo;</b> за <b>".$buy_item["price"]." Доблесть</b>";
			history($login,'Купил',$buy_item["name"]." за ".$buy_item["price"]." Доблесть",$db["remote_ip"],'Магазин Доблести');
		}
	}
}
//************************************************************
echo "<h3>Магазин Доблести
<br><small>(Вы можете зайти еще: ".convert_time($db['shoptime']).")</small>
</h3>";

$money = sprintf ("%01.2f", $db["money"]);
$platina = sprintf ("%01.2f", $db["platina"]);
$doblest = sprintf ("%01.2f", $db["doblest"]);
echo"
<table width=100% cellspacing=0 cellpadding=0 border=0>
<tr>
<td align=left>У вас в наличии: <b>".$money."</b> Зл. <b>".$platina."</b> Пл. <b>".$doblest."</b> Доблесть </td>
<td align=center nowrap><font color=red>".$msg."</font></td>
<td align=right nowrap>
	<INPUT TYPE=button value=\"Обновить\" onClick=\"location.href='main.php?act=none'\">
 	<INPUT TYPE=button value=\"Вернуться\" onClick=\"location.href='main.php?act=go&level=warcrypt';\">
</td>
</tr>
</table><hr>

<table border=0 width=100%>
  <tr>
    <td valign=top nowrap>";
	include("player.php");
    echo "
    </td>
    <td valign=top width=100%>";
		if (!$_GET['otdel'])$_GET['otdel']='obj';
		$db["vip"]=0;
		echo '
		<table border=0 cellpadding=0  bgcolor="#CEBBAA" cellspacing=0 width=100%>
		<tr>
			<td valign="top" align="center" >
				<table border="0" cellspacing="0" cellpadding="5" width=100%>
				<tr>
					<td nowrap '.($_GET['otdel']=="obj"?"class='fnew'":"class='fold'").' width="20%" valign="top" align="center" >
						<a class=us2 style="color: #ffffff" href="?otdel=obj">Экипировка</font></a>
					</td>
					<td nowrap '.($_GET['otdel']=="magic"?"class='fnew'":"class='fold'").' width="20%"  valign="top" align="center">
						<a class=us2 style="color: #ffffff" href="?otdel=magic">Магия</a>
					</td>
				</tr>
				</table>
			</td>
		</tr>
		<tr>
			<td  align=center>
				<TABLE WIDTH=100% CELLSPACING=1 CELLPADDING=2>';
				if ($_GET['otdel']=="obj")
				{
					$seek=mysql_query("SELECT * FROM paltar WHERE id in $item_Array_str ORDER BY min_level ASC,price ASC");
					while ($res=mysql_fetch_array($seek))
					{
						$n=(!$n);
						echo "
						<tr class='".($n?'l0':'l1')."'>
						<td valign=center align=center width=300 nowrap>
							<img src='img/items/".$res['img']."'><br>
							<a href='?buy=".$res["id"]."'>Купить за ".sprintf ("%01.2f", $res["price"])." Доблесть</a><br>
						</td><td width=100%>";
						show_item($db,$res);
						echo '</td>
						</tr>
						';
					}
					if (!mysql_num_rows($seek))echo "<tr bgcolor='#C7C7C7'><td valign=center align=center nowrap colspan=2><b>Прилавок магазина пустой...</b></td></tr>";
				}
				else if ($_GET['otdel']=="magic")
				{
					$seek = mysql_query("SELECT * FROM scroll WHERE id in $magic_Array_str ORDER BY min_level ASC, price ASC");
					while ($dat = mysql_fetch_array($seek))
					{
						$n=(!$n);
						echo "
						<tr class='".($n?'l0':'l1')."'>
							<TD valign=center align=center width=250>
								<img src='img/".$dat["img"]."'><br>
								<a href='?buy_magic=".$dat["id"]."'>Купить за ".sprintf ("%01.2f", $dat["price"])." Доблесть</a><br>
							</td>
						<td valign=top>
						<b>".$dat["name"]."</b> ".($dat["art"]?"<img src='img/icon/artefakt.gif' border=0 alt=\"АРТЕФАКТ\">":"");
						if($dat["need_orden"]!=0)
						{
							switch ($dat["need_orden"]) 
							{
								case 1:$orden_dis = "Стражи порядка";break;
								case 2:$orden_dis = "Вампиры";break;
								case 3:$orden_dis = "Орден Равновесия";break;
								case 4:$orden_dis = "Орден Света";break;
								case 5:$orden_dis = "Тюремный заключеный";break;
								case 6:$orden_dis = "Истинный Мрак";break;
							}
							echo "&nbsp; <img src='img/orden/".$dat["need_orden"]."/0.gif' border=0 alt='Требуемый орден:\n".$orden_dis."'>";
						}
						echo "&nbsp;(Масса: ".$dat["mass"].")<br>";
						echo "<b>Цена: ".$dat["price"]."</font> Доблесть</b><BR>
						Долговечность: 0/".$dat["iznos_max"]."<br>";
						if($dat["del_time"])
						{
							echo "Срок годности: ".$dat["del_time"]." дн.<BR>";
						}
						echo "<table width=100%><tr><td valign=top>";
						if ($dat["min_intellekt"] || $dat["min_vospriyatie"] || $dat["min_level"] || $dat["mana"] || $dat["school"])echo "<B>Требуется минимальное:</B><BR>";
						if($dat["min_intellekt"])
						{
							echo "&bull; Интеллект: ".$dat["min_intellekt"]."<BR>";
						}
						if($dat["min_vospriyatie"])
						{
							echo "&bull; Воссприятие: ".$dat["min_vospriyatie"]."<BR>";
						}
						if ($dat["min_level"]>0)
						{	
							echo "&bull; Уровень: ".$dat["min_level"]."<BR>";
						}
						if($dat["mana"])
						{
							echo "&bull; Исп. маны: ".$dat["mana"]."<BR>";
						}
						if($dat["school"])
						{
							switch ($dat["school"]) 
							{
								case "air":$school_d = "Воздух";break;
								case "water":$school_d = "Вода";break;
								case "fire":$school_d = "Огонь";break;
								case "earth":$school_d = "Земля";break;
							}
							echo "&bull; Стихия: <b>".$school_d."</b><BR>";
						}
						if ($dat["type"]=="animal")
						{
							echo "&bull; Состояние животного: не голодно";
						}
						if(!empty($dat["descs"]))
						{
							echo "<br><font color=brown>Наложены заклятия:</font> ".str_replace("\n","<br>",$dat["descs"])."<BR>";
						}
						if($dat["to_book"])echo "<small><font color=brown>Использовать магию можно только в бою</font></small>";
						echo "</td></tr></table>";
					}
					if (!mysql_num_rows($seek))echo "<tr bgcolor='#C7C7C7'><td valign=center align=center nowrap colspan=2><b>Прилавок магазина пустой...</b></td></tr>";
				}
				echo '</TABLE>
			</td>
		</tr>
		</TABLE>
	</TABLE>
	</td>
</tr>
</table>';
?>
<br><br><br><br>
<?include_once("counter.php");?>