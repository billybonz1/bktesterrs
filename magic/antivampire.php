<?
session_start();
$login=$_SESSION['login'];
$spell=$_GET['spell'];
$zaman=time()+3*60*60;
$my_id=$db["id"];
$type='vampire';
if($db["battle"])
{
	say($login, "Вы не можете кастовать это заклятие находясь в бою!", $login);
}
else
{
	mysql_query("DELETE FROM effects WHERE user_id=".$my_id." and type='".$type."'");
	mysql_query("INSERT INTO effects (user_id,type,elik_id,end_time) VALUES ('$my_id','$type','$elik_id','$zaman')");
	$_SESSION["message"]="Вы удачно прокастовали заклинание <b>&laquo;".$name."&raquo;</b>";
	drop($spell,$DATA);
}
echo "<script>location.href='main.php?act=inv&otdel=magic'</script>";        
?>