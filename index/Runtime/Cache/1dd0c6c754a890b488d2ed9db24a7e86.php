<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>吉林大学软件学院学生管理系统主页</title>
</head>
<frameset rows="200,*" cols="*" frameborder="no" border="0" framespacing="0">
  <frame src="<?php echo ($current); ?>/top.php" name="topFrame" scrolling="no" noresize="noresize" id="topFrame" title="topFrame" />
  <frameset cols="210,*" frameborder="no" border="0" framespacing="0">
    <frame src="<?php echo ($current); ?>/left_s.php" name="leftFrame" scrolling= "yes" noresize="noresize" id="leftFrame" title="leftFrame" />
    <frame src="<?php echo ($current); ?>/right_s.html" name="rightFrame" id="rightFrame" title="rightFrame" />
  </frameset>
</frameset>
<noframes><body>
</body></noframes>
</html>