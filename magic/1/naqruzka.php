<?
	/* monitoring script by bllem*/
	$la = sys_getloadavg();
?>
<h4>Средняя загрузка сервера</h4>
<?
	echo "<B>за 1 минуту:</B> ".($la[0])."% ";
	if ($la[0] <= 30) 
	{
		echo "<font color=green>низкая</font>";
	} 
	else if ($la[0] < 75 && $la[0] > 30) 
	{
		echo "<font color=orange>средняя</font>";
	} 
	else
	{
		echo "<font color=red>высокая</font>";
	}
	
	echo "<BR><B>за 5 минут:</B> ".($la[1])."% ";
	if ($la[1] < 30) 
	{
		echo "<font color=green>низкая</font>";
	} 
	else if ($la[1] < 75 && $la[1] > 30) 
	{
		echo "<font color=orange>средняя</font>";
	} 
	else
	{
		echo "<font color=red>высокая</font>";
	}
	
	echo "<BR><B>за 15 минут:</B> ".($la[2])."% ";
	if ($la[2] < 30) 
	{
		echo "<font color=green>низкая</font>";
	} 
	else if ($la[2] < 75 && $la[2] > 30) 
	{
		echo "<font color=orange>средняя</font>";
	} 
	else
	{
		echo "<font color=red>высокая</font>";
	}
	$up=exec("uptime");
	echo "<br>".substr($up,0,strpos($up,','));
?>
</BODY>
</HTML>