<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 19:00
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';

    Validate::checkSession();

    Validate::checkPremission('4','警告，权限不足，您不能管理管理员！');


    global $smarty;

    new LevelController($smarty);