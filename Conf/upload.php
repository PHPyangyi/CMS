<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/4
     * Time: 9:39
     */
    require  substr(dirname(__FILE__),0,-5).'/init.inc.php';

    if (isset($_POST['send'])) {
        $fileupload = new FileUpload('pic',$_POST['MAX_FILE_SIZE']);
        $path = $fileupload->getPath();
        $img = new Image($path);
        $img->thumb(150,100);		//1-100
        $img->out();


        Tool::alertOpenerClose('缩略图上传成功！', $path );
    } else {
        Tool::alertBack('警告：文件过大或者其他未知错误导致浏览器崩溃！');
    }