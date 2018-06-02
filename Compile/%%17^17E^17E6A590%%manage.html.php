<?php /* Smarty version 2.6.31, created on 2018-06-02 02:58:44
         compiled from manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'manage.html', 20, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_manage_option.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 管理员管理&gt;&gt; <strong><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<?php if ($this->_tpl_vars['list']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登录ip</th><th>最近登录时间</th><th>操作</th></tr>
    <?php $_from = $this->_tpl_vars['AllManage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo smarty_function_counter(array(), $this);?>
 </td>
        <td><?php echo $this->_tpl_vars['value']->admin_user; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->level_name; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->login_count; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->last_ip; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->last_time; ?>
</td>
        <td><a href="manage.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="manage.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>
<p class="center">[ <a href="manage.php?action=add">新增管理员</a> ]</p>
<?php endif; ?>

<?php if ($this->_tpl_vars['add']): ?>
<form method="post">
    <table cellspacing="0" class="left">
        <tr><td>用户名：<input type="text" name="admin_user" class="text" /></td></tr>
        <tr><td>密　码：<input type="password" name="admin_pass" class="text" /></td></tr>
        <tr><td  >等　级：<select name="level" style="height:30px;">
            <option value="1">后台游客</option>
            <option value="2">会员专员</option>
            <option value="3">评论专员</option>
            <option value="4">发帖专员</option>
            <option value="5">普通管理员</option>
            <option value="6">超级管理员</option>
        </select>
        </td></tr>
        <tr><td><input type="submit" name="send" value="新增管理员" class="submit" /> [ <a href="manage.php?action=list">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['update']): ?>
<form method="post">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id">
    <input type="hidden" value="<?php echo $this->_tpl_vars['level']; ?>
" id="level" />
    <table cellspacing="0" class="left">
        <tr><td>用户名：<input type="text" name="admin_user" class="text"  value="<?php echo $this->_tpl_vars['admin_user']; ?>
" disabled /></td></tr>
        <tr><td>密　码：<input type="password" name="admin_pass" class="text"  /></td></tr>
        <tr><td >等　级：<select name="level" style="height:30px;">
            <option value="1">后台游客</option>
            <option value="2">会员专员</option>
            <option value="3">评论专员</option>
            <option value="4">发帖专员</option>
            <option value="5">普通管理员</option>
            <option value="6">超级管理员</option>
        </select>
        </td></tr>
        <tr><td><input type="submit" name="send" value="修改管理员" class="submit" /> [ <a href="manage.php?action=list">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['delete']): ?>
    show delete
<?php endif; ?>

</body>
</html>