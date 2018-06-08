<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:15
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    Validate::checkSession();
    Validate::checkPremission('7','警告，权限不足，您不能发布文档！');
    global $smarty;
    $content = new ContentController($smarty);   //入口
    $content->Action();
    $smarty->display('content.html');