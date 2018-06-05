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
            $this->login();
            $this->lastUser();
        }

        private function lastUser ()
        {
            $user = new UserModel();
            $this->smarty->assign('AllLaterUser',$user->getLaterUser());
        }

        private function login ()
        {

        }
    }