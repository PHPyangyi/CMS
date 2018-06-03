<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 17:28
     */

    require dirname(__FILE__) . '/init.inc.php';

    global $smarty;
    $nav=new NavController($smarty);
    $nav->showfront();   //display nav

    $smarty->assign('name','标题');
    $smarty->display('index.html');

