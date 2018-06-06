<?php /* Smarty version 2.6.31, created on 2018-06-06 04:15:05
         compiled from feedback.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/feedback.css" />
    <script type="text/javascript" src="js/details.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="feedback">
    <h2>评论列表</h2>

    <h3><?php echo $this->_tpl_vars['titlec']; ?>
</h3>
    <p class="info"><?php echo $this->_tpl_vars['info']; ?>
<a href="details.php?id=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">[详情]</a></p>


    <?php if ($this->_tpl_vars['AllComment']): ?>
    <?php $_from = $this->_tpl_vars['AllComment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><img src="images/<?php echo $this->_tpl_vars['value']->face; ?>
" alt="<?php echo $this->_tpl_vars['value']->user; ?>
" /></dt>
        <dd><em><?php echo $this->_tpl_vars['value']->date; ?>
 发表</em><span>[<?php echo $this->_tpl_vars['value']->user; ?>
]</span></dd>
        <dd class="info">[<?php echo $this->_tpl_vars['value']->manner; ?>
]<?php echo $this->_tpl_vars['value']->content; ?>
</dd>
        <dd class="bottom"><a href="feedback.php?cid=<?php echo $this->_tpl_vars['value']->cid; ?>
&id=<?php echo $this->_tpl_vars['value']->id; ?>
&type=sustain">[<?php echo $this->_tpl_vars['value']->sustain; ?>
]支持</a> <a href="feedback.php?cid=<?php echo $this->_tpl_vars['value']->cid; ?>
&id=<?php echo $this->_tpl_vars['value']->id; ?>
&type=oppose">[<?php echo $this->_tpl_vars['value']->oppose; ?>
]反对</a></dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <dl>
        <dd style="text-align: center">此文档没有任何评论！</dd>
    </dl>
    <?php endif; ?>
    <div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>

</div>
<div id="sidebar">
    <h2>热评文档</h2>
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

<div class="d5">
    <form method="post" name="comment" action="feedback.php?cid=<?php echo $_GET['cid']; ?>
">
        <p>你对本文的态度：<input type="radio" name="manner" value="1" checked="checked" /> 支持
            <input type="radio" name="manner" value="0" /> 中立
            <input type="radio" name="manner" value="-1" /> 反对
        </p>
        <p class="red">请互联网规则，不要发表关于政治、反动、色情之类的评论。</p>
        <p><textarea name="content"></textarea></p>
        <p style="position:relative;top:-5px;">
            验证码：<input type="text" class="text" name="code" />
            <img src="Conf/code.php" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" />
            <input type="submit" class="submit" onclick="return checkComment();" name="send" value="提交评论" />
        </p>
    </form>
</div>


<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>