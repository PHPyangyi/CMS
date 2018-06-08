<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/8
     * Time: 9:33
     */

    class PremissionController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty,new PremissionModel());
        }

        public function Action ()
        {
            switch ($_GET['action']) {
                case 'show' :
                    $this->show();
                    break;
                case 'add' :
                    $this->add();
                    break;
                case 'update' :
                    $this->update();
                    break;
                case 'delete' :
                    $this->delete();
                    break;
                default:
                    Tool::alertBack('非法操作！');
            }
        }
        private function show()
        {
            parent::page($this->model->getPremissionTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','权限列表');
            $this->smarty->assign('AllPremission',$this->model->getAllLimitPremission());
        }


        private function add()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['name'])) Tool::alertBack('警告：权限名称不得为空！');
                if (Validate::checkLength($_POST['name'],2,'min')) Tool::alertBack('警告：权限名称不得小于两位！');
                if (Validate::checkLength($_POST['name'],100,'max')) Tool::alertBack('警告：权限名称不得大于100位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：权限描述不得大于200位！');
                $this->model->name = $_POST['name'];
                if ($this->model->getOnePremission()) Tool::alertBack('警告：此权限名称已有！');
                $this->model->info = $_POST['info'];
                $this->model->addPremission() ? Tool::alertLocation('恭喜你，新增权限成功！','?action=show') : Tool::alertBack('很遗憾，新增权限失败！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增权限');
            $this->smarty->assign('prev_url',PREV_URL);
        }

        private function update()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['name'])) Tool::alertBack('警告：权限名称不得为空！');
                if (Validate::checkLength($_POST['name'],2,'min')) Tool::alertBack('警告：权限名称不得小于两位！');
                if (Validate::checkLength($_POST['name'],100,'max')) Tool::alertBack('警告：权限名称不得大于100位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：权限描述不得大于200位！');
                $this->model->id = $_POST['id'];
                $this->model->name = $_POST['name'];
                $this->model->info = $_POST['info'];
                $this->model->updatePremission() ? Tool::alertLocation('恭喜你，修改权限成功！', $_POST['prev_url']) : Tool::alertBack('很遗憾，修改权限失败！');
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $_premission = $this->model->getOnePremission();
                if (!$_premission) Tool::alertBack('警告：不存在此权限！');
                $this->smarty->assign('id',$_premission->id);
                $this->smarty->assign('name',$_premission->name);
                $this->smarty->assign('info',$_premission->info);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改权限');
            } else {
                Tool::alertBack('非法操作！');
            }
        }


        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deletePremission() ? Tool::alertLocation('恭喜你，删除权限成功！', PREV_URL) : Tool::alertBack('很遗憾，删除权限失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

    }