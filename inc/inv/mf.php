<table cellspacing="1" cellpadding="1" border="0" width="100%">
			<tr>
				<td valign=top align="left" width=350 nowrap width="50%" background='img/inv/inv-2_31.gif' >
					<center><b>Защита</b></center><br>
					&nbsp;• Броня головы: <b>	<?=ceil($bron_head);?></b><br>
					&nbsp;• Броня корпуса: <b>	<?=ceil($bron_corp);?></b><br>
					&nbsp;• Броня пояса: <b>	<?=ceil($bron_poyas);?></b><br>
					&nbsp;• Броня ног: <b>		<?=ceil($bron_legs);?></b><br><br>
					
					&nbsp;• Защита от режущего урона: <b><?=ceil($protect_rej+$effect["p_rej"]);?></b><br>
					&nbsp;• Защита от дробящего урона:<b><?=ceil($protect_drob+$effect["p_drob"]);?></b><br>
					&nbsp;• Защита от колющего урона: <b><?=ceil($protect_kol+$effect["p_kol"]);?></b><br>
					&nbsp;• Защита от рубящего урона: <b><?=ceil($protect_rub+$effect["p_rub"]);?></b><br><br>
				
					&nbsp;• Защита от урона: <b><?=ceil($db["protect_udar"]+$effect["add_bron"]+$db["power"]*1.5);?></b><br>
					&nbsp;• Защита от магии: <b><?=ceil($db["protect_mag"]+$effect["add_mg_bron"]+$db["power"]*1.5);?></b><br><br>
					
					&nbsp;• Понижение защиты от магии Огня: 	<b><?=ceil($protect_fire+$effect["protect_fire"]);?></b><br>
					&nbsp;• Понижение защиты от магии Воды: 	<b><?=ceil($protect_water+$effect["protect_water"]);?></b><br>
					&nbsp;• Понижение защиты от магии Воздуха: 	<b><?=ceil($protect_air+$effect["protect_air"]);?></b><br>
					&nbsp;• Понижение защиты от магии Земли: 	<b><?=ceil($protect_earth+$effect["protect_earth"]);?></b><br>
					&nbsp;• Понижение защиты от магии Света: 	<b><?=ceil($protect_svet+$effect["protect_svet"]);?></b><br>
					&nbsp;• Понижение защиты от магии Тьмы: 	<b><?=ceil($protect_tma+$effect["protect_tma"]);?></b><br>
					&nbsp;• Понижение защиты от Серой магии: 	<b><?=ceil($protect_gray+$effect["protect_gray"]);?></b><br><br>
						
					&nbsp;• Мф.блока щитом: <b><?=ceil($shieldblock+$shieldblock*$effect["shieldblock"]/100);?></b><br><br>


				</td>
				<td  valign=top align=left width="50%" background='img/inv/inv-2_27.gif'>
					<? 
						$krit=$mf_krit+5*($db["udacha"]+$effect["add_udacha"])+$effect["add_krit"]; 
						$antikrit=$mf_antikrit+5*($db["udacha"]+$effect["add_udacha"])+$effect["add_akrit"]; 
						$uvorot=$mf_uvorot+5*($db["lovkost"]+$effect["add_lovkost"])+$effect["add_uvorot"];
						$antiuvorot=$mf_antiuvorot+5*($db["lovkost"]+$effect["add_lovkost"])+$effect["add_auvorot"];
						$db["sila"]=$db["sila"]+$effect["add_sila"];
						
						$udar_min1=$hand_r_hitmin+($db["sila"]+ceil($db["sila"]*0.4))+(int)(0+$is_modified1);
						$udar_max1=$hand_r_hitmax+($db["sila"]+ceil($db["sila"]*0.8))+(int)(0+$is_modified1);
						$udar_min2=$hand_l_hitmin+($db["sila"]+ceil($db["sila"]*0.4))+(int)(0+$is_modified2);
						$udar_max2=$hand_l_hitmax+($db["sila"]+ceil($db["sila"]*0.8))+(int)(0+$is_modified2); 
					?>
					<center><b>Модификаторы</b></center><br>
					&nbsp;• Урон: <b><?echo "$udar_min1-$udar_max1".(($db["hand_l_type"]!="phisic" && $db["hand_l_type"]!="shield")?" / $udar_min2-$udar_max2":"");?></b><br>
					&nbsp;• Мф. крит. удара: <b><?echo $krit;?></b><br>
					&nbsp;• Мф. против крит. удара: <b><?echo $antikrit;?></b><br>
					&nbsp;• Мф. увертывания: <b><?echo $uvorot;?></b><br>
					&nbsp;• Мф. против увертывания: <b><?echo $antiuvorot;?></b><br>
					&nbsp;• Мф. парирования: <b><?echo ($parry+5);?></b><br>
					&nbsp;• Мф. контрудара: <b><?echo ($counter+10) ;?></b><br>
					&nbsp;• Мф. пробоя брони: <b><?echo ($proboy+5) ;?></b><br><br>

					&nbsp;• Мф. мощности урона: <b><?echo (int)$ms_udar;?></b><br>
					&nbsp;• Мф. мощности критического удара: <b><?echo (int)$ms_krit;?></b><br><br>
							
					&nbsp;• Мф. мощности рубящго урона: <b><?echo (int)$ms_rub;?></b><br>
					&nbsp;• Мф. мощности колющего урона: <b><?echo (int)$ms_kol;?></b><br>
					&nbsp;• Мф. мощности дробящего урона: <b><?echo (int)$ms_drob;?></b><br>
					&nbsp;• Мф. мощности режущего урона: <b><?echo (int)$ms_rej;?></b><br><br>
					
					&nbsp;• Мф. рубящго урона: <b><?echo (int)$mf_rub1;?></b>-<b><?echo (int)$mf_rub2;?></b><br>
					&nbsp;• Мф. колющего урона: <b><?echo (int)$mf_kol1;?></b>-<b><?echo (int)$mf_kol2;?></b><br>
					&nbsp;• Мф. дробящего урона: <b><?echo (int)$mf_drob1;?></b>-<b><?echo (int)$mf_drob2;?></b><br>
					&nbsp;• Мф. режущего урона: <b><?echo (int)$mf_rej1;?></b>-<b><?echo (int)$mf_rej2;?></b><br><br>
					<?
						if (($db['intellekt']+$effect["add_intellekt"])>=125) 	    $add_ms_mag=25;
						else if (($db['intellekt']+$effect["add_intellekt"])>=100) 	$add_ms_mag=20;
						else if (($db['intellekt']+$effect["add_intellekt"])>=75) 	$add_ms_mag=15;
						else if (($db['intellekt']+$effect["add_intellekt"])>=50) 	$add_ms_mag=10;
						else if (($db['intellekt']+$effect["add_intellekt"])>=25)	$add_ms_mag=5;
						$add_ms_mag=$add_ms_mag+($db['intellekt']+$effect["add_intellekt"])*0.5
					?>
					&nbsp;• Мф. мощности магии: <b><?echo (int)($ms_mag+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Огня: <b><?echo (int)($ms_fire+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Воды: <b><?echo (int)($ms_water+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Воздуха: <b><?echo (int)($ms_air+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Земли: <b><?echo (int)($ms_earth+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Света: <b><?echo (int)($ms_svet+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности магии Тьмы: <b><?echo (int)($ms_tma+$add_ms_mag);?></b><br>
					&nbsp;• Мф. мощности Серой магии: <b><?echo (int)($ms_gray+$add_ms_mag);?></b><br><br>
	
					
			      </td>
			</tr>
			</table>
