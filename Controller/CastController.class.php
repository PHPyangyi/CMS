<?php
    /**
     * Created by PhpStorm.
     * User: 阳毅
     * Date: 2018/6/7
     * Time: 16:08
     */

    class CastController extends Controller
    {
        public function __construct(&$smarty)
        {
            parent::__construct($smarty, new VoteModel());
        }
        public function Action()
        {
            $this->setCount();
            $this->getVote();
        }

        private function getVote()
        {
            $vote = new VoteModel();
            $sum = $vote->getVoteSum()->c;
            $width = 400;
            $this->smarty->assign('vote_title',$vote->getVoteTitle()->title);
            $this->smarty->assign('width',$width);
            $object = $vote->getVoteItem();
            if ($object) {
                $i = 1;
                foreach ($object as $value) {
                    $value->percent = round($value->count / $sum * 100,2) . '%';
                    $value->picwidth = $value->count / $sum * $width;
                    $value->picnum = $i;
                    $i++;
                }
            }

            $this->smarty->assign('vote_item',$object);

        }


        private function setCount()
        {
            if (isset($_POST['send'])) {
                if (empty($_POST['vote'])) {
                    Tool::alertClose('警告：请选择一个投票项目！');
                }
                if (@$_COOKIE['ip'] == $_SERVER["REMOTE_ADDR"]) {
                    if (time() - $_COOKIE['time'] < 86400) {
                        Tool::alertLocation('警告：您已经参与了本投票，请不要重复投票！','cast.php');
                    }
                }
                $this->model->id = $_POST['vote'];
                $this->model->setCount();
                setcookie('ip',$_SERVER["REMOTE_ADDR"]);
                setcookie('time',time());
                Tool::alertLocation('恭喜，累计投票成功，感谢您的参与！','cast.php');
            }
        }
    }