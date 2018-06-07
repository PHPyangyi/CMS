<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 12:46
     */

    class VoteModel extends Model
    {
        private $id;
        private $title;
        private $info;
        private $vid;
        private $count;
        private $state;

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


        public function getVoteItem()
        {
            $sql = "SELECT 
											id,
											title 
								FROM 
											cms_votee 
							WHERE 
											vid=(SELECT id FROM cms_votee WHERE state=1 LIMIT 1)";
            return parent::all($sql);
        }


        public function getVoteTitle()
        {
            $sql = "SELECT 
											title 
								FROM 
											cms_votee 
							WHERE 
											state=1 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //取消投票首选
        public function setStateCancel()
        {
            $sql = "UPDATE 
											cms_votee 
								SET 
											state=0 
							WHERE 
											state=1
								LIMIT 
											1";
            return parent::aud($sql);
        }

        //确定投票首选
        public function setStateOK()
        {
            $sql = "UPDATE 
											cms_votee 
								SET 
											state=1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }


        //查询单个
        public function getOneVote()
        {
            $sql = "SELECT 
											id,
											title,
											info
								FROM 
											cms_votee 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }


        //获取投票项目总记录
        public function getChildVoteTotal()
        {
            $sql = "SELECT 
											COUNT(*) 
								FROM 
											cms_votee
								WHERE
											vid=$this->id";
            return parent::total($sql);
        }

        //查询所有投票主题，带limit
        public function getAllChildVote()
        {
            $sql = "SELECT 
											id,
											title,
											count
								FROM 
											cms_votee
							WHERE
											vid='$this->id'
							ORDER BY
											date DESC
								$this->limit";
            return parent::all($sql);
        }


        //获取投票主题总记录
        public function getVoteTotal()
        {
            $sql = "SELECT 
											COUNT(*) 
								FROM 
											cms_votee
								WHERE
											vid=0";
            return parent::total($sql);
        }

        //查询所有投票主题，带limit
        public function getAllVote()
        {
            $sql = "SELECT 
											id,
											title,
											state
								FROM 
											cms_votee
							WHERE
											vid=0
							ORDER BY
											date DESC
								$this->limit";
            return parent::all($sql);
        }

        //新增
        public function addVote()
        {
            $sql = "INSERT INTO 
												cms_votee (
																				title,
																				info,
																				vid,
																				date
																		) 
														VALUES (
																				'$this->title',
																				'$this->info',
																				'$this->vid',
																				NOW()
																		)";
            return parent::aud($sql);
        }

        //修改
        public function updateVote()
        {
            $sql = "UPDATE 
											cms_votee 
								  SET 
											title='$this->title',
											info='$this->info' 
							WHERE 
											id='$this->id' 
								 LIMIT 
											1";
            return parent::aud($sql);
        }


        //删除
        public function deleteVote()
        {
            $sql ="DELETE FROM 
														cms_votee 
										WHERE 
														id='$this->id' 
												OR
														vid='$this->id'";
            return parent::aud($sql);
        }
    }