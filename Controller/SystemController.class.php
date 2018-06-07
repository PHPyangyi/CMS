<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 20:10
     */

    class SystemController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new SystemModel());
        }

        public function Action()
        {
            $this->show();
        }

        private function show()
        {

            if (isset($_POST['send'])) {
                $this->model->webname = $_POST['webname'];
                $this->model->page_size = $_POST['page_size'];
                $this->model->article_size = $_POST['article_size'];
                $this->model->nav_size = $_POST['nav_size'];
                $this->model->updir = $_POST['updir'];
                $this->model->ro_num = $_POST['ro_num'];
                $this->model->adver_text_num = $_POST['adver_text_num'];
                $this->model->adver_pic_num = $_POST['adver_pic_num'];
                if ($this->model->setSystem()) {

                    $_br = "\r\n";
                    $_tab = "\t";

                    $_profile = '<?php'.$_br;


                    $_profile .= $_tab."//系统配置文件".$_br;
                    $_profile .= $_tab."define('WEBNAME','{$this->model->webname}');".$_br;
                    $_profile .= $_tab."define('PAGE_SIZE',{$this->model->page_size});".$_br;
                    $_profile .= $_tab."define('ARTICLE_SIZE',{$this->model->article_size});".$_br;
                    $_profile .= $_tab."define('NAV_SIZE',{$this->model->nav_size});".$_br;
                    $_profile .= $_tab."define('UPDIR','{$this->model->updir}');".$_br;

                    $_profile .= $_br;

                    $_profile .= $_tab."//轮播器配置".$_br;
                    $_profile .= $_tab."define('RO_NUM',{$this->model->ro_num});".$_br;

                    $_profile .= $_br;

                    $_profile .= $_tab."//广告服务".$_br;
                    $_profile .= $_tab."define('ADVER_TEXT_NUM',{$this->model->adver_text_num});".$_br;
                    $_profile .= $_tab."define('ADVER_PIC_NUM',{$this->model->adver_pic_num});".$_br;

                    $_profile .= $_tab."//不可修改的项目".$_br;

                    $_profile .= $_br;

                    $_profile .= $_tab."//数据库配置文件".$_br;
                    $_profile .= $_tab."define('DB_HOTS','localhost');".$_br;
                    $_profile .= $_tab."define('DB_USER','root');".$_br;
                    $_profile .= $_tab."define('DB_PWD','root');".$_br;
                    $_profile .= $_tab."define('DB_NAME','cms');".$_br;

                    $_profile .= $_br;

                    $_profile .= $_tab."define('PREV_URL',@\$_SERVER[\"HTTP_REFERER\"]);".$_br;

                    $_profile .= $_br;
                    $_profile .= $_tab."//模板配置信息".$_br;
                    $_profile .= $_tab." \$smarty->template_dir = ROOT_PATH.'/View/';".$_br;
                    $_profile .= $_tab." \$smarty->compile_dir = ROOT_PATH.'/Compile/';".$_br;
                    $_profile .= $_tab."\$smarty->cache_dir = ROOT_PATH.'/Cache/';".$_br;
                    $_profile .= $_tab."\$smarty->config_dir = ROOT_PATH.'/Conf/';".$_br;



                    if (!file_put_contents('../Conf/profile.inc.php', $_profile)) {
                        Tool::alertBack('警告：生成配置文件失败！');
                    }

                    Tool::alertLocation('恭喜，修改配置文件成功！','system.php');
                } else {
                    Tool::alertBack('很遗憾，修改配置文件失败！');
                }
            }



            $object = $this->model->getSystem();
            $this->smarty->assign('webname',$object->webname);
            $this->smarty->assign('page_size',$object->page_size);
            $this->smarty->assign('article_size',$object->article_size);
            $this->smarty->assign('nav_size',$object->nav_size);
            $this->smarty->assign('updir',$object->updir);
            $this->smarty->assign('ro_time',$object->ro_time);
            $this->smarty->assign('ro_num',$object->ro_num);
            $this->smarty->assign('adver_text_num',$object->adver_text_num);
            $this->smarty->assign('adver_pic_num',$object->adver_pic_num);
        }
    }