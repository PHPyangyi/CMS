<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 11:29
     */
    class Model
    {

        //执行多条SQL语句
        public function multi($sql) {
            $db = DB::getDB();
            $db->multi_query($sql);
            return true;
        }

        //获取下一个增值id模型
        protected function nextid ($table)
        {
            $_sql = "SHOW TABLE STATUS LIKE '$table'";
            $_object = $this->one($_sql);
            return $_object->Auto_increment;
        }


        protected function one ($sql)
        {
            $db = DB::getDB();
            $result = $db->query($sql);
            $objects = $result->fetch_object();
            return Tool::htmlString( $objects );
        }
        protected function all ($sql)
        {
            $db =  DB::getDB();
            $result = $db->query($sql);
            $html = array();
            while ($objects = $result->fetch_object()) {
                $html[] = $objects;
            }

            return Tool::htmlString( $html );
        }

        protected function aud ($sql)
        {
            $db=DB::getDB();
            $db->query($sql);
            $affectedRows = $db->affected_rows;
            return $affectedRows;
        }

        //
        protected function total ($sql)
        {
            $db = DB::getDB();
            $result = $db->query($sql);
            $total = $result->fetch_row();
            return $total[0];
        }
    }