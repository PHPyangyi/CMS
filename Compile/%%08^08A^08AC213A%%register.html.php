<?php /* Smarty version 2.6.31, created on 2018-06-05 12:37:42
         compiled from register.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/reg.css" />
    <script type="text/javascript" src="js/reg.js"></script>
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => "header.html", 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<?php if ($this->_tpl_vars['reg']): ?>
<div id="reg">
    <h2>会员注册</h2>
    <form method="post" action="?action=reg" name="reg">
        <dl>
            <dd>用 户 名：<input type="text" class="text" name="user" /> <span class="red">[必填]</span> ( *用户名在2到20位之间 )</dd>
            <dd>密　　码：<input type="password" class="text" name="pass" /> <span class="red">[必填]</span> ( *密码不得小于6位 )</dd>
            <dd>密码确认：<input type="password" class="text" name="notpass" /> <span class="red">[必填]</span> ( *密码确认和密码一致 )</dd>
            <dd>电子邮件：<input type="text" class="text" name="email" /> <span class="red">[必填]</span> ( *每个电子邮件只能注册一个ID )</dd>
            <dd>选择头像：<select name="face" onchange="sface();">
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
            </dd>
            <dd><img name="faceimg" src="images/01.gif" class="face" alt="01.gif" /></dd>
            <dd>安全问题：<select name="question">
                <option value="">没有任何安全问题</option>
                <option value="您父亲的姓名？">您父亲的姓名？</option>
                <option value="您母亲的职业？">您母亲的职业？</option>
                <option value="您配偶的性别？">您配偶的性别？</option>
            </select>
            </dd>
            <dd>问题答案：<input type="text" class="text" name="answer" /></dd>
            <dd>验 证 码：<input type="text" class="text" name="code" /> <span class="red">[必填]</span></dd>
            <dd><img src="Conf/code.php" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" /></dd>
            <dd><input type="submit" class="submit" name="send" onclick="return checkReg();" value="注册会员" /></dd>
        </dl>
    </form>
</div>
<?php endif; ?>


<?php if ($this->_tpl_vars['login']): ?>
<div id="reg">
    <h2>会员登录</h2>
    <form method="post" name="login" action="?action=login">
        <dl>
            <dd>用 户 名：<input type="text" class="text" name="user" /> <span class="red">[必填]</span> ( *用户名在2到20位之间 )</dd>
            <dd>密　 码 ：<input type="password" class="text" name="pass" /> <span class="red">[必填]</span> ( *密码不得小于6位 )</dd>
            <dd>登录保留：<input type="radio" name="time" checked="checked" value="0" /> 不保留
                <input type="radio" name="time" value="86400" /> 一天
                <input type="radio" name="time" value="604800" /> 一周
                <input type="radio" name="time" value="2592000" /> 一月
            </dd>
            <dd>验 证 码：<input type="text" class="text" name="code" /> <span class="red">[必填]</span></dd>
            <dd><img src="Conf/code.php" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" /></dd>
            <dd><input type="submit" class="submit" name="send" onclick="return checkLogin();" value="登录" /></dd>
        </dl>
    </form>
</div>
<?php endif; ?>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>