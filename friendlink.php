<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:34
     */
    require dirname(__FILE__).'/init.inc.php';
    global $smarty;

    $nav=new NavController($smarty);
    $nav->showfront();   //display nav


    $link = new FriendLinkController($smarty);
    $link->index();

    $tag = new TagController($smarty);
    $tag->getFiveTag();

    $smarty->assign('webname',WEBNAME);

    $friendLink = new FriendLinkController($smarty);
    $friendLink->Action();
    $smarty->display('friendlink.html');