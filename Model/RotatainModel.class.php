<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 20:58
     */

    class RotatainModel extends Model
    {
        private $id;
        private $thumbnail;
        private $link;
        private $title;
        private $info;
        private $limit;

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


        //获取系统指定的个数，最新的轮播器
        public function getNewRotatain()
        {
            $sql = "SELECT 
											title,
											thumbnail,
											link 
								FROM 
											cms_rotatain 
							WHERE 
											state=1 
						ORDER BY
											date DESC 
								LIMIT 
											0,".RO_NUM;
            return parent::all($sql);
        }

        //查找单一轮播
        public function getOneRotatain()
        {
            $sql = "SELECT 
											id,
											title,
											link,
											info,
											thumbnail,
											state 
								FROM 
											cms_rotatain
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }


        //确定轮播器
        public function setStateOK()
        {
            $sql = "UPDATE 
											cms_rotatain 
								SET 
											state=1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

         //取消轮播器
        public function setStateCancel()
        {
            $sql = "UPDATE 
											cms_rotatain 
								SET 
											state=0 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }
        //获取轮播器总记录
        public function getRotatainTotal()
        {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
										cms_rotatain";
            return parent::total($sql);
        }

        //查询所有的轮播器
        public function getAllRotatain()
        {
            $sql = "SELECT 
												id,
												title,
												link,
												link full,
												state 
								FROM 
												cms_rotatain
							ORDER BY
												state DESC,date DESC
									$this->limit";
            return parent::all($sql);
        }

        public function addRotatain()
        {
            $sql = "INSERT INTO 
												cms_rotatain (
																				thumbnail,
																				info,
																				title,
																				link,
																				state,
																				date
																		) 
														VALUES (
																				'$this->thumbnail',
																				'$this->info',
																				'$this->title',
																				'$this->link',
																				1,
																				NOW()
																		)";
            return parent::aud($sql);
        }

        //修改
        public function updateRotatain()
        {
            $sql = "UPDATE 
											cms_rotatain 
								  SET 
											thumbnail='$this->thumbnail',
											info='$this->info',
											title='$this->title',
											link='$this->link',
											state='$this->state'
							WHERE 
											id='$this->id' 
								 LIMIT 
											1";
            return parent::aud($sql);
        }

        //删除
        public function deleteRotatain()
        {
            $sql ="DELETE FROM 
														cms_rotatain
										WHERE 
														id='$this->id' 
										LIMIT 
														1";
            return parent::aud($sql);
        }
    }