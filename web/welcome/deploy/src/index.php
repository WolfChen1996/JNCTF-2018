<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Welcome</title>
<p>Welcome to the world of Cyber Security!</p>
<p>What you want is in the mouth.</p>
<script language="javascript">
window.onload=function()
{
	var mycanvas=document.getElementById("mycanvas");
	var context=mycanvas.getContext('2d');
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.arc(200,150,100,0,Math.PI*2,true);
	context.stroke();
	
	context.closePath();
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.fillStyle='rgba(0,0,250,0.25)'
	context.arc(160,110,15,0,Math.PI*2,true);
	context.fill();
	context.stroke();
	context.closePath();
	
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.fillStyle='rgba(0,0,250,0.25)'
	context.arc(240,110,15,0,Math.PI*2,true);
	context.fill();
	context.stroke();
	context.closePath();
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.fillStyle='black';
	context.arc(160,110,5,0,Math.PI*2,true);
	context.fill();
	context.stroke();
	context.closePath();
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.fillStyle='black';
	context.arc(240,110,5,0,Math.PI*2,true);
	context.fill();
	context.stroke();
	context.closePath();
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.fillStyle='black';
	context.arc(200,155,10,0,Math.PI*2,true);
	context.fill();
	context.stroke();
	context.closePath();
	
	context.beginPath();
	context.lineWidth=5;
	context.strokeStyle='black';
	context.moveTo(150,185);
	context.lineTo(245,195);
	context.stroke();
	context.closePath();
	// JNCTF{cOde_1n_4SmilingMouth}
	
	context.beginPath();
	context.strokeStyle='rgb(0,0,0)';
	context.arc(200,155,58,Math.PI*0.25,Math.PI*0.83,false);
	context.stroke();
	context.closePath();
}	
</script>
</head>
<body width="100%">
<canvas id="mycanvas" width="500px" height="400px" style="border:1px solid #c3c3c3;">
your browser does not support the canvas element
</canvas>
</body>	
</html>