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

        //拦截器(__set)
        public function __set($name, $value) {
            $this->$name =  $value;
        }

        //拦截器(__get)
        public function __get($name) {
            return $this->$name;
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
											c.date,
											c.info,
											c.thumbnail,
											c.count,
											n.nav_name, 
											attr
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


    }