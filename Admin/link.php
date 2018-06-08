<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:47
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    Validate::checkSession();
    Validate::checkPremission('12','警告，权限不足，您不能管理友情链接！');
    $link = new LinkController($smarty);   //入口
    $link->Action();
    $smarty->display('link.html');
