<?php /* Smarty version 2.6.31, created on 2018-06-01 13:10:47
         compiled from manage.html */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'counter', 'manage.html', 18, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>main</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 管理员管理
</div>

<table cellspacing="0">
    <tr><th>编号</th><th>用户名</th><th>等级</th><th>登录次数</th><th>最近登录ip</th><th>最近登录时间</th></tr>
    <?php $_from = $this->_tpl_vars['AllManage']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo smarty_function_counter(array(), $this);?>
 </td>
        <td><?php echo $this->_tpl_vars['value']->admin_user; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->level; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->login_count; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->last_ip; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->last_time; ?>
</td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
</table>


</body>
</html>