<?php 
error_reporting(0);
session_start();
require('flag.php');
if(!isset($_SESSION['number'])){
  $_SESSION['number'] = 0;
  $_SESSION['now'] = time();
  $_SESSION['JNsec'] = 'xyz';
}
if($_SESSION['now']+30<time()){
  session_destroy();
}
$whatismd5 = $_REQUEST['whatismd5'];
$str_rand = range('a', 'z');
$str_rands = $str_rand[mt_rand(0,25)].$str_rand[mt_rand(0,25)].$str_rand[mt_rand(0,25)];

if($_SESSION['JNsec']==($whatismd5[0].$whatismd5[1].$whatismd5[2]) && substr(md5($whatismd5),5,4)==0){
  $_SESSION['number']++;
  $_SESSION['JNsec'] = $str_rands;
  echo $str_rands;
}

if($_SESSION['number']>=10){
  echo $flag;
}

show_source(__FILE__);
?>