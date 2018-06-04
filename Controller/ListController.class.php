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
        //显示前台列表

        public function Action ()
        {
            $this->getNav();
            $this->getListContent();
        }
        private function getListContent ()
        {
            if (isset($_GET['id'])) {
                parent::__construct($this->smarty, new ContentModel());

                $nav = new NavModel();

                $nav->id = $_GET['id'];

                $navid =     $nav->getNavChildId();

                if ($navid) {
                    $this->model->nav = Tool::objArrOfStr($navid,'id');
                } else {
                    $this->model->nav = $nav->id;
                }

                parent::page($this->model->getListContentTotal(),ARTICLE_SIZE);

                $object = $this->model->getListContent();

                $object = Tool::subStr($object,'info',120,'utf-8');
                $object = Tool::subStr($object,'title',35,'utf-8');

                $this->smarty->assign('AllListContent',$object);
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }

        //显示导航
        private function getNav() {
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