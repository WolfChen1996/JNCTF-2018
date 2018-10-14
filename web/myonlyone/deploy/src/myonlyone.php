<?php
echo '<title>'.'Are you my only one???'.'</title>';
error_reporting(~E_NOTICE);
include'config.php';
$a = $_SERVER['HTTP_WHOAREYOU'];
if ($_SERVER['HTTP_WHOAREYOU']){
	if ($_SERVER['HTTP_WHOAREYOU']==='JNsec'){
		echo $flag;
	}
	else{
		echo 'you are not my only'.' '.$a;
		echo '<br>[JNsec] is my only one.';
	}
}
else{
	header('Whoareyou: guest');
	echo 'you are not my only one';
}
?>