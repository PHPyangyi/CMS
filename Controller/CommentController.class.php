<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 20:05
     */

    class CommentController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new CommentModel());
        }

        public function Action()
        {
            switch ($_GET['action']) {
                case 'show' :
                    $this->show();
                    break;
                case 'state' :
                    $this->state();
                    break;
                case 'states' :
                    $this->states();
                    break;
                case 'delete' :
                    $this->delete();
                    break;
                default:
                    Tool::alertBack('非法操作！');
            }
        }


        private function show() {
            parent::page($this->model->getCommentListTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','评论列表');
            $object = $this->model->getCommentList();
            Tool::NewSubStr($object,'content',30,'utf-8');
            if ($object) {
                foreach ($object as $value) {
                    if (empty($value->state)) {
                        $value->state = '<span class="red">[未审核]</span> | <a href="comment.php?action=state&type=ok&id='.$value->id.'">通过</a>';
                    } else {
                        $value->state = '<span class="green">[已审核]</span> | <a href="comment.php?action=state&type=cancel&id='.$value->id.'">取消</a>';
                    }
                }
            }
            $this->smarty->assign('CommentList',$object);
        }

        private function state()
        {
            if (isset($_GET['id'])) {
                if (isset($_GET['id'])) {
                    $this->model->id = $_GET['id'];
                    if (!$this->model->getOneComment()) Tool::alertBack('警告：不存在此评论！');
                    if ($_GET['type'] == 'ok') {
                        $this->model->setStateOK() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：审核失败！');
                    } elseif ($_GET['type'] == 'cancel') {
                        $this->model->setStateCancel() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：取消审核失败！');
                    } else {
                        Tool::alertBack('警告：非法操作！');
                    }
                } else {
                    Tool::alertBack('警告：非法操作！');
                }
            }
        }



//        private function states() {
//            if (isset($_POST['send'])) {
//                $this->model->states = $_POST['states'];
//                if ($this->model->setStates()) Tool::alertLocation(null, PREV_URL);
//            }
//        }



        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteComment() ? Tool::alertLocation('恭喜你，删除评论成功！', PREV_URL) : Tool::alertBack('很遗憾，删除评论失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

    }