<?php /* Smarty version 2.6.31, created on 2018-06-07 04:54:34
         compiled from admin_login.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录CMS后台管理系统</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_login.js"></script>
</head>
<body>

<form id="adminLogin" name="login" method="post" action="?action=login">
    <fieldset>
        <legend>登录CMS后台管理系统</legend>
        <label>账　号：<input type="text" name="admin_user" class="text" /></label>
        <label>密　码：<input type="password" name="admin_pass" class="text" /></label>
        <label>验证码：<input type="text" name="code" class="text" /></label>
        <label class="t">输入下图的字符，不区分大小写</label>
        <label><img src="../Conf/code.php" onclick="javascript:this.src='../Conf/code.php?tm='+Math.random();" /></label>
        <input type="submit" value="登录" class="submit" onclick="return checkLogin();" name="send" />
    </fieldset>
</form>

</body>
</html>