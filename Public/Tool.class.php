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
            if (!empty($info)) {
                echo "<script type='text/javascript'>alert('$info');location.href='$url';</script>";
                exit();
            } else {
                header('Location:'.$url);
                exit();
            }
        }
        static public function alertBack ($info)
        {
            echo "<script type='text/javascript'>alert('$info');history.back();</script>";
            exit();
        }

        //unset session
        static public function unSession() {
            if (session_start()) {
                session_destroy();
            }
        }
        //display html filter

        static public function htmlString ($data)
        {
                                     //简单的递归使用
            if (is_array($data)) {
                foreach ($data as $key => $value) {
                    $string[$key]=self::htmlString($value);
                }
            } elseif (is_object($data)) {
                foreach ($data as $key => $value) {
                    @$string->$key=self::htmlString($value);
                }
            } else {
                $string=htmlspecialchars($data);
            }

            return @$string;
        }

        //
        //sql data filter
        static public function mysqlString ($data)
        {
            return  !get_magic_quotes_gpc() ?addcslashes($data) : $data;
        }


        //弹窗赋值关闭(上传专用)
        static public function alertOpenerClose($_info,$_path) {
            echo "<script type='text/javascript'>alert('$_info');</script>";
            echo "<script type='text/javascript'>opener.document.content.thumbnail.value='$_path';</script>";
            echo "<script type='text/javascript'>opener.document.content.pic.style.display='block';</script>";
            echo "<script type='text/javascript'>opener.document.content.pic.src='$_path';</script>";
            echo "<script type='text/javascript'>window.close();</script>";
            exit();
        }
        //弹窗关闭
        static public function alertClose($info)
        {
            echo "<script type='text/javascript'>alert('$info');close();</script>";
            exit();
        }
        //日期转换
        static public function objDate(&$object,$field)
        {
            if ($object) {
                foreach ($object as $value) {
                    @$value->$field = date('m-d',strtotime($value->$field));
                }
            }
        }


        static public function NewSubStr(&$_object,$_field,$_length,$_encoding)
        {
            if ($_object) {
                if (is_array($_object)) {
                    foreach ($_object as $_value) {
                        if (mb_strlen($_value->$_field,$_encoding) > $_length) {
                            $_value->$_field = mb_substr($_value->$_field,0,$_length,$_encoding).'...';
                        }
                    }
                } else {
                    return mb_substr($_object,0,$_length,$_encoding);
                }
            }
        }


        //字符串截取
        static public function subStr($object,$field,$length,$encoding)
        {
            if ($object) {
                foreach (@$object as $value) {
                    if (mb_strlen($value->$field,$encoding) > $length) {
                        @$value->$field = mb_substr($value->$field,0,$length,$encoding).'...';
                    }
                }
            }
            return @$object;
        }

        //讲html字符串转换成html标签
        static public function unHtml($str)
        {
            return htmlspecialchars_decode($str);
        }

        //将对象数组转换成字符串，并且去掉最后的逗号
        static public function objArrOfStr($object,$field) {
            if ($object) {
                $html='';
                foreach ($object as $value) {
                    $html .= $value->$field.',';
                }
            }
            return substr($html,0,strlen($html)-1);
        }

    }