<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/8
     * Time: 9:33
     */

    class PremissionModel extends Model
    {
        private $id;
        private $name;
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

        public function getAllPremission()
        {
            $sql = "SELECT 
												id,
												name,
												info 
								FROM 
												cms_premission
							ORDER BY
												id ASC";
            return parent::all($sql);
        }


        public function getPremissionTotal()
        {
            $sql = "SELECT 
											COUNT(*) 
								FROM 
											cms_premission";
            return parent::total($sql);
        }

        //查询所有权限，带limit
        public function getAllLimitPremission()
        {
            $sql = "SELECT 
											id,
											name,
											info 
								FROM 
											cms_premission
							ORDER BY
											id DESC
								$this->limit";
            return parent::all($sql);
        }


        //查询单个
        public function getOnePremission()
        {
            $sql = "SELECT 
											id,
											name,
											info
								FROM 
											cms_premission 
							WHERE 
											id='$this->id'
									OR
											name='$this->name'
								LIMIT	 
											1";
            return parent::one($sql);
        }

        //新增
        public function addPremission()
        {
            $sql = "INSERT INTO 
												cms_premission (
																				name,
																				info
																		) 
														VALUES (
																				'$this->name',
																				'$this->info'
																		)";
            return parent::aud($sql);
        }

        //修改
        public function updatePremission()
        {
            $sql = "UPDATE 
											cms_premission
								  SET 
											name='$this->name',
											info='$this->info' 
							WHERE 
											id='$this->id' 
								 LIMIT 
											1";
            return parent::aud($sql);
        }

        //删除
        public function deletePremission()
        {
            $sql ="DELETE FROM 
													cms_premission 
										WHERE 
													id='$this->id' 
										LIMIT 
												1";
            return parent::aud($sql);
        }


    }