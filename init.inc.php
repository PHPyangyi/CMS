<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 17:28
     */
    session_start();
    header('Content-Type:text/html;charset=utf-8');
    define('ROOT_PATH',dirname(__FILE__));
    require ROOT_PATH.'/Smarty/Smarty.class.php';
    $smarty=new Smarty();
    require ROOT_PATH.'/Conf/profile.inc.php';
    require 'cache.inc.php';

    //autoload...
    function __autoload($className) {
         if (substr($className,-10)=='Controller') {
            require  ROOT_PATH.'/Controller/'.$className.'.class.php';
         } elseif (substr($className,-5)=='Model') {
             require ROOT_PATH.'/Model/'.$className.'.class.php';
         } else {
             require ROOT_PATH.'/Public/'.$className.'.class.php';
         }


    }

    $smarty->caching = IS_CACHE;