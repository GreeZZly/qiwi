<?php if(!USER_LOGGED){ ?>
	<div class="main_head_general">
	<div class="main_header_child">
		<div class="menu_header_left">
			<ul>
				<li><a class="menu_header_left_a" href="/">Главная</a></li>
				<li><a class="menu_header_left_a" href="/?page=news#boot_page">Новости</a></li>
								<li><a class="vk_public_a" href="http://vk.com/" target="_blank"></a></li>
				<li>
								<font color="#fff">Старт проекта <?php echo date('j '.$mdate[date('n',$start_time)-1].' в H:i',$start_time); ?> по Москве.</font>
				<br>										
				</li>
			</ul>
		</div>
		<div class="menu_header_right">
			
			<ul>
				<li><a href="/?page=registration#boot_page">Зарегистрироваться</a></li>
				<li><a href="/?page=auth#boot_page">Войти</a></li>
			</ul>
				
		</div>
			</div>
</div>	
<div class="global_block_main_header">
		<div class="main_header">
			<h1>Добро пожаловать в MakeYourCash</h1>
			<h2>Это касса финансовой взаимопомощи, которая работает по принципу финансовой пирамиды.</h2>
				
				<div class='button_register'><a href="/?page=registration#boot_page" class='btn btn_join'>Присоединиться</a></div>
					
							</div>
		<div class="clouds"></div>
	</div>	
<?php } else { ?>
<div class="main_head_general">
	<div class="main_header_child">
		<div class="menu_header_left">
			<ul>
				<li><a class="menu_header_left_a" href="/">Главная</a></li>
				<li><a class="menu_header_left_a" href="/?page=news#boot_page">Новости</a></li>
								<li><a class="vk_public_a" href="/" target="_blank"></a></li>
				<li>
							
					<?php
$b_plus=0;
$b_with=0;
$b_ref=0;
$b_zam=0;
$b_raz=0;
$b_act=0;
$b_tot=0;
$b_otn=0;

$b_acts=200;

//echo strtotime('05.01.2013 15:00').'<br>';
//echo strtotime('15.01.2013 15:00').'<br>';


$depbtq=mysql_query("SELECT ologin,otype,osum,osum2,orefsum,odate,obatch,odate2,oprofit,odays FROM operations WHERE (ologin='$u_login' AND osum>0 AND oback='') OR (oref='$u_login' AND osum>0  AND oback='')");
while($depbtm=mysql_fetch_row($depbtq)){

if($depbtm[0]!=$u_login && $depbtm[1]==3 && $depbtm[6]!=''){ $b_ref+=$depbtm[4]; }

if($depbtm[0]==$u_login && $depbtm[1]==2){ $b_with+=$depbtm[2]; }

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[6]!=''){ $b_plus+=$depbtm[3]; }

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[5]>$time){
$b_zam+=$depbtm[3];
$b_act++;
$b_col=floor(($time-$depbtm[7])/(24*3600));
$b_raz+=$b_col*$depbtm[8];
}

if($depbtm[0]==$u_login && $depbtm[1]==3 && $depbtm[5]<=$time){
$b_raz+=$depbtm[2];
$b_otn+=$depbtm[3];
}

}

$b_tot=$b_ref+$b_plus-$b_otn-$b_with-$b_zam+$b_raz;
?>		
	<span class="money">Баланс: <?php echo number_format($b_tot,2,'.',','); ?>	РУБ</span>					
										
				</li>
			</ul>
		</div>
		<div class="menu_header_right">
			
		</div>
						<div class="menu_header_right">
			<ul>
				<li><span>Добро пожаловать, <?echo $u_login;?></span></li>
				<li><a href="/logout.php">Выйти</a></li>
			</ul>
		</div>			
	</div>
	
	
	
</div>
<div class="global_block_main_header">
		<div class="main_header">
			<h1>Добро пожаловать в MakeYourCash</h1>
			<h2>Это касса финансовой взаимопомощи, которая работает по принципу финансовой пирамиды.</h2>
				
				<div class='button_register'><a href="/?page=popolnit" class='btn btn_join'>Мой кабинет</a></div>
					
							</div>
		<div class="clouds"></div>
	</div>
<?php } ?>
<div id="boot_page" class="main_block">
		<div class="all_block_global" style=" min-height: 900px;">
		
		
		
		
	<br>	
		
		

			<div class="title_news">Новости нашего проекта</div>
			<div class="news_article clear_fix">
				<div class="avatar_artciel zoom">
				</div>
				<div class="article_text_news">Для более долгой жизни наших стартов, мы решили снизить процентную ставку до 30%.
Реферальный бонус теперь стабильный - 10%
При такой ставке вклады будут более безопасными, а проект будет жить намного дольше.
<br><br>
Напоминаем что старт состоится: 15 февраля в 21:00 по МСК
<br><br>
Помните, жизнь проекта зависит от вкладчиков: приглашайте своих друзей и знакомых, рекламируйте, вкладывайтесь. А мы будем продолжать развивать и совершенствовать наш проект. Третий старт обещает быть ещё лучше!</div>
				<div class="date_article_news">
					<div class="date_news">13-02-2014 00:32</div>
				</div>
			</div><div class="news_article clear_fix">
				<div class="avatar_artciel zoom">
				</div>
				<div class="article_text_news">Друзья, сегодня, 9 февраля, проект MakeYourCash покупает BUTSUP.<br><br>
MakeYourCash - честный, стабильный проект, который только начинает набирать обороты.<br><br>Зарабатывай, вкладывая или просто приглашая участников по своей реферальной ссылке!<br><br>
Второй старт проекта состоится 10 февраля в 21:00 мск.<br><br>
Следите за новостями.</div>
				<div class="date_article_news">
					<div class="date_news">2014-02-09 15:50</div>
				</div>
			</div><div class="news_article clear_fix">
				<div class="avatar_artciel zoom">
				</div>
				<div class="article_text_news">Друзья, очень часто оказывается, что хайп-проекты оказываются мошенническими , в связи с этим, мы решили приобрести годовой SSL сертификат.<br><br>
Доверенные SSL сертификаты выписываются официальными центрами сертификации, и именно они в дальнейшем станут поручителями в безопасном использовании сайта.<br><br>
Очень много интересных вопросов задают нам пользователи: "Как сделать вклад?" , "Когда проект остановится?" , "Могу ли я потерять деньги?". <br><br>
Вы можете задать нам любой, интересующий вас, вопрос на "support@makeyourcash.biz" наши помощники свяжутся с вами в ближайшее время и ответят вам.</div>
				<div class="date_article_news">
					<div class="date_news">2014-02-06 15:22</div>
				</div>
			</div><div class="news_article clear_fix">
				<div class="avatar_artciel zoom">
				</div>
				<div class="article_text_news">В этой статье мне хотелось бы подробнее остановиться на обзоре этого проекта, который показался мне интересным как в аспектах подготовки, так и в отношении инвестиционных планов. <br><br>Подобрать оптимальное оформление сайта, сделать его красивым не только для владельца сайта, но и для целевой аудитории требует определенного опыта работы. <br><br>Предлагаемый проект - тщательно продуман и профессионально разработан. Является привлекательным и одновременно функциональным. Он не перегружен картинками, анимацией. Он не отвлекает от информационного наполнения, а скорее, грамотно его дополняет.</div>
				<div class="date_article_news">
					<div class="date_news">2014-02-03 16:12</div>
				</div>
			</div><div class="news_article clear_fix">
				<div class="avatar_artciel zoom">
				</div>
				<div class="article_text_news">Механизм партнерской системы очень прост. Вам, как участнику дают специальную личную ссылку, вы можете найти ее в своем личном кабинете в разделе "Рефералы".<br><br>
На нашем ресурсе вы получаете 5% от вложений 1-го реферала, то есть пользователя, зарегистрировавшегося  непосредственно  по  вашей реферальной ссылке. 10% от заработка рефералов, если их больше пяти человек, 15% от заработка рефералов , если их больше десяти человек.<br><br>
В случае выявления мошеничества, все аккаунты полностью блокируются, а сумма с аккаунта пользователя возвращается на счета администрации. Если существует необходимость создания нескольких аккаунтов, необходимо соглосовать это в технической поддержке.</div>
				<div class="date_article_news">
					<div class="date_news">2014-02-02 23:50</div>
				</div>
			</div>				
		
		
		
		
		
		
		
		
		
		
		
		
		

		</div>