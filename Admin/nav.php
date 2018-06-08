<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 17:19
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    Validate::checkSession();
    Validate::checkPremission('6','警告，权限不足，您不能管理导航！');
    global $smarty;
    $nav=new NavController($smarty);   //入口
    $nav->Action();
    $smarty->display('nav.html');