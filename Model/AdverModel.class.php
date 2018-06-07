<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 10:56
     */

    class AdverModel  extends Model
    {
        private $id;
        private $type;
        private $link;
        private $title;
        private $state;
        private $thumbnail;
        private $info;
        private $limit;
        private $kind;

        public function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name = Tool::htmlString( $value );
        }
        public function __get($name)
        {
            // TODO: Implement __get() method.
            return $this->$name;
        }

        public function getNewTextAdver()
        {
            $sql = "SELECT 
											title,
											link 
								FROM 
											cms_adver 
							WHERE 
											state=1 
							AND
											type=1
						ORDER BY 
											date DESC 
								LIMIT 
											0,".ADVER_TEXT_NUM;
            return parent::all($sql);
        }

        //获取N条头部图片广告
        public function getNewHeaderAdver()
        {
            $sql = "SELECT 
											title,
											link,
											thumbnail 
								FROM 
											cms_adver 
							WHERE 
											state=1 
								AND
											type=2
						ORDER BY 
											date DESC 
								LIMIT 
											0,".ADVER_PIC_NUM;
            return parent::all($sql);
        }

        //获取N条侧栏图片广告
        public function getNewSidebarAdver()
        {
            $sql = "SELECT 
											title,
											link,
											thumbnail 
								FROM 
											cms_adver 
							WHERE 
											state=1 
								AND
											type=3
						ORDER BY 
											date DESC 
								LIMIT 
											0,".ADVER_PIC_NUM;
            return parent::all($sql);
        }

        public function getOneAdver()
        {
            $sql = "SELECT 
											id,
											title,
											info,
											link,
											type,
											thumbnail,
											state
								FROM 
											cms_adver
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }


        public function setStateOK()
        {
            $sql = "UPDATE 
											cms_adver 
								SET 
											state=1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        public function setStateCancel()
        {
            $sql = "UPDATE 
											cms_adver 
								SET 
											state=0 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }


        public function getAdverTotal()
        {
            $sql = "SELECT 
											COUNT(*) 
								FROM 
											cms_adver";
            return parent::total($sql);
        }


        public function getAllAdver()
        {
            $sql = "SELECT 	id,
												title,
												link,
												type,
												state 
								FROM 
												cms_adver
							WHERE
												type IN ($this->kind)
							ORDER BY
												date DESC
								$this->limit";
            return parent::all($sql);
        }


        public function addAdver()
        {
            $sql = "INSERT INTO 
												cms_adver (
																				title,
																				link,
																				thumbnail,
																				info,
																				type,
																				state,
																				date
																		) 
														VALUES (
																				'$this->title',
																				'$this->link',
																				'$this->thumbnail',
																				'$this->info',
																				'$this->type',
																				1,
																				NOW()
																		)";
            return parent::aud($sql);
        }

        public function deleteAdver()
        {
            $sql ="DELETE FROM 
													cms_adver 
										WHERE 
													id='$this->id' 
										LIMIT 1";
            return parent::aud($sql);
        }

        public function updateAdver()
        {
            $sql = "UPDATE 
											cms_adver 
								  SET 
											title='$this->title',
											state='$this->state',
											link='$this->link',
											info='$this->info',
											thumbnail='$this->thumbnail',
											type='$this->type'	
							WHERE 
											id='$this->id' 
								 LIMIT 
											1";
            return parent::aud($sql);
        }

    }