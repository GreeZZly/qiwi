<?php if(!USER_LOGGED){ ?>
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
<?php } ?>
	<div class="main_block">
		<div class="all_block_global" style="padding-top: 50px;min-height: 900px;">
		
		
		
		
	<br>	
		
		





<table width="100%" style="vertical-align: top;">
<tbody><tr style="vertical-align: top;">
<td style="vertical-align: top;">


<div class="left_menu_users" valign="top" style="vertical-align: top;margin: 0px 60px 40px 0px;width: 240px;">
	<ul valign="top" style="vertical-align: top;">

<li><a href="/?page=popolnit">Вложить деньги</a></li>
<li><a href="/?page=vyvesti">Вывести деньги</a></li>
<li><a href="/?page=refs">Рефералы</a></li>
<li><a href="/?page=settings">Настройки</a></li>
<br>
<li><a href="/logout.php">Выход</a></li>

</ul>

</div>
<div class="left_menu_stat">
<?php
$refstotq=mysql_query("SELECT login FROM users WHERE ref='".$u_login."'");
$refsq=mysql_query("SELECT ologin,sum(osum2),sum(orefsum) FROM operations WHERE otype=3 AND oref='".$u_login."' AND ologin!='".$u_login."' AND osum2>0 AND obatch!='' AND oback='' GROUP BY ologin ORDER BY sum(osum2) DESC");
$refsar1=array();
while($refsarm=mysql_fetch_row($refstotq)){
$refsar1[$refsarm[0]]=1;
}
?>
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

// <!--   IdFox   -->>

$active_rc = mysql_num_rows($refsq);

if ($active_rc >= 40) $d_proc = 150;
elseif ($active_rc >= 35) $d_proc = 145;
elseif ($active_rc >= 30) $d_proc = 140;
elseif ($active_rc >= 25) $d_proc = 135;
elseif ($active_rc >= 20) $d_proc = 130;
elseif ($active_rc >= 15) $d_proc = 125;
elseif ($active_rc >= 10) $d_proc = 120;
elseif ($active_rc >= 5) $d_proc = 115;
else $d_proc = 110;

$d_proc_up = $d_proc;
$d_proc_out = $d_proc_up - 100;

// <!--   IdFox   -->>

?>

<b><font style="margin: 0px 65px 0px 60px;color: #5d8fd1;font-size: 15px;">Статистика</font></b><br>
<br>
ПР. НА ПОПОЛНЕНИЕ: <font color="#FF860D"><?=$d_proc_out?>%</font>
<hr>
БАЛАНС: <font color="#FF860D"><?php echo number_format($b_tot,2,'.',','); ?> РУБ</font>
<br>ПОПОЛНЕНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_plus,2,'.',',')); ?> РУБ</font>
<br>ЗАРАБОТАНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_raz,2,'.',',')); ?> РУБ</font>
<br>ВЫВЕДЕНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_with,2,'.',',')); ?> РУБ</font>
<hr>
Реферальные: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_ref,2,'.',',')); ?> РУБ</font>
<br>Рефералов: <font color="#FF860D"><?php echo mysql_num_rows($refstotq); ?> РЕФ</font>
<br>Активно: <font color="#FF860D"><?php echo mysql_num_rows($refsq); ?> РЕФ</font>
</div>
</td>
<td>

<?php
if($d_popolnenie!=0){
echo '<div class="deposits_error" align="center" >Пополнение баланса приостановлено</div>';
}
else{

$b_zam=0;

$depbtq=mysql_query("SELECT SUM(osum2) FROM operations WHERE ologin='$u_login' AND osum>0 AND otype=3 AND odate>'$time'");
$depbtm=mysql_fetch_row($depbtq);
$b_zam=$depbtm[0];


$can_dep='';

if(($d_max-$b_zam)>=$d_min){
$can_dep='от '.$d_min.' до '.($d_max-$b_zam);
}
?>
<?php
if($can_dep==''){ echo '<div class="deposits_error" align="center">Достигнут лимит суммы вкладов</div>'; }
else{
echo '
<div class="deposits_error" align="center" style="background: white;color: #000000;font-size: 15px;font-family: arial;border: 1px solid #CECECE;border-radius: 5px;">Вы можете вложить  <font style="color: rgb(3, 119, 226);">'.$can_dep.'</font> руб</div>
';
}
}
?>

<?php
if($d_popolnenie==0){

$cpop=1;
$cnaq=mysql_query("SELECT * FROM operations WHERE ologin='$u_login' AND osum=0.00 AND osum2=0.00");
$cnam=mysql_num_rows($cnaq);

if($cnam>1){
$cpop=0;
}

if(!empty($_POST['batch']) && ($_POST['plan']==1 || $_POST['plan']==2)){

if($cpop==1){

$batch=preg_replace("#[^0-9a-z]+#i",'',$_POST['batch']);
$plan=$_POST['plan'];

if(strlen($batch)>5 && strlen($batch)<50){

$plusq=mysql_query("SELECT * FROM operations WHERE obatch='$batch'");
if(mysql_num_rows($plusq)==0) {

if($plan==1){ $time2=$time+3600*24; $d_proc=150;}
if($plan==2){ $time2=$time+3600*12; $d_proc=125;}

// <!--   IdFox   -->>

$d_proc = $d_proc_up;

// <!--   IdFox   -->>

mysql_query("INSERT INTO operations (ologin,otype,osum,osum2,odate,odate2,oplan,oref,obatch,oproc,odays,orefproc) VALUES ('$u_login','3','','','$time2','$time','$plan','$u_ref','$batch','$d_proc','$d_days','$p_ref')") or die('inserting batch data error');

}
}

}

}

if($cpop==0){
echo '<div class="deposits_error" align="center">Лимит пополнений, находящихся в обработке.</div>';
}

if($can_dep!='' && $cpop==1){
?>
<?php
if(!empty($batch)){ echo '<div class="deposits_success">Транзакция <font color="blue">'.$batch.'</font> принята в обработку.<br> Процесс может занять до 24 часов.</div>'; }
?>
<div>
<table cellpadding="0px" cellspacing="0px" style="padding-top:0px;">
<tbody><tr>
<td width="400px" class="deposits_stat" valign="top" style="border: 1px solid #dfdfdf; color: #000000; background: none;">
<font style="color:red;">1.</font> Заходим в свой qiwi кошелёк на сайте <a target="_blank" style="color:#009000;text-decoration:underline;font-weight:bold;" href="https://w.qiwi.com">w.qiwi.com</a>
<br><font style="color:red;">2.</font> Выбираем раздел "Перевод". 
<br><font style="color:red;">3.</font> В поле "Номер телефона" вписываем кошелек <font color="#FF860D">+79397534754</font>. 
<br><font style="color:red;">4.</font> Вводим сумму и жмём "Оплатить" 
<br><font style="color:red;">5.</font> Копируем номер платежа и вставляем в поле "Номер транзакции". 
</td>

<td width="430px" valign="top">

<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td>
<form id="popolnit" action="/?page=popolnit" method="POST" style="margin:0;padding:0">
<input id="batch" class="deposits_input" type="text" name="batch" placeholder="Номер Транзакции" maxlength="50">
<input id="plan" type="hidden" name="plan" value="1">
<a class="btn_log" href="javascript:document.getElementById('plan').value=1;with(document.getElementById('popolnit')){ submit(); }">Вложить</a>
</form>
</td>
<td>
</td>
<div align="center">
<div class="deposits_date" style="border: 1px solid #dfdfdf; color: #000000; background: none;">Дата на сайте: <?php echo date('j '.$mdate[date('n',$time)-1].' H:i',$time); ?></div>
</div>
</tr>
</table>
<br>
<div>
<center>

</center>
</div>

<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td>


</td>
</tr>
</table>


</td>
</tr>
</tbody></table>
<br>
<br>

<?php }} ?>

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

<table align="center" class="invest_stat" align="center" cellpadding="0px" cellspacing="0px">
<tbody><tr>
<td width="130px">Сумма</td>
<td width="165px">Дата</td>
<td width="240px">Транзакция</td>
<td width="135px">Статус</td>
</tr>
</tbody></table>


<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
<?php
$statsq=mysql_query("SELECT osum2,odate2,oplan,obatch,oback,osum,odays FROM operations WHERE otype=3 AND ologin='$u_login' AND obatch!='' ORDER BY odate2 DESC");
while($statsm=mysql_fetch_row($statsq)){ ?>
<tr>
<td class="invest_stat_sum">
<?php
if($statsm[0]>0){ echo str_replace('.00','',number_format($statsm[0],2,'.',',')).' РУБ'; }
else { echo '-//-'; }
?>
</td>
<td class="invest_stat_date"><?php echo date('j '.$mdate[date('n',$statsm[1])-1].' H:i',$statsm[1]); ?></td>
<td class="invest_stat_batch">
<?php
if($statsm[5]=='0' && $statsm[4]==2){
echo '<font color="red">'.$statsm[3].'</font>';
}
else{
echo $statsm[3];
}
?>
</td>
<?php
if($statsm[5]=='0' && $statsm[4]==''){ echo '<td class="invest_stat_batch_1">В обработке</td>'; }
if($statsm[5]=='0' && $statsm[4]==1){ echo '<td class="invest_stat_batch_1">К возврату</td>'; }
if($statsm[5]=='0' && $statsm[4]==2){ echo '<td class="invest_stat_batch_2">Возвращено</td>'; }
if($statsm[5]>0){ echo '<td class="invest_stat_batch_2">Принято</td>'; }
?>
</td>
</tr>
<?php } ?>
</table>

</br>

</br>

</br>

<table align="center" class="invest_stat" align="center" cellpadding="0px" cellspacing="0px">
<tbody><tr>
<td width="235px" style="padding-left:10px;">Дата вклада, окончания</td>
<td width="170px">Вклад</td>
<td width="130px">Начислено</td>
<td width="135px">Статус</td>
</tr>
</tbody></table>


<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">

<?php
$que=1;
$depn=1;
$depz_t=array();
$depzq=mysql_query("SELECT odate2,oplan,osum2,osum,odate,odate2,oproc,oprofit,odays,oplan FROM operations WHERE otype=3 AND odate>$time AND ologin='$u_login' AND osum>0 ORDER BY odate2 DESC");
$deptot=mysql_num_rows($depzq);
while($depzm=mysql_fetch_row($depzq)){

if($depzm[9]==1){ $depz_t[]=$depzm[5]+(floor(($time-$depzm[5])/(24*3600)))*24*3600+24*3600; }
if($depzm[9]==2){ $depz_t[]=$depzm[5]+(floor(($time-$depzm[5])/(12*3600)))*12*3600+12*3600; }

echo '
<tr>
<td class="invest_count_date">'.date('j '.$mdate[date('n',$depzm[0])-1].' H:i',$depzm[0]).' - '.date('j '.$mdate[date('n',$depzm[4])-1].' H:i',$depzm[4]).'</td>
<td class="invest_count_sum">'.str_replace('.00','',number_format($depzm[2],2,'.',',')).' РУБ</td>
<td class="invest_count_sum_2">'.str_replace('.00','',number_format($depzm[3],2,'.',',')).' РУБ</td>
<td class="vklady_count_zam"><font id="zam_'.$depn.'"></font> <font color="#EC7600">'.(floor(($time-$depzm[5])/(24*3600))).'/'.$depzm[8].'</font></td>
</tr>';

$depn++;
}




echo '<script type="text/javascript">';
$n=0;
foreach($depz_t as $dz_time){
$n++;
echo 'var a'.$n.'='.($dz_time-$time+1).';
function c'.$n.'(){
if(a'.$n.'>=1){
var h'.$n.'=(parseInt(a'.$n.'/3600));
if(h'.$n.'<10){h'.$n.'="0"+h'.$n.'};
var sl'.$n.'=a'.$n.'-h'.$n.'*3600;
var m'.$n.'=(parseInt(sl'.$n.'/60));
if(m'.$n.'<10){m'.$n.'="0"+m'.$n.'};
var ls'.$n.'=sl'.$n.'-m'.$n.'*60;
if(ls'.$n.'<10){ls'.$n.'="0"+ls'.$n.';}
document.getElementById("zam_'.$n.'").innerHTML=h'.$n.'+":"+m'.$n.'+":"+ls'.$n.';
a'.$n.'--;
setTimeout("c'.$n.'()",1010);
}
else{
location.href=location.href;
}
}
c'.$n.'();';
}
echo '</script>';


?>

<?php
$que=1;
$depn=1;
$deprq=mysql_query("SELECT odate2,oplan,osum2,osum,odate FROM operations WHERE otype=3 AND odate<=$time AND osum>0 AND ologin='$u_login' ORDER BY odate DESC");
$deptot=mysql_num_rows($deprq);
while($deprm=mysql_fetch_row($deprq)){

echo '
<tr>
<td class="invest_count_date">'.date('j '.$mdate[date('n',$deprm[0])-1].' H:i',$deprm[0]).' - '.date('j '.$mdate[date('n',$deprm[4])-1].' H:i',$deprm[4]).'</td>
<td class="invest_count_sum">'.str_replace('.00','',number_format($deprm[2],2,'.',',')).' РУБ</td>
<td class="invest_count_sum_2">'.str_replace('.00','',number_format($deprm[3],2,'.',',')).' РУБ</td>
<td class="vklady_count_raz">Отработано</td>
</tr>';

$depn++;
}

?>

</table>
</div>		
		
		
		
		
		
		
		
		
		
</tbody></table>	
	</div>
	</div>
</body></html>