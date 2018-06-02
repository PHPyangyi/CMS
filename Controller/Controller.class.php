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
        protected function __construct($smarty,$model)
        {
            $this->smarty=$smarty;
            $this->model=$model;
        }
    }