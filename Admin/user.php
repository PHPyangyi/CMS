<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 21:12
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    Validate::checksession();
    Validate::checkPremission('13','警告，权限不足，您不能管理会员！');
    $user=new UserController($smarty);
    $user->Action();

    $smarty->display('user.html');
