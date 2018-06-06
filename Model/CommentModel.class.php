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
        private $id;
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
        public function setStateCancel ()
        {
            $sql = "UPDATE 
											cms_comment 
								SET 
											state=0 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        public function setStates()
        {
            $sql='';
            foreach ($this->states as $key=>$value) {
                if (!is_numeric($value)) continue;
                if ($value > 0) $value = 1;
                if ($value < 0) $value = 0;
                $sql .= "UPDATE cms_comment SET state='$value' WHERE id='$key';";
            }
            return parent::multi($sql);
        }

        public function deleteComment()
        {
            $sql="DELETE FROM cms_comment WHERE id='$this->id' LIMIT 1 ";
            return parent::aud($sql);

        }

        public function setStateOK()
        {
            $sql = "UPDATE 
											cms_comment 
								SET 
											state=1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        public function getCommentList()
        {
            $sql = "SELECT 
											c.id,
											c.cid,
											c.user,
											c.content,
											c.content full,
											c.state,
											c.state num,
											ct.title 
								FROM 
											cms_comment c,
											cms_content ct
							WHERE
											c.cid=ct.id
						ORDER BY 
											c.date DESC
									$this->limit";
            return parent::all($sql);
        }

        public function getCommentListTotal()
        {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
											cms_comment";
            return parent::total($sql);
        }



        //获取三条最火评论，如果其中有支持+反对=0的话，那么就不显示出来
        public function getHotThreeComment()
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
							                c.state=1
								AND
											c.cid='$this->cid'
								AND
											c.sustain+c.oppose>0
						ORDER BY
											c.sustain+c.oppose DESC
								LIMIT
											0,3";
            return parent::all($sql);
        }

        //获取最新三条评论
        public function getNewThreeComment()
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
								            c.state=1
								AND
											c.cid='$this->cid'
						ORDER BY
											c.date DESC
								LIMIT
											0,3";
            return parent::all($sql);
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
							
											c.state=1
								AND
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
							                state=1
								AND
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