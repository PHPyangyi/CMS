<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 12:42
     */

    class VoteController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new VoteModel());
        }

        public function Action() {
            switch ($_GET['action']) {
                case 'show' :
                    $this->show();
                    break;
                case 'showchild' :
                    $this->showchild();
                    break;
                case 'add' :
                    $this->add();
                    break;
                case 'addchild' :
                    $this->addchild();
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
                default:
                    Tool::alertBack('非法操作！');
            }
        }


        private function show()
        {
            parent::page($this->model->getVoteTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','投票主题列表');
            $object = $this->model->getAllVote();
            if ($object) {
                foreach ($object as $value) {
                    if (empty($value->state)) {
                        $value->state = '<span class="red">[否]</span> | <a href="vote.php?action=state&type=ok&id='.$value->id.'">确定</a>';
                    } else {
                        $value->state = '<span class="green">[是]</span>';
                    }
                }
            }
            $this->smarty->assign('AllVote',$object);
        }


        private function state()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                if (!$this->model->getOneVote()) Tool::alertBack('警告：不存在此投票！');
                if ($_GET['type'] == 'ok') {
                    $this->model->setStateCancel();
                    $this->model->setStateOK() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：设置投票失败！');
                } else {
                    Tool::alertBack('警告：非法操作！');
                }
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }

        private function showchild()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $_vote = $this->model->getOneVote();
                if (!$_vote) Tool::alertBack('警告：不存在此主题！');
                parent::page($this->model->getChildVoteTotal());
                $this->smarty->assign('id',$_vote->id);
                $this->smarty->assign('showchild',true);
                $this->smarty->assign('titlec',$_vote->title);
                $this->smarty->assign('title','投票项目列表');
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('AllChildVote',$this->model->getAllChildVote());
            }
        }

        private function add()
        {
            if (isset($_POST['send'])) {
                $this->setAdd();
                $this->model->addVote() ? Tool::alertLocation('恭喜，新增投票主题成功！','?action=show') : Tool::alertBack('很遗憾，新增投票主题失败！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增投票主题');
            $this->smarty->assign('prev_url',PREV_URL);
        }

        private function addchild()
        {
            if (isset($_POST['send'])) {
                $this->model->vid = $_POST['id'];
                $this->setAdd();
                $this->model->addVote() ? Tool::alertLocation('恭喜，新增投票项目成功！','?action=show') : Tool::alertBack('很遗憾，新增投票项目失败！');
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $_vote = $this->model->getOneVote();
                if (!$_vote) Tool::alertBack('警告：不存在此主题！');
                $this->smarty->assign('id',$_vote->id);
                $this->smarty->assign('titlec',$_vote->title);
                $this->smarty->assign('addchild',true);
                $this->smarty->assign('title','新增投票项目');
                $this->smarty->assign('prev_url',PREV_URL);
            } else {
                Tool::alertBack('非法操作！');
            }
        }

        private function setAdd()
        {
            if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
            if (Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题不得小于两位！');
            if (Validate::checkLength($_POST['title'],20,'max')) Tool::alertBack('警告：标题不得大于20位！');
            if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：描述不得大于200位！');
            $this->model->title = $_POST['title'];
            $this->model->info = $_POST['info'];
        }

        private function update()
        {
            if (isset($_POST['send'])) {
                $this->model->id = $_GET['id'];
                $this->setAdd();
                $this->model->updateVote() ? Tool::alertLocation('恭喜，投票修改成功！',$_POST['prev_url']) : Tool::alertBack('警告：投票修改失败！');
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $_vote = $this->model->getOneVote();
                if (!$_vote) Tool::alertBack('警告：不存在此主题！');
                $this->smarty->assign('id',$_vote->id);
                $this->smarty->assign('titlec',$_vote->title);
                $this->smarty->assign('info',$_vote->info);
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改投票主题');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

        //delete
        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteVote() ? Tool::alertLocation('恭喜你，删除投票成功！', PREV_URL) : Tool::alertBack('很遗憾，删除投票失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }
    }