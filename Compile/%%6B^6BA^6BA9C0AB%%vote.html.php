<?php /* Smarty version 2.6.31, created on 2018-06-07 10:28:36
         compiled from vote.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_vote.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 调查投票管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="vote.php?action=show" class="selected">投票主题列表</a></li>
    <li><a href="vote.php?action=add">新增投票主题</a></li>
    <?php if ($this->_tpl_vars['showchild']): ?>
    <li><a href="vote.php?action=showchild&id=<?php echo $this->_tpl_vars['id']; ?>
">投票项目列表</a></li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['addchild']): ?>
    <li><a href="vote.php?action=addchild&id=<?php echo $this->_tpl_vars['id']; ?>
">新增投票项目</a></li>
    <?php endif; ?>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="vote.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改投票主题</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>投票主题</th><th>投票项目</th><th>是否前台首选</th><th>参与人数</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllVote']): ?>
    <?php $_from = $this->_tpl_vars['AllVote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->title; ?>
</td>
        <td><a href="vote.php?action=showchild&id=<?php echo $this->_tpl_vars['value']->id; ?>
">查看</a> | <a href="vote.php?action=addchild&id=<?php echo $this->_tpl_vars['value']->id; ?>
">增加项目</a></td>
        <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->pcount; ?>
</td>
        <td><a href="vote.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="vote.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个投票吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="5">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<p class="center">[ <a href="vote.php?action=add">新增投票主题</a> ]</p>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['showchild']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>投票项目</th><th>得票数</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllChildVote']): ?>
    <?php $_from = $this->_tpl_vars['AllChildVote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->title; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->count; ?>
</td>
        <td><a href="vote.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="vote.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个等级吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="3">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>

<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="add">
    <table cellspacing="0" class="left">
        <tr><td>投票主题：<input type="text" name="title" class="text" /> (* 投票主题不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="info"></textarea> (* 投票主题描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增投票主题" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>




<?php if ($this->_tpl_vars['addchild']): ?>
<form method="post" name="add">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <table cellspacing="0" class="left">
        <tr><td>所属主题：<strong><?php echo $this->_tpl_vars['titlec']; ?>
</strong></td></tr>
        <tr><td>投票项目：<input type="text" name="title" class="text" /> (* 投票项目不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="info"></textarea> (* 投票项目描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增投票项目" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
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
        <tr><td>投票主题：<input type="text" name="title" value="<?php echo $this->_tpl_vars['titlec']; ?>
" class="text" /> (* 投票主题不得小于两位，不得大于20位！)</td></tr>
        <tr><td><textarea name="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea> (* 投票主题描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="修改投票主题" onclick="return checkForm();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

</body>
</html>