<?
include "conf.php";
$data = mysql_connect($base_name, $base_user, $base_pass);
mysql_select_db($db_name,$data);
$result = mysql_fetch_array(mysql_query("SELECT name, name_short FROM clan ORDER BY wins DESC LIMIT 1"));
$SostQuery = mysql_query("SELECT login FROM users WHERE clan_short='".$result["name_short"]."' and blok=0 and vip<".time());
while($DAT = mysql_fetch_array($SostQuery))
{
	mysql_query("UPDATE users SET vip=".(time()+7*24*3600)." WHERE login='".$DAT["login"]."'");
	$logins.=$comma."<b>".$DAT["login"]."</b>";
	$comma=", ";
}
$text="Ханство <b>".$result["name"]."</b> попал в ежемесячное лучших Ханств и Воины ".$logins." стали обладателям <b>VIP</b> на неделю";
mysql_query("INSERT INTO news (info,type) VALUES ('".$text."',1);");
$text = "sys<font style=color:#ff0000>".$text."</font>endSys";
$chat_base = "/var/www/u0016470/data/www/chat/lovechat";
$fopen_chat = fopen($chat_base,"a");
fwrite ($fopen_chat,"::".time()."::sys_news::#FF0000::$text::room4::mountown::\n");
fclose ($fopen_chat);
echo "Reytinq Xanstv: ".$logins;

mysql_query("UPDATE `users` SET peredacha=0 WHERE 1");
?>