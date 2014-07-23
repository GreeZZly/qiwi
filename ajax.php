<?php
include('conf.php');
$site=$_SERVER['HTTP_HOST'];

@mysql_query('set character_set_client="cp1251"');
@mysql_query('set character_set_results="cp1251"');
@mysql_query('set collation_connection="cp1251_general_ci"');


ini_set('session.use_cookies', 'On');
ini_set('session.use_trans_sid', 'Off');
session_set_cookie_params(0, '/');

session_start();

$time=time()+$time_move*3600;
$start_time=strtotime($start_data);
$work_time=floor(($time-$start_time)/(24*3600));


if($start_time-$time<=0){
if($d_isum!=0){
$d_max=$d_max+$d_isum*floor(($time-$start_time)/($d_itime*3600));
if($d_max>$d_istop){ $d_max=$d_istop; }
}
}
// ======================================== ИЗМЕНЕНИЕ НАСТРОЕК =====================================================================
if (isset($_POST['settings_newpass']) && isset($_POST['settings_oldpass'])){
	change_data();
}

function change_data(){
	$oldpass = $_POST['settings_oldpass'];
	$newpass = preg_replace("#[^a-z\_\-0-9]+#i",'',$_POST['settings_newpass']);	
	// print_r($newpass);
	$name = $_SESSION['name'];
	$md5old = md5($oldpass);
	$md5new = md5($newpass);
	// echo $newpass;
	$query = mysql_query("SELECT qiwi FROM users WHERE name = '$name'");
	$md5old_bd=mysql_fetch_row($query);
	if ($md5old_bd[0] == $md5old) {
		$newpass_bd = mysql_query("UPDATE users SET qiwi ='$md5new' WHERE name = '$name'");
		$_SESSION['qiwi'] = $md5new;
		// echo "Пароль изменен!";
		echo "1";
	}
	else {
		// echo "Старый пароль не совпадает";
		echo "0";
	}
	//  print_r($_SESSION);
	// echo $md5old_bd[0]."\n";
	// echo $md5old."\n";
	// echo $name;


}
if (isset($_POST['settings_newqiwi'])){
	change_qiwi();
}

function change_qiwi(){
	$newqiwi = preg_replace("#[^a-z\_\-0-9]+#i",'',$_POST['settings_newqiwi']);
	$name = $_SESSION['name'];
	$query = mysql_query("SELECT login FROM users WHERE name = '$name'");
	$oldqiwi = mysql_fetch_row($query);
	if($oldqiwi[0] != $newqiwi){
		$newqiwi_bd = mysql_query("UPDATE users SET login ='$newqiwi' WHERE name = '$name'");
		$_SESSION['login'] = $newqiwi;
		echo "1";
	}
	else {
		echo "0";
	}
}

?>