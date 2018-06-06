<?php /* Smarty version 2.6.31, created on 2018-06-06 15:57:37
         compiled from index.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CMS内容管理系统</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <script type="text/javascript" src="../js/reg.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.0.js"></script>

    <?php echo '
    <style type="text/css">

        #banner { position: relative; width: 268px; 	height:190px;; border: 1px solid #666; overflow: hidden; }

        #banner_list img { border: 0px; }

        #banner_bg { position: absolute; bottom: 0; background-color: #000; height: 30px; filter: Alpha(Opacity=30); opacity: 0.3; z-index: 1000; cursor: pointer; width: 478px; }

        #banner_info { position: absolute; bottom: 0; left: 5px; height: 22px; color: #fff; z-index: 1001; cursor: pointer }

        #banner_text { position: absolute; width: 120px; z-index: 1002; right: 3px; bottom: 3px; }

        #banner ul { position: absolute; list-style-type: none; filter: Alpha(Opacity=80); opacity: 0.8; z-index: 1002; margin: 0; padding: 0; bottom: 3px; right: 5px; }

        #banner ul li { padding: 0px 8px; float: left; display: block; color: #FFF; background: #6f4f67; cursor: pointer; border: 1px solid #333; }

        #banner ul li.on { background-color: #000; }

        #banner_list a { position: absolute; }

    </style>

    <script type="text/javascript">

        var t = n =0, count;

        $(document).ready(function(){

            count=$("#banner_list a").length;

            $("#banner_list a:not(:first-child)").hide();

            $("#banner_info").html($("#banner_list a:first-child").find("img").attr(\'alt\'));

            $("#banner_info").click(function(){window.open($("#banner_list a:first-child").attr(\'href\'), "_blank")});

            $("#banner li").click(function() {

                var i = $(this).text() -1;//获取Li元素内的值，即1，2，3，4

                n = i;

                if (i >= count) return;

                $("#banner_info").html($("#banner_list a").eq(i).find("img").attr(\'alt\'));

                $("#banner_info").unbind().click(function(){window.open($("#banner_list a").eq(i).attr(\'href\'), "_blank")})

                $("#banner_list a").filter(":visible").fadeOut(500).parent().children().eq(i).fadeIn(1000);

                document.getElementById("banner").style.background="";

                $(this).toggleClass("on");

                $(this).siblings().removeAttr("class");

            });

            t = setInterval("showAuto()", 4000);

            $("#banner").hover(function(){clearInterval(t)}, function(){t = setInterval("showAuto()", 4000);});

        })



        function showAuto()

        {

            n = n >=(count -1) ?0 : ++n;

            $("#banner li").eq(n).trigger(\'click\');

        }

    </script>
    '; ?>

</head>
<body>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

<div id="user">
    <h2>会员信息</h2>
    <?php if ($this->_tpl_vars['data']): ?>
    <div class="a">您好，<strong><?php echo $this->_tpl_vars['data']; ?>
</strong> 欢迎光临</div>
    <div class="b">
        <img src="images/<?php echo $this->_tpl_vars['face']; ?>
" alt="<?php echo $this->_tpl_vars['data']; ?>
" />
        <a href="###">个人中心</a>
        <a href="###">我的评论</a>
        <a href="register.php?action=logout">退出登录</a>
    </div>
    <?php else: ?>
    <form action="register.php?action=login" method="post" name="login">
        <label>用户名：<input type="text" name="user" class="text" /></label>
        <label>密　码：<input type="password" name="pass" class="text" /></label>
        <label class="yzm">验证码：<input type="text" name="code" class="text code" /> <img src="Conf/code.php"  style="width: 75px;height: 25px;cursor:hand;" onclick="javascript:this.src='Conf/code.php?tm='+Math.random();" class="code" /></label>
        <p><input type="submit" name="send" value="登录" onclick="return checkLogin();" class="submit" /> <a href="register.php?action=reg">注册会员</a> <a href="###">忘记密码?</a> </p>
    </form>
    <?php endif; ?>
    <h3>最近登录会员 <span>────────────</span></h3>
    <?php $_from = $this->_tpl_vars['AllLaterUser']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><img src="images/<?php echo $this->_tpl_vars['value']->face; ?>
" alt="头像" /></dt>
        <dd><?php echo $this->_tpl_vars['value']->user; ?>
</dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>

</div>
<div id="news">
    <h3><a href="details.php?id=<?php echo $this->_tpl_vars['TopId']; ?>
" target="_blank"><?php echo $this->_tpl_vars['TopTitle']; ?>
</a></h3>
    <p>核心提示：<?php echo $this->_tpl_vars['TopInfo']; ?>
<a href="details.php?id=<?php echo $this->_tpl_vars['TopId']; ?>
" target="_blank">[查看全文]</a></p>
    <p class="link">
        <?php if ($this->_tpl_vars['NewTopList']): ?>
        <?php $_from = $this->_tpl_vars['NewTopList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a> <?php echo $this->_tpl_vars['value']->line; ?>

        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </p>
    <ul>
        <?php if ($this->_tpl_vars['NewList']): ?>
        <?php $_from = $this->_tpl_vars['NewList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ul>
</div>
<div id="pic">


    <div id="banner">


        <ul>
            <?php $_from = $this->_tpl_vars['yang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li class="on"><?php echo $this->_tpl_vars['key']+1; ?>
</li>
            <?php endforeach; endif; unset($_from); ?>
        </ul>

        <div id="banner_list">

            <?php $_from = $this->_tpl_vars['yang']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <a href="<?php echo $this->_tpl_vars['value']->link; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->thumbnail; ?>
" title="<?php echo $this->_tpl_vars['value']->title; ?>
" alt="images"/></a>
            <?php endforeach; endif; unset($_from); ?>

        </div>

    </div>



</div>
<div id="rec">
    <h2>特别推荐</h2>
    <ul>
        <?php if ($this->_tpl_vars['NewRecList']): ?>
        <?php $_from = $this->_tpl_vars['NewRecList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
        <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></li>
        <?php endforeach; endif; unset($_from); ?>
        <?php endif; ?>
    </ul>
</div>
<div id="sidebar-right">
    <div class="adver"><img src="images/adver2.png" alt="广告图" /></div>
    <div class="hot">
        <h2>本月热点</h2>
        <ul>
            <?php if ($this->_tpl_vars['MonthHotList']): ?>
            <?php $_from = $this->_tpl_vars['MonthHotList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="comm">
        <h2>本月评论</h2>
        <ul>
            <?php if ($this->_tpl_vars['MonthCommentList']): ?>
            <?php $_from = $this->_tpl_vars['MonthCommentList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
            <li><em><?php echo $this->_tpl_vars['value']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></li>
            <?php endforeach; endif; unset($_from); ?>
            <?php endif; ?>
        </ul>
    </div>
    <div class="vote">
        <h2>调查投票</h2>
        <h3>请问您是怎么知道本站的：</h3>
        <form>
            <label><input type="radio" name="vote" checked="checked" /> 门户网站的搜索引擎</label>
            <label><input type="radio" name="vote" /> Google或百度搜索</label>
            <label><input type="radio" name="vote" /> 别的网站上的链接</label>
            <label><input type="radio" name="vote" /> 朋友介绍或者电视广告</label>
            <p><input type="submit" value="投票" name="send" /> <input type="button" value="查看" /></p>
        </form>
    </div>
</div>
<div id="picnews">
    <h2>图文资讯</h2>
    <?php if ($this->_tpl_vars['PicList']): ?>
    <?php $_from = $this->_tpl_vars['PicList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <dl>
        <dt><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><img src="<?php echo $this->_tpl_vars['value']->thumbnail; ?>
" alt="<?php echo $this->_tpl_vars['value']->title; ?>
" /></a></dt>
        <dd><a href="details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></dd>
    </dl>
    <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>
</div>

<div id="newslist" style="height: auto;">

    <?php if ($this->_tpl_vars['FourNav']): ?>
    <?php $_from = $this->_tpl_vars['FourNav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <div class="<?php echo $this->_tpl_vars['value']->class; ?>
">
        <h2><a href="list.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" target="_blank">更多</a><?php echo $this->_tpl_vars['value']->nav_name; ?>
</h2>
        <ul>

            <?php $_from = $this->_tpl_vars['value']->list; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['item']):
?>
            <li><em><?php echo $this->_tpl_vars['item']->date; ?>
</em><a href="details.php?id=<?php echo $this->_tpl_vars['item']->id; ?>
" target="_blank"><?php echo $this->_tpl_vars['item']->title; ?>
</a></li>
            <?php endforeach; else: ?>
                <div style="text-align: center">暂无任何数据 </div>
            <?php endif; unset($_from); ?>
        </ul>
    </div>
    <?php endforeach; endif; unset($_from); ?>
    <?php endif; ?>


</div>

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.html', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

</body>
</html>