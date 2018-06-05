<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 17:22
     */
    class Cookie
    {
        private $name;
        private $value;
        private $time;

        public function __construct($name,$value='',$time=0)
        {
            $this->name=$name;
            $this->value=$value;
            if (empty($time)) {
                $this->time=0;
            } else {
                $this->time = time() + $time;
            }
        }

        public function setCookie ()
        {
            setcookie($this->name, $this->value, $this->time);
        }
        public function getCookie ()
        {
            return $_COOKIE["$this->name"];
        }

        public function unCookie ()
        {
            setcookie($this->name,'',-1);
        }

    }