<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 17:56
     */

    class TagModel extends Model
    {
        private $id;
        private $count;
        private $tagname;

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

        //获取前5条Tag数据
        public function getFiveTag() {
            $sql = "SELECT 
											tagname,count 
								FROM 
											cms_tag 
						ORDER BY 
											count DESC 
								LIMIT 
											0,5";
            return parent::all($sql);
        }


        //查找单一
        public function getOneTag() {
            $sql = "SELECT 
											id 
								FROM 
											cms_tag 
							WHERE 
											tagname='$this->tagname'";
            return parent::one($sql);
        }

        //累计
        public function addTagCount() {
            $sql = "UPDATE 
											cms_tag 
								SET 
											count=count+1 
							WHERE 
											tagname='$this->tagname'";
            return parent::aud($sql);
        }

        //新增
        public function addTag() {
            $sql = "INSERT INTO 
												cms_tag (
																				tagname
																		) 
														VALUES (
																				'$this->tagname'
																		)";
            return parent::aud($sql);
        }
    }