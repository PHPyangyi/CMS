<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 20:12
     */

    class SystemModel  extends Model
    {
        private $webname;
        private $page_size;
        private $article_size;
        private $nav_size;
        private $ro_num;
        private $updir;
        private $adver_text_num;
        private $adver_pic_num;

        public function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name =Tool::htmlString( $value );
        }
        public function __get($name)
        {
            // TODO: Implement __get() method.
            return $this->$name;
        }


        public function getSystem() {
            $sql = "SELECT 
												webname,
												page_size,
												article_size,
												nav_size,
												updir,
												ro_time,
												ro_num,
												adver_text_num,
												adver_pic_num 
									FROM 
												cms_system 
								WHERE 
												id=1";
            return parent::one($sql);
        }

        public function setSystem()
        {
            $sql = "UPDATE 
											cms_system 
									SET 
											webname='$this->webname',
											page_size='$this->page_size',
											nav_size='$this->nav_size',
											article_size='$this->article_size',
											ro_num='$this->ro_num',
											updir='$this->updir',
											adver_text_num='$this->adver_text_num',
											adver_pic_num='$this->adver_pic_num'
							WHERE 
											id=1";
            return parent::aud($sql);
        }
    }