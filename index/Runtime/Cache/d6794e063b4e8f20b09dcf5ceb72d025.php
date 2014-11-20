<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<title></title>
<script type="text/javascript">
function uploadfile(){
    var upfile = $("#upfile").val();
    if (upfile == null || upfile == "") {
	    alert("请选择要上传的照片！！！");
    } else {
		$("#form").submit();
	}
}
function closeW() {
    window.close();
}
</script>
</head>
<body>
<form action="<?php echo ($url); ?>/uploadPicture" method="post" target="photo" id="form" enctype="multipart/form-data">
	<center>
	<font size="2" color="red">*上传格式仅可为jpg,jpeg,png,JPG,JPEG</font>
	<br>
	<div><?php echo ($error); ?></div>
	<br>
	上传照片：<input type="file" id="upfile" name="upfile"/>
	<br>
	<input type="button" onclick="uploadfile()" value="上传">
	<input type="button" onclick="closeW()" value="关闭">
	</center>
<input type="hidden" name="id" value="<?php echo ($id); ?>">
<input type="hidden" name="module" value="<?php echo ($module); ?>">
</form>
<iframe name="photo" style="display:none" id="photo"></iframe>
</body>
</html>