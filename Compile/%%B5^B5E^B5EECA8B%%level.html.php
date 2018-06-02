<?php /* Smarty version 2.6.31, created on 2018-06-02 12:50:29
         compiled from level.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'level.html', 28, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_level.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 等级管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="level.php?action=show" class="selected">等级列表</a></li>
    <li><a href="level.php?action=add">新增等级</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="level.php?action=update">修改等级</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>等级名称</th><th>描述</th><th>操作</th></tr>
    <?php $_from = $this->_tpl_vars['AllLevel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo smarty_function_counter(array(), $this);?>
 </td>
        <td><?php echo $this->_tpl_vars['value']->level_name; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->level_info; ?>
</td>
        <td><a href="level.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="level.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个等级吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>
<p class="center">[ <a href="level.php?action=add">新增等级</a> ]</p>
<?php endif; ?>


<?php if ($this->_tpl_vars['add']): ?>
<form method="post">
    <table cellspacing="0" class="left">
        <tr><td>等级名称：<input type="text" name="level_name" class="text" />(* 等级名称不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="level_info"></textarea>(* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增等级" class="submit level" onclick="return checkForm();" /> [ <a href="level.php?action=show">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['update']): ?>
<form method="post">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <table cellspacing="0" class="left">
        <tr><td>等级名称：<input type="text" name="level_name" value="<?php echo $this->_tpl_vars['level_name']; ?>
" class="text" />(* 等级名称不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="level_info"><?php echo $this->_tpl_vars['level_info']; ?>
</textarea>(* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="修改等级" class="submit level" onclick="return checkForm();" /> [ <a href="level.php?action=show">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

</body>
</html>