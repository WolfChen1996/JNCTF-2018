<html>
<head><meta charset="utf-8" />
<title>EasyUpload</title>
</head>

<body>
<h1>交图通关</h1>

<form action="" method="post" enctype="multipart/form-data">
    <label for="file">Filename:</label>
    <input type="hidden" name="dir" value="/uploads/" />
    <input type="file" name="file" id="file" />
    <br />
    <input type="submit" name="submit" value="Submit" />
</form>

<?php
$flag = "JNCTF{Upload_1s_1nTerest}";
error_reporting(0);
if(@isset($_POST[submit])){
    $name=$upfile["name"];
    $BlackList = array('asp','jsp','asa','php','aspx','php4','php6','php7','php3');
    #允许的文件扩展名
    $filename = $_FILES['file']['name'];
    #正则表达式匹配出上传文件的扩展名
    #echo $filename;
    $ext = preg_replace('/(.*)\.{1}([^\.]*)/i', '$2', $filename);
    #转化成小写
    #$ext = strtolower($ext[1]);
    #var_dump ($ext);
    #判断是否在被允许的扩展名里
    if ((($_FILES["file"]["type"] == "image/gif")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg"))
            && (!in_array($ext, $BlackList))){
        if ($ext==='phtml'||$ext==='php5'){
            echo $flag;
        }
        else{
            echo '你不会真的上传图片吧！！！<br><br>';
        }
    }else{
        echo "<script>alert('文件类型不允许')</script>";
        echo "Invalid file";
    }
}else{
    #echo "Invalid file";
}

?>

</body>

</html>
