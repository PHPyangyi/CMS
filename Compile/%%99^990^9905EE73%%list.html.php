<?php /* Smarty version 2.6.31, created on 2018-06-05 15:06:25
         compiled from list.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/basic.css" />
    <link rel="stylesheet" type="text/css" href="css/list.css" />
</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<div id="list">
    <h2>当前位置 &gt; <?php echo $this->_tpl_vars['nav']; ?>
</h2>

    <?php if ($this->_tpl_vars['AllListContent']): ?>
    <?php $_from = $this->_tpl_vars['AllListContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['value']->title; ?>
" /></a></dt>
        <dd>[<strong><?php echo $this->_tpl_vars['value']->nav_name; ?>
</strong>] <a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></dd>
        <dd>日期：<?php echo $this->_tpl_vars['value']->date; ?>
 点击率：<?php echo $this->_tpl_vars['value']->count; ?>
 好评：0</dd>
        <dd>核心提示：<?php echo $this->_tpl_vars['value']->info; ?>
</dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <p class="none">没有任何数据</p>
    <?php endif; ?>

    <div id="page"><?php echo $this->_tpl_vars['page']; ?>
</div>
</div>

<div id="sidebar">
    <div class="nav">
        <h2>子栏目列表</h2>

        <?php if ($this->_tpl_vars['childnav']): ?>
        <?php $_from = $this->_tpl_vars['childnav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <strong><a href="list.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
"><?php echo $this->_tpl_vars['value']->nav_name; ?>
</a></strong>
        <?php endforeach; endif; unset($_from); ?>
        <?php else: ?>
        <span>该栏目没有子类</span>
        <?php endif; ?>

    </div>

    <div class="right">
        <h2>本类推荐</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
        </ul>
    </div>
    <div class="right">
        <h2>本类热点</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
        </ul>
    </div>
    <div class="right">
        <h2>本类图文</h2>
        <ul>
            <li><em>06-20</em><a href="###">银监会否认首套房贷首付将提至...</a></li>
            <li><em>04-02</em><a href="###">发改委曝房价违规开发商名单央...</a></li>
            <li><em>02-13</em><a href="###">社科院预测更严厉楼市政策年内...</a></li>
            <li><em>05-05</em><a href="###">比亚迪拟“缩水”回归A股 以缓解...</a></li>
            <li><em>07-11</em><a href="###">第一线：北京限制高价盘预售证...</a></li>
            <li><em>03-18</em><a href="###">电网主辅分离或年内完成 葛洲坝...</a></li>
            <li><em>05-02</em><a href="###">京沪高铁将于6月9日起试运行10...</a></li>
        </ul>
    </div>
</div>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</body>
</html>