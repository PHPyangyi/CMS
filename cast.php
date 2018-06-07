<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 13:28
     */
    require dirname(__FILE__).'/init.inc.php';
    global $smarty;
    $_cast = new CastController($smarty);
    $_cast->Action();
    $smarty->display('cast.html');