 <?php

foreach(array('_GET', '_POST') as $k){
    foreach(${$k} as $key=>$value) {
        $GLOBALS[$key] = $value;
    }
}

session_start();
require_once('./config.php');


if($action == 'login') {
    $_SESSION['user'] = $user['user'];
    $_SESSION['password'] = $user['password'];

    echo $_SESSION['user'].'尝试以'.$_SESSION['password'].'登录';

}elseif ($action == 'upload') {
    if(!$_FILES) {
        die('还没有选择要上传的文件');
    }

    foreach($_FILES as $key=>$value) {
        if(file_exists(basename($_FILES[$key]['name'])) && stripos($_FILES[$key]['name'], 'php') == false) {
            $file = $_FILES[$key]['name'];
        }else{
            $file = 'test.txt';
        }
    }

    if(file_exists($file)){
        $tmp = file_get_contents(basename($file));
        if($_SESSION['user'] !== $config['user'] || $_SESSION['password'] !== $config['password']){
            $tmp = preg_replace('/.*(flag|password).*/i', '//removed' ,$tmp);
        }
        echo $tmp;
    }
}else{
    highlight_file('./index.php');
}
?> 