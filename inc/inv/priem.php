<table cellspacing="1" cellpadding="1" border="0" width=100%>
			<tr>
				<td valign=top align=left background='img/inv/inv-2_27.gif'>
					<?
						if (($_GET["action"]=="onset_priem") && is_numeric($_GET["id"]))
						{
							$id=(int)$_GET["id"];
							$res=mysql_query("SELECT * FROM priem WHERE id=$id and view=0");
							if (mysql_num_rows($res))
							{
								$result=mysql_fetch_array($res);
								if ($db["level"] < $result["level"]) $msg="Уровень слишком мал!";
								else if ($db['intellekt']+$effect["add_intellekt"] < $result["intellekt"]) $msg="Требуется Мин. Интеллект ".$result["intellekt"];
								else if ($db["vospriyatie"] < $result["vospriyatie"]) $msg="Требуется Мин. Восприятие ".$result["vospriyatie"];								
								else if ($db["fire_magic"]+$effect["add_fire_magic"] < $result["fire_magic"]) $msg="Требуется Мастерство владения стихией Огня ".$result["fire_magic"];
								else if ($db["earth_magic"]+$effect["add_earth_magic"] < $result["earth_magic"]) $msg="Требуется Мастерство владения стихией Земли ".$result["earth_magic"];
								else if ($db["water_magic"]+$effect["add_water_magic"] < $result["water_magic"]) $msg="Требуется Мастерство владения стихией Воды ".$result["water_magic"];
								else if ($db["air_magic"]+$effect["add_air_magic"] < $result["air_magic"]) $msg="Требуется Мастерство владения стихией Воздуха ".$result["air_magic"];
								
								else if ($db["svet_magic"]+$effect["add_svet_magic"] < $result["svet_magic"]) $msg="Мастерство владения стихией Света ".$result["svet_magic"];
								else if ($db["tma_magic"]+$effect["add_tma_magic"] < $result["tma_magic"]) $msg="Мастерство владения стихией Тьмы ".$result["tma_magic"];
								else if ($db["gray_magic"]+$effect["add_gray_magic"] < $result["gray_magic"]) $msg="Мастерство владения Серой магии ".$result["gray_magic"];
								else
								{
									$sl_inf=mysql_fetch_array(mysql_query("SELECT count(*) FROM slots_priem WHERE priem_id=".$id." and user_id =".$db["id"]));
									if ($sl_inf[0])
									{
										$msg="Неправильный ввод данных";
									}
								 	else
								 	{
								 		$slot_inf=mysql_fetch_array(mysql_query("SELECT * FROM slots_priem WHERE priem_id=0 and user_id =".$db["id"]." ORDER BY sl_name ASC"));
								 		if (!$slot_inf)$slot_name = "sl1";
								 		else $slot_name = $slot_inf["sl_name"];
										mysql_query("UPDATE slots_priem SET priem_id=".$id." WHERE sl_name='".$slot_name."' and user_id =".$db["id"]);
									}
								}
							}
						}
						if ($_GET["action"]=="unset_priem")
						{
							$sl_name=htmlspecialchars(addslashes($_GET["sl_name"]));
							mysql_query("UPDATE slots_priem SET priem_id=0 WHERE sl_name='$sl_name' and user_id = ".$db["id"]);
						}
						if ($_GET["clear_abil"]=="all")
						{
							mysql_query("UPDATE slots_priem SET priem_id=0 WHERE user_id = ".$db["id"]);
						}
						$used_priem=array();
						echo "<font color=red>".$msg."</font>";
						echo "<table width=100%>
						<tr>
							<td valign=top><b>Выбранные приемы для боя: </b>";
								echo"<table><tr>";
								$aktiv_p = mysql_query("SELECT * FROM slots_priem LEFT JOIN priem on priem.id=slots_priem.priem_id WHERE user_id=".$db["id"]." ORDER BY sl_name ASC");
								while($aktiv_priem=mysql_fetch_array($aktiv_p))
								{
									$used_priem[]=(int)$aktiv_priem["priem_id"];
									echo "<td>";
									if ($aktiv_priem["priem_id"]!=0)
									{
										if 	($db["level"] >= $aktiv_priem["level"] &&
											($db['intellekt']+$effect["add_intellekt"] >= $aktiv_priem["intellekt"])&& 
											($db["vospriyatie"] >= $aktiv_priem["vospriyatie"])&& 			
											($db["fire_magic"]+$effect["add_fire_magic"] >= $aktiv_priem["fire_magic"])&& 
											($db["earth_magic"]+$effect["add_earth_magic"] >= $aktiv_priem["earth_magic"])&& 
											($db["water_magic"]+$effect["add_water_magic"] >= $aktiv_priem["water_magic"])&& 
											($db["air_magic"]+$effect["add_air_magic"] >= $aktiv_priem["air_magic"])&& 
											($db["svet_magic"]+$effect["add_svet_magic"] >= $aktiv_priem["svet_magic"])&& 
											($db["tma_magic"]+$effect["add_tma_magic"] >= $aktiv_priem["tma_magic"])&& 
											($db["gray_magic"]+$effect["add_gray_magic"] >= $aktiv_priem["gray_magic"]))
											{
												echo "\n<img src='img/priem/misc/".$aktiv_priem["id"].".gif' style='cursor:pointer' onclick=\"document.location='main.php?act=inv&page_type=characteristics&char_type=priem&action=unset_priem&sl_name=".$aktiv_priem["sl_name"]."&tmp=".time()."'\" onmouseover=\"show_priems_info([".$aktiv_priem["hit"].",".$aktiv_priem["krit"].",".$aktiv_priem["block"].",".$aktiv_priem["uvarot"].",".$aktiv_priem["hp"].",".$aktiv_priem["all_hit"].",".$aktiv_priem["parry"]."], '".$aktiv_priem["name"].($aktiv_priem["wait"]?"<br></b>Задержка: ".$aktiv_priem["wait"]:"")."', '<b>Требуется минимальное:</b>".($aktiv_priem["level"]?"<br>• Уровень: ".$aktiv_priem["level"]:"").($aktiv_priem["intellekt"]?"<br>• Интеллект: ".$aktiv_priem["intellekt"]:"").($aktiv_priem["vospriyatie"]?"<br>• Восприятие: ".$aktiv_priem["vospriyatie"]:"").($aktiv_priem["mana"]?"<br>• Расход Маны: ".$aktiv_priem["mana"]:"").($aktiv_priem["hod"]?"<br>• Прием тратит ход":"").($aktiv_priem["water_magic"]?"<br>• Мастерство владения стихией Воды: ".$aktiv_priem["water_magic"]:"").($aktiv_priem["earth_magic"]?"<br>• Мастерство владения стихией Земли: ".$aktiv_priem["earth_magic"]:"").($aktiv_priem["fire_magic"]?"<br>• Мастерство владения стихией Огня: ".$aktiv_priem["fire_magic"]:"").($aktiv_priem["air_magic"]?"<br>• Мастерство владения стихией Воздуха: ".$aktiv_priem["air_magic"]:"").($aktiv_priem["svet_magic"]?"<br>• Мастерство владения стихией Света: ".$aktiv_priem["svet_magic"]:"").($aktiv_priem["tma_magic"]?"<br>• Мастерство владения стихией Тьмы: ".$aktiv_priem["tma_magic"]:"").($aktiv_priem["gray_magic"]?"<br>• Мастерство владения Серой магии: ".$aktiv_priem["gray_magic"]:"")."<br><br>".$aktiv_priem["about"]."');\" onmouseout=\"slot_hide();\">\n";
											}
											else
											{
												mysql_query("UPDATE slots_priem SET priem_id=0 WHERE sl_name='".$aktiv_priem["sl_name"]."' and user_id = ".$db["id"]);	
												echo"<img src='img/priem/misc/clear.gif' alt='Пустой слот'>";
											}
									}
									else echo"<img src='img/priem/misc/clear.gif' alt='Пустой слот'>";
									echo "</td>";
								}
								echo"</tr></table>";
								echo "<br><a href='main.php?act=inv&page_type=characteristics&char_type=priem&clear_abil=all'>Очистить</a>";
							echo "</td>
						</tr>
						<tr>
							<td valign=top><br><b>Приёмы для выбора:</b><br>";	
							$all_priem = mysql_query("SELECT * FROM priem WHERE view=0 ORDER BY mag ASC, level ASC, type ASC");
							echo"<table border=0><tr>";
							$i=0;
							while ($a_p = mysql_fetch_array($all_priem))
							{
								if(($i % 15) == 0) echo "</tr>";
								echo "<td>\n<img src='img/priem/misc/".$a_p["id"].".gif' ".((in_Array($a_p["id"],$used_priem)||$db["level"] < $a_p["level"])?"class='nonactive'":"onclick=\"document.location='main.php?act=inv&page_type=characteristics&char_type=priem&action=onset_priem&id=$a_p[id]&tmp=".time()."'\" style='cursor:pointer;'")."  onmouseover=\"show_priems_info([".$a_p["hit"].",".$a_p["krit"].",".$a_p["block"].",".$a_p["uvarot"].",".$a_p["hp"].",".$a_p["all_hit"].",".$a_p["parry"]."], '".$a_p["name"].($a_p["wait"]?"<br></b>Задержка: ".$a_p["wait"]:"")."', '<b>Требуется минимальное:</b>".($a_p["level"]?"<br>• Уровень: ".$a_p["level"]:"").($a_p["intellekt"]?"<br>• Интеллект: ".$a_p["intellekt"]:"").($a_p["vospriyatie"]?"<br>• Восприятие: ".$a_p["vospriyatie"]:"").($a_p["mana"]?"<br>• Расход Маны: ".$a_p["mana"]:"").($a_p["hod"]?"<br>• Прием тратит ход":"").($a_p["water_magic"]?"<br>• Мастерство владения стихией Воды: ".$a_p["water_magic"]:"").($a_p["earth_magic"]?"<br>• Мастерство владения стихией Земли: ".$a_p["earth_magic"]:"").($a_p["fire_magic"]?"<br>• Мастерство владения стихией Огня: ".$a_p["fire_magic"]:"").($a_p["air_magic"]?"<br>• Мастерство владения стихией Воздуха: ".$a_p["air_magic"]:"").($a_p["svet_magic"]?"<br>• Мастерство владения стихией Света: ".$a_p["svet_magic"]:"").($a_p["tma_magic"]?"<br>• Мастерство владения стихией Тьмы: ".$a_p["tma_magic"]:"").($a_p["gray_magic"]?"<br>• Мастерство владения Серой магии: ".$a_p["gray_magic"]:"")."<br><br>".$a_p["about"]."');\" onmouseout=\"slot_hide();\">\n</td>";
								$i++;
							}
							echo"</tr></table>";
							echo"</td>
						</tr></table>";
					?>
				</td>
			</tr>
			</table>