<?php /* Smarty version 2.6.31, created on 2018-06-06 15:18:25
         compiled from content.html */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>content</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
    <script type="text/javascript" src="../js/admin_content.js"></script>
    <script type="text/javascript" src="../js/modernizr.min.js"></script>
    <script type="text/javascript" src="../js/jquery-1.4.2.min.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>


</head>
<body id="main">

<div class="map">
    内容管理 &gt;&gt; 查看文档列表 &gt;&gt; <strong id="title"><?php echo $this->_tpl_vars['title']; ?>
</strong>
</div>

<ol>
    <li><a href="content.php?action=show" class="selected">文档列表</a></li>
    <li><a href="content.php?action=add">新增文档</a></li>
    <?php if ($this->_tpl_vars['update']): ?>
    <li><a href="content.php?action=update&id=<?php echo $this->_tpl_vars['id']; ?>
">修改文档</a></li>
    <?php endif; ?>
</ol>



<?php if ($this->_tpl_vars['show']): ?>
<table cellspacing="0">
    <tr><th>编号</th><th>标题</th><th>属性</th><th>文档类别</th><th>浏览次数</th><th>发布时间</th><th>操作</th></tr>
    <?php if ($this->_tpl_vars['SearchContent']): ?>
    <?php $_from = $this->_tpl_vars['SearchContent']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['value']):
?>
    <tr>
        <td><?php echo $this->_tpl_vars['key']+$this->_tpl_vars['num']+1; ?>
</td>
        <td><a href="../details.php?id=<?php echo $this->_tpl_vars['value']->id; ?>
" title="<?php echo $this->_tpl_vars['value']->t; ?>
" target="_blank"><?php echo $this->_tpl_vars['value']->title; ?>
</a></td>
        <td><?php echo $this->_tpl_vars['value']->attr; ?>
</td>
        <td><a href="?action=show&nav=<?php echo $this->_tpl_vars['value']->nav; ?>
"><?php echo $this->_tpl_vars['value']->nav_name; ?>
</a></td>
        <td><?php echo $this->_tpl_vars['value']->count; ?>
</td>
        <td><?php echo $this->_tpl_vars['value']->date; ?>
</td>
        <td><a href="content.php?action=update&id=<?php echo $this->_tpl_vars['value']->id; ?>
">修改</a> | <a href="content.php?action=delete&id=<?php echo $this->_tpl_vars['value']->id; ?>
" onclick="return confirm('你真的要删除这个管理员吗？') ? true : false">删除</a></td>
    </tr>
    <?php endforeach; endif; unset($_from); ?>
    <?php else: ?>
    <tr><td colspan="7">对不起，没有任何数据</td></tr>
    <?php endif; ?>
</table>
<form action="?" method="get">
    <div id="page">
        <?php echo $this->_tpl_vars['page']; ?>

        <input type="hidden" name="action" value="show" />
        <select name="nav" class="select" style="height: 25px;">
            <option value="0"  >默认全部</option>
            <?php echo $this->_tpl_vars['nav']; ?>

        </select>
        <input value="查询" type="submit" />
    </div>
</form>
<?php endif; ?>




<?php if ($this->_tpl_vars['add']): ?>
<form name="content" method="post" action="?action=add">
    <table cellspacing="0" class="content">
        <tr><th><strong>发布一条新文档</strong></th></tr>
        <tr><td>文档标题：<input type="text" name="title" class="text" /> <span class="red">[必填]</span> ( * 标题2-50字符之间)</td></tr>
        <tr><td>栏　　目：<select name="nav"><option value="" style="padding:0;">请选择一个栏目类别</option><?php echo $this->_tpl_vars['nav']; ?>
</select> <span class="red">[必选]</span></td></tr>
        <tr><td>定义属性：<input type="checkbox" name="attr[]" value="头条" />头条
            <input type="checkbox" name="attr[]" value="推荐" />推荐
            <input type="checkbox" name="attr[]" value="加粗" />加粗
            <input type="checkbox" name="attr[]" value="跳转" />跳转
        </td></tr>
        <tr><td>标　　签：<input type="text" name="tag" class="text" /> ( * 每个标签用','隔开，总长30位之内)</td></tr>
        <tr><td>关 键 字：<input type="text" name="keyword" class="text" /> ( * 每个关键字用','隔开，总长30位之内)</td></tr>
        <tr><td>缩 略 图：<input type="text" name="thumbnail" class="text" readonly="readonly" />
            <input type="button" value="上传缩略图" onclick="centerWindow('../Conf/upfile.php?type=content','upfile','400','200')" />
            <img name="pic" style="display:none;" /> ( * 必须是jpg,gif,png，并且200k内)
        </td></tr>
        <tr><td>文章来源：<input type="text" name="source" class="text" /> ( * 文章来源20位之内)</td></tr>
        <tr><td>作　　者：<input type="text" value="<?php echo $this->_tpl_vars['author']; ?>
" name="author" class="text" /> ( * 作者10位之内)</td></tr>
        <tr><td><span class="middle">内容摘要：</span><textarea name="info"></textarea> <span class="middle">( * 内容摘要200之内)</span></td></tr>

        <tr class="ckeditor"><td> <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;  " rows="10"  id="TextArea1" ></textarea> </td></tr>

        <tr><td>评论选项：<input type="radio" name="commend" value="1" checked="checked" />允许评论
            <input type="radio" name="commend" value="0" />禁止评论
            　　　　浏览次数：<input type="text" name="count" value="100" class="text small" />
        </td></tr>
        <tr><td>文档排序：<select name="sort">
            <option value="0">默认排序</option>
            <option value="1">置顶一天</option>
            <option value="2">置顶一周</option>
            <option value="3">置顶一月</option>
            <option value="4">置顶一年</option>
        </select>
            　 　　消费金币：<input type="text" name="gold" value="0" class="text small" />
        </td></tr>
        <tr><td>阅读权限：<select name="readlimit">
            <option value="0">开放浏览</option>
            <option value="1">初级会员</option>
            <option value="2">中级会员</option>
            <option value="3">高级会员</option>
            <option value="4">VIP会员</option>
        </select>
            　 　　标题颜色：<select name="color">
                <option value="">默认颜色</option>
                <option value="red" style="color:red;">红色</option>
                <option value="blue" style="color:blue;">蓝色</option>
                <option value="orange" style="color:orange;">橙色</option>
            </select>
        </td></tr>
        <tr><td><input type="submit" name="send" onclick="return checkAddContent();" value="发布文档" /> <input type="reset" value="重置" /></td></tr>
        <tr><td></td></tr>
    </table>
</form>
<?php endif; ?>






<?php if ($this->_tpl_vars['update']): ?>
<form name="content" method="post" action="?action=update">
    <input type="hidden" name="id" value="<?php echo $this->_tpl_vars['id']; ?>
" />
    <input type="hidden" name="prev_url" value="<?php echo $this->_tpl_vars['prev_url']; ?>
" />
    <table cellspacing="0" class="content">
        <tr><th><strong>发布一条新文档</strong></th></tr>
        <tr><td>文档标题：<input type="text" name="title" value="<?php echo $this->_tpl_vars['titlec']; ?>
" class="text" /> <span class="red">[必填]</span> ( * 标题2-50字符之间)</td></tr>
        <tr><td>栏　　目：<select name="nav"><option value="" style="padding:0;">请选择一个栏目类别</option><?php echo $this->_tpl_vars['nav']; ?>
</select> <span class="red">[必选]</span></td></tr>
        <tr><td>定义属性：<?php echo $this->_tpl_vars['attr']; ?>

        </td></tr>
        <tr><td>标　　签：<input type="text" name="tag" value="<?php echo $this->_tpl_vars['tag']; ?>
" class="text" /> ( * 每个标签用','隔开，总长30位之内)</td></tr>
        <tr><td>关 键 字：<input type="text" name="keyword" value="<?php echo $this->_tpl_vars['keyword']; ?>
"  class="text" /> ( * 每个关键字用','隔开，总长30位之内)</td></tr>
        <tr><td>缩 略 图：<input type="text" name="thumbnail"  value="<?php echo $this->_tpl_vars['thumbnail']; ?>
"  class="text" readonly="readonly" />
            <input type="button" value="上传缩略图" onclick="centerWindow('../Conf/upfile.php?type=content','upfile','400','100')" />
            <img name="pic" src="<?php echo $this->_tpl_vars['thumbnail']; ?>
" style="display:block;" /> ( * 必须是jpg,gif,png，并且200k内)
        </td></tr>
        <tr><td>文章来源：<input type="text" name="source" value="<?php echo $this->_tpl_vars['source']; ?>
" class="text" /> ( * 文章来源20位之内)</td></tr>
        <tr><td>作　　者：<input type="text" value="<?php echo $this->_tpl_vars['author']; ?>
" name="author" class="text" /> ( * 作者10位之内)</td></tr>
        <tr><td><span class="middle">内容摘要：</span><textarea name="info"><?php echo $this->_tpl_vars['info']; ?>
</textarea> <span class="middle">( * 内容摘要200之内)</span></td></tr>

        <tr class="ckeditor"><td> <textarea name="content" class="common-textarea" id="content" cols="30" style="width: 98%;  " rows="10"  id="TextArea1" >  <?php echo $this->_tpl_vars['content']; ?>
 </textarea> </td></tr>


        <tr><td>评论选项：<?php echo $this->_tpl_vars['commend']; ?>

            　　　 　浏览次数：<input type="text" name="count" value="<?php echo $this->_tpl_vars['count']; ?>
" class="text small" />
        </td></tr>
        <tr><td>文档排序：<select name="sort">
            <?php echo $this->_tpl_vars['sort']; ?>

        </select>
            　 　　消费金币：<input type="text" name="gold" value="<?php echo $this->_tpl_vars['gold']; ?>
" class="text small" />
        </td></tr>
        <tr><td>阅读权限：<select name="readlimit">
            <?php echo $this->_tpl_vars['readlimit']; ?>

        </select>
            　 　　标题颜色：<select name="color">
                <?php echo $this->_tpl_vars['color']; ?>

            </select>
        </td></tr>
        <tr><td><input type="submit" name="send" onclick="return checkAddContent();" value="发布文档" /> <input type="reset" value="重置" /></td></tr>
        <tr><td></td></tr>
    </table>
</form>
<?php endif; ?>













</body>
</html>

<?php echo '
<script type="text/javascript">
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor(\'editor\')就能拿到相关的实例
    UE.getEditor(\'content\',{initialFrameWidth:1430,initialFrameHeight:400,});
    $(".btype").hide();
    $(".btype").eq(0).show();
    $("#atype input").click(function(){
        var i=$(this).index();
        $(".btype").hide();
        $(".btype").eq(i).show();
    });

</script>
'; ?>