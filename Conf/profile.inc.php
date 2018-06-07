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

    define('PAGE_SIZE',10);

    define('PREV_URL',@$_SERVER["HTTP_REFERER"]);	//上一页地址
    define('NAV_SIZE',10);


    define('UPDIR','/uploads/');											//上传主目录
    define('ARTICLE_SIZE',8);												//文档每页多少条

    define('RO_NUM',4);                                                     //轮播图个数
    //广告服务
    define('ADVER_TEXT_NUM',5);											//最多5条文字广告循环
    define('ADVER_PIC_NUM',3);												//最多3条图片广告循环