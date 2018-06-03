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
        }

        public function Action ()
        {
            switch ($_GET['action']) {
                case 'show':
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

        }





        private function show ()
        {
//            $page=new Page($this->model->getManageTotal(),PAGE_SIZE);
//            $this->model->limit = $page->limit;

            parent::page($this->model->getManageTotal());

            $this->smarty->assign('show',true);
            $this->smarty->assign('title','管理员列表');
            $this->smarty->assign('AllManage',   $this->model->getManage());
            //page
//            $this->smarty->assign('page',$page->showPage());
        }

        private function add ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['admin_user'])) Tool::alertBack('警告：用户名不得为空！');
                if (Validate::checkLength($_POST['admin_user'],2,'min')) Tool::alertBack('警告：用户名不得小于两位！');
                if (Validate::checkLength($_POST['admin_user'],20,'max')) Tool::alertBack('警告：用户名不得大于20位！');
                if (Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('警告：密码不得为空！');
                if (Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                if (Validate::checkEquals($_POST['admin_pass'], $_POST['admin_notpass'])) Tool::alertBack('警告：密码和密码确认必须一致！');
                $this->model->admin_user = $_POST['admin_user'];

                if ($this->model->getOneManage()) Tool::alertBack('警告：此用户已被占用！');

                $this->model->admin_pass = sha1($_POST['admin_pass']);
                $this->model->level = $_POST['level'];
                if ( $this->model->addManage()) {
                    Tool::alertLocation('恭喜你，新增管理员成功！','manage.php?action=show');
                } else {
                    Tool::alertBack('很遗憾，新增管理员失败！');
                }
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增管理员');
            $this->smarty->assign('prev_url',PREV_URL);
            $levels=new LevelModel();
            $this->smarty->assign('AllLevel',   $levels->getAllLevel());
        }

        private function update ()
        {
            if (isset($_POST['send'])) {
                $this->model->id = $_POST['id'];
                if (trim($_POST['admin_pass']) == '') {
                    $this->model->admin_pass = $_POST['pass'];
                } else {
                    if (Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                    $this->model->admin_pass = sha1($_POST['admin_pass']);
                }
                $this->model->level = $_POST['level'];
                $this->model->updateManage() ? Tool::alertLocation('恭喜你，修改管理员成功！', 'manage.php?action=show') : Tool::alertBack('很遗憾，修改管理员失败！');
            }

            if (isset($_GET['id'])) {
                $this->model->id=$_GET['id'];
                is_object( $this->model->getOneManage()) ? true : Tool::alertBack('管理员传值的id有误！');
                $getOneManage= $this->model->getOneManage();
                $this->smarty->assign('id',$getOneManage->id);
                $this->smarty->assign('level',$getOneManage->level);
                $this->smarty->assign('admin_user',$getOneManage->admin_user);
                $this->smarty->assign('admin_pass',$getOneManage->admin_pass);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改管理员');
                $this->smarty->assign('prev_url',PREV_URL);
                $levels=new LevelModel();
                $this->smarty->assign('AllLevel',   $levels->getAllLevel());
            } else {
                Tool::alertBack('非法操作！');
            }
        }
        private function delete ()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteManage() ? Tool::alertLocation('恭喜你，删除管理员成功！', 'manage.php?action=show') : Tool::alertBack('很遗憾，删除管理员失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }
    }