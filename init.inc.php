<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 17:28
     */
    header('Content-Type:text/html;charset=utf-8');
    define('ROOT_PATH',dirname(__FILE__));
    require ROOT_PATH.'/Smarty/Smarty.class.php';
    $smarty=new Smarty();
    require ROOT_PATH.'/Conf/profile.inc.php';
    require  ROOT_PATH.'/Public/DB.class.php';
    require 'cache.inc.php';
    $smarty->caching = IS_CACHE;