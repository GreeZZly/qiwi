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
				
				<div class='button_register'><a href="/?page=registration#boot_page" class='btn btn_join'>��������������</a></div>
					
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
<div class="main_block">
		<div class="all_block_global" style=" min-height: 900px;">
		
		
		
		
	<br>	
		
		

			<div class="four_block">
				<div class="title_miniblock_general">����������</div>
				<div class="clear"></div>
				<div class="minblock_users clear_fix">
					<span class="count_stats"><?php echo $d_users; ?></span>
					<span class="more_stats">����������������</span>
				</div>
				<div class="minblock_users clear_fix">
					<span class="count_stats"><?php echo number_format($free,2,'.',','); ?></span>
					<span class="more_stats">������ ������� (���.)</span>
				</div>
				<div class="minblock_users clear_fix">
					<span class="count_stats"><?php echo number_format($d_plus,2,'.',','); ?></span>
					<span class="more_stats">��������� (���.)</span>
				</div>
				<div class="minblock_users clear_fix">
					<span class="count_stats"><?php echo number_format($d_with,2,'.',','); ?></span>
					<span class="more_stats">������ (���.)</span>
				</div>
				<div class="clear"></div>
			</div>
			<div class="two_block">
				<div class="title_miniblock_general">������ ������ ��?</div>
				<div class="minblock_profit_all">
					<div class="minblock_profit">
						<div class="icon_profit">
							<span class="icon_safe"></span>
						</div>
						<div class="minblock_title">������ � ��������</div>
						<div class="minblock_desc">��������� �� 50 �� 5.000 ������ �� 24 ����. ������ �� ����� �� ��������� ������� ���� ����� +30%.</div>
					</div>
					<div class="minblock_profit">
						<div class="icon_profit">
							<span class="icon_clock"></span>
						</div>
						<div class="minblock_title">�������������� ���������</div>
						<div class="minblock_desc">�������������� ����������� ��������� �� �����. ���� � ��� ���� ������, �� ������ �������� ��� ���������.</div>
					</div>
					<div class="minblock_profit">
						<div class="icon_profit">
							<span class="icon_calc"></span>
						</div>
						<div class="minblock_title">����������� ���������</div>
						<div class="minblock_desc">����������� �������������� 10% �� ������� ������ ������������ ���� ���������.</div>
					</div>
					<div class="minblock_profit">
						<div class="icon_profit">
							<span class="icon_stat"></span>
						</div>
						<div class="minblock_title">���������� �������</div>
						<div class="minblock_desc">� ������ ������� �������� ����������. ����� �������� ����� ���������� ������ ����������. ��� ���������������� �������������, ���������� ���������.</div>
					</div>
				</div>
			</div>
			<div class="block_browser">
                              <center>
<!--
                              <table border="1">
                            <tr><td>login </td><td>summa</td> </tr> 
                            <?php 
                            mysql_free_result();
                             $resultm = mysql_query("SELECT DISTINCT `osum2`,`ologin` FROM `operations`");
                             while($myrowm = mysql_fetch_array($resultm)){
                             $summ[$myrowm[1]] = $myrowm[0];
                              
                              }
                               arsort($summ);
                               $i=0;
                              
                                foreach($summ as $name => $sum)
                                {
                                  if($i>10)
                                  break;
                                   else
                                   echo "<tr><td>".$name."</td><td>".$sum."</td></tr>";
                                    $i++;
                                     }
                                   
                               
                            
                            

?>
                                  </table>
                                 </center>
-->
				<div class="browser"></div>
			</div>
			<div class="five_block">
				<div class="title_miniblock_general">��� ������?</div>
				<div class="favourite_block_all">
					<div class="favourite_block">
						<div class="icon_flat">
							<span class="icon_user"></span>
						</div>
						<div class="title_favourite_block">����������� �������</div>
						<div class="about_favourite_block">����������� ������� - ��� ������� ����� ������ ������ ����������� ������������� �� ��� ��� ���� ������. ��� �� ���������, ��� ������ �������������, ��� ������ �����.</div>
					</div>
					<div class="favourite_block">
						<div class="icon_flat">
							<span class="icon_dashboard"></span>
						</div>
						<div class="title_favourite_block">������� ������ �������</div>
						<div class="about_favourite_block">�� ����������� ��� �������� ���, ����� ��� ���� ������ ��� ������������. ��� ���� ������� ��������� � ����� �����������.</div>
					</div>
					<div class="favourite_block">
						<div class="icon_flat">
							<span class="icon_good"></span>
						</div>
						<div class="title_favourite_block">������������������ �����</div>
						<div class="about_favourite_block">�� ������� �� ����� ������! �������-�� �� ����� ���������� ��� ���� ��������! ����� 8-������� ������ �������� ����������� ������������ �������� ���������� �������������, � ������� ���� ���������� � �������.</div>
					</div>
				</div>
				<div class="clear"></div>
			</div>
			<div class="three_block clear_fix">
				<div class="btn_all">
					<div class="btn btn_rules"><a href="/?page=advert#boot_page">������� � ����������</a></div>
				</div>
			</div>		
</div>
