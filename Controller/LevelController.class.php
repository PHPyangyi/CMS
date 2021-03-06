<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/2
     * Time: 19:00
     */

    class LevelController extends Controller
    {
        public function __construct($smarty)
        {
            Validate::checksession();
            parent::__construct($smarty,new LevelModel());
            $this->Action();
        }
        private function Action ()
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
            $this->smarty->display('level.html');
        }

        private function show ()
        {
//            $page=new Page($this->model->getLevelTotal(),PAGE_SIZE);
//            $this->model->limit = $page->limit;

            parent::page($this->model->getLevelTotal());

            $this->smarty->assign('show',true);
            $this->smarty->assign('title','管理员列表');
            $this->smarty->assign('AllLevel',   $this->model->getAllLimitLevel());

            //page
         //   $this->smarty->assign('page',$page->showPage());
        }

        private function add ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['level_name'])) Tool::alertBack('警告：等级名称不得为空！');
                if (Validate::checkLength($_POST['level_name'],2,'min')) Tool::alertBack('警告：等级名称不得小于两位！');
                if (Validate::checkLength($_POST['level_name'],20,'max')) Tool::alertBack('警告：等级名称不得大于20位！');
                if (Validate::checkLength($_POST['level_info'],200,'max')) Tool::alertBack('警告：等级描述不得大于200位！');
                $this->model->level_name = $_POST['level_name'];

                if ($this->model->getOneLevel()) Tool::alertBack('警告：此等级名称已有！');

                $this->model->level_info = $_POST['level_info'];
                $this->model->premission = implode(',',$_POST['premission']);
                $this->model->addLevel() ? Tool::alertLocation('恭喜你，新增等级成功！','level.php?action=show') : Tool::alertBack('很遗憾，新增等级失败！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增管理员');
            $this->smarty->assign('prev_url',PREV_URL);

            $premission = new PremissionModel();
            $this->smarty->assign('AllPremission',$premission->getAllPremission());
        }

        private function update ()
        {

            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['level_name'])) Tool::alertBack('警告：等级名称不得为空！');
                if (Validate::checkLength($_POST['level_name'],2,'min')) Tool::alertBack('警告：等级名称不得小于两位！');
                if (Validate::checkLength($_POST['level_name'],20,'max')) Tool::alertBack('警告：等级名称不得大于20位！');
                if (Validate::checkLength($_POST['level_info'],200,'max')) Tool::alertBack('警告：等级描述不得大于200位！');
                $this->model->id = $_POST['id'];
                $this->model->level_name = $_POST['level_name'];
                $this->model->level_info = $_POST['level_info'];
             //   if ($this->model->getOneLevel()) Tool::alertBack('警告：此等级名称已有！');
                $this->model->premission = implode(',',$_POST['premission']);

                print_r($this->model->premission);



                $this->model->updateLevel() ? Tool::alertLocation('恭喜你，修改等级成功！', 'level.php?action=show') : Tool::alertBack('很遗憾，修改等级失败！');
            }

            if (isset($_GET['id'])) {

                $_premission = new PremissionModel();
                $this->smarty->assign('AllPremission',$_premission->getAllPremission());

                $this->model->id = $_GET['id'];
                is_object($this->model->getOneLevel()) ? true : Tool::alertBack('等级传值的id有误！');
                $level=$this->model->getOneLevel();
                $this->smarty->assign('id', $level->id);
                $this->smarty->assign('level_name', $level->level_name);
                $this->smarty->assign('level_info', $level->level_info);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改等级');
            } else {
                Tool::alertBack('非法操作！');
            }

        }
        private function delete ()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];

                $this->model->id = $_GET['id'];
                $manage = new ManageModel();
                $manage->level = $this->model->id;
                if ($manage->getOneManage()) Tool::alertBack('警告：此等级已有管理员使用！无法删除！请先删除相关用户！');

                $this->model->deleteLevel() ? Tool::alertLocation('恭喜你，删除管理员成功！', 'level.php?action=show') : Tool::alertBack('很遗憾，删除管理员失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }


    }