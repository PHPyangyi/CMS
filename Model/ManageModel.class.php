<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 20:47
     */

    namespace CMS\Model;


    class ManageModel
    {
        public function getManage ()
        {
            $db =  \DB::getDB();
            $sql = "SELECT * FROM cms_manage";
            $result = $db->query($sql);
            $html = array();
            while (!!$objects = $result->fetch_object()) {
                $html[] = $objects;
            }
           // DB::unDB($_result, $_db);
            return $html;
        }
    }