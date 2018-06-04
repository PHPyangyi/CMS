<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/4
     * Time: 9:41
     */

    class FileUpLoad
    {
        private $error;			    //错误代码
        private $maxsize;		    //表单最大值
        private $type;				//类型
        private $typeArr = array('image/jpeg','image/ejpeg','image/png','image/x-png','image/gif');		//类型合集
        private $path;				//目录路径

        private $today;			//今天目录
        private $name;			//文件名
        private $tmp;				//临时文件
        private $linkpath;		//链接路径
        private $linktotay;		//今天目录（相对）


       public function __construct($file,$maxsize)
       {
           $this->error = $_FILES[$file]['error'];
           $this->maxsize=$maxsize / 1024;
           $this->type = $_FILES[$file]['type'];
           $this->path = ROOT_PATH.UPDIR;


           $this->linktotay = date('Ymd').'/';
           $this->today = $this->path.$this->linktotay;

          // $this->today=$this->path.date('Ymd').'/';
           $this->name=$_FILES[$file]['name'];
           $this->tmp=$_FILES[$file]['tmp_name'];


           $this->checkPath();
           $this->checkType();
           $this->checkError();
           $this->moveUpload();

       }

       //Return path
        public function getPath ()
        {
            $path = $_SERVER["SCRIPT_NAME"];
            $dir = dirname(dirname($path));
            if ($dir == '\\') $dir = '/';
            $this->linkpath = $dir.$this->linkpath;
            return $this->linkpath;
        }

        // move file
        private function moveUpload ()
        {
            if (is_uploaded_file($this->tmp)) {
                if (! move_uploaded_file($this->tmp,$this->setNewName())) {
                    Tool::alertBack('警告：上传失败！');
                }
            } else {
                Tool::alertBack('警告：临时文件不存在！');
            }
        }


        // set new fileName

        private function setNewName ()
        {
            $nameArr=explode('.',$this->name);
            $postfix=$nameArr[count($nameArr)-1];
            $newName = date('YmdHis').mt_rand(100,1000).'.'.$postfix;
            $this->linkpath = UPDIR.$this->linktotay.$newName;
            return $this->today.$newName;
        }


       // check dir
       private function checkPath ()
       {
            if (!file_exists($this->path) || !is_writable($this->path)) {
               if (! mkdir($this->path,0777) ) {
                   Tool::alertBack('警告：主目录创建失败！');
               }
            }

           if (!file_exists($this->today) || !is_writeable($this->today)) {
               if (!mkdir($this->today)) {
                   Tool::alertBack('警告：子目录创建失败！');
               }
           }

       }

       // check type
        private function checkType()
        {
            if (!in_array($this->type,$this->typeArr)) {
                Tool::alertBack('警告：不合法的上传类型！');
            }
        }

        //check error
        private function checkError ()
        {
            if (!empty($this->error)) {
                switch ($this->error) {
                    case 1 :
                        Tool::alertBack('警告：上传值超过了约定最大值！');
                        break;
                    case 2 :
                        Tool::alertBack('警告：上传值超过了'.$this->maxsize.'KB！');
                        break;
                    case 3 :
                        Tool::alertBack('警告：只有部分文件被上传！');
                        break;
                    case 4 :
                        Tool::alertBack('警告：没有任何文件被上传！');
                        break;
                    default:
                        Tool::alertBack('警告：未知错误！');
                }
            }
        }


    }