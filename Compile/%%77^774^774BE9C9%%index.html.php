<?php /* Smarty version 2.6.31, created on 2018-06-05 15:04:23
         compiled from index.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="../js/reg.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="user">
    <h2>会员信息</h2>
    <?php if ($this->_tpl_vars['data']): ?>
    <div class="a">您好，<strong><?php echo $this->_tpl_vars['data']; ?>
</strong> 欢迎光临</div>
    <div class="b">
        <img src="images/<?php echo $this->_tpl_vars['face']; ?>
" alt="<?php echo $this->_tpl_vars['data']; ?>
" />
        <a href="###">个人中心</a>
        <a href="###">我的评论</a>
        <a href="register.php?action=logout">退出登录</a>
    </div>
    <?php else: ?>
    <form action="register.php?action=login" method="post" name="login">
        <label>用户名：<input type="text" name="user" class="text" /></label>
        <label>密　码：<input type="password" name="pass" class="text" /></label>
        <label class="yzm">验证码：<input type="text" name="code" class="text code" /> <img src="Conf/code.php"  style="width: 75px;height: 25px;cursor:hand;" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" /></label>
        <p><input type="submit" name="send" value="登录" onclick="return checkLogin();" class="submit" /> <a href="register.php?action=reg">注册会员</a> <a href="###">忘记密码?</a> </p>
    </form>
    <?php endif; ?>
    <h3>最近登录会员 <span>────────────</span></h3>
    <?php $_from = $this->_tpl_vars['AllLaterUser']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><img src="images/<?php echo $this->_tpl_vars['value']->face; ?>
" alt="头像" /></dt>
        <dd><?php echo $this->_tpl_vars['value']->user; ?>
</dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>

</div>
<div id="news">
    <h3><a href="###">联合利华因散布涨价信息被罚</a></h3>
    <p>核心提示：国家发改委发布公告称，3月下旬，联合利华(中国)有限公司有关负责人多次接受采访发表日化产品涨价言论。此行为导致日化产品涨价的信息广泛传播，增强了消费者涨价预...<a href="###">[查看全文]</a></p>
    <p class="link">
        <a href="###">优酷计划通过增发再融6亿美元</a> |
        <a href="###">网秦上市次日收盘大跌9.68%</a>
        <a href="###">电子书市场遭遇优质内容缺失之困</a> |
        <a href="###">人人IPO次日收盘下跌6％</a>
    </p>
    <ul>
        <li><em>11-06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增500%...</a></li>
        <li><em>11-05-03</em><a href="###">58同城获日本分类信息公司Recruit战略...</a></li>
        <li><em>11-06-04</em><a href="###">DisplaySearch：全球3D电视销量将达22OO万台..</a></li>
        <li><em>11-04-08</em><a href="###">前程无忧一季度净利1400万美元 同比增81.6%...</a></li>
        <li><em>11-08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
        <li><em>11-11-18</em><a href="###">优酷来自手机及平板电脑播放量已占整站10%...</a></li>
        <li><em>11-06-12</em><a href="###">报告称Android一季度在美市场份额扩至34.7%...</a></li>
        <li><em>11-12-11</em><a href="###">阿尔卡特朗讯2011第一财季营收同比增15%...</a></li>
        <li><em>11-01-09</em><a href="###">HTC第一季度智能手机销量970万 年成长率192% ...</a></li>
        <li><em>11-04-07</em><a href="###">一季度苹果占全球智能机份额升至18.7%居次席会...</a></li>
    </ul>
</div>
<div id="pic">
    <img src="images/adverleft.png" alt="新闻图片" />
</div>
<div id="rec">
    <h2>特别推荐</h2>
    <ul>
        <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
        <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
        <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
        <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
        <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
        <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
        <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10天...</a></li>
    </ul>
</div>
<div id="sidebar-right">
    <div class="adver"><img src="images/adver2.png" alt="广告图" /></div>
    <div class="hot">
        <h2>本月热点</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10天...</a></li>
        </ul>
    </div>
    <div class="comm">
        <h2>本月评论</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10天...</a></li>
        </ul>
    </div>
    <div class="vote">
        <h2>调查投票</h2>
        <h3>请问您是怎么知道本站的：</h3>
        <form>
            <label><input type="radio" name="vote" checked="checked" /> 门户网站的搜索引擎</label>
            <label><input type="radio" name="vote" /> Google或百度搜索</label>
            <label><input type="radio" name="vote" /> 别的网站上的链接</label>
            <label><input type="radio" name="vote" /> 朋友介绍或者电视广告</label>
            <p><input type="submit" value="投票" name="send" /> <input type="button" value="查看" /></p>
        </form>
    </div>
</div>
<div id="picnews">
    <h2>图文资讯</h2>
    <dl>
        <dt><a href="###"><img src="images/pic1.png" alt="标题" /></a></dt>
        <dd><a href="###">以色列总理出访法国 士兵在迎接仪式上晕倒</a></dd>
    </dl>
    <dl>
        <dt><a href="###"><img src="images/pic2.png" alt="标题" /></a></dt>
        <dd><a href="###">江西数百学生操场上给母亲洗脚</a></dd>
    </dl>
    <dl>
        <dt><a href="###"><img src="images/pic3.png" alt="标题" /></a></dt>
        <dd><a href="###">歼20照片再现 地勤人员钻入起落架舱</a></dd>
    </dl>
    <dl>
        <dt><a href="###"><img src="images/pic4.png" alt="标题" /></a></dt>
        <dd><a href="###">摄影师拍“水下工程” 波浪如蘑菇云</a></dd>
    </dl>
</div>
<div id="newslist">
    <div class="list bottom">
        <h2><a href="###">更多</a>军事动态</h2>
        <ul>
            <li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增500%...</a></li>
            <li><em>05-03</em><a href="###">58同城获日本分类信息公司Recruit战略...</a></li>
            <li><em>06-04</em><a href="###">DisplaySearch：全球3D电视销量将达22OO万台..</a></li>
            <li><em>04-08</em><a href="###">前程无忧一季度净利1400万美元 同比增81.6%...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
            <li><em>11-18</em><a href="###">优酷来自手机及平板电脑播放量已占整站10%...</a></li>
            <li><em>06-12</em><a href="###">报告称Android一季度在美市场份额扩至34.7%...</a></li>
            <li><em>12-11</em><a href="###">阿尔卡特朗讯2011第一财季营收同比增15%...</a></li>
            <li><em>01-09</em><a href="###">HTC第一季度智能手机销量970万 年成长192% ...</a></li>
            <li><em>04-07</em><a href="###">一季度苹果占全球智能机份额升至18.7%席会...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
        </ul>
    </div>
    <div class="list right bottom">
        <h2><a href="###">更多</a>八卦娱乐</h2>
        <ul>
            <li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增500%...</a></li>
            <li><em>05-03</em><a href="###">58同城获日本分类信息公司Recruit战略...</a></li>
            <li><em>06-04</em><a href="###">DisplaySearch：全球3D电视销量将达22OO万台..</a></li>
            <li><em>04-08</em><a href="###">前程无忧一季度净利1400万美元 同比增81.6%...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
            <li><em>11-18</em><a href="###">优酷来自手机及平板电脑播放量已占整站10%...</a></li>
            <li><em>06-12</em><a href="###">报告称Android一季度在美市场份额扩至34.7%...</a></li>
            <li><em>12-11</em><a href="###">阿尔卡特朗讯2011第一财季营收同比增15%...</a></li>
            <li><em>01-09</em><a href="###">HTC第一季度智能手机销量970万 年成长192% ...</a></li>
            <li><em>04-07</em><a href="###">一季度苹果占全球智能机份额升至18.7%席会...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
        </ul>
    </div>
    <div class="list">
        <h2><a href="###">更多</a>时尚女人</h2>
        <ul>
            <li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增500%...</a></li>
            <li><em>05-03</em><a href="###">58同城获日本分类信息公司Recruit战略...</a></li>
            <li><em>06-04</em><a href="###">DisplaySearch：全球3D电视销量将达22OO万台..</a></li>
            <li><em>04-08</em><a href="###">前程无忧一季度净利1400万美元 同比增81.6%...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
            <li><em>11-18</em><a href="###">优酷来自手机及平板电脑播放量已占整站10%...</a></li>
            <li><em>06-12</em><a href="###">报告称Android一季度在美市场份额扩至34.7%...</a></li>
            <li><em>12-11</em><a href="###">阿尔卡特朗讯2011第一财季营收同比增15%...</a></li>
            <li><em>01-09</em><a href="###">HTC第一季度智能手机销量970万 年成长192% ...</a></li>
            <li><em>04-07</em><a href="###">一季度苹果占全球智能机份额升至18.7%席会...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
        </ul>
    </div>
    <div class="list right">
        <h2><a href="###">更多</a>科技频道</h2>
        <ul>
            <li><em>06-04</em><a href="###">报告预计2011年全球3D电视出货量同比增500%...</a></li>
            <li><em>05-03</em><a href="###">58同城获日本分类信息公司Recruit战略...</a></li>
            <li><em>06-04</em><a href="###">DisplaySearch：全球3D电视销量将达22OO万台..</a></li>
            <li><em>04-08</em><a href="###">前程无忧一季度净利1400万美元 同比增81.6%...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
            <li><em>11-18</em><a href="###">优酷来自手机及平板电脑播放量已占整站10%...</a></li>
            <li><em>06-12</em><a href="###">报告称Android一季度在美市场份额扩至34.7%...</a></li>
            <li><em>12-11</em><a href="###">阿尔卡特朗讯2011第一财季营收同比增15%...</a></li>
            <li><em>01-09</em><a href="###">HTC第一季度智能手机销量970万 年成长192% ...</a></li>
            <li><em>04-07</em><a href="###">一季度苹果占全球智能机份额升至18.7%席会...</a></li>
            <li><em>08-04</em><a href="###">人人上市次日早盘大跌9%报16.39美元...</a></li>
        </ul>
    </div>
</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>