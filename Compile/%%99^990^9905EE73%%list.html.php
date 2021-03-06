<?php /* Smarty version 2.6.31, created on 2018-06-07 14:32:28
         compiled from list.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'truncate', 'list.html', 51, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $this->_tpl_vars['webname']; ?>
</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/list.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="list">
    <h2>当前位置 &gt; <?php echo $this->_tpl_vars['nav']; ?>
</h2>

    <?php if ($this->_tpl_vars['AllListContent']): ?>
    <?php $_from = $this->_tpl_vars['AllListContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['value']->title; ?>
" /></a></dt>

        <dd>[<strong><?php echo $this->_tpl_vars['value']->nav_name; ?>
</strong>] <a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></dd>

        <dd>日期：<?php echo $this->_tpl_vars['value']->date; ?>
 点击率：<?php echo $this->_tpl_vars['value']->count; ?>
 消耗金币 ：<?php echo $this->_tpl_vars['value']->gold; ?>
</dd>
        <dd>核心提示：<?php echo $this->_tpl_vars['value']->info; ?>
</dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <p class="none">没有任何数据</p>
    <?php endif; ?>

    <div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</div>

<div id="sidebar">
    <div class="nav">
        <h2>子栏目列表</h2>

        <?php if ($this->_tpl_vars['childnav']): ?>
        <?php $_from = $this->_tpl_vars['childnav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <strong><a href="list.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->nav_name; ?>
</a></strong>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <span>该栏目没有子类</span>
        <?php endif; ?>

    </div>

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