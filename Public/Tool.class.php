<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 9:41
     */

    class Tool{
        static public function alertLocation ($info,$url)
        {
            echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
            exit();
        }
        static public function alertBack ($info)
        {
            echo "<script type='text/javascript'>alert('$info');history.back();</script>";
            exit();
        }
    }