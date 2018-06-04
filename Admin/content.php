<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:15
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    Validate::checkSession();

    global $smarty;
    $content = new ContentController($smarty);   //入口
    $content->Action();
    $smarty->display('content.html');