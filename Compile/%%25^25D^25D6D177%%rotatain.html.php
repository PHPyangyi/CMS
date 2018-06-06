<?php /* Smarty version 2.6.31, created on 2018-06-06 15:38:33
         compiled from rotatain.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_rotatain.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 内容管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="rotatain.php?action=show" class="selected">轮播器列表</a></li>
    <li><a href="rotatain.php?action=add">新增轮播器</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="rotatain.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改轮播器</a></li>
    <?php endif; ?>
</ol>


<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>标题</th><th>链接</th><th>是否首页轮播</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllRotatain']): ?>
    <?php $_from = $this->_tpl_vars['AllRotatain']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['num']+$this->_tpl_vars['key']; ?>
</td>
        <td><a href="<?php echo $this->_tpl_vars['value']->full; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></td>
        <td><?php echo $this->_tpl_vars['value']->link; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
        <td><a href="rotatain.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">查看并修改</a> | <a href="rotatain.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个管理员吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="5">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="content">
    <table cellspacing="0" class="left">
        <tr><td>轮 播 图：<input type="text" name="thumbnail" readonly  class="text" />
            <input type="button" value="上传轮播图" onclick="centerWindow('../Conf/upfile.php?type=rotatain','upfile','400','200')" />
            <img name="pic" style="display:none;" /> ( * 最佳大小是268X193或以上，必须是jpg,gif,png，并且200k内)</td></tr>
        <tr><td>链　　接：<input type="text" name="link" class="text" /> (* 不得为空，站内站外连接均可)</td></tr>
        <tr><td>标　　题：<input type="text" name="title" class="text" /> (* 不得大于20位！)</td></tr>
        <tr><td><textarea name="info"></textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增轮播图" onclick="return checkAddRotatain();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


<?php if ($this->_tpl_vars['update']): ?>
<form method="post" name="content">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" name="prev_url" />
    <table cellspacing="0" class="left">
        <tr><td>轮 播 图：<input type="text" value="<?php echo $this->_tpl_vars['thumbnail']; ?>
" name="thumbnail" readonly="readonly" class="text" />
            <input type="button" value="上传轮播图" onclick="centerWindow('../config/upfile.php?type=rotatain','upfile','400','100')" />
            <img name="pic" src="<?php echo $this->_tpl_vars['thumbnail']; ?>
" style="display:block;" /> ( * 最佳大小是268X193或以上，必须是jpg,gif,png，并且200k内)</td></tr>
        <tr><td>链　　接：<input type="text" value="<?php echo $this->_tpl_vars['link']; ?>
" name="link" class="text" /> (* 不得为空，站内站外连接均可)</td></tr>
        <tr><td>标　　题：<input type="text" value="<?php echo $this->_tpl_vars['titlec']; ?>
" name="title" class="text" /> (* 不得大于20位！)</td></tr>
        <tr><td><textarea name="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td>是否轮播：<input type="radio" <?php echo $this->_tpl_vars['left_state']; ?>
 name="state" value="1" /> 是 <input type="radio" <?php echo $this->_tpl_vars['right_state']; ?>
 name="state" value="0" /> 否</td></tr>
        <tr><td><input type="submit" name="send" value="修改轮播图" onclick="return checkAddRotatain();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>



</body>
</html>