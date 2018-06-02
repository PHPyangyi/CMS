<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 11:29
     */
    class Model
    {
        protected function one ($sql)
        {
            $db = DB::getDB();
            $result = $db->query($sql);
            $objects = $result->fetch_object();
            return $objects;
        }
        protected function all ($sql)
        {
            $db =  DB::getDB();
            $result = $db->query($sql);
            $html = array();
            while ($objects = $result->fetch_object()) {
                $html[] = $objects;
            }

            return $html;
        }

        protected function aud ($sql)
        {
            $db=DB::getDB();
            $db->query($sql);
            $affectedRows = $db->affected_rows;
            return $affectedRows;
        }
    }