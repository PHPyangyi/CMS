<?php /* Smarty version 2.6.31, created on 2018-06-07 06:07:11
         compiled from header.html */ ?>

<div id="top">
    <?php echo $this->_tpl_vars['title']; ?>


    <?php if ($this->_tpl_vars['data']): ?>
    <span style="color: red; font-size: 15px;"><?php echo $this->_tpl_vars['data']; ?>
&nbsp&nbsp你好~&nbsp</span> <a href="register.php?action=logout">退出</a>
    <?php else: ?>
    <a href="register.php?action=reg" class="user">注册</a>
    <a href="register.php?action=login" class="user">登录</a>
    <?php endif; ?>


    <a href="###"><script type="text/javascript" src="js/text_adver.js"></script></a>
    <a href="###"><script type="text/javascript" src="js/text_adver.js"></script></a>
</div>
<div id="header">
   <h1></h1>
    <div class="adver"><script type="text/javascript" src="js/header_adver.js"></script></div>


</div>
<div id="nav">
    <ul>
        <li><a href="index.php">首页</a></li>
        <?php if ($this->_tpl_vars['FrontNav']): ?>
        <?php $_from = $this->_tpl_vars['FrontNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <li><a href="list.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->nav_name; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ul>
</div>
<div id="search">
    <form>
        <select name="search">
            <option selected="selected">按标题</option>
            <option>按关键字</option>
            <option>全局查询</option>
        </select>
        <input type="text" name="keyword" class="text" />
        <input type="submit" name="send" class="submit" value="搜索" />
    </form>
    <strong>TAG标签：</strong>
    <ul>
        <li><a href="###">基金(3)</a></li>
        <li><a href="###">美女(1)</a></li>
        <li><a href="###">白兰地(3)</a></li>
        <li><a href="###">音乐(1)</a></li>
        <li><a href="###">体育(1)</a></li>
        <li><a href="###">直播(1)</a></li>
        <li><a href="###">会晤(1)</a></li>
        <li><a href="###">韩日(1)</a></li>
        <li><a href="###">警方(1)</a></li>
        <li><a href="###">广州(1)</a></li>
    </ul>
</div>