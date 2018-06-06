<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 8:52
     */

    class CommentModel extends Model
    {
        private $user;
        private $manner;
        private $content;
        private $cid;
        public function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name=$value;
        }
        public function __get($name)
        {
            // TODO: Implement __get() method.
            return $this->$name;
        }


        //支持
        public function setSustain()
        {
            $sql = "UPDATE 
											cms_comment 
									SET 
											sustain=sustain+1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        //反对
        public function setOppose()
        {
            $sql = "UPDATE 
											cms_comment 
									SET 
											oppose=oppose+1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }



        public function getOneComment()
        {
            $sql = "SELECT 
											id 
								FROM 
											cms_comment
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //all
        public function getAllComment()
        {
            $sql = "SELECT 
											c.id,
											c.cid,
											c.user,
											c.manner,
											c.content,
											c.date,
											c.sustain,
											c.oppose,
											u.face 
								FROM 
											cms_comment c
						LEFT JOIN
											cms_user u
									ON
											c.user=u.user
							WHERE 
											c.cid='$this->cid'
							ORDER BY
							                c.date DESC 
											
										$this->limit";
            return parent::all($sql);
        }

        //count
        public function getCommentTotal()
        {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
											cms_comment 
							WHERE 
											cid='$this->cid'";
            return parent::total($sql);
        }

        //add
        public function addComment ()
        {
            $sql = "INSERT INTO 
												cms_comment (
																				user,
																				manner,
																				content,
																				cid,
																				date
																		) 
														VALUES (
																				'$this->user',
																				'$this->manner',
																				'$this->content',
																				'$this->cid',
																				NOW()
																		)";
            return parent::aud($sql);
        }
    }