<?
session_start();
if(empty($hozyain) or empty($traffik)){
    print "<script>top.location.href='index.php';</script>";
    exit();
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<meta http-equiv="Content-Language" content="ru">
<link rel=stylesheet type="text/css" href="main.css">
<body bgcolor=#e5e2d4 topmargin=2>
    <?
    include_once "conf.php"; // Изменил Виталий
    include_once "functions.php";
    //$act="rules";

    if (ereg("[<>\\/-]",$act) or ereg("[<>\\/-]",$level) or ereg("[<>\\/-]",$prof) or ereg("[<>\\/-]",$conf) or ereg("[<>\\/-]",$log)) {print "?!"; exit();}
    $act=htmlspecialchars($act);
    $level=htmlspecialchars($level);
    $prof=htmlspecialchars($prof);
    $conf=htmlspecialchars($conf);
    $log=htmlspecialchars($log);
    $sql = "SELECT password,city,level,money FROM users WHERE login='$hozyain'";
    $result = mysql_query($sql);
    $db = mysql_fetch_array($result);
    if($traffik!=$hozyain.md5(base64_decode($db["password"]))){
        print "<script>top.location.href='nikita.php';</script>";
        exit();
    }
    $city=$db["city"];
    $zayavka_q=mysql_query("SELECT * FROM hram_zayavka");
    $hram_all = mysql_fetch_array(mysql_query("SELECT * FROM hram_zayavka"));


         /*	if($city != "Dream Town"){
             print "<script>location.href='index.php'</script>";
            }
        */
    if(empty($act)){$act = "rules";}
    if($act == "none" or $act == "opredelenie"){$act = "rules";}


    ?>
    <?
    $s="select money from users where login='$hozyain'";
    $q=mysql_query($s);
    $r=mysql_fetch_array($q);
    $money1=$r["money"];
    $money = sprintf ("%01.2f", $money1);
    ?>
    <table width="100%" border="0" cellspacing="2" cellpadding="2" align="left">
        <tr valign="top">
            <td width="400" align="center" valign="top">
                <img src="img/hramvhod.png" alt="" width="330" height="345" border="0">
            </td>
            <td>
                <table width="100%" border="0" cellspacing="0" cellpadding="0" align="left">
                    <tr>
                        <td width="21" height="41"><img src="images/my-a.gif" alt="" width="21" height="41" border="0"></td>
                        <td height="41" background="images/my-t-1.gif" style="background-repeat: repeat-x;"></td>
                        <td width="21" height="41"><img src="images/my-b.gif" alt="" width="21" height="41" border="0"></td>
                    </tr>
                    <tr>
                        <td width="21" background="images/my-l-1.gif" style="background-repeat: repeat-y;"></td>
                        <td>
                            <table border="0" cellspacing="10" cellpadding="10" align="left">
                                <tr valign="top">
                                    <td valign="top">
                                        <table cellspacing="5" cellpadding="5" align="left">
                                        <tr align="left">
                                        <td bgcolor="#eceddf"><input type="button" value="Правила" style="background-color: #eceddf; border: none; cursor: hand; azimuth: left-side; text-align: left; font-size: 15px;	size: 150px;" onClick="location.href='hram.php?act=rules';"></td>
                                    </td>
                                </tr>
                                <tr align="left">
                                    <td  bgcolor="#eceddf"><input type="button" value="Обручальные кольца" style="background-color: #eceddf; border: none; cursor: hand; azimuth: left-side; text-align: left; font-size: 15px; size: 150px;" onClick="location.href='hram.php?act=brak_rings';"></td>
                                </tr>
                                <tr align="left">
                                    <td bgcolor="#ECEDDF"><input type=button value="Зала Церемоний" style="background-color: #eceddf; border: none; cursor: hand; azimuth: left-side; text-align: left; font-size: 15px;	size: 150px;"  onClick="location.href='hram.php?act=ceremony';"></td>
                                </tr>
                                <tr align="left">
                                    <td bgcolor="#eceddf"><input type=button value="Молодожены" style="background-color: #eceddf; border: none; cursor: hand; azimuth: left-side; text-align: left; font-size: 15px;	size: 150px;"  onClick="location.href='hram.php?act=molod';"></td>
                                </tr>
                                <tr align="left">
                                    <td width="150" bgcolor="#eceddf"><input type="button" value="Выход" style="background-color: #eceddf; border: none; cursor: hand; azimuth: left-side; text-align: left; font-size: 15px;	size: 150px;" onClick="location.href='main.php?act=go&level=centplosh';"></td>
                                </tr>
                            </table>
                        </td>
                        <td width="10" align="left" valign="top"></td>
                        <td align="left" valign="top">
                            <?
                            if($act == "rules"){
                                print "Добро пожаловать в <strong>Храм</strong> города <strong>King City</strong>. <br><br>
                                                        Здесь Вы можете поприсутствовать на церемонии бракосочетания либо заключить свой брачный союз. <br><br>
                                                        Для того, чтобы заключить брак ваш персонаж:<br>
                                                        - должен быть не менее 4 уровня <br>
                                                        - не состоять в браке <br>
                                                        - пройти предсвадебную проверку на чистоту в Ордене Чародеев<br>
                                                        - подать заявку на регистрацию бракосочетания <br>
                                                        - купить обручальные кольца.<br><br>

                                                        Подать заявку на предсвадебную проверку на чистоту вы можете на форуме.<br>
                                                        Подать заявку на регистрацию бракосочетания вы можете через любого <img src=img/orden/8.gif width=16 height=16><strong>Священника</strong>.
                                                        Список всех <img src=img/orden/8.gif width=16 height=16><strong>Священников</strong> вы можете увидеть нажав кнопку 'Друзья'<br>
                                                        <br>С подробной процедурой проведения свадьбы можно ознакомиться на форуме в разделе Священники";
                                ?>
                                <?
                            }
                            if($act == "brak_rings"){
                                if(!empty($conf)){
                                    if($db["brak"]!=""){
                                        print "Вы состоите в браке и имеете обручальные кольца!<br>";
                                    }
                                    //А подана ли заява?...
                                    $find_jenih = mysql_fetch_array(mysql_query("SELECT fiance FROM hram_zayavka WHERE fiance='$hozyain'"));
                                    $find_nev = mysql_fetch_array(mysql_query("SELECT wife FROM hram_zayavka WHERE fiance='$hozyain'"));
									

                                    $tttt=$find_jenih["fiance"];
                                    $yyyy=$find_nev["wife"];

                                    $find_jenih_m = mysql_fetch_array(mysql_query("SELECT id FROM hram_check WHERE login='$tttt'"));
                                    $find_nev_m = mysql_fetch_array(mysql_query("SELECT id FROM hram_check WHERE login='$yyyy'"));

                                    function istor($who,$act,$val,$ip,$to,$ip2){
                                        $chas = date("H");
                                        $d=date("d.m.Y", mktime($chas-$GSM));

                                        $time=date("H:i:s", mktime($chas-$GSM));

                                        $S = mysql_query("INSERT INTO perevod(login,action,item,ip,time,date,login2,ip2) VALUES('$who','$act','$val','$ip','$time','$d','$to','$ip2')");
                                    }

                                    if($db["level"]>=4 and $find_jenih["fiance"]==$hozyain){
                                        if($conf == 1){
                                            if($buy == "rings"){

                                                if(empty($find_jenih_m))
                                                {
                                                    print "Жених ещё не прошёл проверку!";
													print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
                                                    die();
                                                }
                                                if(empty($find_nev_m))
                                                {
                                                    print "Невеста ещё не прошёла проверку!";
													print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
                                                    die();
                                                }
                                                if($db["money"]<50){
                                                    print "У Вас недостаточно средств для покупки Обручальных Колец!";
													print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
                                                    die();
                                                }
												$find_kolco = mysql_fetch_array(mysql_query("SELECT object_razdel FROM inv WHERE owner='$hozyain' AND object_type='ring' AND object_id='434326'"));
												if($find_kolco) {
													print "У вас в рюкзаке уже находится обручальное кольцо";
													print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
													die();
                                    			}
												$find_kolco1 = mysql_fetch_array(mysql_query("SELECT object_razdel FROM inv WHERE owner='$yyyy' AND object_type='ring' AND object_id='434326'"));
												if($find_kolco1) {
													print "У вашей Невесты в рюкзаке уже находится обручальное кольцо";
													print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
													die();
                                    			}
                                                else{
                                                    $S = mysql_query("UPDATE hram_zayavka SET brak_rings='1' WHERE fiance='$hozyain'");
                                                    $S = mysql_query("UPDATE users SET money=money-50 WHERE login='$hozyain'");
                                                    $spent="50 мн";
                                                    istor($hozyain,'потратил',$spent,'none','Кольца','none');
													$id_muzh = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE login='$hozyain'"));
													$id_zhena = mysql_fetch_array(mysql_query("SELECT id FROM users WHERE login='$yyyy'"));
													$S = mysql_query("INSERT INTO inv(user_id,owner,object_id,object_type,object_razdel,wear,iznos,is_modified,iznos_max,date,cel) VALUES('$id_muzh','$tttt','434326','ring','obj','0','0','0','100','CURRENT_TIMESTAMP','Замужем за $tttt')");
													$S = mysql_query("INSERT INTO inv(user_id,owner,object_id,object_type,object_razdel,wear,iznos,is_modified,iznos_max,date,cel) VALUES('$id_zhena','$yyyy','434326','ring','obj','0','0','0','100','CURRENT_TIMESTAMP','Женат на $yyyy')");
                                                 	print "Вы приобрели Обручальные Кольца<br>";
												 	if(is_online($yyyy))
            											{
                										say($yyyy, "<b>Внимание!</b> Ваш Жених \"<span>".$hozyain."</span>\" приобрел обручальные кольца. <b>В вашем инвентаре находится кольцо Жениха</b>, которое Вы сможете подарить ему во время церемонии Бракосочетания. <u>Ваше кольцо находится в инвентаре Жениха</u>.<br>");
           											 	}
            											else
            											{
                										say_post($target, "<b>Внимание!</b> Ваш Жених \"<span>".$hozyain."</span>\" приобрел обручальные кольца. <b>В вашем инвентаре находится кольцо Жениха</b>, которое Вы сможете подарить ему во время церемонии Бракосочетания. <u>Ваше кольцо находится в инвентаре Жениха</u>.<br>");
            											}
                									say($tttt, "<b>Внимание!</b> Вы приобрели обручальные кольца. <b>В вашем инвентаре находится кольцо Невесты</b>, которое Вы сможете подарить ей во время церемонии Бракосочетания. <u>Ваше кольцо находится в инвентаре Невесты</u>.<br>");
                                                	                                                                                    
                                                    print " 					</td>
													                          </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>";
													die();
												}
                                            }
                                        }
                                    }
                                    else{
                                        if($db["level"]<4){$result_mes="Ваш Уровень ниже 4<br>";}
                                        elseif ($find_nev["wife"]==$hozyain){$result_mes="<br><br>Обручальные кольца должен приобретать <strong>Жених</strong> ";}
                                        else{$result_mes="<br><br>Обручальные кольца приобретаются <strong>Женихом</strong> после подачи заявки на свадьбу <br>";}
                                        print "<br><br>Вы не можете приобрести Обручальные кольца</strong>.$result_mes
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>
                                                        ";
                                        die ();
                                    }
                                }
                                if(!empty($buy)){
                                    print "<center>Стоимость <strong>обручальных колец</strong> составляет <b>50 зол.</b> <br>Вы готовы их оплатить?<BR>";
                                    print "<input type=button class=btn value = \" ДА \" onClick=\"javascript:location.href='hram.php?act=brak_rings&buy=rings&conf=1'\">&nbsp;&nbsp;";
                                    print "<input type=button class=btn value = \"НЕТ\" onClick=\"javascript:location.href='hram.php?act=brak_rings'\">&nbsp;&nbsp; </center>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>
                                                        ";
                                    die ();
                                }
                                ?>
                                <?

                                print "Приобрести <strong>Обручальные кольца</strong> можно если Вы: <br><br>
                                                        ";
                                print "- подали заявку на свадьбу<BR>";
                                print "- являетесь Женихом<BR>
										- не имеете в инвентаре обручальных колец <br>
                                                        - имеете при себе 50 зол. для оплаты<br>";


                                print "<form action='hram.php?act=brak_rings' name='p' method=POST><center>
                                                        <img src='img/kolca.gif' width=64 height=64 border=0><br><br>
                                                        <input type=button class=btn value = \" Купить Обручальные кольца \" onClick=\"javascript:location.href='hram.php?act=brak_rings&buy=rings'\">&nbsp;&nbsp;
                                                        <br>(У вас в наличии: <b>$money</b> зол.)<br>


                                                        </center>
                                                        </form>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <td width=21 background=images/my-r-1.gif style=background-repeat: repeat-y;></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width=21 height=40><img src=images/my-c.gif  width=21 height=40 border=0></td>
                                                                        <td height=40 background=images/my-b-1.gif style=background-repeat: repeat-x;></td>
                                                                        <td width=21 height=40><img src=images/my-d.gif width=21 height=40 border=0></td>
                                                                    </tr>
                                                                    </table>
                                                        ";
                                die ();
                                ?>
                                <?
                            }
                            if($act == "ceremony"){
                                $sql_ceremony = "SELECT orden,administrator FROM users WHERE login='$hozyain'";
                                $result_ceremony = mysql_query($sql_ceremony);
                                $db_ceremony = mysql_fetch_array($result_ceremony);


                                if($hram_all["wife"]!='' and $hram_all["fiance"]!=''){
                                    echo "Вы находитесь в <strong>Зале Церемоний</strong>. <br>
                                                        <br>Здесь, в присутствии друзей и близких, влюбленные пары вступают на путь семейной жизни, давая клятвы верности и любви, и скрепляя
                                                        свой союз Обручальными кольцами. <br><br>
                                                        Церемонии бракосочетания проводятся <img src=img/orden/8.gif width=16 height=16><strong>Священниками</strong> по предварительной договоренности.<br><br>
                                                        <u>Ближайшие Церемонии:</u>";

                                    $temp_adm=$db_ceremony["administrator"];
                                    $temp_pop=$db_ceremony["orden"];

                                    while($zayavka_row = mysql_fetch_array($zayavka_q))
                                    {
                                        $temp_jen=$zayavka_row["fiance"];
                                        $temp_nev=$zayavka_row["wife"];
                                        $temp_time=$zayavka_row["brak_time"];
                                        $rings_check = $zayavka_row["brak_rings"];
										$svashenik = $zayavka_row["svashenik"];
										
										$dt_elements = explode(' ',$temp_time);
										$date_elements = explode('/',$dt_elements[0]);
										$time_elements =  explode(':',$dt_elements[1]);
										


                                        
                                        echo "<br><br><b>$temp_jen</b> и <b>$temp_nev</b>.   
										<br>Время начала церемонии: $date_elements[2]/$date_elements[1]/$date_elements[0] в $time_elements[0]:$time_elements[1].
										<br>Священник $svashenik";

                                        if(($temp_pop==8) or ($temp_adm==1))
                                        {
                                            if($rings_check == "1")
                                            {
                                                echo "&nbsp;&nbsp;<input type=button class=btn value = \" Поженить! \" onClick=\"javascript:location.href='hram.php?act=pojenit&jen_z=$temp_jen&nev_z=$temp_nev'\">";
                                            }
                                            else
                                            {
                                                echo "&nbsp;&nbsp;<b><small>Не куплены кольца</small></b>";
                                            }
                                        }
                                    }


                                }
                                else{echo "На данный момент заявки на регистрацию брака в <strong>Зале Церемоний</strong> отсутствуют.";}

                                echo "
                                                        ";}
                            if($act == "pojenit"){

                                $date_reg=date("d.m.Y", mktime($chas-$GSM));
                                //Данные из запросов
                                $jenih=$jen_z;
                                $nevesta=$nev_z;

                                //Данные о заявке
                                $zayavka_data = mysql_fetch_array(mysql_query("SELECT * FROM hram_zayavka WHERE fiance='$jenih' AND wife='$nevesta'"));

                                $D =  mysql_fetch_array(mysql_query("SELECT room FROM users WHERE login='$jenih'"));
                                $online = is_online($jenih);

                                if($online == 1 and $D["room"] == 'Храм')
                                {
                                    $on1 = 1;
                                }

                                $D =  mysql_fetch_array(mysql_query("SELECT room FROM users WHERE login='$nevesta'"));
                                $online = is_online($nevesta);

                                if($online == 1 and $D["room"] == 'Храм')
                                {
                                    $on2 = 1;
                                }



                                if($zayavka_data["brak_rings"]!=1)
                                {
                                    echo "Для Заключения брачного Союза $jenih должен купить Обручальные Кольца.";
                                    echo "<script language=javascript>
                                                        var OnlineDelay = 2;		// пауза в сек. перед релоудом страницы
                                                        var OnlineTimerOn = setTimeout('onlineReload()', OnlineDelay*1000);
                                                        function onlineReload()
                                                        {
                                                                top.frames['main'].navigate('hram.php?act=ceremony');
                                                        }
                                                        </script>";
														die();
                                }

                                if($on1 != 1 or $on2 != 1)
                                {
                                    echo "Для завершения Церемонии Жениху и Невесте нужно находиться в Храме.";
                                    echo"<script language=javascript>
                                                        var OnlineDelay = 2;		// пауза в сек. перед релоудом страницы
                                                        var OnlineTimerOn = setTimeout('onlineReload()', OnlineDelay*1000);
                                                        function onlineReload()
                                                        {
                                                                top.frames['main'].navigate('hram.php?act=ceremony');
                                                        }
                                                        </script>";
														die();
                                }

                                //Всё в порядке!
                                $shut="Завершена церемония бракосочетания между <b>$jenih</b> и <b>$nevesta</b>. Любите друг-друга пока блок не разлучит вас.";
                                mysql_query("UPDATE users SET brak='$nevesta' WHERE login='$jenih'");
                                mysql_query("UPDATE users SET brak='$jenih' WHERE login='$nevesta'");
                                mysql_query("DELETE FROM hram_zayavka WHERE fiance='$jenih'");
                                mysql_query("INSERT INTO svadbi(fiance,wife,priest,date) VALUES ('$jenih','$nevesta','$hozyain','$date_reg')");
                                mysql_query("UPDATE users SET money=money+20 WHERE login='$hozyain'");

                                mysql_query("DELETE FROM hram_check WHERE login='$jenih'");
                                mysql_query("DELETE FROM hram_check WHERE login='$nevesta'");
								$masseg= "<i><b> Внимание!</b> Завершена церемония бракосочетания между <b>&quot;$jenih&quot;</b> и <b>&quot;$nevesta&quot;</b>!!! Можно поздравлять Молодоженов!!!</i>";
		$room=$D["room"];
		if(isset($_SESSION['jChat']))
			{
    		sendCommand("sendmessage\tsystem\t".$masseg."\t" . $room);
			}


                                echo"Церемония прошла успешно!!!!!";
                                echo"<script language=javascript>
                                                        var OnlineDelay = 2;		// пауза в сек. перед релоудом страницы
                                                        var OnlineTimerOn = setTimeout('onlineReload()', OnlineDelay*1000);
                                                        function onlineReload()
                                                        {
                                                                top.frames['main'].navigate('hram.php?act=ceremony');
                                                        }
                                                        </script>";
                            }
                            if($act == "molod")
                            {
                                $sql_molod = "SELECT * FROM svadbi";
                                $result_molod = mysql_query($sql_molod);
                                $db_molod = mysql_fetch_array($result_molod);


                                if($db_molod["wife"]!='' and $db_molod["fiance"]!=''){
                                    echo "<center><b>Список счастливых молодоженов:</b><br>";

                                    echo "<table align='center' CELLSPACING='10'>";
                                    echo "<tr><td><b>Муж</b></td><td><b>Жена</b></td><td><b>Дата</b></td><td><b>Священник</b></td></tr>";


                                    $temp_jen=$db_molod["fiance"];
                                    $temp_nev=$db_molod["wife"];
                                    $temp_pop=$db_molod["priest"];
                                    $temp_time=$db_molod["date"];
                                    echo "<tr><td><b>$temp_jen</b></td><td><b>$temp_nev</b></td><td>$temp_time</td><td>$temp_pop</td></tr>";

                                    while($zayavka_row = mysql_fetch_array($result_molod))
                                    {
                                        $temp_jen=$zayavka_row["fiance"];
                                        $temp_nev=$zayavka_row["wife"];
                                        $temp_pop=$zayavka_row["priest"];
                                        $temp_time=$zayavka_row["date"];
                                        echo "<tr><td><b>$temp_jen</b></td><td><b>$temp_nev</b></td><td>$temp_time</td><td>$temp_pop</td></tr>";
                                    }
                                    echo "</table></center>";
                                }
                                else
                                {
                                    echo "<b>Свадьб ещё не было...</b>";
                                }
                            }
                            ?>

                        </td>
                    </tr>
                </table>
            </td>
            <td width="21" background="images/my-r-1.gif" style="background-repeat: repeat-y;" ></td>
        </tr>
        <tr>
            <td width="21" height="40"><img src="images/my-c.gif" alt="" width="21" height="40" border="0"></td>
            <td height="40" background="images/my-b-1.gif" style="background-repeat: repeat-x;"></td>
            <td width="21" height="40"><img src="images/my-d.gif" alt="" width="21" height="40" border="0"></td>
        </tr>
    </table>
    </td>
    </tr>
    </table>



</body>
</html>

