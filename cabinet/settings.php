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
				<li><span>����� ����������, <?echo $u_name;?></span></li>
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


<div class="left_menu_users" valign="top" style="vertical-align: top; margin: 0px 60px 40px 0px;width: 240px;">
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






</tbody></table>	
	</div>
	</div>
</body></html>