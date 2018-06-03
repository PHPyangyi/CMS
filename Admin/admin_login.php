<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 11:33
     */

    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;
    $login = new LoginController($smarty);
    $login->Action();
    if (isset($_SESSION['admin'])) Tool::alertLocation(null, 'admin.php');
    $smarty->display('admin_login.html');