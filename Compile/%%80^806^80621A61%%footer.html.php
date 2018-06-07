<?php /* Smarty version 2.6.31, created on 2018-06-07 11:20:39
         compiled from footer.html */ ?>
<div id="link">
    <h2><span><a href="friendlink.php?action=frontshow" target="_blank">所有链接</a> | <a href="friendlink.php?action=frontadd" target="_blank">申请加入</a></span>友情链接</h2>
    <ul>
        <?php if ($this->_tpl_vars['text']): ?>
        <?php $_from = $this->_tpl_vars['text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <li><a href="<?php echo $this->_tpl_vars['value']->weburl; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->webname; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ul>
    <dl>
        <?php if ($this->_tpl_vars['logo']): ?>
        <?php $_from = $this->_tpl_vars['logo']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <dd><a href="<?php echo $this->_tpl_vars['value']->weburl; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->logourl; ?>
" alt="<?php echo $this->_tpl_vars['value']->webname; ?>
" /></a></dd>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </dl>
</div>
<div id="footer">
    <p>Powered by <span>YangWeb.COM</span> (C) 2018-2022 DesDev Inc.</p>
    <p>Copyright (C) 2018-2022 YangWeb-CMS. <span>YangWeb俱乐部</span> 版权所有</p>
</div>