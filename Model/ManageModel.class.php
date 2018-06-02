<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/1
     * Time: 20:47
     */

    namespace CMS\Model;


    class ManageModel
    {
        private $smarty;
        private $admin_user;
        private $admin_pass;
        private $level;
        private $id;

        public function __construct($smarty)
        {
            $this->smarty=$smarty;
            $this->Action();
        }

        private function Action ()
        {
            switch ($_GET['action']) {
                case 'list':
                    $this->smarty->assign('list',true);
                    $this->smarty->assign('title','管理员列表');
                    $this->smarty->assign('AllManage',$this->getManage());
                    break;
                case 'add':
                    if (isset($_POST['send'])) {
                        $this->admin_user = $_POST['admin_user'];
                        $this->admin_pass = sha1($_POST['admin_pass']);
                        $this->level = $_POST['level'];
                        if ($this->addManage()) {
                            \Tool::alertLocation('恭喜你，新增管理员成功！','manage.php?action=list');
                        } else {
                            \Tool::alertBack('很遗憾，新增管理员失败！');
                        }
                    }
                    $this->smarty->assign('add',true);
                    $this->smarty->assign('title','新增管理员');
                    break;
                case 'update':

                    if (isset($_POST['send'])) {
                        $this->id = $_POST['id'];
                        $this->admin_pass = sha1($_POST['admin_pass']);
                        $this->level = $_POST['level'];
                        $this->updateManage() ? \Tool::alertLocation('恭喜你，修改管理员成功！', 'manage.php?action=list') : \Tool::alertBack('很遗憾，修改管理员失败！');
                    }

                    if (isset($_GET['id'])) {
                        $this->id=$_GET['id'];
                        is_object($this->getOneManage()) ? true : \Tool::alertBack('管理员传值的id有误！');
                        $getOneManage=$this->getOneManage();
                        $this->smarty->assign('id',$getOneManage->id);
                        $this->smarty->assign('level',$getOneManage->level);
                        $this->smarty->assign('admin_user',$getOneManage->admin_user);
                        $this->smarty->assign('update',true);
                        $this->smarty->assign('title','修改管理员');

                    }
                    break;
                case 'delete':
                    if (isset($_GET['id'])) {
                        $this->id = $_GET['id'];
                        $this->deleteManage() ? \Tool::alertLocation('恭喜你，删除管理员成功！', 'manage.php?action=list') : \Tool::alertBack('很遗憾，删除管理员失败！');
                    } else {
                        \Tool::alertBack('非法操作！');
                    }
                    break;
                default:
                    echo 'error';
            }
            $this->smarty->display('manage.html');
        }



        public function getOneManage ()
        {
            $db = \DB::getDB();
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
            $result = $db->query($sql);
            $objects = $result->fetch_object();
            return $objects;
        }


        public function getManage ()
        {
            $db =  \DB::getDB();
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

            $result = $db->query($sql);
            $html = array();
            while ($objects = $result->fetch_object()) {
                $html[] = $objects;
            }

            return $html;
        }
        //add
        public function addManage ()
        {
            $db=\DB::getDB();
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
            $db->query($sql);
            $affectedRows = $db->affected_rows;
            return $affectedRows;
        }

        //update
        public function updateManage ()
        {
            $db = \DB::getDB();
            $sql = "UPDATE 
										cms_manage 
								  SET 
										admin_pass='$this->admin_pass',
										level='$this->level' 
							WHERE 
										id='$this->id' 
								 LIMIT 
										1";
            $db->query($sql);
            $affectedRows = $db->affected_rows;

           return $affectedRows;
        }

        //delete
        public function deleteManage ()
        {
            $db=\DB::getDB();
            $sql="DELETE FROM cms_manage WHERE id =$this->id  LIMIT 1 ";
            $db->query($sql);
            $affectedRows = $db->affected_rows;
            return $affectedRows;
        }

    }