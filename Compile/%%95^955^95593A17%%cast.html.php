<?php /* Smarty version 2.6.31, created on 2018-06-07 10:19:13
         compiled from cast.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/cast.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="cast">
    <h2>调查投票</h2>
    <table cellspacing="1">
        <caption><?php echo $this->_tpl_vars['vote_title']; ?>
</caption>
        <tr><th>投票项目</th><th>图示比例</th><th>百分比</th><th>得票数</th></tr>
        <?php if ($this->_tpl_vars['vote_item']): ?>
        <?php $_from = $this->_tpl_vars['vote_item']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <tr><td><?php echo $this->_tpl_vars['value']->title; ?>
</td><td style="text-align:left;width:<?php echo $this->_tpl_vars['width']; ?>
px;"><img src="images/b<?php echo $this->_tpl_vars['value']->picnum; ?>
.jpg" style="width:<?php echo $this->_tpl_vars['value']->picwidth; ?>
px;height:21px;" /></td><td><?php echo $this->_tpl_vars['value']->percent; ?>
</td><td><?php echo $this->_tpl_vars['value']->count; ?>
</td></tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </table>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>