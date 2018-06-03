<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 19:46
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    Validate::checkSession();
    global $smarty;
    $manage=new  ManageController($smarty);
    $manage->Action();
    $smarty->display('manage.html');


