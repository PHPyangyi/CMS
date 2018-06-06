<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 8:46
     */

    require dirname(__FILE__).'/init.inc.php';

    global $smarty;


    $nav=new NavController($smarty);
    $nav->showfront();   //display nav

    $feedback = new FeedBackController($smarty);
    $feedback->Action();
    $smarty->display('feedback.html');
