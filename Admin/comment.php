<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 19:51
     */

    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    global $smarty;

    $comment=new CommentController($smarty);
    $comment->Action();

    $smarty->display('comment.html');
