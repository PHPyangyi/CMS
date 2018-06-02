<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 18:06
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;


    $smarty->display('admin.html');
