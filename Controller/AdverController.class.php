<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 10:54
     */

    class AdverController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty,new AdverModel());
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
                case 'state' :
                    $this->state();
                    break;
                case 'text' :
                    $this->text();
                    break;
                case 'header' :
                    $this->header();
                    break;
                case 'sidebar' :
                    $this->sidebar();
                    break;
                default:
                    Tool::alertBack('非法操作！');
            }
        }
//sidebar
        private function sidebar() {
            $_object = $this->model->getNewSidebarAdver();

            $_js = "var sidebar = [];\r\n";

            $_i = 0;
            if ($_object) {
                foreach ($_object as $_value) {
                    $_i++;
                    $_js .= "sidebar[$_i] = {\r\n";
                    $_js .= 	"\t'title' : '$_value->title',\r\n";
                    $_js .= 	"\t'pic' : '$_value->thumbnail',\r\n";
                    $_js .= 	"\t'link' : '$_value->link'\r\n";
                    $_js .= "};\r\n";
                }
            }

            $_js .= "var i = Math.floor(Math.random()*$_i+1);\r\n";

            $_js .= "document.write('<a href=\"'+sidebar[i].link+'\" target=\"_blank\" title=\"'+sidebar[i].title+'\"><img border=\"0\" src=\"'+sidebar[i].pic+'\"></a>');";

            if (!file_put_contents('../js/sidebar_adver.js', $_js)) {
                Tool::alertBack('警告：侧栏广告生成出错！');
            }

            Tool::alertLocation('恭喜，侧栏广告生成成功！','?action=show');

        }


        //header
        private function header() {
            $_object = $this->model->getNewHeaderAdver();

            $_js = "var header = [];\r\n";

            $_i = 0;
            if ($_object) {
                foreach ($_object as $_value) {
                    $_i++;
                    $_js .= "header[$_i] = {\r\n";
                    $_js .= 	"\t'title' : '$_value->title',\r\n";
                    $_js .= 	"\t'pic' : '$_value->thumbnail',\r\n";
                    $_js .= 	"\t'link' : '$_value->link'\r\n";
                    $_js .= "};\r\n";
                }
            }

            $_js .= "var i = Math.floor(Math.random()*$_i+1);\r\n";

            $_js .= "document.write('<a href=\"'+header[i].link+'\" target=\"_blank\" title=\"'+header[i].title+'\"><img src=\"'+header[i].pic+'\"></a>');";

            if (!file_put_contents('../js/header_adver.js', $_js)) {
                Tool::alertBack('警告：头部广告生成出错！');
            }

            Tool::alertLocation('恭喜，头部广告生成成功！','?action=show');

        }

        //text
        private function text()
        {
            $_object = $this->model->getNewTextAdver();

            $_js = "var text = [];\r\n";

            $_i = 0;
            if ($_object) {
                foreach ($_object as $_value) {
                    $_i++;
                    $_js .= "text[$_i] = {\r\n";
                    $_js .= 	"\t'title' : '$_value->title',\r\n";
                    $_js .= 	"\t'link' : '$_value->link'\r\n";
                    $_js .= "};\r\n";
                }
            }


            $_js .= "var i = Math.floor(Math.random()*$_i+1);\r\n";
            $_js .= "document.write('<a href=\"'+text[i].link+'\" class=\"adv\" target=\"_blank\">'+text[i].title+'</a>');\r\n";

            if (!file_put_contents('../js/text_adver.js', $_js)) {
                Tool::alertBack('警告：文字广告生成出错！');
            }

            Tool::alertLocation('恭喜，文字广告生成成功！','?action=show');

        }

        private function show ()
        {

            if (empty($_GET['kind'])) {
                $this->model->kind = '1,2,3';
            } else {
                $this->model->kind = $_GET['kind'];
            }

            parent::page($this->model->getAdverTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','广告列表');
            $object = $this->model->getAllAdver();
            Tool::subStr($object,'link',20,'utf-8');
            if ($object) {
                foreach ($object as $value) {
                    switch ($value->type) {
                        case 1 :
                            $value->type = '文字广告';
                            break;
                        case 2 :
                            $value->type = '头部广告690x80';
                            break;
                        case 3 :
                            $value->type = '侧栏广告270x200';
                            break;
                    }
                    if (empty($value->state)) {
                        $value->state = '<span class="red">[否]</span> | <a href="adver.php?action=state&type=ok&id='.$value->id.'">确定</a>';
                    } else {
                        $value->state = '<span class="green">[是]</span> | <a href="adver.php?action=state&type=cancel&id='.$value->id.'">取消</a>';
                    }
                }
            }
            $this->smarty->assign('AllAdver',$object);
        }

        private function state()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                if (!$this->model->getOneAdver()) Tool::alertBack('警告：不存在此广告！');
                if ($_GET['type'] == 'ok') {
                    $this->model->setStateOK() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：设置轮播失败！');
                } elseif ($_GET['type'] == 'cancel') {
                    $this->model->setStateCancel() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：取消轮播失败！');
                } else {
                    Tool::alertBack('警告：非法操作！');
                }
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }


        private function update()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
                if (Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题长度不得小于两位！');
                if (Validate::checkLength($_POST['title'],20,'max')) Tool::alertBack('警告：标题长度不得大于二十位！');
                if (Validate::checkNull($_POST['link'])) Tool::alertBack('警告：链接不得为空！');
                if ($_POST['type'] == '2' || $_POST['type'] == '3') {
                    if (Validate::checkNull($_POST['thumbnail'])) Tool::alertBack('警告：广告图片不得为空！');
                }
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：描述长度不得大于两百位！');

                $this->model->id = $_POST['id'];
                $this->model->title = $_POST['title'];
                $this->model->type = $_POST['type'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->link = $_POST['link'];
                $this->model->info = $_POST['info'];
                $this->model->state = $_POST['state'];

                $this->model->updateAdver() ? Tool::alertLocation('恭喜，修改广告成功！',$_POST['prev_url']) : Tool::alertBack('很遗憾，修改广告失败！');


            }

            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $_adver = $this->model->getOneAdver();
                if (!$_adver) Tool::alertBack('警告：不存在此广告！');
                $this->smarty->assign('id',$_adver->id);
                $this->smarty->assign('titlec',$_adver->title);
                $this->smarty->assign('info',$_adver->info);
                $this->smarty->assign('link',$_adver->link);
                $this->smarty->assign('thumbnail',$_adver->thumbnail);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改广告');
                switch ($_adver->type) {
                    case 1 :
                        $this->smarty->assign('type1','checked="checked"');
                        $this->smarty->assign('pic','style="display:none"');
                        break;
                    case 2 :
                        $this->smarty->assign('type2','checked="checked"');
                        $this->smarty->assign('pic','style="display:block"');
                        $this->smarty->assign('up',"<input type=\"button\" value=\"上传头部广告690x80\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=690x80','upfile','400','100')\" />");
                        break;
                    case 3 :
                        $this->smarty->assign('type3','checked="checked"');
                        $this->smarty->assign('pic','style="display:block"');
                        $this->smarty->assign('up',"<input type=\"button\" value=\"上传侧栏广告270x200\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=270x200','upfile','400','100')\" />");
                        break;
                }
                if (empty($_adver->state)) {
                    $this->smarty->assign('right_state','checked="checked"');
                } else {
                    $this->smarty->assign('left_state','checked="checked"');
                }
            } else {
                Tool::alertBack('非法操作！');
            }
        }

        private function add ()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
                if (Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题长度不得小于两位！');
                if (Validate::checkLength($_POST['title'],20,'max')) Tool::alertBack('警告：标题长度不得大于二十位！');
                if (Validate::checkNull($_POST['link'])) Tool::alertBack('警告：链接不得为空！');
                if ($_POST['type'] == '2' || $_POST['type'] == '3') {
                    if (Validate::checkNull($_POST['thumbnail'])) Tool::alertBack('警告：广告图片不得为空！');
                }
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：描述长度不得大于两百位！');
                $this->model->title = $_POST['title'];
                $this->model->type = $_POST['type'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->link = $_POST['link'];
                $this->model->info = $_POST['info'];
                $this->model->addAdver() ? Tool::alertLocation('恭喜，新增广告成功！','?action=show') : Tool::alertBack('很遗憾，新增广告失败！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增广告');
            $this->smarty->assign('prev_url',PREV_URL);
        }

        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteAdver() ? Tool::alertLocation('恭喜你，删除广告成功！', PREV_URL) : Tool::alertBack('很遗憾，删除广告失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

    }