<?php
$flag='JNCTF{plz_initialize_this_flag}';
$type = $_GET['fname'];
if(preg_match('/good/i',$type)){
	echo '好吧，flag给你 ';
	echo $flag;
}
else if(preg_match('/here/i',$type)){
	echo '这不行:D';
}
?>
