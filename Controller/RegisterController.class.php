<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 16:40
     */

    class RegisterController extends Controller
    {
        public function __construct($smarty )
        {
            parent::__construct($smarty );
        }

        public function Action ()
        {
            switch ($_GET['action']) {
                case 'add':
                    $this->add();
                    break;
                case 'reg':
                    $this->reg();
                    break;
                case 'login':
                    $this->login();
                    break;
                case 'logout':
                    $this->logout();
                    break;
                default:
                    Tool::alertBack('error');
            }
        }



        private function reg ()
        {
            if (isset($_POST['send'])) {
                parent::__construct($this->smarty, new UserModel());
                if (Validate::checkNull($_POST['user'])) Tool::alertBack('警告：用户名不得为空！');
                if (Validate::checkLength($_POST['user'],2,'min')) Tool::alertBack('警告：用户名长度不得小于两位！');
                if (Validate::checkLength($_POST['user'],20,'max')) Tool::alertBack('警告：用户名长度不得大于二十位！');
                if (Validate::checkLength($_POST['pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                if (Validate::checkEquals($_POST['pass'],$_POST['notpass'])) Tool::alertBack('警告：密码和确认密码不一致！');
                if (Validate::checkNull($_POST['email'])) Tool::alertBack('警告：电子邮件不得为空！');
                if (Validate::checkEmail($_POST['email'])) Tool::alertBack('警告：电子邮件格式不正确！');
                if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('警告：验证码必须是四位！');
                if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('警告：验证码不正确！');
                if (!Validate::checkNull($_POST['question']) && !Validate::checkNull($_POST['answer'])) {
                    $this->model->question = $_POST['question'];
                    $this->model->answer = $_POST['answer'];
                }
                $this->model->user = $_POST['user'];
                $this->model->pass = sha1($_POST['pass']);
                $this->model->email = $_POST['email'];
                $this->model->face = $_POST['face'];
                if ($this->model->checkUser()) Tool::alertBack('警告：用户名重复！');
                if ($this->model->checkEmail()) Tool::alertBack('警告：邮件重复！');

                $this->model->addUser() ? Tool::alertLocation('恭喜你，注册成功！','register.php?action=login') : Tool::alertBack('很遗憾，注册失败！');

            }

            $this->smarty->assign('reg',true);
            $this->smarty->assign('OptionFaceOne',range(1,9));
            $this->smarty->assign('OptionFaceTwo',range(10,24));
        }





        private function login ()
        {
            if (isset($_POST['send'])) {
                parent::__construct($this->smarty, new UserModel());
                if (Validate::checkNull($_POST['user'])) Tool::alertBack('警告：用户名不得为空！');
                if (Validate::checkLength($_POST['user'],2,'min')) Tool::alertBack('警告：用户名长度不得小于两位！');
                if (Validate::checkLength($_POST['user'],20,'max')) Tool::alertBack('警告：用户名长度不得大于二十位！');
                if (Validate::checkLength($_POST['pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('警告：验证码必须是四位！');
                if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('警告：验证码不正确！');
                $this->model->user = $_POST['user'];
                $this->model->pass = sha1($_POST['pass']);

                if ($user=$this->model->checkLogin()) {


                    $this->model->id = $user->id;
                    $this->model->time = time();
                    $this->model->setLaterUser();


                    $cookie = new Cookie('user',$user->user,$_POST['time']);
                    $cookie->setCookie();
                    $cookie = new Cookie('face',$user->face,$_POST['time']);
                    $cookie->setCookie();


                    Tool::alertLocation(null,'./');
                } else {
                    Tool::alertBack('警告：用户名或密码错误！');
                }
            }
            $this->smarty->assign('login',true);

        }

        private function logout() {
            $cookie = new Cookie('user');
            $cookie->unCookie();
            Tool::alertLocation(null,'register.php?action=login');
        }

    }