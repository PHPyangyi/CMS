<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 19:10
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    Validate::checkSession();
    $smarty->assign('admin_user',$_SESSION['admin']['admin_user']);
    $smarty->assign('level_name',$_SESSION['admin']['level_name']);
    $smarty->display('top.html');
