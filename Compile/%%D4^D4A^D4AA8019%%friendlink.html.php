<?php /* Smarty version 2.6.31, created on 2018-06-07 11:16:58
         compiled from friendlink.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/friendlink.css" />
    <script type="text/javascript" src="js/link.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<?php if ($this->_tpl_vars['frontadd']): ?>
<div id="friendlink">
    <h2>申请加入链接</h2>
    <form method="post" name="friendlink">
        <input type="hidden" value="0" name="state" />
        <dl>
            <dd>网站类型：<input type="radio" name="type" onclick="link(1)" value="1" checked="checked" /> 文字链接
                <input type="radio" name="type" onclick="link(2)" value="2" /> Logo链接
            </dd>
            <dd>网站名称：<input type="text" class="text" name="webname" /> <span class="red">[必填]</span> ( * 网站名称不能为空，不大于20位 )</dd>
            <dd>网站地址：<input type="text" class="text" name="weburl" /> <span class="red">[必填]</span> ( *  网站地址不能为空，不大于100位 )</dd>
            <dd id="logo" style="display:none;">Logo地址：<input type="text" class="text" name="logourl" /> <span class="red">[必填]</span> ( * Logo地址不能为空，不大于100位 )</dd>
            <dd>站 长 名：<input type="text" class="text" name="user" /></dd>
            <dd>验 证 码：<input type="text" class="text" name="code" /> <span class="red">[必填]</span></dd>
            <dd><img src="Conf/code.php" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" /></dd>
            <dd><input type="submit" class="submit" name="send" onclick="return checkReg();" value="申请友情链接" /></dd>
        </dl>
    </form>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['frontshow']): ?>
<div id="friendlink">
    <h2>所有链接</h2>
    <h3>文字链接</h3>
    <div>
        <?php if ($this->_tpl_vars['Alltext']): ?>
        <?php $_from = $this->_tpl_vars['Alltext']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <a href="<?php echo $this->_tpl_vars['value']->weburl; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->webname; ?>
</a>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </div>
    <h3>Logo链接</h3>
    <div>
        <?php if ($this->_tpl_vars['Alllogo']): ?>
        <?php $_from = $this->_tpl_vars['Alllogo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <a href="<?php echo $this->_tpl_vars['value']->weburl; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->logourl; ?>
" alt="<?php echo $this->_tpl_vars['value']->webname; ?>
" /></a>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </div>
</div>
<?php endif; ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>