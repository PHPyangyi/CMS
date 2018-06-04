<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:08
     */

    class ListController extends Controller
    {
        public function __construct(&$smarty) {
            parent::__construct($smarty);
        }
        public function getNav() {
            if (isset($_GET['id'])) {
                $nav=new NavModel();
                $nav->id=$_GET['id'];
                if ($nav->getOneNav()) {
                    //主导航
                    $nav1='';
                    if ($nav->getOneNav()->nnav_name) $nav1 = '<a href="list.php?id='.$nav->getOneNav()->iid.'">'.$nav->getOneNav()->nnav_name.'</a> &gt; ';

                    $nav2 = '<a href="list.php?id='.$nav->getOneNav()->id.'">'.$nav->getOneNav()->nav_name.'</a>';

                    $this->smarty->assign('nav',$nav1.$nav2);

                    //子导航集
                    $this->smarty->assign('childnav',$nav->getAllChildFrontNav());


                } else {
                    Tool::alertBack('此导航不存在');
                }
            } else {
                Tool::alertBack('非法操作');
            }
        }

    }