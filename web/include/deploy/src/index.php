<?php
include('file.php');
if( isset( $file ) )
	include( $file );
else {
	header( 'Location:?page=file.php' );
	exit;
}
?>
