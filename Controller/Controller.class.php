<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 11:46
     */
    class Controller
    {
        protected $smarty;
        protected $model;
        protected function __construct($smarty,$model=null)
        {
            $this->smarty=$smarty;
            $this->model=$model;
        }

        protected function page ($total,$pagesize = PAGE_SIZE)
        {
            $page=new Page($total,$pagesize);
            $this->model->limit = $page->limit;
            $this->smarty->assign('page',$page->showPage());
            $this->smarty->assign('num',($page->page-1)*$pagesize);
        }
    }