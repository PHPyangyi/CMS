<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/5
     * Time: 21:13
     */

    class UserController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty,new UserModel());
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
                    Tool::alertBack('error');
            }
        }
        private function show ()
        {
            parent::page($this->model->getUserTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','会员列表');
            $object = $this->model->getAllUser();
            foreach ($object as $value) {
                switch ($value->state) {
                    case 0 :
                        $value->state = '被封杀的会员';
                        break;
                    case 1 :
                        $value->state = '待审核的会员';
                        break;
                    case 2 :
                        $value->state = '初级会员';
                        break;
                    case 3 :
                        $value->state = '中级会员';
                        break;
                    case 4 :
                        $value->state = '高级会员';
                        break;
                    case 5 :
                        $value->state = 'VIP会员';
                        break;
                }
            }
            $this->smarty->assign('AllUser',$object);
        }
        private function add ()
        {
            if (isset( $_POST['send'] )) {
                if (Validate::checkNull($_POST['user'])) Tool::alertBack('警告：用户名不得为空！');
                if (Validate::checkLength($_POST['user'],2,'min')) Tool::alertBack('警告：用户名长度不得小于两位！');
                if (Validate::checkLength($_POST['user'],20,'max')) Tool::alertBack('警告：用户名长度不得大于二十位！');
                if (Validate::checkLength($_POST['pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                if (Validate::checkEquals($_POST['pass'],$_POST['notpass'])) Tool::alertBack('警告：密码和确认密码不一致！');
                if (Validate::checkNull($_POST['email'])) Tool::alertBack('警告：电子邮件不得为空！');
                if (Validate::checkEmail($_POST['email'])) Tool::alertBack('警告：电子邮件格式不正确！');
                if (!Validate::checkNull($_POST['question']) && !Validate::checkNull($_POST['answer'])) {
                    $this->model->question = $_POST['question'];
                    $this->model->answer = $_POST['answer'];
                }
                $this->model->user = $_POST['user'];
                $this->model->pass = sha1($_POST['pass']);
                $this->model->email = $_POST['email'];
                $this->model->face = $_POST['face'];
                $this->model->state = $_POST['state'];
                if ($this->model->checkUser()) Tool::alertBack('警告：用户名重复！');
                if ($this->model->checkEmail()) Tool::alertBack('警告：邮件重复！');
                if ($this->model->addUser()) {
                    Tool::alertLocation('恭喜你，注册成功！','user.php?action=show');
                } else {
                    Tool::alertBack('很遗憾，注册失败！');
                }
            }



            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增会员');
            $this->smarty->assign('prev_url',PREV_URL);
            $this->smarty->assign('OptionFaceOne',range(1,9));
            $this->smarty->assign('OptionFaceTwo',range(10,24));
        }

        private function update ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['pass'])) {
                    $this->model->pass = $_POST['pass'];
                } else {
                    if (Validate::checkLength($_POST['pass'],6,'min')) Tool::alertBack('警告：密码不得小于六位！');
                    $this->model->pass = sha1($_POST['pass']);
                }
                if (Validate::checkNull($_POST['email'])) Tool::alertBack('警告：电子邮件不得为空！');
                if (Validate::checkEmail($_POST['email'])) Tool::alertBack('警告：电子邮件格式不正确！');
                if (!Validate::checkNull($_POST['question']) && !Validate::checkNull($_POST['answer'])) {
                    $this->model->question = $_POST['question'];
                    $this->model->answer = $_POST['answer'];
                }
                $this->model->id = $_POST['id'];
                $this->model->email = $_POST['email'];
                $this->model->face = $_POST['face'];
                $this->model->state = $_POST['state'];
                $this->model->updateUser() ? Tool::alertLocation('恭喜你，修改成功！',$_POST['prev_url']) : Tool::alertBack('很遗憾，修改失败！');
            }

            if ($_GET['id']) {
                $this->model->id = $_GET['id'];
                $user = $this->model->getOneUser();
                if ($user) {
                    $this->smarty->assign('update',true);
                    $this->smarty->assign('title','修改会员');
                    $this->smarty->assign('prev_url',PREV_URL);
                    $this->smarty->assign('id',$user->id);
                    $this->smarty->assign('user',$user->user);
                    $this->smarty->assign('email',$user->email);
                    $this->smarty->assign('answer',$user->answer);
                    $this->smarty->assign('facesrc',$user->face);
                    $this->smarty->assign('pass',$user->pass);
                    $this->face($user->face);
                    $this->question($user->question);
                    $this->state($user->state);
                } else {
                    Tool::alertBack('警告：不存在此会员！');
                }
            } else {
                Tool::alertBack('error');
            }
        }

        private function delete ()
        {
            if ($_GET['id']) {
                $this->model->id = $_GET['id'];
                $this->model->deleteUser() ? Tool::alertLocation('恭喜你，删除会员成功！', PREV_URL) : Tool::alertBack('很遗憾，删除会员失败！');
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }

        //state
        private function state($state)
        {
            $html='';
            $checked = '';
            $stateArr = array('被封杀的会员','待审核的会员','初级会员','中级会员','高级会员','VIP会员');
            foreach ($stateArr as $key=>$value) {
                if ($state == $key) $checked='checked="checked"';
                $html .= '<input type="radio" name="state" '.$checked.' value="'.$key.'" /> '.$value.' ';
                $checked = '';
            }
            $this->smarty->assign('state',$html);
        }

        //提问
        private function question($question)
        {
            $questionArr = array('您父亲的姓名？','您母亲的职业？','您配偶的性别？');
            $html='';
            $selected = '';
            foreach ($questionArr as $value) {
                if ($value == $question) $selected='selected="selected"';
                $html .= '<option '.$selected.' value="'.$value.'">'.$value.'</option>';
                $selected = '';
            }
            $this->smarty->assign('question',$html);
        }

        //face
        private function face ($face)
        {
            $one = range(1,9);
            $two = range(10,24);
            $html='';
            $selected = '';
            foreach ($one as $value) {
                if ('0'.$value.'.gif' == $face) $selected='selected="selected"';
                $html .= '<option '.$selected.' value="0'.$value.'.gif">0'.$value.'.gif</option>';
                $selected = '';
            }
            foreach ($two as $value) {
                if ($value.'.gif' == $face) $_selected='selected="selected"';
                $html .= '<option '.$selected.' value="'.$value.'.gif">'.$value.'.gif</option>';
                $selected = '';
            }
            $this->smarty->assign('face',$html);
        }

    }