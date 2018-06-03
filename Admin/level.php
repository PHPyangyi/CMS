<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 19:00
     */
    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;

    new LevelController($smarty);