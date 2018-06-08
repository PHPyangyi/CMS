<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 20:56
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    Validate::checkSession();
    Validate::checkPremission('9','警告，权限不足，您不能管理轮播器！');
    $comment=new RotatainController($smarty);
    $comment->Action();

    $smarty->display('rotatain.html');