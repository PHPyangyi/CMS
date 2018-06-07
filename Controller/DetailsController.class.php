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
            $this->NewThreeComment();

        }







        //end....

        private function NewThreeComment()
        {
            parent::__construct($this->smarty, new CommentModel());

            $this->model->cid=$_GET['id'];

            $object = $this->model->getNewThreeComment() ;

            if ($object) {
                foreach ($object as $value) {
                    switch ($value->manner) {
                        case -1 :
                            $value->manner = '反对';
                            break;
                        case 0 :
                            $value->manner = '中立';
                            break;
                        case 1 :
                            $value->manner = '支持';
                            break;
                    }
                    if (empty($value->face)) {
                        $value->face = '00.gif';
                    }
                }
            }


            $this->smarty->assign('NewThreeComment',$object);
        }

        private function getDetails()
        {
            if (isset($_GET['id'])) {
                parent::__construct($this->smarty, new ContentModel());

                $this->model->id = $_GET['id'];

                if (!$this->model->setContentCount()) Tool::alertBack('警告：不存在此文档！');

                $content = $this->model->getOneContent();

                $tarArr = explode(',',$content->tag);

                if (is_array($tarArr)) {
                    foreach ($tarArr as $value) {
                        $content->tag = str_replace($value,'<a href="search.php?type=3&inputkeyword='.$value.'">'.$value.'</a>',$content->tag);
                    }
                }


                $this->smarty->assign('id',$content->id);
                $this->smarty->assign('titlec',$content->title);
                $this->smarty->assign('count',$content->count);
                $this->smarty->assign('date',$content->date);
                $this->smarty->assign('source',$content->source);
                $this->smarty->assign('author',$content->author);
                $this->smarty->assign('info',$content->info);
                $this->smarty->assign('content',Tool::unHtml($content->content));
                $this->smarty->assign('tag',$content->tag);
                $this->getNav($content->nav);

                $comment = new CommentModel();
                $comment->cid = $this->model->id;
                $this->smarty->assign('yang',$comment->getCommentTotal());




                $this->model->nav = $content->nav;

                $object = $this->model->getMonthNavRec();
                $this->setObject($object);
                $this->smarty->assign('MonthNavRec',$object);

                $object = $this->model->getMonthNavHot();
                $this->setObject($object);
                $this->smarty->assign('MonthNavHot',$object);

                $object = $this->model->getMonthNavPic();
                $this->setObject($object);
                $this->smarty->assign('MonthNavPic',$object);




            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }


        private function setObject(&$object)
        {
            if ($object) {
                Tool::NewSubStr($object,'title',16,'utf-8');
                Tool::objDate($object,'date');
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