<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 11:36
     */

    require substr(dirname(__FILE__),0,-5).'/init.inc.php';

    $vc = new ValidateCode();
    $vc->doimg();
    $_SESSION['code'] = $vc->getCode();