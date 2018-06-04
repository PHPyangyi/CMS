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
            $this->smarty->assign('show',true);
            $this->smarty->assign('title','文档列表');
            $this->nav();
            $nav = new NavModel();

            if (empty($_GET['nav'])) {
                $id = $nav->getAllNavChildId();
                $this->model->nav = Tool::objArrOfStr($id,'id');
            } else {
                $nav->id = $_GET['nav'];
                if (!$nav->getOneNav()) Tool::alertBack('警告：类别参数传输错误！');
                $this->model->nav = $nav->id;
            }

            parent::page($this->model->getListContentTotal());

            $object = $this->model->getListContent();
            $object = Tool::subStr($object,'title',20,'utf-8');


            $this->smarty->assign('SearchContent',$object);

        }

        //add
        private function add()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
                if (Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题长度不得小于两位！');
                if (Validate::checkLength($_POST['title'],50,'max')) Tool::alertBack('警告：标题长度不得大于五十位！');
                if (Validate::checkNull($_POST['nav'])) Tool::alertBack('警告：必须选择一个栏目！');
                if (Validate::checkLength($_POST['tag'],30,'max')) Tool::alertBack('警告：tag标签长度不得大于三十位！');
                if (Validate::checkLength($_POST['keyword'],30,'max')) Tool::alertBack('警告：关键字长度不得大于三十位！');
                if (Validate::checkLength($_POST['source'],20,'max')) Tool::alertBack('警告：文章来源长度不得大于二十位！');
                if (Validate::checkLength($_POST['author'],10,'max')) Tool::alertBack('警告：作者长度不得大于十位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：内容摘要不得大于两百位！');
                if (Validate::checkNull($_POST['content'])) Tool::alertBack('警告：详细内容不得为空！');
                if (Validate::checkNum($_POST['count'])) Tool::alertBack('警告：浏览次数必须是数字！');
                if (Validate::checkNum($_POST['gold'])) Tool::alertBack('警告：消费金币必须是数字！');

                if (isset($_POST['attr'])) {
                    $this->model->attr = implode(',',$_POST['attr']);
                } else {
                    $this->model->attr = '无属性';
                }
                $this->model->title = $_POST['title'];
                $this->model->nav = $_POST['nav'];
                $this->model->info = $_POST['info'];
                $this->model->source = $_POST['source'];
                $this->model->author = $_POST['author'];
                $this->model->keyword = $_POST['keyword'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->tag = $_POST['tag'];
                $this->model->content = $_POST['content'];
                $this->model->commend = $_POST['commend'];
                $this->model->count = $_POST['count'];
                $this->model->gold = $_POST['gold'];
                $this->model->color = $_POST['color'];
                $this->model->sort = $_POST['sort'];
                $this->model->readlimit = $_POST['readlimit'];
                $this->model->addContent() ? Tool::alertLocation('文档发布成功！','?action=show') : Tool::alertBack('警告：文档发布失败！');
            }

            //display nav
            $this->smarty->assign('add',true);
            $this->smarty->assign('title','新增文档');
            $this->smarty->assign('prev_url',PREV_URL);

            $nav=new NavModel();
            $html='';
            foreach ($nav->getFrontNav() as $object) {
                $html .= '<optgroup label="'.$object->nav_name.'">';
                $nav->id = $object->id;
                if (!!$childnav = $nav->getAllChildFrontNav()) {
                    foreach ($childnav as $object) {
                        $html .= '<option value="'.$object->id.'">'.$object->nav_name.'</option>'."\r\n";
                    }
                }
                $html .= '</optgroup>';
            }

            $this->smarty->assign('nav',$html);
            $this->smarty->assign('author',$_SESSION['admin']['admin_user']);
        }

        //update
        private function update()
        {
            if (isset($_POST['send'])) {
                if (Validate::checkNull($_POST['title'])) Tool::alertBack('警告：标题不得为空！');
                if (Validate::checkLength($_POST['title'],2,'min')) Tool::alertBack('警告：标题长度不得小于两位！');
                if (Validate::checkLength($_POST['title'],50,'max')) Tool::alertBack('警告：标题长度不得大于五十位！');
                if (Validate::checkNull($_POST['nav'])) Tool::alertBack('警告：必须选择一个栏目！');
                if (Validate::checkLength($_POST['tag'],30,'max')) Tool::alertBack('警告：tag标签长度不得大于三十位！');
                if (Validate::checkLength($_POST['keyword'],30,'max')) Tool::alertBack('警告：关键字长度不得大于三十位！');
                if (Validate::checkLength($_POST['source'],20,'max')) Tool::alertBack('警告：文章来源长度不得大于二十位！');
                if (Validate::checkLength($_POST['author'],10,'max')) Tool::alertBack('警告：作者长度不得大于十位！');
                if (Validate::checkLength($_POST['info'],200,'max')) Tool::alertBack('警告：内容摘要不得大于两百位！');
                if (Validate::checkNull($_POST['content'])) Tool::alertBack('警告：详细内容不得为空！');
                if (Validate::checkNum($_POST['count'])) Tool::alertBack('警告：浏览次数必须是数字！');
                if (Validate::checkNum($_POST['gold'])) Tool::alertBack('警告：消费金币必须是数字！');

                if (isset($_POST['attr'])) {
                    $this->model->attr = implode(',',$_POST['attr']);
                } else {
                    $this->model->attr = '无属性';
                }
                $this->model->id = $_POST['id'];
                $this->model->title = $_POST['title'];
                $this->model->nav = $_POST['nav'];
                $this->model->info = $_POST['info'];
                $this->model->source = $_POST['source'];
                $this->model->author = $_POST['author'];
                $this->model->keyword = $_POST['keyword'];
                $this->model->thumbnail = $_POST['thumbnail'];
                $this->model->tag = $_POST['tag'];
                $this->model->content = $_POST['content'];
                $this->model->commend = $_POST['commend'];
                $this->model->count = $_POST['count'];
                $this->model->gold = $_POST['gold'];
                $this->model->color = $_POST['color'];
                $this->model->sort = $_POST['sort'];
                $this->model->readlimit = $_POST['readlimit'];
                $this->model->updateContent() ? Tool::alertLocation('文档修改成功！',$_POST['prev_url']) : Tool::alertBack('警告：文档修改失败！');
            }



            if (isset($_GET['id'])) {
                $this->smarty->assign('update',true);
                $this->smarty->assign('title','修改文档');
                $this->model->id = $_GET['id'];
                $content =$this->model->getOneContent();
                if ($content) {
                    $this->smarty->assign('id',$content->id);
                    $this->smarty->assign('titlec',$content->title);
                    $this->smarty->assign('tag',$content->tag);
                    $this->smarty->assign('keyword',$content->keyword);
                    $this->smarty->assign('thumbnail',$content->thumbnail);
                    $this->smarty->assign('source',$content->source);
                    $this->smarty->assign('author',$content->author);
                    $this->smarty->assign('content',$content->content);
                    $this->smarty->assign('info',$content->info);
                    $this->smarty->assign('count',$content->count);
                    $this->smarty->assign('gold',$content->gold);
                    $this->smarty->assign('prev_url',PREV_URL);
                    $this->nav($content->nav);
                    $this->attr($content->attr);
                    $this->color($content->color);
                    $this->sort($content->sort);
                    $this->readlimit($content->readlimit);
                    $this->commend($content->commend);
                } else {
                    Tool::alertBack('警告：不存在此文档！');
                }
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }

        //delete
        private function delete()
        {
            if (isset($_GET['id'])) {
                $this->model->id = $_GET['id'];
                $this->model->deleteContent() ? Tool::alertLocation('文档删除成功！',PREV_URL) : Tool::alertBack('警告：文档删除失败！');
            } else {
                Tool::alertBack('警告：非法操作！');
            }
        }


        private function commend($commend)
        {
            $html='';
            $commend='';
            $checked='';
            $commendArr = array(1=>'允许评论',0=>'禁止评论');
            foreach ($commendArr as $key=>$value) {
                if ($key == $commend) $checked='checked="checked"';
                $html .= '<input type="radio" '.$checked.' name="commend" value="'.$key.'" />'.$value;
                $checked = '';
            }
            $this->smarty->assign('commend',$html);
        }

        //sort
        private function sort($sort)
        {
            $html='';
            $selected='';
            $sortArr = array(0=>'默认排序',1=>'置顶一天',2=>'置顶一周',3=>'置顶一月',4=>'置顶一年');
            foreach ($sortArr as $key=>$value) {
                if ($key == $sort) $selected='selected="selected"';
                $html .= '<option '.$selected.' value="'.$key.'" style="color:'.$key.';">'.$value.'</option>';
                $selected = '';
            }
            $this->smarty->assign('sort',$html);
        }

        //readlimit
        private function readlimit($readlimit)
        {
            $html='';
            $selected='';
            $readlimitArr = array(0=>'开放浏览',1=>'初级会员',2=>'中级会员',3=>'高级会员',4=>'VIP会员');
            foreach ($readlimitArr as $key=>$value) {
                if ($key == $readlimit) $selected='selected="selected"';
                $html .= '<option '.$selected.' value="'.$key.'" style="color:'.$key.';">'.$value.'</option>';
                $selected = '';
            }
            $this->smarty->assign('readlimit',$html);
        }

        //color
        private function color($color)
        {
            $html='';
            $selected='';
            $colorArr = array(''=>'默认颜色','red'=>'红色','blue'=>'蓝色','orange'=>'橙色');
            foreach ($colorArr as $key=>$value) {
                if ($key == $color) $selected='selected="selected"';
                $html .= '<option '.$selected.' value="'.$key.'" style="color:'.$key.';">'.$value.'</option>';
                $selected = '';
            }
            $this->smarty->assign('color',$html);
        }

        //attr
        private function attr($attr)
        {
            $html='';
            $attrArr = array('头条','推荐','加粗','跳转');
            $attrS = explode(',',$attr);
            $attrNo = array_diff($attrArr,$attrS);
            if ($attrS[0] != '无') {
                foreach ($attrS as $value) {
                    $html .= '<input type="checkbox" checked="checked" name="attr[]" value="'.$value.'" />'.$value;
                }
            }
            foreach ($attrNo as $value) {
                $html .= '<input type="checkbox" name="attr[]" value="'.$value.'" />'.$value;
            }
            $this->smarty->assign('attr',$html);
        }


        private function nav($n = 0) {
            $nav = new NavModel();
            $html='';

            $selected='';

            foreach ($nav->getAllFrontNav() as $object) {

                $html .= '<optgroup label="'.$object->nav_name.'">'."\r\n";

                $nav->id = $object->id;

                if (!!$childnav = $nav->getAllChildFrontNav()) {

                    foreach ($childnav as $object) {

                        if ($n == $object->id) $selected = 'selected="selected"';

                        $html .= '<option '.$selected.' value="'.$object->id.'">'.$object->nav_name.'</option>'."\r\n";

                        $selected = '';
                    }
                }
                $html .= '</optgroup>';
            }
            $this->smarty->assign('nav',$html);
        }

    }