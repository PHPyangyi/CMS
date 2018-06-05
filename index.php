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

    $index=new IndexController($smarty);
    $index->Action();






    $smarty->assign('data',@$_COOKIE['user']);
    $smarty->assign('face',@$_COOKIE['face']);

    $smarty->assign('name','标题');
    $smarty->display('index.html');

