<?php /* Smarty version 2.6.31, created on 2018-06-03 13:56:33
         compiled from nav.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>nav</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_nav.js"></script>
</head>
<body id="main">

<div class="map">
    内容管理 &gt;&gt; 设置网站导航 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="nav.php?action=show" class="selected">导航列表</a></li>
    <li><a href="nav.php?action=add">新增导航</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="nav.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改导航</a></li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['addchild']): ?>
    <li><a href="nav.php?action=addchild&id=<?php echo $this->_tpl_vars['id']; ?>
">新增子导航</a></li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['showchild']): ?>
    <li><a href="nav.php?action=showchild&id=<?php echo $this->_tpl_vars['id']; ?>
">子导航列表</a></li>
    <?php endif; ?>
</ol>


<?php if ($this->_tpl_vars['show']): ?>
<form method="post" action="nav.php?action=sort">
<table cellspacing="0">
    <tr><th>编号</th><th>导航名称</th><th>描述</th><th>子类</th><th>操作</th><th>排序</th></tr>
    <?php if ($this->_tpl_vars['AllNav']): ?>
    <?php $_from = $this->_tpl_vars['AllNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->nav_name; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->nav_info; ?>
</td>
        <td><a href="nav.php?action=showchild&id=<?php echo $this->_tpl_vars['value']->id; ?>
">查看</a> | <a href="nav.php?action=addchild&id=<?php echo $this->_tpl_vars['value']->id; ?>
">增加子类</a></td>
        <td><a href="nav.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="nav.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个导航吗？') ? true : false">删除</a></td>
        <td><input type="text" name="sort[<?php echo $this->_tpl_vars['value']->id; ?>
]" value="<?php echo $this->_tpl_vars['value']->sort; ?>
" class="text sort" /></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="4">对不起，没有任何数据</td></tr>
    <?php endif; ?>
    <tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序" style="cursor:pointer;" /></td></tr>
</table>
<p class="center">[ <a href="nav.php?action=add">新增导航</a> ]</p>
</form>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['showchild']): ?>
<form method="post" action="nav.php?action=sort">
<table cellspacing="0">
    <tr><th>编号</th><th>导航名称</th><th>描述</th><th>操作</th><th>排序</th></tr>
    <?php if ($this->_tpl_vars['AllChildNav']): ?>
    <?php $_from = $this->_tpl_vars['AllChildNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->nav_name; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->nav_info; ?>
</td>
        <td><a href="nav.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="nav.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个导航吗？') ? true : false">删除</a></td>
        <td><input type="text" name="sort[<?php echo $this->_tpl_vars['value']->id; ?>
]" value="<?php echo $this->_tpl_vars['value']->sort; ?>
" class="text sort" /></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="4">对不起，没有任何数据</td></tr>
    <?php endif; ?>
    <tr><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序" style="cursor:pointer;" /></td></tr>
    <tr><td colspan="4">本类隶属：<strong><?php echo $this->_tpl_vars['prev_name']; ?>
</strong> [ <a href="nav.php?action=addchild&id=<?php echo $this->_tpl_vars['id']; ?>
">增加本类</a> ] [ <a href="nav.php?action=show">返回列表</a> ]</td></tr>
</table>
</form>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>



<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="add">
    <table cellspacing="0" class="left">
        <tr><td>导航名称：<input type="text" name="nav_name" class="text" /> (* 导航名称不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="nav_info"></textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增导航" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


<?php if ($this->_tpl_vars['addchild']): ?>
<form method="post" name="add">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="pid" />
    <table cellspacing="0" class="left">
        <tr><td>上级导航：<strong><?php echo $this->_tpl_vars['prev_name']; ?>
</strong></td></tr>
        <tr><td>导航名称：<input type="text" name="nav_name" class="text" /> (* 导航名称不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="nav_info"></textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增子导航" onclick="return checkForm();" class="submit level" /> [ <a href="nav.php?action=show">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['update']): ?>
<form method="post" name="add">
    <input type="hidden" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" name="prev_url" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <table cellspacing="0" class="left">
        <tr><td>导航名称：<input type="text" name="nav_name" value="<?php echo $this->_tpl_vars['nav_name']; ?>
" class="text" /> (* 导航名称不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="nav_info"><?php echo $this->_tpl_vars['nav_info']; ?>
</textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="修改导航" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


</body>
</html>