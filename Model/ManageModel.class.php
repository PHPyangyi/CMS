<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 20:47
     */


    class ManageModel extends Model
    {
        private $admin_user;
        private $admin_pass;
        private $level;
        private $id;
        private $limit;
        private $last_ip;


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
        //count ip login
        public function setLoginCount ()
        {
            $sql =" UPDATE cms_manage SET  
                                          login_count=login_count+1,
                                          last_ip='$this->last_ip',
                                          last_time=NOW()
                                      WHERE 
                                          admin_user='$this->admin_user'
                                      LIMIT 
                                          1 ";
            return parent::aud($sql);
        }




        //check login
        public function getLoginManage ()
        {
            $_sql = "SELECT 
										m.admin_user,
										l.level_name,
										l.premission 
								FROM 
										cms_manage m,
										cms_level l
								WHERE 
										m.admin_user='$this->admin_user' 
									AND 
										m.admin_pass='$this->admin_pass'
									AND
										m.level=l.id
									LIMIT 1";
            return parent::one($_sql);
        }



         //获取总记录数
        public function getManageTotal ()
        {
            $sql="SELECT COUNT(*) AS c FROM cms_manage ";
            return parent::total($sql);
        }


        public function getOneManage ()
        {
            $sql = "SELECT 
										*
							FROM 
										cms_manage 
							WHERE 
										id='$this->id' 
							OR
										admin_user='$this->admin_user'
							OR
										level='$this->level'
							LIMIT 
										1";
            return  parent::one($sql);
        }


        public function getManage ()
        {
            $sql = "SELECT 
										m.id,
										m.admin_user,
										m.login_count,
										m.last_ip,
										m.last_time, 
										l.level_name
								FROM 
										cms_manage m,
										cms_level l
								WHERE
										l.id = m.level
							ORDER BY
										m.id DESC 
									$this->limit";

            return parent::all($sql);
        }
        //add
        public function addManage ()
        {
            $sql = "INSERT INTO 
												cms_manage (
																				admin_user,
																				admin_pass,
																				level,
																				reg_time
																		) 
														VALUES (
																				'$this->admin_user',
																				'$this->admin_pass',
																				'$this->level',
																				NOW()
																		)";
             return parent::aud($sql);
        }

        //update
        public function updateManage ()
        {
            $sql = "UPDATE 
										cms_manage 
								  SET 
										admin_pass='$this->admin_pass',
										level='$this->level' 
							WHERE 
										id='$this->id' 
								 LIMIT 
										1";
            return parent::aud($sql);
        }

        //delete
        public function deleteManage ()
        {
            $sql="DELETE FROM cms_manage WHERE id =$this->id  LIMIT 1 ";
            return parent::aud($sql);
        }

    }