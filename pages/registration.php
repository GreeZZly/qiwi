<?php if(!USER_LOGGED){ ?>
	<div class="main_head_general">
	<div class="main_header_child">
		<div class="menu_header_left">
			<ul>
				<li><a class="menu_header_left_a" href="/">�������</a></li>
				<li><a class="menu_header_left_a" href="/?page=news#boot_page">�������</a></li>
								<li><a class="vk_public_a" href="http://vk.com/" target="_blank"></a></li>
				<li>
								<font color="#fff">����� ������� <?php echo date('j '.$mdate[date('n',$start_time)-1].' � H:i',$start_time); ?> �� ������.</font>
				<br>										
				</li>
			</ul>
		</div>
		<div class="menu_header_right">
			
			<ul>
				<li><a href="/?page=registration#boot_page">������������������</a></li>
				<li><a href="/?page=auth#boot_page">�����</a></li>
			</ul>
				
		</div>
			</div>
</div>	
<div class="global_block_main_header">
		<div class="main_header">
			<h1>����� ���������� � MakeYourCash</h1>
			<h2>��� ����� ���������� ������������, ������� �������� �� �������� ���������� ��������.</h2>
				
				<div class='button_register'><a href="/?page=auth#boot_page" class='btn btn_join'>����� � �������</a></div>
					
							</div>
		<div class="clouds"></div>
	</div>	
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
				<li><span>����� ����������, <?echo $u_name;?></span></li>
				<li><a href="/logout.php">�����</a></li>
			</ul>
		</div>			
	</div>
	
	
	
</div>
<div class="global_block_main_header">
		<div class="main_header">
			<h1>����� ���������� � MakeYourCash</h1>
			<h2>��� ����� ���������� ������������, ������� �������� �� �������� ���������� ��������.</h2>
				
				<div class='button_register'><a href="/?page=popolnit" class='btn btn_join'>��� �������</a></div>
					
							</div>
		<div class="clouds"></div>
	</div>
<?php } ?>
<div id="boot_page" class="main_block">
<div class="all_block_global" style=" min-height: 900px;">
<?php
$reg_show=1;
if(!isset($_POST['u_login'])){
$u_login='';
$u_qiwi='';
}
else{
$warning='';
// ��� �����
$u_name = $_POST['u_name'];
// $u_name = preg_replace("#[^0-9\.]+#",'',$u_name);
if(strlen($u_name)<2){ $warning.='��� �� ������ ���� ������ 2 ��������<br>'; }
else{
$unq=mysql_query("SELECT name FROM users WHERE name='$u_name'");
if(mysql_num_rows($unq)>0){ $warning.='���� ����� ��� ����. ����������, �������� ������.<br>'; }
}
// ��� �����

$u_login=$_POST['u_login'];
$u_login=preg_replace("#[^0-9\.]+#",'',$u_login);
if(strlen($u_login)<9){ $warning.='Qiwi-������ �� ����� 9 ����<br>'; }
else{
$upq=mysql_query("SELECT login FROM users WHERE login='$u_login'");
if(mysql_num_rows($upq)>0){ $warning.='���� ����� Qiwi-�������� ��� ����<br>'; }
}

$u_qiwi=$_POST['u_qiwi'];
$u_qiwi=preg_replace('#[^a-zA-Z\-\_0-9]+#','',$u_qiwi);
if(strlen($u_qiwi)<3){ $warning.='������ �� ����� 3 ��������<br>'; }
if(strlen($u_qiwi)>30){ $warning.='������ �� ����� 30 ��������<br>'; }

if($warning==''){
$u_ref=''; if(!empty($_SESSION['ref_login'])){ $u_ref=$_SESSION['ref_login']; }
$regq=mysql_query("INSERT INTO users (login,qiwi,ref,date,name) VALUES ('$u_login','".md5($u_qiwi)."','$u_ref','$time', '$u_name')");

$regusepq=mysql_query("SELECT uid FROM users");
$r_users=mysql_num_rows($regusepq);
$regtoputnu='';
$regnusq=mysql_query("SELECT login FROM users ORDER BY date DESC LIMIT 80");
while($regnusm=mysql_fetch_row($regnusq)){ $regtoputnu.='<img src="images/nu.png"> '.$regnusm[0].' '; }
mysql_query("UPDATE data SET users='$r_users', new_u='$regtoputnu'");

$reg_show=0;
}}
?>
<br>
<div class="title_miniblock_general">����������� � �������</div>

<div class="">
<br>

<?php if($reg_show==0){ ?>
<div class="reg_s_title">����������� ������� ���������!</div>
<div align="center" class="reg_s_date">
Qiwi-������: <font color="#77AF1B"><?php echo $u_login; ?></font>
<br>������: <font color="#FF962D"><?php echo $u_qiwi; ?></font>
<br>
<br>
<a class="btn_log" class="button" href="/?page=auth#boot_page">����� � �������</a>
</div>
<?php } ?>

<?php if($reg_show==1){ ?>






<form id="registration" method="POST" action="/?page=registration" style="margin:0;padding:0">
<?php
if($warning!=''){
echo '<div class="deposits_error" colspan="3">'.$warning.'</div>';
}
?>
<table align="center" cellpadding="0px" cellspacing="0px" width="520px">
<tbody><tr>
	<div class="reviews_not_logged">������� ���� �����</div>
<br>
<center><div style="padding-left:35px;"><input class="reg_login" type="text" name="u_name" placeholder="��� �����" autocomplete="off" maxlength="20" value=""></div></center>
<br>
<div class="reviews_not_logged">���������� ���� ��������� QIWI-������ ������ �� ���� ����� ������������� �������</div>
<br>
<center><div style="padding-left:35px;"><input class="reg_login" type="text" name="u_login" placeholder="QIWI-������" autocomplete="off" maxlength="20" value=""></div></center>
<br>
<br>
<div class="reviews_not_logged">���������� � ��������� ������ ��� ����� � ���� ������ �������</div>
<br>
<center><div><input class="reg_pass" type="text" name="u_qiwi" placeholder="������" maxlength="30" value=""></div></center>
</tr>

<tr>
<td colspan="3" class="reg_ref">
��� ���������: <font color="#E17E06"><?php if(!empty($_SESSION['ref_login'])){ echo $_SESSION['ref_login']; }?></font>
</td>

</tr>

<tr>
<td colspan="3">
<div class="reg_danger">
<div align="center">
<font color="black">������������� �� ������������ � </font><font color="blue"> <a href="/?page=advert#boot_page" target="_blank">
���������</a></font><font color="black"> �������</font>
</div>
</div>

<div align="center">
<a class="btn_log" href="javascript:with(document.getElementById('registration')){ submit(); }">�����������</a>
</div>

</td></tr></tbody></table>
</form>

<?php } ?>

</div>
</div>
</div>