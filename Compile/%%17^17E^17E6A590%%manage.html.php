<?php /* Smarty version 2.6.31, created on 2018-06-04 12:57:35
         compiled from manage.html */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_manage.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 管理员管理&gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>


<ol>
    <li><a href="manage.php?action=show" class="selected">管理员列表</a></li>
    <li><a href="manage.php?action=add">新增管理员</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="manage.php?action=update">修改管理员</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>序号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登录ip</th><th>最近登录时间</th><th>操作</th></tr>
    <?php $_from = $this->_tpl_vars['AllManage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']+1; ?>
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
" onclick="return confirm('你真的要删除这个等级吗？') ? true : false" >删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>
<p class="center">[ <a href="manage.php?action=add">新增管理员</a> ]</p>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['add']): ?>
<form method="post">
    <table cellspacing="0" class="left">
        <tr><td>用  户  名 ：<input type="text" name="admin_user" class="text" />(* 不得小于两位，不得大于20位)</td></tr>
        <tr><td>密　 码 ：<input type="password" name="admin_pass" class="text" /> (* 不得小于六位)</td></tr>
        <tr><td>密码确认：<input type="password" name="admin_notpass" class="text" /> (* 必须同密码一致)</td></tr>
        <tr><td  >等　级：<select name="level" style="height:30px;">
            <?php $_from = $this->_tpl_vars['AllLevel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <option value="<?php echo $this->_tpl_vars['value']->id; ?>
"> <?php echo $this->_tpl_vars['value']->level_name; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        </td></tr>
        <tr><td><input type="submit" name="send" value="新增管理员" class="submit" onclick="return checkAddForm();" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['update']): ?>
<form method="post">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['level']; ?>
" id="level" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['admin_pass']; ?>
" name="pass" />
    <table cellspacing="0" class="left">
        <tr><td>用户名：<input type="text" name="admin_user" class="text"  value="<?php echo $this->_tpl_vars['admin_user']; ?>
" disabled /></td></tr>
        <tr><td>密　码：<input type="password" name="admin_pass" class="text"  />(* 留空则不修改)</td></tr>
        <tr><td >等　级：<select name="level" style="height:30px;">
            <?php $_from = $this->_tpl_vars['AllLevel']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <option value="<?php echo $this->_tpl_vars['value']->id; ?>
"> <?php echo $this->_tpl_vars['value']->level_name; ?>
</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        </td></tr>
        <tr><td><input type="submit" name="send" value="修改管理员" class="submit" onclick="return checkUpdateForm();" /> [<a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>



</body>
</html>