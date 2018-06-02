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

        public function __set($name, $value)
        {
            // TODO: Implement __set() method.
            $this->$name = $value;
        }
        public function __get($name)
        {
            // TODO: Implement __get() method.
            return $this->$name;
        }

        public function getOneManage ()
        {
            $sql = "SELECT 
										id,
										admin_user,
										level 
								FROM 
										cms_manage 
							WHERE 
										id='$this->id' 
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
										cms_manage AS m,
										cms_level  AS  l
								WHERE
										l.id = m.level
							ORDER BY
										m.id ASC
								LIMIT
										0,20";

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