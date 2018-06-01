<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 20:04
     */

    class DB
    {
        static public function getDB ()
        {

            $mysqli=new mysqli(DB_HOTS,DB_USER,DB_PWD,DB_NAME);
            if (mysqli_connect_errno($mysqli)) {
                echo '数据库连接错误！错误代码：'.mysqli_connect_error();
                exit();
            }

            $mysqli->set_charset('utf8');
            return $mysqli;
        }

        static function unDB (&$result,&$db)
        {
            if (is_object($result)) {
                $result->free();
                $result=null;
            }
            if (is_object($db)) {
                $db->close;
                $db=null;
            }
        }
    }