<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:01
     */
    require dirname(__FILE__).'/init.inc.php';
    global $smarty;

    global $smarty;
    $nav=new NavController($smarty);
    $nav->showfront();   //display nav


    $list = new ListController($smarty);
    $list->getNav();

    $smarty->display('list.html');