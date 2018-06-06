<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 20:58
     */

    class RotatainController extends Controller
    {
        public function __construct($smarty )
        {
            parent::__construct($smarty,new RotatainModel());
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
                case 'state' :
                    $this->state();
                    break;
                case 'delete' :
                    $this->delete();
                    break;
                default:
                    Tool::alertBack('非法操作！');
            }
        }

        private function show ()
        {
            parent::page($this->model->getRotatainTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','轮播器列表');
            $object = $this->model->getAllRotatain();
            Tool::NewSubStr($object,'title',20,'utf-8');
            Tool::NewSubStr($object,'link',20,'utf-8');
            if ($object) {
                foreach ($object as $value) {
                    if (empty($value->state)) {
                        $value->state = '<span class="red">[否]</span> | <a href="rotatain.php?action=state&type=ok&id='.$value->id.'">确定</a>';
                    } else {
                        $value->state = '<span class="green">[是]</span> | <a href="rotatain.php?action=state&type=cancel&id='.$value->id.'">取消</a>';
                    }
                }
            }
            $this->smarty->assign('AllRotatain',$object);
        }

        private function state()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                if (!$this->model->getOneRotatain()) Tool::alertBack('警告：不存在此轮播！');
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

        private function add()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['thumbnail'])) Tool::alertBack('警告：轮播图不得为空！');
                if (Validate::checkNull($_POST['link'])) Tool::alertBack('警告：链接不得为空！');
                if (Validate::checkLength($_POST['title'],20,'max')) Tool::alertBack('警告：标题不得大于20位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：简介不得大于200位！');
                $this->model->link = $_POST['link'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->info = $_POST['info'];
                $this->model->title = $_POST['title'];
                $this->model->addRotatain() ? Tool::alertLocation('恭喜你，轮播器新增成功！','?action=show') : Tool::alertBack('很遗憾，轮播器新增失败');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增轮播器');
            $this->smarty->assign('prev_url',PREV_URL);
        }


        //update
        private function update()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['thumbnail'])) Tool::alertBack('警告：轮播图不得为空！');
                if (Validate::checkNull($_POST['link'])) Tool::alertBack('警告：链接不得为空！');
                if (Validate::checkLength($_POST['title'],20,'max')) Tool::alertBack('警告：标题不得大于20位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：简介不得大于200位！');
                $this->model->id = $_POST['id'];
                $this->model->link = $_POST['link'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->info = $_POST['info'];
                $this->model->title = $_POST['title'];
                $this->model->state = $_POST['state'];
                $this->model->updateRotatain() ? Tool::alertLocation('恭喜你，轮播器修改成功！',$_POST['prev_url']) : Tool::alertBack('很遗憾，轮播器修改失败');
            }


            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $rotatain = $this->model->getOneRotatain();
                if (!$rotatain) Tool::alertBack('警告：不存在此轮播');
                $this->smarty->assign('id',$rotatain->id);
                $this->smarty->assign('titlec',$rotatain->title);
                $this->smarty->assign('thumbnail',$rotatain->thumbnail);
                $this->smarty->assign('info',$rotatain->info);
                $this->smarty->assign('link',$rotatain->link);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改轮播器');
                if (empty($rotatain->state)) {
                    $this->smarty->assign('right_state','checked="checked"');
                } else {
                    $this->smarty->assign('left_state','checked="checked"');
                }
            } else {
                Tool::alertBack('非法操作！');
            }
        }

        //delete
        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteRotatain() ? Tool::alertLocation('恭喜你，删除轮播成功！', PREV_URL) : Tool::alertBack('很遗憾，删除轮播失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }


    }