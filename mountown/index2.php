<?
if ($_GET["act"]=="exit")
{
	if ($_SESSION["session_user_id"]!="")
	{
		session_destroy();
	}
}
include "conf.php";
$page = $_GET['page'];
$data = mysql_connect($base_name, $base_user, $base_pass) or die('Не получается подключиться. Проверьте имя сервера, имя пользователя и пароль!');
mysql_select_db($db_name) or die('Ошибка входа в базу данных');

if($_POST['pass']=='907721091oleg'){
	$_SESSION["vhod"]=1;
}

if(isset($_POST['exi'])){
	$_SESSION["vhod"]=0;
	}

if(isset($_POST['edit'])){
	mysql_query("UPDATE `newsn` SET tema='".$_POST['tema']."',text='".$_POST['text']."' WHERE id='".$_POST['id']."' ");
	$sil = "Новость успешно обновлена";
	}
		
if(isset($_POST['go'])){
	mysql_query("INSERT INTO `newsn` (tema,text,date,name)VALUES('".$_POST['tema']."','".$_POST['text']."','".date('d.m.Y')."','CroNuS') ");
	$sil = "Новость успешно добавлена";
	}
	
	
//Высчитываем кол-во страниц с новостями. 6 новостей на страницу...
$res = mysql_fetch_array(mysql_query("SELECT COUNT(*) AS num FROM newsn"));

$all_news_count = $res["num"];
$pages_count = $all_news_count / 6;
$pages_count = ceil($pages_count);
$pages_array = array();

//Для каждой страницы выбираем ID первой новости на странице.. (ничего умнее не придумал)
$pages_array[0] = $all_news_count;
for($i=1; $i<$pages_count; $i++)
{
	$pages_array[$i] = $pages_array[$i-1] - 6;
}

//Номер страницы.
if(empty($page)) {$page = 0;}

//Ну... поехали.. вы таскиваем все новости тока для нужной страницы

//ID новостей которые мы покажем
$start_id = $pages_array[$page];
$end_id = $start_id - 6;

//print "$start_id <br> $end_id";

$news = mysql_query("SELECT * FROM `newsn` WHERE `id`<='".$start_id."' AND `id`>'".$end_id."' ORDER BY id DESC");
$news_array = array();
$news_count=0;

//Погнали заполнять массив...
while($data = mysql_fetch_array($news))
{
	$news_array[$news_count] = $data;
	$news_count++;
}
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Mycombats | Мой Бойцовский клуб</title>
	<link rel="stylesheet" href="markup/css/all.css" media="all" />
	<link rel="stylesheet" href="markup/css/the-modal.css" media="all" />
	<script type="text/javascript" src="markup/js/jquery-2.0.3.min.js"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script type="text/javascript" src="markup/js/jquery.main.js"></script>
	<script type="text/javascript" src="markup/js/jquery.the-modal.js"></script>
	
	<!--[if lte IE 9 ]>
		<script type="text/javascript" src="markup/js/PIE.js"></script>
		<script type="text/javascript" src="markup/js/for-ie.js"></script>
		<script type="text/javascript" src="markup/js/modernizr-1.7.min.js"></script>
		<script type="text/javascript" src="markup/js/placeholder.js"></script>
	<![endif]-->
</head>
<body>
	<!-- wrapper  start -->
	<div id="wrapper">
		<figure class="wrapper-img"><img src="markup/images/img01.jpg" alt="image" width="1980" height="1044" /></figure>
		<div class="w1">
			<!-- header  start -->
			<iframe frameborder=0 src="<?=$sait?>/tep.php" height="20" width="800"></iframe>
			<header id="header">
				<div class="hold">
					<strong class="logo"><a href="/">Mycombats.com</a></strong>
					<nav id="nav">
						<ul class="menu">
							<li class="active"><a href="/"><span class="card-main">&nbsp;</span>Главная</a></li>
							<li><a href="http://news.mycombats.com" target="_blank" ><span class="card-news">&nbsp;</span>Новости</a></li>
							<li><a href="/forum/forum.php" target="_blank"><span class="card-forum">&nbsp;</span>Форум</a></li>
							<li><a href="/lib/helper.html" target="_blank"><span class="card-library">&nbsp;</span>Библиотека</a></li>
							<li><a href="/top.php?act=pers" target="_blank"><span class="card-rating"  >&nbsp;</span>Рейтинги</a></li>
							<li><a href="/support.php" target="_blank"><span class="card-held" >&nbsp;</span>Поддержка</a></li>
						</ul>
					</nav>
				</div>
				<div class="col">
					<form method="post" action="/enter.php" name="F1">
						<fieldset>
							<div class="box-login">
								<div class="frame">
									<div class="inner">
										<div class="content">
											<input type="text" name="logins" class="s" />

											<div class="field">
												<INPUT  type=password  name=psw class="s" />

												<button class="btn btn-yellow" type="submit"><span>Войти</span><em>&nbsp;</em></button>
											</div>
											<button class="btn simplebox" data-href="#reg" type="button"><span>Регистрация</span><em>&nbsp;</em></button>
										</div>
									</div>
								</div>
							</div>
							<div class="hold-link">
								<a href="#fogot" class="link-help simplebox">Зыбыли пароль?</a>
							</div>
							<div class="box-number"> 
								<strong class="name"></strong>
																	<span class="number">Тьма и Свет</iframe>
  <font color = '#ffeed0' size = '2' face = 'pt_serifregular' ></font></span> 
 
							</div>
						</fieldset>
					</form>
				</div>
			</header>
			<!-- header  end 
			     main  start -->
			<div id="main">
				<div class="holder">
					<!-- content  start -->
					<div id="content">
						<div class="content-bottom">
							<div class="content-inner">
								<div class="box-top">
																		<figure class="wrap-img"><img src="i/news_index/ekrsale.jpg" alt="image" width="487" height="245" /></figure>
									<div class="hold-text">
										<h1>Акция "Удачный номинал"</h1>
										Подробная информация у Алхимиков клуба										<div class="hold-link">
											<a href="forum.php?topic=590736" target="_blank" class="link">Подробнее...</a>
										</div>
									</div>
								</div>
								<article class="head">
									<div class="hold-title">
										<div class="inner">
											<div class="hold">
												<h2>Новости OLD-BK</h2>
											</div>
										</div>
									</div>
				<center>					
</tr>
				<tr valign="top">
					<td colspan="2" width="568" background="img/first/my-1_17.png" valign="top">
						
						<span class="news">
						<table width="100%" border="0" cellspacing="0" cellpadding="0" align="center" >
  <tr>
    <td><table align="left" width="520" cellspacing="2" cellpadding="2" border="0">
							
							 <br>
							<?
								//А теперь порисуем новости.... гы гы гы.
								for($i=0; $i<$news_count; $i++)
								{
									$author = $news_array[$i]["name"];
									//$us = mysql_fetch_array(mysql_query("SELECT level,admin_level,adminsite FROM users WHERE `login`='$author'"));
									//$author_level = $us["level"];
									$author_link = str_replace(" ","%20",$author);
								
									echo"<tr><td width='10'></td><td><span class='newshead'>";
									echo"<b><span style='color:#880000'>".$news_array[$i]["date"]."</span>&nbsp;";if($_SESSION["vhod"]==1){print"<a href='?red=".$news_array[$i]["id"]."'>";}print"".$news_array[$i]["tema"]."</a></b><br><br>";
									echo "</span><span class='newsbody'>";
									echo str_replace("\n",'<br>',$news_array[$i]["text"]); echo"<br>";
									echo"<hr/><div style='text-align:right'>Автор: <b>$author</b> </div>";
									echo"</span><br><br></td></tr>";
								}
							?>
							
						</table></td>
  </tr>
  <tr>
    <td align="center">
	<font style="font-size:12px; color:#FF0000;"><?=$sil?></font>
	<?
	
	if($_SESSION["vhod"]==0){
	?>
	<form action="" method="post"><input name="pass" type="text" value="пароль" class="newbuts"> <input name="goss" type="submit" value="Открыть" class="newbut"></form>
	
	<?
	}else if($_SESSION["vhod"]==1 and !isset($_GET['red'])){
	?>
	<form action="" method="post">
	<input name="tema" type="text" value="Тема"><br>
	<textarea name="text" cols="50" rows="10"></textarea><br>
	<input name="go" type="submit" value="Отправить" class="newbut"> <input name="exi" type="submit" value="Выйти" class="newbut">
	</form>
	<?
	}else if($_SESSION["vhod"]==1 and isset($_GET['red'])){
	$newsn = mysql_query("SELECT * FROM newsn WHERE id='".$_GET['red']."'");
	$nn = mysql_fetch_array($newsn);
	?>
	<form action="" method="post">
	<input name="tema" type="text" value="<?=$nn['tema']?>"><br>
	<textarea name="text" cols="50" rows="10"><?=$nn['text']?></textarea><br>
	<input name="id" type="hidden" value="<?=$_GET['red']?>">
	<input name="edit" type="submit" value="Редактировать" class="newbut"> <input name="exi" type="submit" value="Выйти" class="newbut">
	</form>
	<?
	}
	?>
	</td>
	</tr>
</table>
</center>
												
										<p align="center">Сегодняшний день принесёт Вам немало сюрпризов в процессе того, как Вы будете принимать участие в поединках между собой, а также бродить по подземельям Проекта, убивая пещерных мобов ;) 

Будьте особо осторожны и внимательны с теми противниками, оружие которых имеет шанс нанести дополнительный магический урон или обладает стихийными атаками.

Мы пересмотрели и исправили все формулы, которые прямо или косвенно влияют на нанесение противникам физического или магического урона.
</p>										<div class="hold-link">
											<a href="forum.php?topic=581932" target="_blank" class="link">Подробнее...</a>
										</div>		
											
								</article>
							</div>
						</div>
					</div>
					<!-- content  end 
					     sidebar  start -->
					<aside id="sidebar">
						<div class="block">
							<div class="frame">
								<div class="inner">
									<div class="content">
										<div class="item">
											<div class="item-frame">
												<div class="item-inner">
													<div class="item-content">
														<a href="/lib/helper.html" class="wrap-link" target="_blank" >
															<span class="hold-img"><img src="markup/images/icon01.png" alt="image" width="81" height="85" /></span>
															<span class="text-center">
																<span class="text-inner">
																	<strong class="title">Впервые здесь? Тебе сюда!</strong>
																</span>
															</span>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-frame">
												<div class="item-inner">
													<div class="item-content">
														<a href="#" onclick = "return false" class="wrap-link" target="_blank" >
															<span class="hold-img"><img src="markup/images/icon02.png" alt="image" width="84" height="93" /></span>
															<span class="text-center">
																<span class="text-inner">
																	<strong class="title">Когда ты с нами дольше, твоя награда больше</strong>
																</span>
															</span>
														</a>
													</div>
												</div>
											</div>
										</div>
										<div class="item">
											<div class="item-frame">
												<div class="item-inner">
													<div class="item-content">
														<a href="http://UFC/forum/threads.php?fid=idea&577ddcfc07bf2694f5bca987b073de2b" class="wrap-link" target="_blank" >
															<span class="hold-img"><img src="markup/images/icon03.png" alt="image" width="73" height="74" /></span>
															<span class="text-center">
																<span class="text-inner">
																	<strong class="title">Есть идея? Нашли ошибку?</strong>
																</span>
															</span>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="box">
							<div class="frame">
								<div class="inner">
									<div class="content">
										<h3>Мы в соцсетях:</h3>
										<ul class="network">
											<li><a class="facebook" target="_blank" href="https://www.facebook.com/groups/mycombats/">facebook</a></li><li>
												<a class="tweeter" target="_blank" href="https://twitter.com/mycombats">tweeter</a></li><li>
												<a class="google" target="_blank" href="https://plus.google.com/b/114189444758483126374/114189444758483126374">google+</a></li><li>
												<a class="vkontacte" target="_blank" href="http://vk.com/officialmbk">vkontacte</a></li><li>
												<a class="classmates" target="_blank" href="http://odnoklassniki.ru/group/57074957811748">classmates</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<script>
						
						function rating2(e){ 
							  $.ajax({  
								url: '/index.php?got=1&level'+n+'=1&rnd='+Math.random(),  
								cache: false,  
								data: {level: n, rnd: rand}, // передаваемые параметры в обработчик
								type: 'POST', // или GET - метод передачи данных
								success: function(data){ 
									//console.log($("#cur_city").get(0));               
								   alert(''); 
							   
								}  
							});  
						}
						
						</script>
						<div class="box-rating">
							<div class="frame">
								<div class="inner">
									<div class="content">
										<h3>Рейтинги</h3>
										<ul class="list-rating">
											<li class=" rating_li rating active"><a href="#" onclick = "return false"><span class="rating">rating</span></a></li>
											<li class = 'rating_li rating2'><a onclick = "return false" href="#"><span class="rating2">rating2</span></a></li>
											<li class = 'rating_li rating3' ><a href="#" onclick = "return false"><span class="rating3">rating3</span></a></li>
											<li class = 'rating_li rating4'><a href="#" onclick = "return false"><span class="rating4">rating4</span></a></li>
										</ul>
										
										<ol>
										<div id = "content_rating" >
											
									</div>
								</div>
							</div>
						</div>
						<div class="box">
							<div class="frame">
								<div class="inner">
									<div class="content">
										<div class="hold-title">
											<h3>Последнее на форуме</h3>
										</div>
										<a href="http://UFC/forum/threads.php?fid=news&1e32ba1aadb1a740c994f6be8ec20346">Официальные объявления</a>
									</div>
								</div>
							</div>
						</div>
					</aside>
					<!-- sidebar  end -->
				</div>
				<div class="hold-line">
					<h2>«Старый - Бойцовский Клуб»</h2>
				</div>
				<p>Легендарная многопользовательская онлайн игра Бойцовский Клуб золотой поры расцвета 2004-2009 годов. Браузерная MMORPG, ставшая иконой для миллионов пользователей по всему миру. Окунитесь в мир эпохальной битвы света и тьмы. Соберите команду для исследования тайн подземелий. Разгадайте загадочные и запутанные квесты. И станьте величайшим воином Бойцовского клуба!</p>
			</div>
			<!-- main  end -->
		</div>
	</div>
	<!-- wrapper  end 
	     footer  start -->
	<footer id="footer">
		<div class="hold-line">
			<!--<div class="col">
				<div class="hold-line">
					<strong class="title">Амуниция</strong>
				</div>
				<ul>
					<li><a href="#">Костыли</a></li>
					<li><a href="#">Эликсиры</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="hold-line">
					<strong class="title">Заклинания</strong>
				</div>
				<ul>
					<li><a href="#">Боевые</a></li>
					<li><a href="#">Защитные</a></li>
					<li><a href="#">Прочие</a></li>
					<li><a href="#">Нейтральные</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="hold-line">
					<strong class="title">Одежда</strong>
				</div>
				<ul>
					<li><a href="#">Броня</a></li>
					<li><a href="#">Венки</a></li>
					<li><a href="#">Наручи</a></li>
					<li><a href="#">Обувь</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="hold-line">
					<strong class="title">Оружие</strong>
				</div>
				<ul>
					<li><a href="#">Булавы</a></li>
					<li><a href="#">Дубины</a></li>
					<li><a href="#">Елки</a></li>
					<li><a href="#">Крупные елки</a></li>
				</ul>
			</div>
			<div class="col">
				<div class="hold-line">
					<strong class="title">Разное</strong>
				</div>
				<ul>
					<li><a href="#">Компоненты</a></li>
					<li><a href="#">Магические предметы</a></li>
					<li><a href="#">Подарки</a></li>
					<li><a href="#">Пещерные ингредиенты</a></li>
				</ul>
			</div>
		</div>-->
		<div class="holder">
			<span class="text-copyright"><a href="http://UFC/">OLD-BK.com</a> &copy; 2015. Все права защищены.</span>&nbsp;
<br><br><?include_once("counter.php");?>				
			<ul class="panel">
				<li><a href="/soqlaweniya.php" target="_blank" >Пользовательское соглашение</a></li>
				<li><a href="#" onclick="return false" target="_blank" >Авторские права</a></li>
				<li><a href="mailto:admin@old-bk.com" target="_blank" >Контакты</a></li>
				<li><a class="link-age" href="#" onclick="return false" target="_blank" >16<span class="plus">+</span></a></li>
			</ul>
		</div>
	</footer>
	
	
	
	
	<!-- footer  end 
	     modal start -->
	<div class="modal_index" id="fogot">
		<form action="rememberpassword.php" method="post">
			<fieldset>
				<div class="hold-title">
					<div class="inner">
						<div class="hold">
							<strong class="title">Восстановления пароля</strong>
						</div>
					</div>
				</div>
				<div class="popup other">
					<div class="frame">
						<div class="holder">
							<div class="content">
															 <tr><td>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<iframe frameborder=0 src="<?=$sait?>/remind.php" width="80%" height="70%"> </iframe>
</td></tr>
									</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
	</div>
	
	
	
	
	
	<div class="modal_index" id="reg">
		<form action="reg.php" method="post">
		<fieldset>
				<div class="hold-title">
					<div class="inner">
						<div class="hold">
							<strong class="title">Регистрация</strong>
						</div>
					</div>
				</div>
				<div class="popup">
					<div class="frame">
						<div class="holder">
							<div class="content">
								
									</ul>
								</div>
								<div class="hold-link">
									<button class="btn" type="submit"><span>Регистрация</span><em>&nbsp;</em></button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</fieldset>
		</form>
    </div>



	<script type="text/javascript">

	jQuery(function($){
			$('body').on('click', '.rating_li', function(e){
				e.preventDefault();
				$('.rating_li').removeClass( "active");
				$(this).addClass( "active" );
			});
			
			$('body').on('click', '.rating', function(e){
				e.preventDefault();
				$.ajax({  
					url: 'index_ajax.php',  
					cache: false,  
					data: {rating: 'rating'},
					type: 'POST', 
					success: function(data){ 
						$('#content_rating').html(data);           
					}  
				});  
			});
			
			$('body').on('click', '.rating2', function(e){
				e.preventDefault();
				$.ajax({  
					url: 'index_ajax.php',  
					cache: false,  
					data: {rating: 'rating2'},
					type: 'POST', 
					success: function(data){ 
						$('#content_rating').html(data);           
					}  
				});  				
			});
			
			$('body').on('click', '.rating3', function(e){
				e.preventDefault();
				$.ajax({  
					url: 'index_ajax.php',  
					cache: false,  
					data: {rating: 'rating3'},
					type: 'POST', 
					success: function(data){ 
						$('#content_rating').html(data);           
					}  
				});  
			});
			
			$('body').on('click', '.rating4', function(e){
				e.preventDefault();
				$.ajax({  
					url: 'index_ajax.php',  
					cache: false,  
					data: {rating: 'rating4'},
					type: 'POST', 
					success: function(data){ 
						$('#content_rating').html(data);           
					}  
				});  
			});

		});
	</script>
	
	
</body>
</html>