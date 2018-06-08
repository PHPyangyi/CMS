<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 10:52
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';

    Validate::checkSession();
    Validate::checkPremission('10','警告，权限不足，您不能管理广告！');

    global $smarty;

    $nav=new AdverController($smarty);   //入口

    $nav->Action();

    $smarty->display('adver.html');