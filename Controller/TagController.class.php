<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 17:59
     */

    class TagController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new TagModel());
        }

        public function Action()
        {

        }
        public function getFiveTag()
        {
            $this->smarty->assign('FiveTag',$this->model->getFiveTag());
        }
    }