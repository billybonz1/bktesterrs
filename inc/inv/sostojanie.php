<table cellspacing="2" cellpadding="1" border="0" width=100% background='img/inv/inv-2_31.gif'>
<tr><td  background='img/inv/inv-2_27.gif'><font color="#0000FF"><b>Состояние</b></font></td></tr>
			<tr>
				<td valign=top align=left>
					<?
						$s=mysql_query("SELECT * FROM effects LEFT JOIN scroll on scroll.id=effects.elik_id WHERE end_time>".time()." and effects.user_id=".$db["id"]);
						if (mysql_num_rows($s))
						{	
							while ($sc=mysql_fetch_array($s))
							{
								echo "<img src='img/".$sc["img"]."' border=0 title='".$sc["name"]."\n".$sc["descs"]."\n"."Еще ".convert_time($sc['end_time'])."'>&nbsp;";
							}
							echo "<br><br>";
						}
						if (ceil($db['cure']))
						{						
							echo "Восстановление HP (%) + ".ceil($db['cure'])." (Пагубное пристрастие [".ceil($db['cure'])."])<BR><BR>";
						}
						if($db["vip"]>time())
						{
							echo "<img src='img/naqrada/vip.gif' border=0 alt='V.I.P Клуб WWW.KDREAMS.RU.'>V.I.P Клуб WWW.KDREAMS.RU - Еще: ".convert_time($db["vip"])."<BR><BR>";
						}
						if($db["travm"]!=0)
						{
							$travm=$db["travm_var"];
							$kstat=$db["travm_stat"];
							$stats=$db["travm_old_stat"];
							if($travm==1){$travm="легкая травма";}
							else if($travm==2){$travm="средняя травма";}
							else if($travm==3){$travm="тяжелая травма";}
							else if($travm==4){$travm="неличимая травма";}
							if($kstat=="sila"){$kstat="Сила";}
							else if($kstat=="lovkost"){$kstat="Ловкость";}
							else if($kstat=="udacha"){$kstat="Интуиция";}
							else if($kstat=="intellekt"){$kstat="Интеллект";}
							
							echo "<img src=img/index/travma.gif border=0> ";
							echo "У персонажа <B>$travm.</B> ";
							echo "Ослабленна характеристика <B style='color:#ff0000'>$kstat-$stats</B> ";
							echo "(Еще ".convert_time($db['travm']).")<BR><br>";
						}
						if($db["oslab"]>time())
					   	{
							echo "<img src=img/index/travma.gif border=0> ";
							echo "Персонаж ослаблен из-за смерти в бою, еще ".convert_time($db['oslab'])."<BR><BR>"; 
						}
						if($db["shut"]>time())
					   	{							
							echo "<img src=img/index/molch.gif border=0> ";
							echo "Молчит еще ".convert_time($db['shut'])."<BR><BR>"; 
						}
						if($db["travm_protect"]>time())
					   	{							
							echo "<img src='img/index/travm_protect.gif'>";
							echo "<b>Магические способности:</b> Защита от травм, еще ".convert_time($db['travm_protect'])."<BR><BR>"; 
						}
					?>
				</td>
			</tr>
			<tr><td  background='img/inv/inv-2_27.gif'><font color="#0000FF"><b>Статовые бонусы</b></font></td></tr>
			<tr><td background='img/inv/inv-2_31.gif'>
			
			<DIV style='padding-left: 10'>
			<?
					if ($db["sila"]+$effect["add_sila"]>=125) 	    echo "<B>Сила Гиганта</B><BR>• Максимальное наносимое повреждение: 10<br>• Минимальное наносимое повреждение: 10<br>• Мф. мощности урона: 25<BR><BR>";
					else if ($db["sila"]+$effect["add_sila"]>=100) 	echo "<B>Сила Гиганта</B><BR>• Мф. мощности урона: 25<BR><BR>";
					else if ($db["sila"]+$effect["add_sila"]>=75) 	echo "<B>Сила Гиганта</B><BR>• Мф. мощности урона: 17<BR><BR>";
					else if ($db["sila"]+$effect["add_sila"]>=50) 	echo "<B>Сила Гиганта</B><BR>• Мф. мощности урона: 10<BR><BR>";
					else if ($db["sila"]+$effect["add_sila"]>=25) 	echo "<B>Сила Гиганта</B><BR>• Мф. мощности урона: 5<BR><BR>";
					
					if ($db["lovkost"]+$effect["add_lovkost"]>=125) 	    echo "<B>Скорость Ветра</B><BR>• Мф. против критического удара (%): 40<br>• Мф. парирования (%): 15<br>• Мф. увертывания (%): 120<BR><BR>";
					else if ($db["lovkost"]+$effect["add_lovkost"]>=100) 	echo "<B>Скорость Ветра</B><BR>• Мф. против критического удара (%): 40<br>• Мф. парирования (%): 15<br>• Мф. увертывания (%): 105<BR><BR>";
					else if ($db["lovkost"]+$effect["add_lovkost"]>=75) 	echo "<B>Скорость Ветра</B><BR>• Мф. против критического удара (%): 15<br>• Мф. парирования (%): 15<br>• Мф. увертывания (%): 35<BR><BR>";
					else if ($db["lovkost"]+$effect["add_lovkost"]>=50) 	echo "<B>Скорость Ветра</B><BR>• Мф. против критического удара (%): 15<br>• Мф. парирования (%): 5<br>• Мф. увертывания (%): 35<BR><BR>";
					else if ($db["lovkost"]+$effect["add_lovkost"]>=25) 	echo "<B>Скорость Ветра</B><BR>• Мф. парирования (%): 5<BR><BR>";
					
					if($db["udacha"]+$effect["add_udacha"]>=125) 		echo "<B>Свирепость Дракона</B><BR>• Мф. критического удара (%): 120<br>• Мф. мощности крит. удара (%): 25<br>• Мф. против увертывания (%): 45<BR><BR>";
					else if ($db["udacha"]+$effect["add_udacha"]>=100) 	echo "<B>Свирепость Дракона</B><BR>• Мф. критического удара (%): 105<br>• Мф. мощности крит. удара (%): 25<br>• Мф. против увертывания (%): 45<BR><BR>";
					else if ($db["udacha"]+$effect["add_udacha"]>=75) 	echo "<B>Свирепость Дракона</B><BR>• Мф. критического удара (%): 35<br>• Мф. мощности крит. удара (%): 25<br>• Мф. против увертывания (%): 15<BR><BR>";
					else if ($db["udacha"]+$effect["add_udacha"]>=50) 	echo "<B>Свирепость Дракона</B><BR>• Мф. критического удара (%): 35<br>• Мф. мощности крит. удара (%): 10<br>• Мф. против увертывания (%): 15<BR><BR>";
					else if ($db["udacha"]+$effect["add_udacha"]>=25)	echo "<B>Свирепость Дракона</B><BR>• Мф. мощности крит. удара (%): 10<BR><BR>";
					
					if ($db["power"]>=125) 		echo "<B>Горная Твердыня</B><BR>• 25% защиты от урона<BR>• 25% защиты от магии<BR><BR>";
					else if ($db["power"]>=100)	echo "<B>Горная Твердыня</B><BR>• 20% защиты от урона<BR>• 20% защиты от магии<BR><BR>";
					else if ($db["power"]>=75)	echo "<B>Горная Твердыня</B><BR>• 15% защиты от урона<BR>• 15% защиты от магии<BR><BR>";
					else if ($db["power"]>=50)	echo "<B>Горная Твердыня</B><BR>• 10% защиты от урона<BR>• 10% защиты от магии<BR><BR>";
					else if ($db["power"]>=25)	echo "<B>Горная Твердыня</B><BR>• 5% защиты от урона <BR>• 5% защиты от магии<BR><BR>";
					
					if ($db["intellekt"]+$effect["add_intellekt"]>=125)			echo "<B>Древнее Знание</B><BR>• мощности магии стихий +25%<BR><BR>";
					else if ($db["intellekt"]+$effect["add_intellekt"]>=100)	echo "<B>Древнее Знание</B><BR>• мощности магии стихий +20%<BR><BR>";
					else if ($db["intellekt"]+$effect["add_intellekt"]>=75) 	echo "<B>Древнее Знание</B><BR>• мощности магии стихий +15%<BR><BR>";
					else if ($db["intellekt"]+$effect["add_intellekt"]>=50) 	echo "<B>Древнее Знание</B><BR>• мощности магии стихий +10%<BR><BR>";
					else if ($db["intellekt"]+$effect["add_intellekt"]>=25) 	echo "<B>Древнее Знание</B><BR>• мощности магии стихий +5%<BR><BR>";
			?>
			</div>
			<BR><BR><small><font color=red>Внимание!</font> Персонаж, у которого любой из статов будет больше (25,50,75,100,125), сможет получить от него бонус. 
			Одновременно можно иметь бонусы по нескольким статам. 
			Бонусы по одному и тому же стату не суммируются, а заменяются новым параметром. 
			(Пример: Если вы имеете 100 силы то у вас будет +10% к наносимому урону, а не 10%+5%.)</small><br><br>
			
			</td></tr>
			</table>
			