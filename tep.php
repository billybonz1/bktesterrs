<?
include "conf.php";
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');
?>
<body background="" leftmargin="0" topmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0">
<style>
BODY {overflow-y: hidden; }
</style>
	<div align='center'>
		<? 
			$date1=strtotime(date('d.m.Y'));
			$date2=$date1+24*60*60;
			$entered=mysql_fetch_array(mysql_query("SELECT count(*) FROM (SELECT id FROM report WHERE (UNIX_TIMESTAMP(time_stamp)>=$date1 and UNIX_TIMESTAMP(time_stamp)<$date2) and type=1 GROUP BY login) as t"));

			$all = mysql_fetch_array(mysql_query("select (SELECT count(*) FROM `users`) as us, (SELECT count(*) FROM `online`)as onl"));
			echo "<font color='#ffeed0' style='font-size:20px;'>
					Всего жителей: <b><u>".(int)($all["us"])."</u></b> чел. | 
					Жителей Он-лайн: <b><u>".(int)$all["onl"]."</u></b> чел. |
					Игроков за сегодня: <b><u>".(int)$entered[0]."</u></b> чел.
					</font><br/>";
		?>
	</div>
	</body>