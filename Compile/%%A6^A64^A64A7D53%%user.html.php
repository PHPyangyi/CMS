<?php /* Smarty version 2.6.31, created on 2018-06-08 03:27:06
         compiled from user.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_user.js"></script>
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 会员管理 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="user.php?action=show" class="selected">会员列表</a></li>
    <li><a href="user.php?action=add">新增会员</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="user.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改会员</a></li>
    <?php endif; ?>
</ol>

<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>用户名</th><th>电子邮件</th><th>状态</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['AllUser']): ?>
    <?php $_from = $this->_tpl_vars['AllUser']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']+1; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->user; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->email; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->state; ?>
</td>
        <td><a href="user.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="user.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个会员吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="5">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<p class="center">[ <a href="user.php?action=add">新增会员</a> ]</p>
<div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['add']): ?>
<form method="post" name="reg">
    <table cellspacing="0" class="user">
        <tr><td>用 户 名：<input type="text" class="text" name="user" /> <span class="red">[必填]</span> ( *用户名在2到20位之间 )</td></tr>
        <tr><td>密　　码：<input type="password" class="text" name="pass" /> <span class="red">[必填]</span> ( *密码不得小于6位 )</td></tr>
        <tr><td>密码确认：<input type="password" class="text" name="notpass" /> <span class="red">[必填]</span> ( *密码确认和密码一致 )</td></tr>
        <tr><td>电子邮件：<input type="text" class="text" name="email" /> <span class="red">[必填]</span> ( *每个电子邮件只能注册一个ID )</td></tr>
        <tr><td>选择头像：<select name="face" onchange="sface();">
            <?php $_from = $this->_tpl_vars['OptionFaceOne']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <option value="0<?php echo $this->_tpl_vars['value']; ?>
.gif">0<?php echo $this->_tpl_vars['value']; ?>
.gif</option>
            <?php endforeach; endif; unset($_from); ?>
            <?php $_from = $this->_tpl_vars['OptionFaceTwo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <option value="<?php echo $this->_tpl_vars['value']; ?>
.gif"><?php echo $this->_tpl_vars['value']; ?>
.gif</option>
            <?php endforeach; endif; unset($_from); ?>
        </select>
        </td></tr>
        <tr><td><img name="faceimg" src="../images/01.gif" class="face" alt="01.gif" /></td></tr>
        <tr><td>安全问题：<select name="question"  >
            <option value="">没有任何安全问题</option>
            <option value="您父亲的姓名？">您父亲的姓名？</option>
            <option value="您母亲的职业？">您母亲的职业？</option>
            <option value="您配偶的性别？">您配偶的性别？</option>
        </select>
        </td></tr>
        <tr><td>问题答案：<input type="text" class="text" name="answer" /></td></tr>
        <tr><td>设置权限：<input type="radio" name="state" value="0" /> 被封杀的会员
            <input type="radio" name="state" value="1" /> 待审核的会员
            <input type="radio" name="state" value="2" checked="checked" /> 初级会员
            <input type="radio" name="state" value="3" /> 中级会员
            <input type="radio" name="state" value="4" /> 高级会员
            <input type="radio" name="state" value="5" /> VIP会员
        </td></tr>
        <tr><td><input type="submit" class="submit" name="send" onclick="return checkReg();" value="注册会员" /></td></tr>
    </table>
</form>
<?php endif; ?>

<?php if ($this->_tpl_vars['update']): ?>
<form method="post" name="reg">
    <input type="hidden" value="<?php echo $this->_tpl_vars['id']; ?>
" name="id" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['pass']; ?>
" name="ppass" />
    <input type="hidden" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" name="prev_url" />
    <table cellspacing="0" class="user">
        <tr><td>用 户 名： <?php echo $this->_tpl_vars['user']; ?>
</td></tr>
        <tr><td>密　　码：<input type="password" class="text" name="pass" />  ( * 留空则不修改 )</td></tr>
        <tr><td>电子邮件：<input type="text" class="text" value="<?php echo $this->_tpl_vars['email']; ?>
" name="email" /> <span class="red">[必填]</span> ( *每个电子邮件只能注册一个ID )</td></tr>
        <tr><td>选择头像：<select name="face" onchange="sface();">
            <?php echo $this->_tpl_vars['face']; ?>

        </select>
        </td></tr>
        <tr><td><img name="faceimg" src="../images/<?php echo $this->_tpl_vars['facesrc']; ?>
" class="face" alt="01.gif" /></td></tr>
        <tr><td>安全问题：<select name="question">
            <option value="">没有任何安全问题</option>
            <?php echo $this->_tpl_vars['question']; ?>

        </select>
        </td></tr>
        <tr><td>问题答案：<input type="text" class="text" value="<?php echo $this->_tpl_vars['answer']; ?>
" name="answer" /></td></tr>
        <tr><td>设置权限：<?php echo $this->_tpl_vars['state']; ?>

        </td></tr>
        <tr><td><input type="submit" class="submit" onclick="return checkUpdate();" name="send" value="修改会员" /> [<a href="<?php echo $this->_tpl_vars['prev_url']; ?>
">返回上一层</a>]</td></tr>
    </table>
</form>
<?php endif; ?>


</body>
</html>