<?php
    namespace CMS\Admin;
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 18:06
     */
    //跳转
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    header('Location:admin_login.php');
    //isset($_SESSION['admin']) ? Tool::alertLocation(null, 'admin.php') : Tool::alertLocation(null, 'admin_login.php');