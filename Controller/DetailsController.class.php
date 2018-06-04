<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/4
     * Time: 17:39
     */

    class DetailsController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty);
        }

        public function Action ()
        {
            $this->getDetails();
        }

        private function getDetails()
        {
            if (isset($_GET['id'])) {
                parent::__construct($this->smarty, new ContentModel());

                $this->model->id = $_GET['id'];

                $content = $this->model->getOneContent();

                if (!$content) Tool::alertBack('警告：不存在此文档！');

                $this->smarty->assign('titlec',$content->title);
                $this->smarty->assign('count',$content->count);
                $this->smarty->assign('date',$content->date);
                $this->smarty->assign('source',$content->source);
                $this->smarty->assign('author',$content->author);
                $this->smarty->assign('info',$content->info);
                $this->smarty->assign('content',Tool::unHtml($content->content));
                $this->getNav($content->nav);
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }

        private function getNav($_id)
        {
            $_nav = new NavModel();
            $_nav->id = $_id;
            if ($_nav->getOneNav()) {
                //主导航
                if ($_nav->getOneNav()->nnav_name) $_nav1 = '<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt; ';
                $_nav2 = '<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
                $this->smarty->assign('nav',$_nav1.$_nav2);
                //子导航集
                $this->smarty->assign('childnav',$_nav->getAllChildFrontNav());
            } else {
                Tool::alertBack('警告：此导航不存在！');
            }
        }

    }