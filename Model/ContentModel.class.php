<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:25
     */

    class   ContentModel extends Model
    {
        private $title;
        private $nav;
        private $attr;
        private $tag;
        private $keyword;
        private $thumbnail;
        private $info;
        private $source;
        private $author;
        private $content;
        private $gold;
        private $commend;
        private $count;
        private $color;
        private $sort;
        private $readlimit;
        private $id;
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

        //获取每个主栏目所有11条的最新文档
        public function getNewNavList()
        {
            $sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content
							WHERE
											nav IN (SELECT id FROM cms_nav WHERE pid='$this->nav')
						ORDER BY
											date DESC
								LIMIT 
											0,11";
            return parent::all($sql);
        }

        //获取最新的10条文档
        public function getNewList()
        {
            $sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content 
						ORDER BY 
											date DESC";
            return parent::all($sql);
        }

        //获取最新的一条头条
        public function getNewTop()
        {
            $sql = "SELECT 
											id,
											title,
											info
								FROM 
											cms_content 
							WHERE 
											attr LIKE '%头条%' 
						ORDER BY 
											date DESC 
								LIMIT 
											1";
            return parent::one($sql);
        }

        //获取最新的第二条到第五条头条
        public function getNewTopList()
        {
            $sql = "SELECT 
											id,
											title,
											info
								FROM 
											cms_content 
							WHERE 
											attr LIKE '%头条%' 
						ORDER BY 
											date DESC 
								LIMIT 
											1,4";
            return parent::all($sql);
        }


        //获取最新的四条图文资讯
        public function getPicList()
        {
            $sql = "SELECT 
											id,
											title,
											thumbnail 
								FROM 
											cms_content 
							WHERE 
											thumbnail<>'' 
						ORDER BY 
											date DESC
								LIMIT
											0,4";
            return parent::all($sql);
        }


        //获取本月评论总榜，7条
        public function getMonthCommentList()
        {
            $sql = "SELECT 
											ct.id,
											ct.title,
											ct.date 
								FROM 
											cms_content ct
							 
						ORDER BY 
											(SELECT 
																COUNT(*) 
													FROM 
																cms_comment c 
												WHERE 
																c.cid=ct.id) DESC
								LIMIT 
											0,7";
            return parent::all($sql);
        }



        //获取 热点（点击量），总排行，7条
        public function getMonthHotList() {
            $_sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content 
											 
						ORDER BY 
											count DESC
								LIMIT 
											0,7";
            return parent::all($_sql);
        }

        //获取最新的7条推荐文档
        public function getNewRecList()
        {
            $sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content 
							WHERE 
											attr LIKE '%推荐%' 
						ORDER BY 
											date DESC 
								LIMIT 
											0,7";
            return parent::all($sql);
        }




        //获取 本类、推荐排行榜，10条
        public function getMonthNavRec()
        {
            $sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content 
							WHERE
											attr LIKE '%推荐%'
								AND
											nav IN ($this->nav)	
						ORDER BY 
											date DESC 
								LIMIT 
											0,10";
            return parent::all($sql);
        }



        //获取  本类、热点荐排行榜，10条
        public function getMonthNavHot()
        {
            $sql = "SELECT 
											ct.id,
											ct.title,
											ct.date 
								FROM 
											cms_content ct
							WHERE
										 
											ct.nav IN ($this->nav)	
						ORDER BY 
											(SELECT 
																COUNT(*) 
													FROM 
																cms_comment c 
												WHERE 
																c.cid=ct.id) DESC
								LIMIT 
											0,10";
            return parent::all($sql);
        }




        //获取 本类、图文排行榜，10条
        public function getMonthNavPic()
        {
            $sql = "SELECT 
											id,
											title,
											date 
								FROM 
											cms_content 
							WHERE
											thumbnail<>''
							 
								AND
											nav IN ($this->nav)	
						ORDER BY 
											date DESC 
								LIMIT 
											0,10";
            return parent::all($sql);
        }


        //获取总排行榜，文档的评论量从大到小，20条
        public function getHotTwentyComment()
        {
            $sql = "SELECT 
											ct.id,
											ct.title 
								FROM 
											cms_content ct
						ORDER BY
											(SELECT 
																COUNT(*) 
													FROM 
																cms_comment c 
												WHERE 
																c.cid=ct.id) DESC
								LIMIT 
											0,20";
            return parent::all($sql);
        }

        //获取主类下的子类的id
//        public function getNavChildId()
//        {
//            $_sql = "SELECT
//											id
//								FROM
//											cms_nav
//							WHERE
//											pid='$this->id'";
//            return parent::all($_sql);
//        }



        //获取文档总记录
        public function getListContentTotal()
        {
            $sql = "SELECT 
										COUNT(*) 
								FROM 
											cms_content c,
											cms_nav n
								WHERE
											c.nav=n.id
									AND
											c.nav IN ($this->nav)";
            return parent::total($sql);
        }


        //get list
        public function getListContent() {
            $sql = "SELECT 
											c.id,
											c.title,
											c.nav,
											c.title t,
											c.attr,
											c.date,
											c.info,
											c.gold,
											c.thumbnail,
											c.count,
											n.nav_name 
								FROM 
											cms_content c,
											cms_nav n
								WHERE
											c.nav=n.id
									AND
											c.nav IN ($this->nav)
							ORDER BY
											c.date DESC
										$this->limit";
            return parent::all($sql);
        }
        //add list
        public function addContent ()
        {
            $sql="INSERT INTO 
												cms_content (
																				title,
																				nav,
																				info,
																				thumbnail,
																				source,
																				author,
																				tag,
																				keyword,
																				attr,
																				content,
																				commend,
																				count,
																				gold,
																				color,
																				sort,
																				readlimit,
																				date
																		) 
														VALUES (
																				'$this->title',
																				'$this->nav',
																				'$this->info',
																				'$this->thumbnail',
																				'$this->source',
																				'$this->author',
																				'$this->tag',
																				'$this->keyword',
																				'$this->attr',
																				'$this->content',
																				'$this->commend',
																				'$this->count',
																				'$this->gold',
																				'$this->color',
																				'$this->sort',
																				'$this->readlimit',
																				NOW()
																		)";
            return parent::aud($sql);
        }


        //获取单一的文档内容
        public function getOneContent()
        {
            $sql = "SELECT 
											*
								FROM 
											cms_content
								WHERE
											id='$this->id'";
            return parent::one($sql);
        }


        //修改文档
        public function updateContent()
        {
            $sql = "UPDATE 
											cms_content 
								SET 
											title='$this->title',
											nav='$this->nav',
											info='$this->info',
											thumbnail='$this->thumbnail',
											source='$this->source',
											author='$this->author',
											tag='$this->tag',
											keyword='$this->keyword',
											attr='$this->attr',
											content='$this->content',
											commend='$this->commend',
											count='$this->count',
											gold='$this->gold',
											color='$this->color',
											sort='$this->sort',
											readlimit='$this->readlimit'
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }

        public function deleteContent()
        {
            $sql="DELETE FROM cms_content WHERE id='$this->id'  ";
            return parent::aud($sql);
        }


        //累计文档的点击量
        public function setContentCount()
        {
            $sql = "UPDATE 
											cms_content 
									SET 
											count=count+1
							WHERE 
											id='$this->id' 
								LIMIT 
											1";
            return parent::aud($sql);
        }



    }