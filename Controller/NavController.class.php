<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 17:33
     */

    class NavController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty, new NavModel());
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
                case 'addchild':
                    $this->addchild();
                    break;
                case 'showchild':
                    $this->showchild();
                    break;
                case 'sort' :
                    $this->sort();
                    break;
                default:
                    echo 'error';
            }

        }

        //前台
        public function showfront() {
            $this->smarty->assign('FrontNav',$this->model->getFrontNav());
        }

        private function sort() {
            if (isset($_POST['send'])) {
                $this->model->sort = $_POST['sort'];
                if ($this->model->setNavSort()) Tool::alertLocation(null, PREV_URL);
            }
        }


        private function show ()
        {
            parent::page($this->model->getNavTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','导航列表');
            $this->smarty->assign('AllNav',$this->model->getAllNav());
        }

        private function add ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['nav_name'])) Tool::alertBack('警告：导航名称不得为空！');
                if (Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('警告：导航名称不得小于两位！');
                if (Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('警告：导航名称不得大于20位！');
                if (Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('警告：描述不得大于200位！');
                $this->model->nav_name = $_POST['nav_name'];
                $this->model->nav_info = $_POST['nav_info'];

                $this->model->pid = $_POST['pid'];
                $returnurl = $this->model->pid ? 'nav.php?action=showchild&id='.$this->model->pid : 'nav.php?action=show';

                if ($this->model->getOneNav()) Tool::alertBack('警告：此导航名称已有！');
                $this->model->addNav() ? Tool::alertLocation('恭喜你，新增导航成功！',$returnurl) : Tool::alertBack('很遗憾，新增导航失败！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增导航');
            $this->smarty->assign('prev_url',PREV_URL);
        }

        private function update ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['nav_name'])) Tool::alertBack('警告：导航名称不得为空！');
                if (Validate::checkLength($_POST['nav_name'],2,'min')) Tool::alertBack('警告：导航名称不得小于两位！');
                if (Validate::checkLength($_POST['nav_name'],20,'max')) Tool::alertBack('警告：导航名称不得大于20位！');
                if (Validate::checkLength($_POST['nav_info'],200,'max')) Tool::alertBack('警告：描述不得大于200位！');
                $this->model->id = $_POST['id'];
                $this->model->nav_name = $_POST['nav_name'];
                $this->model->nav_info = $_POST['nav_info'];
                $this->model->updateNav() ? Tool::alertLocation('恭喜你，修改导航成功！', $_POST['prev_url']) : Tool::alertBack('很遗憾，修改导航失败！');
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $nav = $this->model->getOneNav();
                is_object($nav) ? true : Tool::alertBack('导航传值的id有误！');
                $this->smarty->assign('id',$nav->id);
                $this->smarty->assign('nav_name',$nav->nav_name);
                $this->smarty->assign('nav_info',$nav->nav_info);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改导航');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

        private function delete ()
        {
            if (isset($_GET['id'])) {
                $this->model->id=$_GET['id'];
                $this->model->deleteNav() ? Tool::alertLocation('恭喜你，删除导航成功！', PREV_URL) : Tool::alertBack('很遗憾，删除导航失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }



        //child

        private function showchild ()
        {
            if (isset( $_GET['id'])) {
                $this->model->id=$_GET['id'];
                $nav = $this->model->getOneNav();
                is_object($nav) ? true : Tool::alertBack('导航传值的id有误！');
                parent::page($this->model->getNavChildTotal());
                $this->smarty->assign('id',$nav->id);
                $this->smarty->assign('showchild',true);
                $this->smarty->assign('title','子导航列表');
                $this->smarty->assign('prev_name',$nav->nav_name);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('AllChildNav',$this->model->getAllChildNav());
            }
        }

        private function addchild ()
        {
            if (isset($_POST['send'])) {
                $this->add();
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $nav = $this->model->getOneNav();
                is_object($nav) ? true : Tool::alertBack('导航传值的id有误！');
                $this->smarty->assign('id',$nav->id);
                $this->smarty->assign('addchild',true);
                $this->smarty->assign('title','新增子导航');
                $this->smarty->assign('prev_name',$nav->nav_name);
                $this->smarty->assign('prev_url',PREV_URL);
            }
        }




    }