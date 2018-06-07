<?php /* Smarty version 2.6.31, created on 2018-06-07 06:01:00
         compiled from adver.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_adver.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 内容管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="adver.php?action=show" class="selected">广告列表</a></li>
    <li><a href="adver.php?action=add">新增广告</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="adver.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改广告</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>广告标题</th><th>广告链接</th><th>广告类型</th><th>是否前台广告</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllAdver']): ?>
    <?php $_from = $this->_tpl_vars['AllAdver']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['num']+$this->_tpl_vars['key']; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->title; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->link; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->type; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
        <td><a href="adver.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">查看并修改</a> | <a href="adver.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个广告吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <tr><td colspan="6" style="color:blue;">( * 任何广告服务的操作，都必须生成js文件，方可在前台更新)</td></tr>
    <tr><td colspan="6">
        <input type="button" value="生成文字广告js" onclick="javascript:location.href='?action=text'" />
        <input type="button" value="生成头部广告js" onclick="javascript:location.href='?action=header'" />
        <input type="button" value="生成侧栏广告js" onclick="javascript:location.href='?action=sidebar'" />
    </td></tr>
    <?php else: ?>
    <tr><td colspan="6">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>

<form method="get" action="">
    <div id="page">
        <?php echo $this->_tpl_vars['page']; ?>

        <input type="hidden" name="action" value="show" />
        <select name="kind" style="background:#fff;border:1px solid #ccc;">
            <option value="0">默认全部</option>
            <option value="1">文字广告</option>
            <option value="2">头部广告690x80</option>
            <option value="3">侧栏广告270x200</option>
        </select>
        <input type="submit" value="查询" />
    </div>
</form>

<?php endif; ?>


<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="content">
    <input type="hidden" name="adv" />
    <table cellspacing="0" class="left">
        <tr><td>广告类型：<input type="radio" name="type" onclick="adver(1)" value="1" checked="checked" /> 文字广告
            <input type="radio" name="type" onclick="adver(2)" value="2" /> 头部广告690x80
            <input type="radio" name="type" onclick="adver(3)" value="3" /> 侧栏广告270x200
        </td></tr>
        <tr><td>广告标题：<input type="text" name="title" class="text" /> (* 广告标题不得小于两位，不得大于20位！)</td></tr>
        <tr><td>广告链接：<input type="text" name="link" class="text" /> (* 广告链接不得为空！)</td></tr>
        <tr id="thumbnail" style="display:none;"><td>广告图片：<input type="text" name="thumbnail" class="text" readonly="readonly" />
            <span id="up"></span>
            <img name="pic" style="display:none;" /> ( * 必须是jpg,gif,png，并且200k内)
        </td></tr>
        <tr><td><textarea name="info"></textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td><input type="submit" name="send" value="新增广告" onclick="return checkAdver();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>


<?php if ($this->_tpl_vars['update']): ?>
<form method="post" name="content">
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
    <input type="hidden" name="prev_url" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" />
    <input type="hidden" name="adv" />
    <table cellspacing="0" class="left">
        <tr><td>广告类型：<input type="radio" name="type" onclick="adver(1)" value="1" <?php echo $this->_tpl_vars['type1']; ?>
 /> 文字广告
            <input type="radio" name="type" onclick="adver(2)" value="2" <?php echo $this->_tpl_vars['type2']; ?>
 /> 头部广告690x80
            <input type="radio" name="type" onclick="adver(3)" value="3" <?php echo $this->_tpl_vars['type3']; ?>
 /> 侧栏广告270x200
        </td></tr>
        <tr><td>广告标题：<input type="text" name="title" value="<?php echo $this->_tpl_vars['titlec']; ?>
" class="text" /> (* 广告标题不得小于两位，不得大于20位！)</td></tr>
        <tr><td>广告链接：<input type="text" name="link" value="<?php echo $this->_tpl_vars['link']; ?>
" class="text" /> (* 广告链接不得为空！)</td></tr>
        <tr id="thumbnail" <?php echo $this->_tpl_vars['pic']; ?>
><td>广告图片：<input type="text" name="thumbnail" value="<?php echo $this->_tpl_vars['thumbnail']; ?>
" class="text" readonly="readonly" />
            <span id="up"><?php echo $this->_tpl_vars['up']; ?>
</span>
            <img name="pic" src="<?php echo $this->_tpl_vars['thumbnail']; ?>
" style="display:block;" /> ( * 必须是jpg,gif,png，并且200k内)
        </td></tr>
        <tr><td><textarea name="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea> (* 描述不得大于200位！)</td></tr>
        <tr><td>是否生成：<input type="radio" name="state" value="1" <?php echo $this->_tpl_vars['left_state']; ?>
 /> 是
            <input type="radio" name="state" value="0" <?php echo $this->_tpl_vars['right_state']; ?>
 /> 否  </td></tr>
        <tr><td><input type="submit" name="send" value="修改广告" onclick="return checkAdver();" class="submit level" /> [ <a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回列表</a> ]</td></tr>
    </table>
</form>
<?php endif; ?>




</body>
</html>