<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:49
     */

    class LinkController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new LinkModel());
        }

        public function Action()
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
                default:
                    Tool::alertBack('非法操作！');
            }
        }

        private function show()
        {
            parent::page($this->model->getLinkTotal());
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','友情链接列表');
            $object = $this->model->getAllLink();
            Tool::NewSubStr($_object,'weburl',20,'utf-8');
            Tool::NewSubStr($_object,'logourl',20,'utf-8');
            if ($object) {
                foreach ($object as $value) {
                    switch ($value->type) {
                        case 1 :
                            $value->type = '文字链接';
                            break;
                        case 2 :
                            $value->type = 'Logo链接';
                            break;
                    }
                    if (empty($value->state)) {
                        $value->state = '<span class="red">[未审核]</span> | <a href="link.php?action=state&type=ok&id='.$value->id.'">通过</a>';
                    } else {
                        $value->state = '<span class="green">[已通过]</span> | <a href="link.php?action=state&type=cancel&id='.$value->id.'">取消</a>';
                    }
                }
            }
            $this->smarty->assign('AllLink',$object);
        }


        private function state()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                if (!$this->model->getOneLink()) Tool::alertBack('警告：不存在此链接！');
                if ($_GET['type'] == 'ok') {
                    $this->model->setStateOK() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：审核链接失败！');
                } elseif ($_GET['type'] == 'cancel') {
                    $this->model->setStateCancel() ? Tool::alertLocation(null,PREV_URL) : Tool::alertBack('警告：取消审核失败！');
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
                if (Validate::checkNull($_POST['webname'])) Tool::alertBack('警告：网站名称不得为空！');
                if (Validate::checkLength($_POST['webname'],20,'max')) Tool::alertBack('警告：网站名称不得大于二十位！');
                if (Validate::checkNull($_POST['weburl'])) Tool::alertBack('警告：网站地址不得为空！');
                if (Validate::checkLength($_POST['webname'],100,'max')) Tool::alertBack('警告：网站地址不得大于一百位！');
                if ($_POST['type'] == 2) {
                    if (Validate::checkNull($_POST['logourl'])) Tool::alertBack('警告：Logo地址不得为空！');
                    if (Validate::checkLength($_POST['logourl'],100,'max')) Tool::alertBack('警告：Logo地址不得大于一百位！');
                }
                if (Validate::checkLength($_POST['user'],20,'max')) Tool::alertBack('警告：站长名不得大于二十位！');


                $this->model->webname = $_POST['webname'];
                $this->model->weburl = $_POST['weburl'];
                $this->model->logourl = $_POST['logourl'];
                $this->model->user = $_POST['user'];
                $this->model->type = $_POST['type'];
                $this->model->state = $_POST['state'];
                $this->model->addLink() ? Tool::alertLocation('恭喜，新增友情链接成功！','?action=show') : Tool::alertBack('很遗憾，新增友情链接失败，请重试！');
            }
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增友情链接');
            $this->smarty->assign('prev_url',PREV_URL);
        }


        private function update()
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

                $this->model->id = $_POST['id'];
                $this->model->webname = $_POST['webname'];
                $this->model->weburl = $_POST['weburl'];
                $this->model->logourl = $_POST['logourl'];
                $this->model->user = $_POST['user'];
                $this->model->type = $_POST['type'];
                $this->model->state = $_POST['state'];
                $this->model->updateLink() ? Tool::alertLocation('恭喜，修改友情链接成功！',$_POST['prev_url']) : Tool::alertBack('很遗憾，修改友情链接失败，请重试！');
            }
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $link = $this->model->getOneLink();
                if (!$link) Tool::alertBack('警告：不存在此链接！');
                $this->smarty->assign('id',$link->id);
                $this->smarty->assign('webname',$link->webname);
                $this->smarty->assign('weburl',$link->weburl);
                $this->smarty->assign('logourl',$link->logourl);
                $this->smarty->assign('user',$link->user);
                $this->smarty->assign('state',$link->state);
                if ($link->type == 1) {
                    $this->smarty->assign('text_type','checked="checkecd"');
                    $this->smarty->assign('logo','display:none');
                } elseif ($link->type == 2) {
                    $this->smarty->assign('logo_type','checked="checkecd"');
                    $this->smarty->assign('logo','display:block');
                }
                $this->smarty->assign('prev_url',PREV_URL);
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改等级');
            } else {
                Tool::alertBack('非法操作！');
            }
        }


        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteLink() ? Tool::alertLocation('恭喜你，删除链接成功！', PREV_URL) : Tool::alertBack('很遗憾，删除链接失败！');
            } else {
                Tool::alertBack('非法操作！');
            }
        }

    }