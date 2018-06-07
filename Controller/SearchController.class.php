<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 17:33
     */

    class SearchController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new ContentModel());
        }

        public function Action()
        {
            $this->searchTitle();
            $this->searchKeyword();
            $this->searchTag();
        }

        private function searchTitle()
        {
            if ($_GET['type'] == 1) {
                if (empty($_GET['inputkeyword'])) Tool::alertBack('警告：搜索关键字不得为空！');
                $this->model->inputkeyword = $_GET['inputkeyword'];
                parent::page($this->model->searchTitleContentTotal(),ARTICLE_SIZE);
                $_object = $this->model->searchTitleContent();
                Tool::subStr($_object,'info',120,'utf-8');
                Tool::subStr($_object,'title',35,'utf-8');
                if ($_object) {
                    foreach ($_object as $_value) {
                        if (empty($_value->thumbnail)) $_value->thumbnail = 'images/none.jpg';
                        $_value->title = str_replace($this->model->inputkeyword,'<span class="red">'.$this->model->inputkeyword.'</span>',$_value->title);
                    }
                }
                $this->smarty->assign('SearchContent',$_object);
            }
        }

        //按照关键字搜索
        private function searchKeyword()
        {
            if ($_GET['type'] == 2) {
                if (empty($_GET['inputkeyword'])) Tool::alertBack('警告：搜索关键字不得为空！');
                $this->model->inputkeyword = $_GET['inputkeyword'];
                parent::page($this->model->searchKeywordContentTotal(),ARTICLE_SIZE);
                $_object = $this->model->searchKeywordContent();
                Tool::subStr($_object,'info',120,'utf-8');
                Tool::subStr($_object,'title',35,'utf-8');
                if ($_object) {
                    foreach ($_object as $_value) {
                        if (empty($_value->thumbnail)) $_value->thumbnail = 'images/none.jpg';
                        $_value->keyword = str_replace($this->model->inputkeyword,'<span class="red">'.$this->model->inputkeyword.'</span>',$_value->keyword);
                    }
                }
                $this->smarty->assign('SearchContent',$_object);
            }
        }

        //按照Tag标签搜索
        private function searchTag()
        {
            if ($_GET['type'] == 3) {
                $this->model->inputkeyword = $_GET['inputkeyword'];
                parent::page($this->model->searchTagContentTotal(),ARTICLE_SIZE);
                $_object = $this->model->searchTagContent();
                Tool::subStr($_object,'info',120,'utf-8');
                Tool::subStr($_object,'title',35,'utf-8');
                if ($_object) {
                    foreach ($_object as $_value) {
                        if (empty($_value->thumbnail)) $_value->thumbnail = 'images/none.jpg';
                    }
                }

                $_tag = new TagModel();
                $_tag->tagname = $this->model->inputkeyword;
                $_tag->getOneTag() ? $_tag->addTagCount() : $_tag->addTag();



                $this->smarty->assign('SearchContent',$_object);
            }
        }
    }