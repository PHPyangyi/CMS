<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/4
     * Time: 17:34
     */
    require dirname(__FILE__).'/init.inc.php';
    global $smarty;

    global $smarty;
    $nav=new NavController($smarty);
    $nav->showfront();   //display nav

    $details = new DetailsController($smarty);
    $details->Action();


    $smarty->display('details.html');