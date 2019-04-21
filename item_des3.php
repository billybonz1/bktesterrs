<?
function show_item($db,$item_Array)
{
	global $effect;
	if ($db["vip"]>time())$price_art=sprintf ("%01.2f", ceil($item_Array["price"]*0.75));
	$price_gos = sprintf ("%01.2f", $item_Array["price"]);

	if (!$item_Array["podzemka"])
	{
		if ($item_Array["art"]){$price_print="Пл."; $my_money=$db['platina'];}else {$price_print="Зл."; $my_money=$db['money'];}
	}
	else {$price_print="Ед."; $my_money=$db['naqrada'];}


	$is_runa=$item_Array["runas"];
	$rname=explode("#",$is_runa);
	if ($is_runa)
	{
		$r_name=mysql_fetch_array(mysql_query("SELECT name FROM runa WHERE type='".$rname[0]."' and step='".$rname[1]."'"));
	}
	$str="<a>".$item_Array["name"].($item_Array["is_modified"]?" +".$item_Array["is_modified"]:"")."</a>".($item_Array["gift"]?"&nbsp;<img src='img/icon/gift.gif' border=0 alt=\"Подарок от ".$item_Array["gift_author"]."\">":"").($item_Array["art"]==1?"&nbsp;<img src='img/artefakt.gif' border=0 alt=\"АРТЕФАКТ\">":"").($item_Array["art"]==2?"&nbsp;<img src='img/icon/artefakt.gif' border=0 alt=\"АРТЕФАКТ\">":"").($item_Array["podzemka"]?"&nbsp;<img src='img/icon/podzemka.gif' border=0 alt=\"Вещи Потерянных Героев\">":"").($is_runa?"<img src='img/icon/runa.gif' alt='".$r_name["name"]."'>":"");
	if($item_Array["need_orden"])
	{
		switch ($item_Array["need_orden"]) 
		{
			 case 1:$orden_dis = "Стражи порядка";break;
			 case 2:$orden_dis = "Вампиры";break;
		 	 case 3:$orden_dis = "Орден Равновесия";break;
		 	 case 4:$orden_dis = "Орден Света";break;
		 	 case 5:$orden_dis = "Тюремный заключеный";break;
		 	 case 6:$orden_dis = "Истинный Мрак";break;
		}
		$str.="&nbsp;<img src='img/orden/".$item_Array["need_orden"]."/0.gif' border=0 alt='Требуемый орден:\n".$orden_dis."'>";
	}
	$str.="&nbsp;(Масса: ".$item_Array["mass"].")<br>";
	$str.="<b>Цена: ".($item_Array["price"]>$my_money  && count($db)>0?"<FONT COLOR=RED>":"").$price_gos.($db["vip"]>time() && $item_Array["art"]>0?" [V.I.P Клуб ".$price_art."]":"")."</font> ".$price_print."</b>";
	$str.=($item_Array["gos_price"]>0?" (Гос. цена: ".sprintf ("%01.2f", $item_Array["gos_price"])." $price_print)":"");
	$str.="<BR>Долговечность: ".(int)$item_Array["iznos"]."/".(int)$item_Array["iznos_max"]."<BR>";
	$str.=($item_Array["edited"]>0?"<FONT COLOR=green>Возможно усиление до 10го уровня</font><BR>":"");
	$str.=($item_Array["object"]=="spear" || $item_Array["object_type"]=="spear"?"Срок годности: 30 дн.<BR>":"");
	$str.=($item_Array["add_xp"]>0?"Усилен: +".$item_Array["add_xp"]."<BR>":"");
	$str.=($item_Array["gravirovka"]!=""?"Выгравирована надпись: <i>".$item_Array["gravirovka"]."</i><BR>":"");

	$str.="<b>Требуется минимальное:</b><BR>";
	
	$str.=(($item_Array['min_sila'])?"• ".(($item_Array['min_sila'] > ($db['sila']+$effect["add_sila"]) && count($db)>0)?"<font color=red>":"")."Сила: {$item_Array['min_sila']}</font><BR>":"");
	$str.=(($item_Array['min_lovkost'])?"• ".(($item_Array['min_lovkost'] > ($db['lovkost']+$effect["add_lovkost"]) && count($db)>0)?"<font color=red>":"")."Ловкость: {$item_Array['min_lovkost']}</font><BR>":"");
	$str.=(($item_Array['min_udacha'])?"• ".(($item_Array['min_udacha'] > ($db['udacha']+$effect['add_udacha']) && count($db)>0)?"<font color=red>":"")."Удача: {$item_Array['min_udacha']}</font><BR>":"");
	$str.=(($item_Array['min_power'])?"• ".(($item_Array['min_power'] > $db['power'] && count($db)>0)?"<font color=red>":"")."Выносливость: {$item_Array['min_power']}</font><BR>":"");
	$str.=(($item_Array['min_intellekt'])?"• ".(($item_Array['min_intellekt'] > ($db['intellekt']+$effect['add_intellekt']) && count($db)>0)?"<font color=red>":"")."Интеллект: {$item_Array['min_intellekt']}</font><BR>":"");
	$str.=(($item_Array['min_vospriyatie'])?"• ".(($item_Array['min_vospriyatie'] > $db['vospriyatie'] && count($db)>0)?"<font color=red>":"")."Воссприятие: {$item_Array['min_vospriyatie']}</font><BR>":"");
	$str.=(($item_Array['min_level'])?"• ".(($item_Array['min_level'] > $db['level'] && count($db)>0)?"<font color=red>":"")."Уровень: {$item_Array['min_level']}</font><BR>":"");

	$str.=(($item_Array['min_sword_vl'])?"• ".(($item_Array['min_sword_vl'] > $db['sword_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владения мечами: {$item_Array['min_sword_vl']}</font><BR>":"");
	$str.=(($item_Array['min_staff_vl'])?"• ".(($item_Array['min_staff_vl'] > $db['staff_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владение посохами: {$item_Array['min_staff_vl']}</font><BR>":"");
	$str.=(($item_Array['min_axe_vl'])?"• ".(($item_Array['min_axe_vl'] > $db['axe_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владения топорами, секирами: {$item_Array['min_axe_vl']}</font><BR>":"");
	$str.=(($item_Array['min_fail_vl'])?"• ".(($item_Array['min_fail_vl'] > $db['hummer_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владения дубинами и булавами: {$item_Array['min_fail_vl']}</font><BR>":"");
	$str.=(($item_Array['min_knife_vl'])?"• ".(($item_Array['min_knife_vl'] > $db['castet_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владения ножами, кастетами: {$item_Array['min_knife_vl']}</font><BR>":"");
	$str.=(($item_Array['min_spear_vl'])?"• ".(($item_Array['min_spear_vl'] > $db['copie_vl'] && count($db)>0)?"<font color=red>":"")."Мастерство владения древковоми оружиями: {$item_Array['min_spear_vl']}</font><BR>":"");
	
	$str.=(($item_Array['min_fire'])?"• ".(($item_Array['min_fire'] > $db['fire_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Огня: {$item_Array['min_fire']}</font><BR>":"");
	$str.=(($item_Array['min_water'])?"• ".(($item_Array['min_water'] > $db['water_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Воды: {$item_Array['min_water']}</font><BR>":"");
	$str.=(($item_Array['min_air'])?"• ".(($item_Array['min_air'] > $db['air_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Воздуха: {$item_Array['min_air']}</font><BR>":"");
	$str.=(($item_Array['min_earth'])?"• ".(($item_Array['min_earth'] > $db['earth_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Земли: {$item_Array['min_earth']}</font><BR>":"");
	$str.=(($item_Array['min_svet'])?"• ".(($item_Array['min_svet'] > $db['svet_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Света: {$item_Array['min_svet']}</font><BR>":"");
	$str.=(($item_Array['min_tma'])?"• ".(($item_Array['min_tma'] > $db['tma_magic'] && count($db)>0)?"<font color=red>":"")."Владение магией Тьмы: {$item_Array['min_tma']}</font><BR>":"");
	$str.=(($item_Array['min_gray'])?"• ".(($item_Array['min_gray'] > $db['gray_magic'] && count($db)>0)?"<font color=red>":"")."Владение серой магией: {$item_Array['min_gray']}</font><BR>":"");
	
	if($item_Array['sex']!="" && count($db)>0)
	{
		$str.="• ";
		if ($item_Array['sex']!=$db["sex"])$str.="<font color=#FF0000>";
		if ($item_Array['sex'] == "female")$str.="Пол: Женский";
	    else if($item_Array['sex'] == "male")$str.="Пол: Мужской";
		$str.="</font><BR>";
	}
	$str.="<b>Действует на:</b><BR>";
	
	$str.=(($item_Array['two_hand'])?"• <font style='color:#008080'><b>Двуручное оружие</b></font><BR>":"");
	$str.=(($item_Array['second_hand'])?"• <font style='color:green'>Второе оружие</font><BR>":"");

	$str.=(($item_Array['min_attack'] && $item_Array['max_attack'])?"• Урон: {$item_Array['min_attack']} - {$item_Array['max_attack']}<BR>":"");
	$str.=(($item_Array['proboy'])?"• Мф. удара сквозь броню: {$item_Array['proboy']}<BR>":"");

	$str.=(($item_Array['add_sila']>0)?"• Сила: +{$item_Array['add_sila']}<BR>":"");
	$str.=(($item_Array['add_sila']<0)?"• Сила: {$item_Array['add_sila']}<BR>":"");
	$str.=(($item_Array['add_lovkost']>0)?"• Ловкость: +{$item_Array['add_lovkost']}<BR>":"");
	$str.=(($item_Array['add_lovkost']<0)?"• Ловкость: {$item_Array['add_lovkost']}<BR>":"");
	$str.=(($item_Array['add_udacha']>0)?"• Удача: +{$item_Array['add_udacha']}<BR>":"");
	$str.=(($item_Array['add_udacha']<0)?"• Удача: {$item_Array['add_udacha']}<BR>":"");
	$str.=(($item_Array['add_intellekt']>0)?"• Интеллект: +{$item_Array['add_intellekt']}<BR>":"");
	$str.=(($item_Array['add_duxovnost']>0)?"• Духовность: +{$item_Array['add_duxovnost']}<BR>":"");
	$str.=(($item_Array['add_hp'])?"• Уровень жизни: +{$item_Array['add_hp']}<BR>":"");
	$str.=(($item_Array['add_mana'])?"• Уровень маны: +{$item_Array['add_mana']}<BR>":"");
	
	$str.=(($item_Array['krit'])?"• Мф. критических ударов: {$item_Array['krit']}%<BR>":"");
	$str.=(($item_Array['akrit'])?"• Мф. против крит. ударов: {$item_Array['akrit']}%<BR>":"");
	$str.=(($item_Array['ms_krit'])?"• Мф. мощности крит. удара: {$item_Array['ms_krit']}%<BR>":"");
	$str.=(($item_Array['parry'])?"• Мф. парирования: {$item_Array['parry']}%<BR>":"");
	$str.=(($item_Array['counter'])?"• Мф. контрудара: {$item_Array['counter']}%<BR>":"");
	$str.=(($item_Array['uvorot'])?"• Мф. увертывания: {$item_Array['uvorot']}%<BR>":"");
	$str.=(($item_Array['auvorot'])?"• Мф. против увертывания: {$item_Array['auvorot']}%<BR>":"");
	
	$str.=(($item_Array['add_krit'])?"• Мф. критических ударов: {$item_Array['add_krit']}%<BR>":"");
	$str.=(($item_Array['add_akrit'])?"• Мф. против крит. ударов: {$item_Array['add_akrit']}%<BR>":"");
	$str.=(($item_Array['add_uvorot'])?"• Мф. увертывания: {$item_Array['add_uvorot']}%<BR>":"");
	$str.=(($item_Array['add_auvorot'])?"• Мф. против увертывания: {$item_Array['add_auvorot']}%<BR>":"");

	
	$str.=(($item_Array['add_oruj'])?"• Владения Оружием: +{$item_Array['add_oruj']}<BR>":"");
	$str.=(($item_Array['add_knife_vl'])?"• Мастерство владения ножами и кастетами: +{$item_Array['add_knife_vl']}<BR>":"");
	$str.=(($item_Array['add_axe_vl'])?"• Мастерство владения топорами и секирами: +{$item_Array['add_axe_vl']}<BR>":"");
	$str.=(($item_Array['add_fail_vl'])?"• Мастерство владения дубинами и булавами: +{$item_Array['add_fail_vl']}<BR>":"");
	$str.=(($item_Array['add_sword_vl'])?"• Мастерство владения мечами: +{$item_Array['add_sword_vl']}<BR>":"");
	$str.=(($item_Array['add_staff_vl'])?"• Мастерство владение посохами: +{$item_Array['add_staff_vl']}<BR>":"");
	$str.=(($item_Array['add_spear_vl'])?"• Мастерство владения древковоми оружиями: +{$item_Array['add_spear_vl']}<BR>":"");
	
	$str.=(($item_Array['add_fire'])?"• Мастерство владения стихией Огня: +{$item_Array['add_fire']}<BR>":"");
	$str.=(($item_Array['add_water'])?"• Мастерство владения стихией Воды: +{$item_Array['add_water']}<BR>":"");
	$str.=(($item_Array['add_air'])?"• Мастерство владения стихией Воздуха: +{$item_Array['add_air']}<BR>":"");
	$str.=(($item_Array['add_earth'])?"• Мастерство владения стихией Земли: +{$item_Array['add_earth']}<BR>":"");
	$str.=(($item_Array['add_svet'])?"• Мастерство владения магией Света: +{$item_Array['add_svet']}<BR>":"");
	$str.=(($item_Array['add_gray'])?"• Мастерство владения серой магией: +{$item_Array['add_gray']}<BR>":"");
	$str.=(($item_Array['add_tma'])?"• Мастерство владения магией Тьмы: +{$item_Array['add_tma']}<BR>":"");
	
	$str.=(($item_Array['protect_head'])?"• Броня головы: {$item_Array['protect_head']}<BR>":"");
	$str.=(($item_Array['protect_arm'])?"• Броня рук: {$item_Array['protect_arm']}<BR>":"");
	$str.=(($item_Array['protect_corp'])?"• Броня корпуса: {$item_Array['protect_corp']}<BR>":"");
	$str.=(($item_Array['protect_poyas'])?"• Броня пояса: {$item_Array['protect_poyas']}<BR>":"");
	$str.=(($item_Array['protect_legs'])?"• Броня ног: {$item_Array['protect_legs']}<BR>":"");
	
	$str.=(($item_Array['protect_rej'])?"• Защита от режущего урона: {$item_Array['protect_rej']}<BR>":"");
	$str.=(($item_Array['protect_drob'])?"• Защита от дробящего урона: {$item_Array['protect_drob']}<BR>":"");
	$str.=(($item_Array['protect_kol'])?"• Защита от колющего урона: {$item_Array['protect_kol']}<BR>":"");
	$str.=(($item_Array['protect_rub'])?"• Защита от рубящего урона: {$item_Array['protect_rub']}<BR>":"");
	
	$str.=(($item_Array['protect_fire'])?"• Защиты от магии Огня: {$item_Array['protect_fire']}<BR>":"");
	$str.=(($item_Array['protect_water'])?"• Защиты от магии Воды: {$item_Array['protect_water']}<BR>":"");
	$str.=(($item_Array['protect_air'])?"• Защиты от магии Воздуха: {$item_Array['protect_air']}<BR>":"");
	$str.=(($item_Array['protect_earth'])?"• Защиты от магии Земли: {$item_Array['protect_earth']}<BR>":"");	
	$str.=(($item_Array['protect_svet'])?"• Защиты от магии Света: {$item_Array['protect_svet']}<BR>":"");
	$str.=(($item_Array['protect_tma'])?"• Защиты от магии Тьмы: {$item_Array['protect_tma']}<BR>":"");
	$str.=(($item_Array['protect_gray'])?"• Защиты от Серой магии: {$item_Array['protect_gray']}<BR>":"");

	$str.=(($item_Array['protect_udar'])?"• Защита от урона: +{$item_Array['protect_udar']}%<BR>":"");
	$str.=(($item_Array['protect_mag'])?"• Защита от магии: +{$item_Array['protect_mag']}%<BR>":"");
	
	$str.=(($item_Array['shieldblock'])?"• Мф.блока щитом: +{$item_Array['shieldblock']}%<BR>":"");
	
	$str.=(($item_Array['ms_udar'])?"• Мф. мощности урона: +{$item_Array['ms_udar']}%<BR>":"");
	$str.=(($item_Array['ms_rub'])?"• Мф. мощности рубящго урона: +{$item_Array['ms_rub']}%<BR>":"");
	$str.=(($item_Array['ms_kol'])?"• Мф. мощности колющего урона: +{$item_Array['ms_kol']}%<BR>":"");
	$str.=(($item_Array['ms_drob'])?"• Мф. мощности дробящего урона: +{$item_Array['ms_drob']}%<BR>":"");
	$str.=(($item_Array['ms_rej'])?"• Мф. мощности режущего урона: +{$item_Array['ms_rej']}%<BR>":"");
	
	$str.=(($item_Array['ms_mag'])?"• Мф. мощности магии стихий: +{$item_Array['ms_mag']}%<BR>":"");
	$str.=(($item_Array['ms_fire'])?"• Мф. мощности магии Огня: +{$item_Array['ms_fire']}%<BR>":"");
	$str.=(($item_Array['ms_water'])?"• Мф. мощности магии Воды: +{$item_Array['ms_water']}%<BR>":"");
	$str.=(($item_Array['ms_air'])?"• Мф. мощности магии Воздуха: +{$item_Array['ms_air']}%<BR>":"");
	$str.=(($item_Array['ms_earth'])?"• Мф. мощности магии Земли: +{$item_Array['ms_earth']}%<BR>":"");
	$str.=(($item_Array['ms_svet'])?"• Мф. мощности магии Света: +{$item_Array['ms_svet']}%<BR>":"");
	$str.=(($item_Array['ms_tma'])?"• Мф. мощности магии Тьмы: +{$item_Array['ms_tma']}%<BR>":"");
	$str.=(($item_Array['ms_gray'])?"• Мф. мощности Серой магии: +{$item_Array['ms_gray']}%<BR>":"");

	$str.=(($item_Array['add_rej']>0 || $item_Array['add_drob']>0 || $item_Array['add_kol']>0 || $item_Array['add_rub']>0 ||$item_Array['add_fire_att']>0 || $item_Array['add_air_att']>0 || $item_Array['add_watet_att']>0 || $item_Array['add_earth_att']>0)?"<b>Особенности атаки:</b><BR>":"");
	$str.=(($item_Array['add_rej'])?"• Мф. режущего урона: +{$item_Array['add_rej']}%<BR>":"");
	$str.=(($item_Array['add_drob'])?"• Мф. дробящего урона: +{$item_Array['add_drob']}%<BR>":"");
	$str.=(($item_Array['add_kol'])?"• Мф. колющего урона: +{$item_Array['add_kol']}%<BR>":"");
	$str.=(($item_Array['add_rub'])?"• Мф. рубящего урона: +{$item_Array['add_rub']}%<BR>":"");
	
	$str.=(($item_Array['add_fire_att'])?"• Мф. огненные атаки: +{$item_Array['add_fire_att']}%<BR>":"");
	$str.=(($item_Array['add_air_att'])?"• Мф. электрические атаки: +{$item_Array['add_air_att']}%<BR>":"");
	$str.=(($item_Array['add_watet_att'])?"• Мф. ледяные атаки: +{$item_Array['add_watet_att']}%<BR>":"");
	$str.=(($item_Array['add_earth_att'])?"• Мф. земляные атаки: +{$item_Array['add_earth_att']}%<BR>":"");
	
	$str.=(($item_Array['term'])?"<BR><b>Аренда:</b> до ".(date('d.m.y H:i:s', $item_Array['term'])):"");

	$str.=(($item_Array['bs'])?"<br><font style='font-size:11px; color:#990000'>Турнирный доспех</font>":"");
	$str.=(($item_Array['podzemka'])?"<br><font style='font-size:11px; color:#990000'>Предмет из подземелья</font>":"");
	$str.=(($item_Array['noremont'])?"<br><font style='font-size:11px; color:#990000'>Предмет не подлежит ремонту</font>":"");
	$str.=(($item_Array["object"]=="spear" || $item_Array["object_type"]=="spear")?"<br><font style='font-size:11px; color:#990000'>Зона Блокирования: ++ (При надевании на вторую руку)</font>":"");
	echo $str;
}
?>