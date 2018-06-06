<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 18:20
     */

    class IndexController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty);
        }
        public function Action ()
        {
            $this->lastUser();
            $this->showList();
            $this->getRotatain();
        }

        //显示推荐，本月热点，本月评论，头条
        public function showList() {
            parent::__construct($this->smarty, new ContentModel());

            $object = $this->model->getNewRecList();
            Tool::NewSubStr($object,'title',15,'utf-8');
            Tool::objDate($object, 'date');
            $this->smarty->assign('NewRecList', $object);

            $object = $this->model->getMonthHotList();
            Tool::NewSubStr($object,'title',15,'utf-8');
            Tool::objDate($object, 'date');
            $this->smarty->assign('MonthHotList', $object);

            $object = $this->model->getMonthCommentList();
            Tool::NewSubStr($object,'title',15,'utf-8');
            Tool::objDate($object, 'date');
            $this->smarty->assign('MonthCommentList', $object);

            $object = $this->model->getPicList();
            Tool::NewSubStr($object,'title',20,'utf-8');
            Tool::objDate($object, 'date');
            $this->smarty->assign('PicList', $object);




            $_object = $this->model->getNewList();
            Tool::NewSubStr($_object,'title',25,'utf-8');
            Tool::objDate($_object, 'date');
            $this->smarty->assign('NewList', $_object);

            $_object = $this->model->getNewTop();
            $this->smarty->assign('TopTitle', Tool::subStr($_object->title,null,18,'utf-8'));
            $this->smarty->assign('TopInfo', Tool::subStr($_object->info,null,80,'utf-8'));
            $this->smarty->assign('TopId', $_object->id);

            $_object = $this->model->getNewTopList();
            Tool::NewSubStr($_object,'title',15,'utf-8');
            Tool::objDate($_object, 'date');
            if ($_object) {
                $_i = 1;
                foreach ($_object as $_value) {
                    if ($_i % 2 == 0) {
                        $_value->line = '';
                    } else {
                        $_value->line = ' | ';
                    }
                    $_i++;
                }
            }
            $this->smarty->assign('NewTopList', $_object);



            $nav = new NavModel();
            $object = $nav->getFourNav();
            if ($object) {
                $i = 1;
                foreach ($object as $value) {
                    if ($i % 2 == 0) {
                        $value->class = 'list right bottom';
                    } else {
                        $value->class = 'list bottom';
                    }
                    $i++;
                    $this->model->nav = $value->id;
                    $navList = $this->model->getNewNavList();
                    Tool::NewSubStr($navList,'title',20,'utf-8');
                    Tool::objDate($navList, 'date');
                    $value->list = $navList;
                }
            }
            $this->smarty->assign('FourNav',$object);

        }


        private function lastUser ()
        {
            $user = new UserModel();
            $this->smarty->assign('AllLaterUser',$user->getLaterUser());
        }


        //取得轮播图
        private function getRotatain ()
        {
            parent::__construct($this->smarty, new RotatainModel());

            $yang=$this->model->getNewRotatain();
            $this->smarty->assign('yang',$yang);
        }


    }