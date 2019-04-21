<table  width="100%" border="0" cellspacing="1" cellpadding="1">
<tr><td background='img/inv/inv-2_31.gif'><?
                if($db["umenie"])
				{
					echo "<br><FONT COLOR=green>Свободные умения: <b>".$db["umenie"]."</b></FONT><br>";	
				}
?></td><td background='img/inv/inv-2_31.gif'></td></tr>
  <tr>
    <td background='img/inv/inv-2_27.gif'>
<table>
						<tr><td colspan="3"><b>Оружие:</b></td></tr>
						<tr><td>&nbsp;• Мастерство владения мечами, клинками:</td><td>&nbsp;</td><td><b>				<?echo ($sword_vl+$effect["add_sword_vl"]+$db["add_oruj"]);		if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=sword_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения ножами, кастетами:</td><td>&nbsp;</td><td><b>	<?echo ($castet_vl+$effect["add_castet_vl"]+$db["add_oruj"]);	if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=castet_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения топорами, секирами:</td><td>&nbsp;</td><td><b>	<?echo ($axe_vl+$effect["add_axe_vl"]+$db["add_oruj"]);			if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=axe_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения дубинами, булавами:</td><td>&nbsp;</td><td><b>	<?echo ($hummer_vl+$effect["add_hummer_vl"]+$db["add_oruj"]);	if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=hummer_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения древковоми оружиями:</td><td>&nbsp;</td><td><b>	<?echo ($copie_vl+$effect["add_copie_vl"]+$db["add_oruj"]);		if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=copie_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владение посохами:</td><td>&nbsp;</td><td><b>			<?echo ($staff_vl+$effect["add_staff_vl"]);		if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=staff_vl&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>


					
					</table>
	</td>

  
    <td background='img/inv/inv-2_27.gif'>

					<table>
						<tr><td colspan="3"><br><b>Магия:</b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Огня:</td><td>&nbsp;</td><td><b>		<?echo ($fire_magic+$effect["add_fire_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=fire_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Земли:</td><td>&nbsp;</td><td><b>		<?echo ($earth_magic+$effect["add_earth_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=earth_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Воды:</td><td>&nbsp;</td><td><b>		<?echo ($water_magic+$effect["add_water_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=water_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Воздуха:</td><td>&nbsp;</td><td><b>		<?echo ($air_magic+$effect["add_air_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=air_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Света:</td><td>&nbsp;</td><td><b>		<?echo ($svet_magic+$effect["add_svet_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=svet_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения стихией Тьмы:</td><td>&nbsp;</td><td><b>		<?echo ($tma_magic+$effect["add_tma_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=tma_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>
						<tr><td>&nbsp;• Мастерство владения Серой магии:</td><td>&nbsp;</td><td><b>		<?echo ($gray_magic+$effect["add_gray_magic"]);if($db["umenie"]){echo " <a href='main.php?act=inv&page_type=characteristics&char_type=svoistva&do=umenie&stat=gray_magic&sl=L2'><img src='img/icon/plus.gif' border=0 alt='увеличить'></a>";}?></font></b></td></tr>


					
					</table>	

	</td>
</tr>
</table>