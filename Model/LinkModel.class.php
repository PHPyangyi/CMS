<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:39
     */

    class LinkModel extends Model
    {
        private $id;
        private $webname;
        private $weburl;
        private $logourl;
        private $type;
        private $state;
        private $limit;

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

        public function getAllTextLink()
        {
            $sql = "SELECT 
												webname,
												weburl
								FROM 
												cms_link
								WHERE
												state=1
									AND
												type=1
							ORDER BY
												date DESC";
            return parent::all($sql);
        }


        public function getAllLogoLink()
        {
            $sql = "SELECT 
												webname,
												weburl,
												logourl
								FROM 
												cms_link
								WHERE
												state=1
									AND
												type=2
							ORDER BY
												date DESC";
            return parent::all($sql);
        }



        //前20个文字链接
        public function getTwentyTextLink()
        {
            $sql = "SELECT 
												webname,
												weburl
								FROM 
												cms_link
								WHERE
												state=1
									AND
												type=1
							ORDER BY
												date DESC
								LIMIT
												0,20";
            return parent::all($sql);
        }

        //前9个Logo链接
        public function getNineLogoLink()
        {
            $sql = "SELECT 
												webname,
												weburl,
												logourl
								FROM 
												cms_link
								WHERE
												state=1
									AND
												type=2
							ORDER BY
												date DESC
								LIMIT
												0,9";
            return parent::all($sql);
        }

        //确定审核
        public function setStateOK()
        {
            $sql = "UPDATE 
											cms_Link 
								SET 
											state=1 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        //取消审核
        public function setStateCancel()
        {
            $sql = "UPDATE 
											cms_link 
								SET 
											state=0 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        //查找单一
        public function getOneLink()
        {
            $sql = "SELECT 
											id,
											webname,
											weburl,
											logourl,
											user,
											type,
											state
								FROM 
											cms_link 
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //获取链接总记录
        public function getLinkTotal()
        {
            $sql = "SELECT 
												COUNT(*) 
								FROM 
												cms_link";
            return parent::total($sql);
        }


        //查询所有链接
        public function getAllLink()
        {
            $sql = "SELECT 
												id,
												webname,
												weburl,
												weburl fullweburl,
												logourl,
												logourl fulllogourl,
												type,
												user,
												state 
								FROM 
												cms_link
							ORDER BY
												date DESC
								$this->limit";
            return parent::all($sql);
        }


        //新增
        public function addLink()
        {
            $sql = "INSERT INTO 
												cms_link (
																				webname,
																				weburl,
																				logourl,
																				user,
																				type,
																				state,
																				date
																		) 
														VALUES (
																				'$this->webname',
																				'$this->weburl',
																				'$this->logourl',
																				'$this->user',
																				'$this->type',
																				'$this->state',
																				NOW()
																		)";
            return parent::aud($sql);
        }

        //修改
        public function updateLink()
        {
            $sql = "UPDATE 
											cms_link 
								  SET 
											webname='$this->webname',
											weburl='$this->weburl',
											state='$this->state',
											type='$this->type',
											user='$this->user',
											logourl='$this->logourl'
							WHERE 
											id='$this->id' 
								 LIMIT 
											1";
            return parent::aud($sql);
        }

        //删除
        public function deleteLink()
        {
            $sql ="DELETE FROM 
														cms_link 
										WHERE 
														id='$this->id'";
            return parent::aud($sql);
        }

    }