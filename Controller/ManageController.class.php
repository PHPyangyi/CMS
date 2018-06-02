<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 11:47
     */

    class ManageController extends Controller
    {
        public function __construct($smarty)
         {
            parent::__construct($smarty,new ManageModel());

            $this->Action();
        }

        private function Action ()
        {
            switch ($_GET['action']) {
                case 'list':
                     $this->show();
                    break;
                case 'add':
                     $this->add();
                    break;
                case 'update':
                    $this->update();
                    break;
                case 'delete':
                    $this->delete();
                    break;
                default:
                    echo 'error';
            }
            $this->smarty->display('manage.html');
        }

        private function show ()
        {
            $this->smarty->assign('list',true);
            $this->smarty->assign('title','管理员列表');
            $this->smarty->assign('AllManage',   $this->model->getManage());
        }

        private function add ()
        {
            if (isset($_POST['send'])) {
                $this->model->admin_user = $_POST['admin_user'];
                $this->model->admin_pass = sha1($_POST['admin_pass']);
                $this->model->level = $_POST['level'];
                if ( $this->model->addManage()) {
                    Tool::alertLocation('恭喜你，新增管理员成功！','manage.php?action=list');
                } else {
                    Tool::alertBack('很遗憾，新增管理员失败！');
                }
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增管理员');
        }

        private function update ()
        {
            if (isset($_POST['send'])) {
                $this->model->id = $_POST['id'];
                $this->model->admin_pass = sha1($_POST['admin_pass']);
                $this->model->level = $_POST['level'];
                $this->model->updateManage() ? Tool::alertLocation('恭喜你，修改管理员成功！', 'manage.php?action=list') : Tool::alertBack('很遗憾，修改管理员失败！');
            }

            if (isset($_GET['id'])) {
                $this->model->id=$_GET['id'];
                is_object( $this->model->getOneManage()) ? true : Tool::alertBack('管理员传值的id有误！');
                $getOneManage= $this->model->getOneManage();
                $this->smarty->assign('id',$getOneManage->id);
                $this->smarty->assign('level',$getOneManage->level);
                $this->smarty->assign('admin_user',$getOneManage->admin_user);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改管理员');

            }
        }
        private function delete ()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteManage() ? Tool::alertLocation('恭喜你，删除管理员成功！', 'manage.php?action=list') : Tool::alertBack('很遗憾，删除管理员失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }
    }