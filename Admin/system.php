<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 20:07
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    Validate::checkSession();
    Validate::checkPremission('13','警告，权限不足，您不能管理系统配置！');

    global $smarty;
    $system = new SystemController($smarty);   //入口
    $system->Action();
    $smarty->display('system.html');