<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 12:42
     */

    require substr(dirname(__FILE__),0,-6).'/init.inc.php';

    Validate::checkSession();
    Validate::checkPremission('11','警告，权限不足，您不能管理投票！');
    global $smarty;

    $nav=new VoteController($smarty);   //入口

    $nav->Action();

    $smarty->display('vote.html');