<?
$login=$_SESSION['login'];
$spell=$_GET['spell'];

$add_time=time()+24*60*60;

$pal=mysql_query("SELECT * FROM zver WHERE owner='".$db["id"]."' and sleep=0");
$paltar=mysql_fetch_array($pal);
if (!$paltar)
{
	$_SESSION["message"]="У вас нету зверя...";
}
else
{
	mysql_query("UPDATE zver SET two_hands=$add_time WHERE owner=".$db['id']);
	$_SESSION["message"]="Зверь стал двуручным...";
	drop($spell,$DATA);
}
echo "<script>location.href='main.php?act=inv&otdel=magic'</script>";
die();
?>