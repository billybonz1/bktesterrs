
<table width="100%" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <td background='img/inv/inv-2_31.gif'>
                <?
				$pr_sql=mysql_query("SELECT title,navika FROM person_proff LEFT JOIN academy on academy.id=person_proff.proff WHERE person=".$db["id"]);
				if (mysql_num_rows($pr_sql))
				{	
					echo "<b>Профессии</b><br>";
					while($pr=mysql_fetch_array($pr_sql))
					{
						echo "&nbsp;• ".$pr["title"].": <b>".$pr["navika"]."</b><br>";
					}
				}
				else echo "В данный момент вы не освоили ни одной профессии.";
			    ?>
	</td>
  </tr>
</table>

				