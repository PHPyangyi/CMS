<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 17:28
     */

    require dirname(__FILE__) . '/init.inc.php';
    error_reporting(E_ALL& ~ E_WARNING   );

    global $smarty;
    $nav=new NavController($smarty);
    $nav->showfront();   //display nav

    $index=new IndexController($smarty);
    $index->Action();



    $link = new FriendLinkController($smarty);
    $link->index();

    $tag = new TagController($smarty);
    $tag->getFiveTag();

    $smarty->assign('webname',WEBNAME);


    $smarty->assign('data',@$_COOKIE['user']);
    $smarty->assign('face',@$_COOKIE['face']);

    $smarty->assign('name','标题');
    $smarty->display('index.html');

