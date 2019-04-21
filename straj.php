<?
include_once("key.php");
include_once("conf.php");
include_once("functions.php");
include_once("item_des.php");
ob_start("ob_gzhandler");

$login=$_SESSION['login'];
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');

$result = mysql_query("SELECT users.*,zver.id as zver_count,zver.obraz as zver_obraz,zver.level as zver_level,zver.name as zver_name,zver.type as zver_type FROM `users` LEFT join zver on zver.owner=users.id  and zver.sleep=0 WHERE login='".$login."'");
$db = mysql_fetch_assoc($result);
$n2 = mysql_query("SELECT id FROM `zad` WHERE `id`='".$db['id']."'");
if(!$tr2=mysql_fetch_array($n2)){
mysql_query("INSERT INTO `zad` (id,zad,den,status)VALUES('".$db['id']."','0','1','0')");
}
$n = mysql_query("SELECT * FROM `zad` WHERE `id`='".$db['id']."'");
$tr=mysql_fetch_array($n);
?>
<html>
<HEAD>	
	<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
	<meta http-equiv="Content-Language" content="ru">
	<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
	<meta http-equiv=PRAGMA content=NO-CACHE>
	<meta http-equiv=Expires content=0>	
	<LINK REL=StyleSheet HREF='main.css' TYPE='text/css'>
</HEAD>
<body bgcolor="#e5e2d4" topMargin=0 leftMargin=0 rightMargin=0 bottomMargin=0 >
<DIV id="slot_info" style="VISIBILITY: hidden; POSITION: absolute;z-index: 1;"></DIV>
<script language="JavaScript" type="text/javascript" src="show_inf.js"></script>
<script language="JavaScript" type="text/javascript" src="commoninf.js"></script>
<script language="JavaScript" type="text/javascript" src="glow.js"></script>
<?
if($_GET['zad']==1){
$vremya=1*60*60+time();
	mysql_query("UPDATE `zad` SET zad=1,status=1,vremya='".$vremya."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 1;
$tr["vremya"] = $vremya;
$tr["zad"] = 1;
}
if($_GET['zad']==2){
$vremya=3*60*60+time();
	mysql_query("UPDATE `zad` SET zad=2,status=1,vremya='".$vremya."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 1;
$tr["vremya"] = $vremya;
$tr["zad"] = 2;
}
if($_GET['zad']==3){
$vremya=6*60*60+time();
	mysql_query("UPDATE `zad` SET zad=3,status=1,vremya='".$vremya."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 1;
$tr["vremya"] = $vremya;
$tr["zad"] = 3;
}

if($tr["status"]==1){
$wait_sec=$tr["vremya"];
$new_t=time();
$left_time=$wait_sec-$new_t;
$left_4as=floor($left_time/3600);
$left_min=floor(($left_time/60)-($left_4as*60));
$ll  = floor($left_time/60);
$left_sec=$left_time-$ll*60;
if($wait_sec>$new_t)
{
$vrm = '<font style="font-size:12px"><i style="color:#009"> Приходите после</i>: <font style="color:#990000">'.$left_4as.'</font><font style="font-size:11px; color:#000;"> час. </font><font style="color:#990000">'.$left_min.'</font><font style="font-size:11px; color:#000;"> мин. </font><font style="color:#990000">'.$left_sec.'</font><font style="font-size:11px; color:#000;"> сек. </font></font>';
}else{

mysql_query("UPDATE `zad` SET status=2,vremya='0',vremya_den='0',vremya_den2='0' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил 3 сдал

$tr["status"] = 2;
}

}


if($tr["vremya_den2"]>0){
$wait_sec=$tr["vremya_den2"];
$new_t=time();
$left_time=$wait_sec-$new_t;
$left_4as=floor($left_time/3600);
$left_min=floor(($left_time/60)-($left_4as*60));
$ll  = floor($left_time/60);
$left_sec=$left_time-$ll*60;
if($wait_sec>$new_t)
{
$vrm3 = '<font style="font-size:12px"><i style="color:#009"> Осталось до конца дня</i>: <font style="color:#990000">'.$left_4as.'</font><font style="font-size:11px; color:#000;"> час. </font><font style="color:#990000">'.$left_min.'</font><font style="font-size:11px; color:#000;"> мин. </font><font style="color:#990000">'.$left_sec.'</font><font style="font-size:11px; color:#000;"> сек. </font></font>';
}else{
mysql_query("UPDATE `zad` SET zad=0,den=1,status=0,vremya='0',vremya_den='0',vremya_den2='0' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 0;
$tr["zad"] = 0;
$tr["den"] = 1;
}

}

/////////////////////////////////////////////////////

if($_GET['zdat'] and $tr['status']==2 and $tr['vremya']==0){
///////////////Большое Зелье Неуязвимости///////////////////
if($tr['zad']==1 and $tr['den']==1){
$del_time= time() + 30*24*3600; //30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','111','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time(); //48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Большое Зелье Неуязвимости|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////
///////////////Зелье Пронзающих Игл, Зелье Сверкающих Лезвий, Зелье Свистящих Секир, Зелье Тяжелых Молотов///////////////////
if($tr['zad']==2 and $tr['den']==1){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','239','scroll','magic','0','0','5','".$del_time."','1')");
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','240','scroll','magic','0','0','5','".$del_time."','1')");
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','241','scroll','magic','0','0','5','".$del_time."','1')");
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','242','scroll','magic','0','0','5','".$del_time."','1')");

$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Зелье Пронзающих Игл, Зелье Сверкающих Лезвий, Зелье Свистящих Секир, Зелье Тяжелых Молотов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Артовый чек на 6 часов///////////////////
if($tr['zad']==3 and $tr['den']==1){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','162','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 6 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Великое Зелье Силы///////////////////
if($tr['zad']==1 and $tr['den']==2){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','56','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Великое Зелье Силы|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Большое Эликсир Жизни///////////////////
if($tr['zad']==2 and $tr['den']==2){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','220','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Большое Эликсир Жизни|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Артовый чек на 12 часов///////////////////
if($tr['zad']==3 and $tr['den']==2){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','163','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 12 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Жажда жизни+4///////////////////
if($tr['zad']==1 and $tr['den']==3){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','248','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Жажда жизни+4|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Эликсир гиганта///////////////////
if($tr['zad']==2 and $tr['den']==3){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','231','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Эликсир гиганта|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Артовый чек на 24 часов///////////////////
if($tr['zad']==3 and $tr['den']==3){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','164','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 24 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Жажда жизни+5///////////////////
if($tr['zad']==1 and $tr['den']==4){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','249','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Жажда жизни+5|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Эликсир уважения,Эликсир признания///////////////////
if($tr['zad']==2 and $tr['den']==4){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','232','scroll','magic','0','0','5','".$del_time."','1')");
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','233','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Эликсир уважения,Эликсир признания|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Артовый чек на 24 часов///////////////////
if($tr['zad']==3 and $tr['den']==4){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','164','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 24 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////клонирование///////////////////
if($tr['zad']==1 and $tr['den']==5){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','116','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Клонирование|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Жажда жизни+6///////////////////
if($tr['zad']==2 and $tr['den']==5){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','259','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Жажда жизни+6|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////


///////////////Артовый чек на 24 часов///////////////////
if($tr['zad']==3 and $tr['den']==5){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','164','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 24 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Воскрешение///////////////////
if($tr['zad']==1 and $tr['den']==6){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','61','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Воскрешение|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////


///////////////Жажда жизни+6///////////////////
if($tr['zad']==2 and $tr['den']==6){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','259','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Жажда жизни+6|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////


///////////////Артовый чек на 24 часов///////////////////
if($tr['zad']==3 and $tr['den']==6){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','164','".$del_time."','1');");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Артовый чек на 24 часов|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////

///////////////Восстановление энергии 1000хп///////////////////
if($tr['zad']==1 and $tr['den']==7){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','93','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time(); //24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Восстановление энергии 1000хп|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////
///////////////Полное восстановление///////////////////
if($tr['zad']==2 and $tr['den']==7){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','188','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Полное восстановление|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////
///////////////Сила великана///////////////////
if($tr['zad']==3 and $tr['den']==7){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv(owner,object_id,object_type,object_razdel,wear,iznos,iznos_max,term,podzemka) VALUES ('".$db['login']."','227','scroll','magic','0','0','5','".$del_time."','1')");
$vremya=24*60*60+time();
$vremya2=48*60*60+time();
mysql_query("UPDATE `zad` SET status=3,vremya='0',vremya_den='".$vremya."',vremya_den2='".$vremya2."' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$info="<font color=green>Вы получили |Сила великана|</font>";
talk($db["login"],$info,$db);
}
///////////////////////////////////////////////////////////
$tr["status"] = 3;
$tr["vremya_den"] = $vremya;
$tr["vremya_den2"] = $vremya2;
}

/////////////////////////////////////////////////////
///////////////////////////////

if($tr["status"]==3){
$wait_sec=$tr["vremya_den"];
$new_t=time();
$left_time=$wait_sec-$new_t;
$left_4as=floor($left_time/3600);
$left_min=floor(($left_time/60)-($left_4as*60));
$ll  = floor($left_time/60);
$left_sec=$left_time-$ll*60;
if($wait_sec>$new_t)
{
$vrm2 = '<font style="font-size:12px"><i style="color:#009"> Приходите после</i>: <font style="color:#990000">'.$left_4as.'</font><font style="font-size:11px; color:#000;"> час. </font><font style="color:#990000">'.$left_min.'</font><font style="font-size:11px; color:#000;"> мин. </font><font style="color:#990000">'.$left_sec.'</font><font style="font-size:11px; color:#000;"> сек. </font></font>';
}else{
if($tr["den"]==7){
mysql_query("UPDATE `zad` SET zad=0,den=1,status=0,vremya='0',vremya_den='0',vip='0',art='0' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 0;
$tr["zad"] = 0;
$tr["den"] = 1;
}else{
mysql_query("UPDATE `zad` SET zad=0,den=den+1,status=0,vremya='0',vremya_den='0' WHERE id='".$db['id']."'"); //status 0 не начал 1 начал 2 закончил
$tr["status"] = 0;
$tr["zad"] = 0;
$tr["den"] = $tr["den"]+1;
}
}

}
///////////////////////////////////////

if($_GET['vip']==1){
if($tr["den"]==6 and $tr["vip"]==0){
$vip=time()+7*24*3600;
mysql_query("UPDATE `users` SET `vip`='".$vip."' WHERE `id`='".$db['id']."'");
$info="<font color=green>Вы получили |VIP на 7 дней|</font>";
talk($db["login"],$info,$db);
mysql_query("UPDATE `zad` SET vip=1 WHERE id='".$db['id']."'");
$tr["vip"]=1;
}
}
if($_GET['art']==1){
if($tr["den"]==7 and $tr["art"]==0){
$del_time= time() + 30*24*3600;
mysql_query("INSERT INTO inv (owner,object_type,object_id,term,podzemka) VALUES ('".$db['login']."','wood','168','".$del_time."','1');");
$info="<font color=green>Вы получили |Чек на арт на 15 дней|</font>";
talk($db["login"],$info,$db);
mysql_query("UPDATE `zad` SET art=1 WHERE id='".$db['id']."'");
$tr["art"]=1;
}
}

if($tr["den"]==1){
$denn = 'День первый';
$slova = 'дождливо сегодня...';
$podarok[1] = "Большое Зелье Неуязвимости";
$podarok[2] = 'Зелье Пронзающих Игл, Зелье Сверкающих Лезвий, Зелье Свистящих Секир, Зелье Тяжелых Молотов';
$podarok[3] = 'Артовый чек на 6 часов';
}
if($tr["den"]==2){
$denn = 'День второй';
$slova = 'Я думал, ты не вернешься.';
$podarok[1] = "Великое Зелье Силы";
$podarok[2] = 'Большое Эликсир Жизни';
$podarok[3] = 'Артовый чек на 12 часов';
}
if($tr["den"]==3){
$denn = 'День третий';
$slova = 'Приветствую тебя в третий раз.';
$podarok[1] = "Жажда жизни+4";
$podarok[2] = 'Эликсир гиганта';
$podarok[3] = 'Артовый чек на 24 часов';
}
if($tr["den"]==4){
$denn = 'День четвертый';
$slova = 'Я паражен твоей упертостью).';
$podarok[1] = "Жажда жизни+5";
$podarok[2] = 'Эликсир уважения,Эликсир признания';
$podarok[3] = 'Артовый чек на 24 часов';
}
if($tr["den"]==5){
$denn = 'День пятый';
$slova = 'Приветствую в пятый раз.';
$podarok[1] = "Клонирование";
$podarok[2] = 'Жажда жизни+6';
$podarok[3] = 'Артовый чек на 24 часов';
}
if($tr["den"]==6){
$denn = 'День шестой';
$slova = 'Приветствую тебя в шестой раз.';
$podarok[1] = "Воскрешение";
$podarok[2] = 'Жажда жизни+6';
$podarok[3] = 'Артовый чек на 24 часов';
if($tr["vip"]==0){$vip = '<BR><a href="javascript:talk(5)" class=us2><font color=red><B>• Взять VIP на 7 дней!</B></font></a>';}
}
if($tr["den"]==7){
$denn = 'День седьмой';
$slova = 'Приветствую тебя в последний седьмой раз.';
$podarok[1] = "Восстановление энергии 1000hp";
$podarok[2] = 'Полное восстановление';
$podarok[3] = 'Сила великана';
if($tr["art"]==0){$vip = '<BR><a href="javascript:talk(6)" class=us2><font color=red><B>• Взять Чек на арт на 15 дней!</B></font></a>';}

}
?>
<script>
function talk(phrase)
{
	if(phrase==0)
	{
		document.location.href='main.php?act=none';
	}
	if(phrase==1)
	{
		document.location.href='?zad=1';
		
	}
	if(phrase==2)
	{
		document.location.href='?zad=2';
		
	}
	if(phrase==3)
	{
		document.location.href='?zad=3';
		
	}
    if(phrase==4)
	{
		document.location.href='?zdat=1';
	}
	if(phrase==5)
	{
		document.location.href='?vip=1';
	}
	if(phrase==6)
	{
		document.location.href='?art=1';
	}
}
function dialog()
{ 

	 	
	if(<?=$tr['status']?>==0){
	bernard.innerHTML='<B>Мудрый Воин:</B> <?=$vrm3?><BR>'+
	'Приветствую тебя! Я Мудрый Воин.<br>'+
	'Сегодня <font color=#990000><b><?=$denn?></b></font>, <?=$slova?><br>'+
	'Каждый день, выполняя мои задания, ты будешь получать разнообразные подарки.<br>'+
	'Открою тебе маленький секрет: При выполнении заданий <b>7 дней</b> подряд я тебе дам <b>Чек на АРТ</b> на который ты сам выберешь себе абсолютно Любой АРТ сроком на <b>15 дней</b>.'+ 
    'Это еще не всё! На 6-ой день выполнения заданий я могу подарить тебе <b>VIP</b>.<br>'+
    'Но если ты пропустишь, хоть один день, нам придется начать все <font color=red><b>С начала</b></font>!<br>'+
    'Ты готов?<br>'+
    '<BR><a href="javascript:talk(1)" class=us2><B>• Я готов. Буду в онлайне 1 часов... Вы получите - "<?=$podarok[1]?>"</B></a>'+
	'<BR><a href="javascript:talk(2)" class=us2><B>• Я готов. Буду в онлайне 3 часов... Вы получите - "<?=$podarok[2]?>"</B></a>'+
	'<BR><a href="javascript:talk(3)" class=us2><B>• Я готов. Буду в онлайне 6 часов... Вы получите - "<?=$podarok[3]?>"</B></a>'+
	'<?=$vip?>'+
	'<BR><br><a href="javascript:talk(0)" class=us2><B>• Отказываюсь от подарка</B></a>';
	}
	 
	if(<?=$tr['status']?>==1){
	 bernard.innerHTML='<B>Мудрый Воин:</B><BR>'+
	    '- Вы получите - "<?=$podarok[$tr["zad"]]?>"<br>'+
		'• <?=$vrm;?><BR><BR>'+
		'<font color=red>Внимание!!! Если вы выйдете из игры, то отсчет установленного времени начнется сначала.</font><br><br>'+
		'<a href="javascript:talk(0)" class=us2><B>• Ладно пойду играть (Завершить диалог)</B></a>';
	}	
	
	if(<?=$tr['status']?> == 2){
	bernard.innerHTML='<B>Мудрый Воин:</B><BR>'+
	    '- Спасибо вам за то, что вы провели <?=$tr['zad']?> час в игре...<br><br>'+
		'• <a href="javascript:talk(4)" class=us2>Взять подарок</a><br><br>'+
		'<a href="javascript:talk(0)" class=us2><B>• Ладно пойду играть (Завершить диалог)</B></a>';	
	}
	if(<?=$tr['status']?> == 3){
	bernard.innerHTML='<B>Мудрый Воин:</B><BR>'+
	    '<?=$info?><br>'+
	    'Вы уже Забрали Ежедневный подарок. <?=$vrm2;?><br><br>'+
		'<a href="javascript:talk(0)" class=us2><B>• Ладно пойду играть (Завершить диалог)</B></a>';	
	}
	
}

</script>

<SCRIPT language="JavaScript" type="text/javascript" src="fight.js"></SCRIPT>
<h3>Диалог с "Мудрый Воин"</h3>
<table width=100% border=0>
<tr>
	<td width=210 valign=top>
		<?
			showHPbattle($db);
			showPlayer($db);
		?>
	</td>
	<td valign=top><br>
		<table border=0 width=100% cellpadding=1 cellspacing=1 align=left><tr><td>
			<div id='bernard'></div>
			<script>dialog();</script>
		</td></tr></table>
	</td>
	<td width=210 valign=top>
		<?
		$result=mysql_query("SELECT * FROM users WHERE login='Мудрый Воин' limit 1");
		$bot=mysql_fetch_Array($result);
		mysql_free_result($result);
		showHPbattle($bot);
		showPlayer($bot);
		?>
	</td>
</tr>
</table>