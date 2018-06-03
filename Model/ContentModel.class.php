<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:25
     */

    class   ContentModel extends Model
    {
        //拦截器(__set)
        public function __set($name, $value) {
            $this->$name = Tool::mysqlString($value);
        }

        //拦截器(__get)
        public function __get($name) {
            return $this->$name;
        }

    }