<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/6
     * Time: 8:48
     */

    class FeedbackController extends Controller
    {
        public function __construct($smarty)
        {
            parent::__construct($smarty );
        }

        public function Action ()
        {
            $this->addComment();
            $this->setCount();
            $this->showComment();
        }

        private function addComment ()
        {
            if (isset($_POST['send'])) {
                $url = 'http://'.$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
                if ($url == PREV_URL) {
                    if (Validate::checkNull($_POST['content'])) Tool::alertBack('警告：评论内容不得为空！');
                    if (Validate::checkLength($_POST['content'],255,'max')) Tool::alertBack('警告：评论内容长度不得大于255位！');
                    if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertBack('警告：验证码必须是四位！');
                    if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertBack('警告：验证码不正确！');
                } else {
                    if (Validate::checkNull($_POST['content'])) Tool::alertClose('警告：评论内容不得为空！');
                    if (Validate::checkLength($_POST['content'],255,'max')) Tool::alertClose('警告：评论内容长度不得大于255位！');
                    if (Validate::checkLength($_POST['code'],4,'equals')) Tool::alertClose('警告：验证码必须是四位！');
                    if (Validate::checkEquals(strtolower($_POST['code']),$_SESSION['code'])) Tool::alertClose('警告：验证码不正确！');
                }


                parent::__construct($this->smarty,new CommentModel());
                @$cookie=new Cookie('user');
                if (@$cookie->getCookie()) {
                    $this->model->user = $cookie->getCookie();
                } else {
                    $this->model->user = '游客';
                }
                $this->model->manner = $_POST['manner'];
                $this->model->content = $_POST['content'];
                $this->model->cid = $_GET['cid'];
                $this->model->addComment() ? Tool::alertLocation('评论添加成功，请等待管理员审核！','feedback.php?cid='.$this->model->cid) : Tool::alertLocation('评论添加失败，请重新添加！','feedback.php?cid='.$this->model->cid);
            }
        }


        private function showComment ()
        {
            if ($_GET['cid']) {
                parent::__construct($this->smarty, new CommentModel());
                $this->model->cid = $_GET['cid'];

                $content = new ContentModel();
                $content->id = $_GET['cid'];
                if (!$content->getOneContent()) Tool::alertBack('警告：不存在文档的评论！');


                parent::page($this->model->getCommentTotal());

                $object = $this->model->getAllComment();

                $object2 = $this->model->getHotThreeComment();

                $object3 = $content ->getHotTwentyComment();

                $this->setObject($object);
                $this->setObject($object2);


                $this->smarty->assign('titlec',$content->getOneContent()->title);
                $this->smarty->assign('info',$content->getOneContent()->info);
                $this->smarty->assign('id',$content->getOneContent()->id);
                $this->smarty->assign('cid',$this->model->cid);
                $this->smarty->assign('AllComment',$object);
                $this->smarty->assign('HotThreeComment',$object2);
                $this->smarty->assign('HotTwentyComment',$object3);
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }


        //支持和反对
        private function setCount()
        {
            if (isset($_GET['cid']) && isset($_GET['id']) && isset($_GET['type'])) {
                parent::__construct($this->smarty, new CommentModel());
                $this->model->id = $_GET['id'];
                if (!$this->model->getOneComment()) Tool::alertBack('警告：不存在此评论！');
                if ($_GET['type'] == 'sustain') {
                    $this->model->setSustain() ? Tool::alertLocation('支持成功！','feedback.php?cid='.$_GET['cid']) : Tool::alertLocation('支持失败！','feedback.php?cid='.$_GET['cid']);
                }
                if ($_GET['type'] == 'oppose') {
                    $this->model->setOppose() ? Tool::alertLocation('反对成功！','feedback.php?cid='.$_GET['cid']) : Tool::alertLocation('反对失败！','feedback.php?cid='.$_GET['cid']);
                }
            }
        }

        private function  setObject(&$object)
        {
            if ($object) {
                foreach ($object as $value) {
                    switch ($value->manner) {
                        case -1 :
                            $value->manner = '反对';
                            break;
                        case 0 :
                            $value->manner = '中立';
                            break;
                        case 1 :
                            $value->manner = '支持';
                            break;
                    }
                    if (empty($value->face)) {
                        $value->face = '00.gif';
                    }
                    if (!empty($value->oppose)) {
                        $value->oppose = '-'.$value->oppose;
                    }
                }
            }
        }

    }