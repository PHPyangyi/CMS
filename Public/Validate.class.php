<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 20:06
     */
    class Validate
    {
        // ont null
        static public function checkNull ($data)
        {
            if (trim($data) == '') return true;
            return false;
        }

        //check number
        static public function checkNum($date)
        {
            if (!is_numeric($date)) return true;
            return false;
        }

        //check length
        static public function checkLength ($date, $length, $flag)
        {
            if ($flag == 'min') {
                if (mb_strlen(trim($date),'utf-8') < $length) return true;
                return false;
            } elseif ($flag == 'max') {
                if (mb_strlen(trim($date),'utf-8') > $length) return true;
                return false;
            }
            elseif ($flag == 'equals') {
                if (mb_strlen(trim($date),'utf-8') != $length) return true;
                return false;
            } else {
                Tool::alertBack('EROOR：参数传递的错误，必须是min,max！');
            }
        }

        //check Agreement
        static public function checkEquals($date, $otherdate)
        {
            if (trim($date) != trim($otherdate)) return true;
            return false;
        }

        // check session
        static public function checksession ()
        {
            if (!isset($_SESSION['admin'])) Tool::alertLocation('请登录','admin_login.php');
        }

        //check email
        static public function checkEmail($data)
        {
            if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',$data)) return true;
            return false;
        }

        static public function checkPremission($date,$info)
        {
            if (!strstr($_SESSION['admin']['premission'],$date)) {
                Tool::alertBack($info);
            }
        }


    }