<?php /* Smarty version 2.6.31, created on 2018-06-06 14:27:43
         compiled from comment.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_manage.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 内容管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="comment.php?action=show" class="selected">评论列表</a></li>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<form method="post" action="?action=states">
    <table cellspacing="0">
        <tr><th>编号</th><th>评论内容</th><th>评论者</th><th>所属文档</th><th>状态</th><th>批审</th><th>操作</th></tr>
        <?php if ($this->_tpl_vars['CommentList']): ?>
        <?php $_from = $this->_tpl_vars['CommentList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <tr>

            <td title="<?php echo $this->_tpl_vars['value']->full; ?>
"><?php echo $this->_tpl_vars['value']->content; ?>
</td>
            <td><?php echo $this->_tpl_vars['value']->user; ?>
</td>
            <td><a href="../details.php?id=<?php echo $this->_tpl_vars['value']->cid; ?>
" target="_blank" title="<?php echo $this->_tpl_vars['value']->title; ?>
">查看</a></td>
            <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
            <td><input type="text" name="states[<?php echo $this->_tpl_vars['value']->id; ?>
]" value="<?php echo $this->_tpl_vars['value']->num; ?>
" class="text sort" /></td>
            <td><a href="comment.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个管理员吗？') ? true : false">删除</a></td>
        </tr>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <tr><td colspan="7">对不起，没有任何数据</td></tr>
        <?php endif; ?>
    </table>
</form>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>






</body>
</html>