<?php if(!USER_LOGGED){ ?>
<?php } else { ?>
<div class="main_head_general">
	<div class="main_header_child">
		<div class="menu_header_left">
			<ul>
				<li><a class="menu_header_left_a" href="/">�������</a></li>
				<li><a class="menu_header_left_a" href="/?page=news#boot_page">�������</a></li>
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
	<span class="money">������: <?php echo number_format($b_tot,2,'.',','); ?>	���</span>				
										
				</li>
			</ul>
		</div>
		<div class="menu_header_right">
			
		</div>
						<div class="menu_header_right">
			<ul>
				<li><span>����� ����������, <?echo $u_login;?></span></li>
				<li><a href="/logout.php">�����</a></li>
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

<li><a href="/?page=popolnit">������� ������</a></li>
<li><a href="/?page=vyvesti">������� ������</a></li>
<li><a href="/?page=refs">��������</a></li>
<li><a href="/?page=settings">���������</a></li>
<br>
<li><a href="/logout.php">�����</a></li>

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
?>
<b><font style="margin: 0px 65px 0px 60px;color: #5d8fd1;font-size: 15px;">����������</font></b>
<br>
<br>�������: <font color="#FF860D">**%</font>
<hr>
������: <font color="#FF860D"><?php echo number_format($b_tot,2,'.',','); ?> ���</font>
<br>���������: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_plus,2,'.',',')); ?> ���</font>
<br>����������: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_raz,2,'.',',')); ?> ���</font>
<br>��������: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_with,2,'.',',')); ?> ���</font>
<hr>
�����������: <font color="#FF860D"><?php echo str_replace('.00','',number_format($b_ref,2,'.',',')); ?> ���</font>
<br>���������: <font color="#FF860D"><?php echo mysql_num_rows($refstotq); ?> ���</font>
<br>�������: <font color="#FF860D"><?php echo mysql_num_rows($refsq); ?> ���</font>
</div>
</td>
<td>
<?php
if($d_vyvod!=0){
echo '<div class="deposits_error">����� ����� �������������</div>';
}
else{
echo '<div class="deposits_error" align="center" style="background: white;color: #000000;font-size: 15px;font-family: arial;border: 1px solid #CECECE;border-radius: 5px;">�� ������ ������� �� </font><font style="color: rgb(3, 119, 226);">'.$d_wmin.' �� '.$d_wmax.'</font> ���</div>';
}
?>
<?php
if($d_vyvod==0){

$b_tot=0;
$b_plus=0;
$b_otn=0;

$depbtq=mysql_query("SELECT ologin,otype,osum,osum2,orefsum,odate,obatch,odate2,oprofit,odays FROM operations WHERE (ologin='$u_login' AND osum>0 AND oback='') OR (oref='$u_login' AND osum>0 AND oback='')");
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

if(isset($_POST['sum'])){
$sum=$_POST['sum'];
$sum=preg_replace("#[^0-9\.]+#",'',$sum);
$sum=preg_replace("#\.+#",'.',$sum);

if(empty($sum)){ $sum=0; }

$sum=number_format($sum,2,'.','');

if(!is_numeric($sum)){ $w_e='<div class="deposits_error">������� ���������� ����� ��� ������</div>'; }
if(empty($w_e) && $sum<$d_wmin){ $w_e='<div class="deposits_error">����������� ����� ��� ������ '.$d_wmin.' ���</div>'; }
if(empty($w_e) && $sum>$d_wmax){ $w_e='<div class="deposits_error">������������ ����� ��� ������ '.$d_wmax.' ���</div>'; }
if(empty($w_e) && $sum>$b_tot){ $w_e='<div class="deposits_error">�� ����� ������� ������������ �������</div>'; }

if(empty($w_e) && $sum>$free){
$w_e='� ������� ������������ ������� ��� ������<br>���������� ������� '.number_format($free,2,'.','');
}

if(empty($w_e)){

//======================================== ������� ������ ====================================================================

mysql_query("INSERT INTO operations (ologin,otype,osum,odate) VALUES ('$u_login','2','$sum','$time')") or die('error inserting withdrawl');
$w_s=1;
$b_tot-=$sum;
}
}
//==============================================================================================================================
}
?>


<?php
if(!empty($w_e)){ echo '<div>'.$w_e.'</div>'; }
if(!empty($w_s)){ echo '<div class="deposits_success">������ �� ����� '.$sum.' ��� ������� � ���������. ������� ����� ������ �� 24 �����.</div>'; }
?>

<div class="">




<table cellpadding="0px" cellspacing="0px" style="padding-top:0px;">
<tbody><tr>
<td width="400" class="deposits_stat" valign="top" style="border: 1px solid #dfdfdf; color: #000000; background: none;">
<font style="color:red;">1.</font> ��� ������ �������, ��� ���������� ����� ������� � ������� <a target="_blank" style="color:#009000;text-decoration:underline;font-weight:bold;" href="https://w.qiwi.com">w.qiwi.com</a>
<br><font style="color:red;">2.</font> ����� ���������� �� ����� ����� � ������� "������� ������" ����� ������
<br><font style="color:red;">3.</font> ����� �������� ������ "�������"
<br><font style="color:red;">4.</font> ������ ����� ���������� �� ������ �������� ��� �����������. 
</td>

<td width="430px" valign="top">







<?php if($d_vyvod==0){ ?>
<form id="withdrawal" method="POST" action="/?page=vyvesti" style="margin:0;padding:0">
<table align="center" cellpadding="0px" cellspacing="0px">
<tr>
<td><font class="vyvesti_sum"></font>&nbsp;&nbsp;<input id="withdrawal_input" class="deposits_input" type="text" name="sum" onkeyup="withdrawal();" placeholder="�����" maxlength="9"><a class="btn_log" href="javascript:with(document.getElementById('withdrawal')){ submit(); }">�������</a></td></td>
<div align="center">
<div class="deposits_date" style="border: 1px solid #dfdfdf; color: #000000; background: none;"><img src="../images/cabinet/phone.png" style="margin: 0px 30px -17px -55px;">��� ����� ��� ������ <br> <b>[ <font color="#FF860D"><?echo $u_name;?></font> ]</b></div>
</div>
</tr>
<div align="center">
<div class="deposits_date" style="border: 1px solid #dfdfdf; color: #000000; background: none;">���� �� �����: <?php echo date('j '.$mdate[date('n',$time)-1].' H:i',$time); ?></div>
</div>
</table>
<br>
<div>
<center>
</center>
</div>
</form>

<?php } ?>


</td>

</tr>
</tbody></table>
<br>
<br>

<table align="center" class="withdrawal_stat" cellpadding="0px" cellspacing="0px">
<tbody><tr>
<td width="145px" style="padding-left:40px;">�����</td>
<td width="170px">����</td>
<td width="130px">������</td>
</tr>
</tbody></table>


<table align="center" style="margin-top:2px;" cellpadding="2px" cellspacing="2px">
<?php
$statsq=mysql_query("SELECT osum,odate,odate2,obatch FROM operations WHERE otype=2 AND ologin='$u_login' ORDER BY odate DESC");
while($statsm=mysql_fetch_row($statsq)){ ?>
<tr>
<td class="vyvesti_stat_sum"><?php echo str_replace('.00','',number_format($statsm[0],2,'.',',')); ?> ���</td>
<td class="vyvesti_stat_date"><?php echo date('j '.$mdate[date('n',$statsm[1])-1].' H:i',$statsm[1]); ?></td>
<?php
if($statsm[2]==''){ echo '<td class="vyvesti_stat_batch_1">� ���������</td>'; }
else{ echo '<td class="vyvesti_stat_batch_2">���������</td>'; }
?>
</td>
</tr>
<?php } ?>
</table>


</div>

<br><br><br>
		
		
</td>
</tbody></table>	
	</div>
	</div>
</body></html>