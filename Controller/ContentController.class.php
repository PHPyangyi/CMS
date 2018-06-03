<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/3
     * Time: 22:16
     */

    class ContentController extends Controller
    {
        public function __construct(&$smarty) {
            parent::__construct($smarty, new ContentModel());
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
                default:
                    Tool::alertBack('非法操作！');
            }
        }

        //show
        private function show()
        {

        }

        //add
        private function add()
        {
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增文档');
            $this->smarty->assign('prev_url',PREV_URL);
        }

        //update
        private function update()
        {

        }

        //delete
        private function delete()
        {

        }

    }