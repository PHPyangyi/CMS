<?php /* Smarty version 2.6.31, created on 2018-06-07 10:57:40
         compiled from link.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_link.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 内容管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="link.php?action=show" class="selected">友情链接列表</a></li>
    <li><a href="link.php?action=add">新增友情链接</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="link.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改友情链接</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>网站名称</th><th>网址地址</th><th>Logo地址</th><th>站长名</th><th>类型</th><th>状态</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllLink']): ?>
    <?php $_from = $this->_tpl_vars['AllLink']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['num']+$this->_tpl_vars['key']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->webname; ?>
</td>
        <td title="<?php echo $this->_tpl_vars['value']->fullweburl; ?>
"><?php echo $this->_tpl_vars['value']->weburl; ?>
</td>
        <td title="<?php echo $this->_tpl_vars['value']->fulllogourl; ?>
"><?php echo $this->_tpl_vars['value']->logourl; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->user; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->type; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
        <td><a href="link.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="link.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个链接吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="8">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="friendlink">
    <input type="hidden" value="1" name="state" />
    <table cellspacing="0" class="left">
        <tr><td>网站类型：<input type="radio" name="type" onclick="link(1)" value="1" checked="checked" /> 文字链接
            <input type="radio" name="type" onclick="link(2)" value="2" /> Logo链接</td></tr>
        <tr><td>网站名称：<input type="text" class="text" name="webname" /> <span class="red">[必填]</span> ( * 网站名称不能为空，不大于20位 )</td></tr>
        <tr><td>网站地址：<input type="text" class="text" name="weburl" /> <span class="red">[必填]</span> ( *  网站地址不能为空，不大于100位 )</td></tr>
        <tr id="logo" style="display:none;"><td>Logo地址：<input type="text" class="text" name="logourl" /> <span class="red">[必填]</span> ( * Logo地址不能为空，不大于100位 )</td></tr>
        <tr><td>站 长 名：<input type="text" class="text" name="user" /></td></tr>
        <tr><td><input type="submit" name="send" value="新增友情链接" onclick="return checkLink();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
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
    <input type="hidden" value="<?php echo $this->_tpl_vars['state']; ?>
" name="state" />
    <table cellspacing="0" class="left">
        <tr><td>网站类型：<input type="radio" name="type" <?php echo $this->_tpl_vars['text_type']; ?>
 onclick="link(1)" value="1"  /> 文字链接
            <input type="radio" name="type" <?php echo $this->_tpl_vars['logo_type']; ?>
 onclick="link(2)" value="2" /> Logo链接</td></tr>
        <tr><td>网站名称：<input type="text" value="<?php echo $this->_tpl_vars['webname']; ?>
" class="text" name="webname" /> <span class="red">[必填]</span> ( * 网站名称不能为空，不大于20位 )</td></tr>
        <tr><td>网站地址：<input type="text" value="<?php echo $this->_tpl_vars['weburl']; ?>
"  class="text" name="weburl" /> <span class="red">[必填]</span> ( *  网站地址不能为空，不大于100位 )</td></tr>
        <tr id="logo" style="<?php echo $this->_tpl_vars['logo']; ?>
"><td>Logo地址：<input type="text" value="<?php echo $this->_tpl_vars['logourl']; ?>
"  class="text" name="logourl" /> <span class="red">[必填]</span> ( * Logo地址不能为空，不大于100位 )</td></tr>
        <tr><td>站 长 名：<input type="text" class="text" name="user" value="<?php echo $this->_tpl_vars['user']; ?>
"  /></td></tr>
        <tr><td><input type="submit" name="send" value="修改友情链接" onclick="return checkLink();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>

</body>
</html>