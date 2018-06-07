<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:38
     */

    class FriendLinkController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty,new LinkModel());
        }

        public function Action()
        {
            switch ($_GET['action']) {
                case 'frontshow' :
                    $this->frontshow();
                    break;
                case 'frontadd' :
                    $this->frontadd();
                    break;
                default:
                    Tool::alertBack('非法操作！');
            }
        }

        public function index()
        {
            $this->text();
            $this->logo();
        }

        private function text()
        {
            $this->smarty->assign('text',$this->model->getTwentyTextLink());
        }


        private function logo()
        {
            $this->smarty->assign('logo',$this->model->getNineLogoLink());
        }

        private function frontshow()
        {
            $this->smarty->assign('frontshow',true);
            $this->smarty->assign('Alltext',$this->model->getAllTextLink());
            $this->smarty->assign('Alllogo',$this->model->getAllLogoLink());
        }

        private function frontadd()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['webname'])) Tool::alertBack('警告：网站名称不得为空！');
                if (Validate::checkLength($_POST['webname'],20,'max')) Tool::alertBack('警告：网站名称不得大于二十位！');
                if (Validate::checkNull($_POST['weburl'])) Tool::alertBack('警告：网站地址不得为空！');
                if (Validate::checkLength($_POST['webname'],100,'max')) Tool::alertBack('警告：网站地址不得大于一百位！');
                if ($_POST['type'] == 2) {
                    if (Validate::checkNull($_POST['logourl'])) Tool::alertBack('警告：Logo地址不得为空！');
                    if (Validate::checkLength($_POST['logourl'],100,'max')) Tool::alertBack('警告：Logo地址不得大于一百位！');
                }
                if (Validate::checkLength($_POST['user'],20,'max')) Tool::alertBack('警告：站长名不得大于二十位！');
                if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('警告：验证码必须是四位！');
                if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('警告：验证码不正确！');

                $this->model->webname = $_POST['webname'];
                $this->model->weburl = $_POST['weburl'];
                $this->model->logourl = $_POST['logourl'];
                $this->model->user = $_POST['user'];
                $this->model->type = $_POST['type'];
                $this->model->state = $_POST['state'];
                $this->model->addLink() ? Tool::alertClose('恭喜，申请友情链接成功！请等待管理员审核！') : Tool::alertBack('很遗憾，申请友情链接失败，请重试！');
            }
            $this->smarty->assign('frontadd',true);
        }

    }