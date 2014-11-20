<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title></title>
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function showclass(){
	$("#form").submit();
}

</script>
</head>
<body onload="showclass()">
<form action="<?php echo ($current); ?>/classview.php?manager_level=<?php echo ($manager_level); ?>&user_id=<?php echo ($user_id); ?>" method="get" target="main" id="form">
    <input type="hidden" name="manager_level" value="<?php echo ($manager_level); ?>"/>
	<input type="hidden" name="user_id" value="<?php echo ($user_id); ?>"/>
</form>
</body>
</html>