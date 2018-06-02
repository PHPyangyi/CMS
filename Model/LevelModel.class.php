<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 19:00
     */
    class LevelModel extends Model
    {
        private $id;
        private $level_name;
        private $level_info;

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
        //select one level
        public function getOneLevel ()
        {
            $sql = "SELECT 
										id,
										level_name,
										level_info 
								FROM 
										cms_level 
							WHERE 
										id='$this->id' 
								OR
										level_name='$this->level_name'
								LIMIT 
										1";

            return  parent::one($sql);
        }

        //display level
        public function getAllLevel ()
        {
            $sql = "SELECT 
										id,
										level_name
								FROM 
										cms_level 
								ORDER BY 
										id ASC";
            return parent::all($sql);
        }

        //add level
        public function addLevel()
        {
            $sql = "INSERT INTO 
												cms_level (
																				level_name,
																				level_info
																		) 
														VALUES (
																				'$this->level_name',
																				'$this->level_info'
																		)";
            return parent::aud($sql);
        }


        //update level
        public function updateLevel ()
        {
            $sql = "UPDATE 
										cms_level 
								  SET 
										level_name='$this->level_name',
										level_info='$this->level_info' 
							WHERE 
										id='$this->id' 
								 LIMIT 
										1";
            return parent::aud($sql);
        }

        //delete level
        public function deleteLevel ()
        {
            $sql="DELETE FROM cms_level WHERE id =$this->id  LIMIT 1 ";
            return parent::aud($sql);
        }

    }