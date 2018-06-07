<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>上传缩略图</title>
    <link rel="stylesheet" type="text/css" href="../css/admin.css" />
</head>
<body id="main">

<form method="post" action="upload.php" enctype="multipart/form-data" style="text-align:center;margin:30px;">
    <input type="hidden" name="size" value="<?php echo $_GET['size']?>" />
    <input type="hidden" name="type" value="<?php echo $_GET['type']?>" />
    <input type="hidden" name="MAX_FILE_SIZE" value="20480000" />
    <input type="file" name="pic"  style="border: 1px solid #cccccc"/>
    <input type="submit" name="send" value="确定上传" />
</form>

</body>
</html>