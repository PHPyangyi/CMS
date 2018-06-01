<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 19:46
     */
    use CMS\Model\ManageModel;

    require substr(dirname(__FILE__),0,-6).'/init.inc.php';
    require ROOT_PATH . '/Model/ManageModel.class.php';

    $manage=new ManageModel();
    $smarty->assign('AllManage',$manage->getManage());
    $smarty->display('manage.html');
