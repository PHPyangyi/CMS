<?php /* Smarty version 2.6.31, created on 2018-06-07 14:39:32
         compiled from system.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body id="main">

<div class="map">
    管理首页 &gt;&gt; 系统配置 &gt;&gt; <strong class="title">系统配置文件</strong>
</div>


<form method="post">
    <table cellspacing="0">
        <tr><th style="text-align:center;"><strong>系统配置信息</strong></th></tr>
        <tr><td>网站　　名称：<input type="text" class="text" name="webname" value="<?php echo $this->_tpl_vars['webname']; ?>
" /></td></tr>
        <tr><td>常规　　分页：<input type="text" class="text" name="page_size" value="<?php echo $this->_tpl_vars['page_size']; ?>
" /></td></tr>
        <tr><td>文档　　分页：<input type="text" class="text" name="article_size" value="<?php echo $this->_tpl_vars['article_size']; ?>
" /></td></tr>
        <tr><td>导航　　个数：<input type="text" class="text" name="nav_size" value="<?php echo $this->_tpl_vars['nav_size']; ?>
" /></td></tr>
        <tr><td>图片上传目录：<input type="text" class="text" name="updir" value="<?php echo $this->_tpl_vars['updir']; ?>
" /></td></tr>
        <tr><td>轮播播放个数：<input type="text" class="text" name="ro_num" value="<?php echo $this->_tpl_vars['ro_num']; ?>
" /></td></tr>
        <tr><td>文字广告个数：<input type="text" class="text" name="adver_text_num" value="<?php echo $this->_tpl_vars['adver_text_num']; ?>
" /></td></tr>
        <tr><td>图片广告个数：<input type="text" class="text" name="adver_pic_num" value="<?php echo $this->_tpl_vars['adver_pic_num']; ?>
" /></td></tr>
    </table>
    <p style="margin:20px;text-align:center;"><input name="send" type="submit" value="修改配置文件" /></p>
</form>



</body>
</html>