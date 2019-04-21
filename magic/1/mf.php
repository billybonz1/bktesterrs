<?include("key.php");
$login=$_SESSION['login'];
$target=$_POST['target'];
$krit=$_POST['krit'];
$akrit=$_POST['akrit'];
$uvorot=$_POST['uvorot'];
$auvorot=$_POST['auvorot'];

if(empty($target)){
?>
<body onLoad='top.cf.action=1;' onUnload='top.cf.action=0;'>
<div align=right>
<table border=0 class=inv width=300 height=120>
<tr><td align=left valign=top>
<form name='action' action='main.php?act=inkviz&spell=mf' method='post'>
Укажите логин персонажа:<BR>
<input type=text name='target' class=new size=25><BR>

Мф крита:<BR>
<input type=text name=krit class=new size=25 value="0"><BR>

Мф антикрита:<BR>
<input type=text name=akrit class=new size=25 value="0"><BR>

Мф уворота:<BR>
<input type=text name=uvorot class=new size=25 value="0"><BR>

Мф антиуворота:<BR>
<input type=text name=auvorot class=new size=25 value="0"><BR>

<input type=submit style="height=17" value=" Обновить статы " class=new><BR>
<span class=small>Щелкните на логин в чате.</span>
</form>
</td></tr>
</table>
<?
}
else 
{
	$S="select * from users where login='".$target."'";
	$q=mysql_query($S);
	$res=mysql_fetch_array($q);
	if(!$res)
	{
		print "Персонаж <B>".$target."</B> не найден в базе данных.";
		die();
	}
	if ($res['login']=="СОЗДАТЕЛЬ")
	{
			print "Редактирование богов запрещено высшей силой!";
			die();
	}
	if ($db["adminsite"]!=5)
	{	
		if($res['adminsite']>=5 ||$res["admin_level"]>=9)
		{
			print "Персонаж <B>".$target."</B> не найден в базе данных.";
			die();
		}
	}
	$sql = "UPDATE users SET krit='$krit',akrit='$akrit',uvorot='$uvorot',auvorot='$auvorot' WHERE login='$target'";
	$result = mysql_query($sql);
	print "Персонаж <B>$target</B> обнулён.";
}
?>
