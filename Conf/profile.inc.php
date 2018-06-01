<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 18:07
     */
    //smarty目录配置信息
    $smarty->template_dir = ROOT_PATH.'/View/';
    $smarty->compile_dir = ROOT_PATH.'/Compile/';
    $smarty->cache_dir = ROOT_PATH.'/Cache/';
    $smarty->config_dir = ROOT_PATH.'/Conf/';

    //mysqli
    define('DB_HOTS','localhost');
    define('DB_USER','root');
    define('DB_PWD','root');
    define('DB_NAME','cms');