<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/8
     * Time: 9:32
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    Validate::checkSession();
    Validate::checkPremission('5','警告，权限不足，您不能权限设定！');

    $premission=new PremissionController($smarty);
    $premission->Action();

    $smarty->display('premission.html');
