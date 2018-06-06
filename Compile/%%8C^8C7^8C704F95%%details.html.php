<?php /* Smarty version 2.6.31, created on 2018-06-06 14:43:00
         compiled from details.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'details.html', 68, false),)), $this); ?>
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



        <div class="d6">
            <h2><a href="feedback.php?cid=<?php echo $this->_tpl_vars['id']; ?>
" target="_blank">已有<span><?php echo $this->_tpl_vars['yang']; ?>
</span>人参与评论</a>最新评论</h2>
            <?php if ($this->_tpl_vars['NewThreeComment']): ?>

            <?php $_from = $this->_tpl_vars['NewThreeComment']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
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
&type=sustain" target="_blank">[<?php echo $this->_tpl_vars['value']->sustain; ?>
]支持</a> <a href="feedback.php?cid=<?php echo $this->_tpl_vars['value']->cid; ?>
&id=<?php echo $this->_tpl_vars['value']->id; ?>
&type=oppose"  target="_blank">[<?php echo $this->_tpl_vars['value']->oppose; ?>
]反对</a></dd>
            </dl>
            <?php endforeach; endif; unset($_from); ?>
            <?php else: ?>
            <dl>
                <dd style="text-align: center">此文档下没有任何评论！</dd>
            </dl>
            <?php endif; ?>


        </div>



    <div class="d5">
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
        <h2>本月本类推荐</h2>
        <ul>
            <?php if ($this->_tpl_vars['MonthNavRec']): ?>
            <?php $_from = $this->_tpl_vars['MonthNavRec']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']->title)) ? $this->_run_mod_handler('truncate', true, $_tmp, 48, '...', true) : smarty_modifier_truncate($_tmp, 48, '...', true)); ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="right">
        <h2>本月本类热点</h2>
        <ul>
            <?php if ($this->_tpl_vars['MonthNavHot']): ?>
            <?php $_from = $this->_tpl_vars['MonthNavHot']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']->title)) ? $this->_run_mod_handler('truncate', true, $_tmp, 48, '...', true) : smarty_modifier_truncate($_tmp, 48, '...', true)); ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="right">
        <h2>本类图文</h2>
        <ul>
            <?php if ($this->_tpl_vars['MonthNavPic']): ?>
            <?php $_from = $this->_tpl_vars['MonthNavPic']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo ((is_array($_tmp=$this->_tpl_vars['value']->title)) ? $this->_run_mod_handler('truncate', true, $_tmp, 48, '...', true) : smarty_modifier_truncate($_tmp, 48, '...', true)); ?>
 </a></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
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