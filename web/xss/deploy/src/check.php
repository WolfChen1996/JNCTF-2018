<script>
var array='flag is not here';//定义状态标志
var alertFun=alert;
alert=function(str)
{
array='OK very good here is your flag';
alertFun(str);
};
</script>
<script>
var arr=onerror;
onerror=function(str)
{
	array='OK very good here is your flag';
	arr(str);
};
</script>
<?php
// Is there any input?
if( array_key_exists( "name", $_GET ) && $_GET[ 'name' ] != NULL ) {
	// Get input
	$name = $_GET[ 'name' ] ;
	$name = preg_replace( '/script/i', '', $name );
}
?>
<?php echo "<pre>",$name,"</pre>"; ?>
<script>
if (typeof ActiveXObject != "undefined") {
        var version = [
            'Msxml2.XMLHTTP.6.0',
            'Msxml2.XMLHTTP.5.0',
            'Msxml2.XMLHTTP.3.0',
            'Msxml2.XMLHTTP',
            'Microsoft.XMLHTTP'
        ];
        for (var i = 0; i <= version.length; i++) {
            try {
                var obj = new ActiveXObject(version[i]);
                if (typeof obj != "undefined") {
                    break;
                }
            } catch(ex) {
 
            }
        }
    } else {
        var obj = new XMLHttpRequest();
    }
    obj.onreadystatechange = function(){
        if (obj.readyState == 4 && obj.status == 200) {
            alert(obj.responseText);
        }
    }
 
    var name = array;
    name = encodeURIComponent(name);
    obj.open("get", "./flag.php?fname=" + name + "&addr=beijing", true);
    obj.send();
 </script>