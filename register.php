<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 16:42
     */
    require dirname(__FILE__) . '/init.inc.php';

    global $smarty;
    $nav=new NavController($smarty);
    $nav->showfront();   //display nav

    $link = new FriendLinkController($smarty);
    $link->index();

    $tag = new TagController($smarty);
    $tag->getFiveTag();

    $smarty->assign('webname',WEBNAME);

    $register = new RegisterController($smarty);
    $register->Action();

    $smarty->display('register.html');