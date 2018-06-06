<?php /* Smarty version 2.6.31, created on 2018-06-06 04:01:40
         compiled from details.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/details.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="details">
    <h2>当前位置 &gt; <?php echo $this->_tpl_vars['nav']; ?>
</h2>
    <h3><?php echo $this->_tpl_vars['titlec']; ?>
</h3>
    <div class="d1">时间：<?php echo $this->_tpl_vars['date']; ?>
 来源：<?php echo $this->_tpl_vars['source']; ?>
 作者：<?php echo $this->_tpl_vars['author']; ?>
 点击量：<?php echo $this->_tpl_vars['count']; ?>
</div>
    <div class="d2"><?php echo $this->_tpl_vars['info']; ?>
</div>
    <div class="d3"><?php echo $this->_tpl_vars['content']; ?>
</div>
    <div class="d4">TAB标签：<?php echo $this->_tpl_vars['tag']; ?>
</div>

    <div class="d5">

        <div class="d6">
            <h2><a href="feedback.php?cid=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">已有<span><?php echo $this->_tpl_vars['yang']; ?>
</span>人参与评论</a>最新评论</h2>
        </div>

        <form method="post" action="feedback.php?cid=<?php echo $this->_tpl_vars['id']; ?>
" >
            <p>你对本文的态度：<input type="radio" name="manner" value="1" checked="checked" /> 支持
                <input type="radio" name="manner" value="0" /> 中立
                <input type="radio" name="manner" value="-1" /> 反对
            </p>
            <p class="red">请互联网规则，不要发表关于政治、反动、色情之类的评论。</p>
            <p><textarea name="content"></textarea></p>
            <p style="position:relative;top:-5px;">
                验证码：<input type="text" class="text" name="code" />
                <img src="Conf/code.php" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" />
                <input type="submit" class="submit" name="send" value="提交评论" onclick="return checkComment();" />
            </p>
        </form>
    </div>
</div>
<div id="sidebar">
    <div class="right">
        <h2>本类推荐</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
        </ul>
    </div>
    <div class="right">
        <h2>本类热点</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
        </ul>
    </div>
    <div class="right">
        <h2>本类图文</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
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