<div class="main_news_top"></div>

<div class="main_news_center">
<div class="main_news_title">Пополнить баланс и СДЕЛАТЬ ВКЛАД</div>


<div class="popolnit_info">
Заходим в свой qiwi кошелёк <b>[ <font color="#FF860D"><?echo $u_login;?></font> ]</b> на сайте <a target="_blank" style="color:#009000;text-decoration:underline;font-weight:bold;" href="https://w.qiwi.com">w.qiwi.com</a>
<br>Выбираем раздел "Перевод". 
<br>В поле "Номер телефона" вписываем кошелек +79199684050. 
<br>Вводим сумму и жмём "Оплатить" 
<br>Копируем номер платежа и вставляем в поле "Номер транзакции". 
<br>
<br>


<?php
if($d_popolnenie!=0){
echo '<div class="popolnit_error">Пополнение баланса приостановлено</div>';
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

if($can_dep==''){ echo '<div align="center" style="color:#009000;font-size:20px;font-family:arial;">Достигнут лимит суммы вкладов</div>'; }
else{
echo '
Вы можете сделать вклад на сумму <font style="color:#009000;font-size:20px;font-family:arial;">'.$can_dep.'</font>
';
}
}
?>
</div>

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
if(mysql_num_rows($plusq)==0){

if($plan==1){ $time2=$time+3600*48; $d_proc=150;}
if($plan==2){ $time2=$time+3600*24; $d_proc=125;}


mysql_query("INSERT INTO operations (ologin,otype,osum,osum2,odate,odate2,oplan,oref,obatch,oproc,odays,orefproc) VALUES ('$u_login','3','','','$time2','$time','$plan','$u_ref','$batch','$d_proc','$d_days','$p_ref')") or die('inserting batch data error');
}
}

}

}

if($cpop==0){
echo '<div class="popolnit_nomore">Лимит пополнений, находящихся в обработке.</div>';
}

if($can_dep!='' && $cpop==1){
?>

<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td>
<form id="popolnit" action="/?page=popolnit" method="POST" style="margin:0;padding:0">
<input id="batch" class="popolnit_input" type="text" name="batch" placeholder="Номер Транзакции" maxlength="50">
<input id="plan" type="hidden" name="plan" value="1">
</form>
</td>
<td>
<a class="popolnit_1" href="javascript:document.getElementById('plan').value=1;with(document.getElementById('popolnit')){ submit(); }">50% на 48 ч</a>
<a class="popolnit_1" href="javascript:document.getElementById('plan').value=2;with(document.getElementById('popolnit')){ submit(); }">25% на 24 ч </a>
</td>
</tr>
</table>

<br>

<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td>


</td>
</tr>
</table>

<?php }} ?>

<br>
<br>
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
<div class="vklady_balance">БАЛАНС: <font color="#FF860D"><?php echo number_format($b_tot,2,'.',','); ?></font> РУБ</div>
<div class="vklady_stat">
ПОПОЛНЕНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_plus,2,'.',',')); ?> РУБ</font>
ЗАРАБОТАНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_raz,2,'.',',')); ?> РУБ</font>
РЕФЕРАЛЬНЫЕ: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_ref,2,'.',',')); ?> РУБ</font>
ВЫВЕДЕНО: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_with,2,'.',',')); ?> РУБ</font>
</div>

<br>
<br>
<table align="center" class="popolnit_stat" cellpadding="0px" cellspacing="0px">
<tr>
<td style="width:110px;">Сумма</td>
<td style="width:145px;">Дата</td>
<td style="width:240px;">Транзакция</td>
<td style="width:135px;">Статус</td>
</tr>
</table>

<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
<?php
$statsq=mysql_query("SELECT osum2,odate2,oplan,obatch,oback,osum,odays FROM operations WHERE otype=3 AND ologin='$u_login' AND obatch!='' ORDER BY odate2 DESC");
while($statsm=mysql_fetch_row($statsq)){ ?>
<tr>
<td class="popolnit_stat_sum">
<?php
if($statsm[0]>0){ echo str_replace('.00','',number_format($statsm[0],2,'.',',')).' РУБ'; }
else { echo '-//-'; }
?>
</td>
<td class="popolnit_stat_date"><?php echo date('j '.$mdate[date('n',$statsm[1])-1].' H:i',$statsm[1]); ?></td>
<td class="popolnit_stat_batch">
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
if($statsm[5]=='0' && $statsm[4]==''){ echo '<td class="popolnit_stat_batch_1">В обработке</td>'; }
if($statsm[5]=='0' && $statsm[4]==1){ echo '<td class="popolnit_stat_batch_1">К возврату</td>'; }
if($statsm[5]=='0' && $statsm[4]==2){ echo '<td class="popolnit_stat_batch_2">Возвращено</td>'; }
if($statsm[5]>0){ echo '<td class="popolnit_stat_batch_2">Принято</td>'; }
?>
</td>
</tr>
<?php } ?>
</table>

</br>

</br>

</br>

<table class="vklady_table" cellpadding="0px" cellspacing="0px">
<tr>
<td width="220px"style="padding-left:10px;">Дата вклада, окончания</td>
<td width="170px">Вклад</td>
<td width="130px">Заработано</td>
<td width="135px">Статус</td>
</tr>
</table>


<table style="margin-top:4px;" cellpadding="0px" cellspacing="0px">

<?php
$que=1;
$depn=1;
$depz_t=array();
$depzq=mysql_query("SELECT odate2,oplan,osum2,osum,odate,odate2,oproc,oprofit,odays,oplan FROM operations WHERE otype=3 AND odate>$time AND ologin='$u_login' AND osum>0 ORDER BY odate2 DESC");
$deptot=mysql_num_rows($depzq);
while($depzm=mysql_fetch_row($depzq)){

if($depzm[9]==1){ $depz_t[]=$depzm[5]+(floor(($time-$depzm[5])/(48*3600)))*48*3600+48*3600; }
if($depzm[9]==2){ $depz_t[]=$depzm[5]+(floor(($time-$depzm[5])/(24*3600)))*24*3600+24*3600; }

echo '
<tr>
<td class="vklady_date_1">'.date('j '.$mdate[date('n',$depzm[0])-1].' H:i',$depzm[0]).' - '.date('j '.$mdate[date('n',$depzm[4])-1].' H:i',$depzm[4]).'</td>
<td class="vklady_sum_1">'.str_replace('.00','',number_format($depzm[2],2,'.',',')).' РУБ</td>
<td class="vklady_sum_2">'.str_replace('.00','',number_format($depzm[3],2,'.',',')).' РУБ</td>
<td class="vklady_status_zam"><font id="zam_'.$depn.'"></font> <font color="#339AD5">'.(floor(($time-$depzm[5])/(24*3600))).'/'.$depzm[8].'</font></td>
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
<td class="vklady_date_1">'.date('j '.$mdate[date('n',$deprm[0])-1].' H:i',$deprm[0]).' - '.date('j '.$mdate[date('n',$deprm[4])-1].' H:i',$deprm[4]).'</td>
<td class="vklady_sum_1">'.str_replace('.00','',number_format($deprm[2],2,'.',',')).' РУБ</td>
<td class="vklady_sum_2">'.str_replace('.00','',number_format($deprm[3],2,'.',',')).' РУБ</td>
<td class="vklady_status_raz">Отработано</td>
</tr>';

$depn++;
}

?>

</table>
</div>

<div class="main_news_bottom"></div>
