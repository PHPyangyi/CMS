<?php /* Smarty version 2.6.31, created on 2018-06-08 03:43:50
         compiled from premission.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_premission.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 权限管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="premission.php?action=show" class="selected">权限列表</a></li>
    <li><a href="premission.php?action=add">新增权限</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="premission.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改权限</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>权限名称</th><th>标识</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllPremission']): ?>
    <?php $_from = $this->_tpl_vars['AllPremission']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['num']+$this->_tpl_vars['key']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->name; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->id; ?>
</td>
        <td><a href="premission.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="premission.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个权限吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="4">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="add">
    <table cellspacing="0" class="left">
        <tr><td>权限名称：<input type="text" name="name" class="text" /> (* 权限名称不得小于两位，不得大于100位！)</td></tr>
        <tr><td><textarea name="info"></textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增权限" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


<?php if ($this->_tpl_vars['update']): ?>
<form method="post" name="add">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" name="prev_url" />
    <table cellspacing="0" class="left">
        <tr><td>权限名称：<input type="text" name="name" value="<?php echo $this->_tpl_vars['name']; ?>
" class="text" /> (* 权限名称不得小于两位，不得大于100位！)</td></tr>
        <tr><td><textarea name="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="修改权限" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


</body>
</html>