<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 16:40
     */

    class UserModel extends Model
    {
        private $id;
        private $user;
        private $pass;
        private $email;
        private $question;
        private $answer;
        private $time;
        private $limit;
        private $state;

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

        public function deleteUser ()
        {
            $sql="DELETE FROM cms_user WHERE id='$this->id' ";
            return parent::aud($sql);
        }

        public function updateUser()
        {
            $sql = "UPDATE 
											cms_user 
									SET 
											pass='$this->pass',
											face='$this->face',
											question='$this->question',
											answer='$this->answer',
											state='$this->state',
											email='$this->email'
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        //one user
        public function getOneUser()
        {
            $sql = "SELECT 
											id,
											user,
											pass,
											face,
											email,
											question,
											answer,
											state 
								FROM 
											cms_user 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //count user
        public function getUserTotal()
        {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
										cms_user";
            return parent::total($sql);
        }
        //all user
        public function getAllUser()
        {
            $sql = "SELECT 
										id,
										user,
										email,
										state 
								FROM 
										cms_user
							ORDER BY
										date DESC
								$this->limit";
            return parent::all($sql);
        }

        //获取6条最近登录的会员
        public function getLaterUser()
        {
            $sql = "SELECT 
											user,
											face 
								FROM 
											cms_user 
						ORDER BY 
											time DESC 
								LIMIT 
											0,6";
            return parent::all($sql);
        }

        //注册和登录时更新最近的登录时间戳
        public function setLaterUser()
        {
            $sql = "UPDATE 
											cms_user 
									SET 
											time='$this->time' 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        public function checkUser()
        {
            $sql = "SELECT 
											id 
								FROM 
											cms_user 
							WHERE 
											user='$this->user' 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //邮件重复
        public function checkEmail()
        {
            $sql = "SELECT 
											id 
								FROM 
											cms_user 
							WHERE 
											email='$this->email' 
								LIMIT 
											1";
            return parent::one($sql);
        }


        public function checkLogin()
        {
            $_sql = "SELECT              
                                        id,
										user,
										pass,
										face 
							FROM 
										cms_user 
						WHERE 
										user='$this->user' 
								AND 
										pass='$this->pass'
							LIMIT 
										1";
            return parent::one($_sql);
        }
        public function addUser ()
        {
            $sql = "INSERT INTO 
												cms_User (
																				user,
																				pass,
																				email,
																				question,
																				answer,
																				face,
																				state,
																				date
																		) 
														VALUES (
																				'$this->user',
																				'$this->pass',
																				'$this->email',
																				'$this->question',
																				'$this->answer',
																				'$this->face',
																				$this->state,
																				NOW()
																		)";
            return parent::aud($sql);
        }
    }