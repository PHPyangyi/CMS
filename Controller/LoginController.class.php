<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 21:25
     */

    class LoginController extends Controller
    {

        //构造方法，初始化
        public function __construct(&$smarty) {
            parent::__construct($smarty, new ManageModel());
        }

        public function Action() {
            switch (@$_GET['action']) {
                case 'login' :
                    $this->login();
                    break;
                case 'logout' :
                    $this->logout();
                    break;
            }
        }

        private function login ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('警告：验证码必须是四位！');
                if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('警告：验证码不正确！');
                if (Validate::checkNull($_POST['admin_user'])) Tool::alertBack('警告：用户名不得为空！');
                if (Validate::checkLength($_POST['admin_user'],2,'min')) Tool::alertBack('警告：用户名不得小于两位！');
                if (Validate::checkLength($_POST['admin_user'],20,'max')) Tool::alertBack('警告：用户名不得大于20位！');
                if (Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('警告：密码不得为空！');
                if (Validate::checkLength($_POST['admin_pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                $this->model->admin_user = $_POST['admin_user'];
                $this->model->admin_pass = sha1($_POST['admin_pass']);
                $this->model->last_ip = $_SERVER["REMOTE_ADDR"];
                $login = $this->model->getLoginManage();
                if ($login) {
                    $_SESSION['admin']['admin_user'] = $login->admin_user;
                    $_SESSION['admin']['level_name'] = $login->level_name;
                    $this->model->setLoginCount ();
                    Tool::alertLocation(null, 'admin.php');
                } else {
                    Tool::alertBack('警告：用户名或密码错误！');
                }
            }
        }



        //logout
        private function logout() {
            Tool::unSession();
            Tool::alertLocation(null, 'admin_login.php');
        }
    }