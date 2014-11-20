<?php 
  session_start();
  $level = $_SESSION["level"];
  /*$username = $_SESSION["username"];
  $ip = $_SERVER["REMOTE_ADDR"];
  $level = $_SESSION["level"];
  if ($level == -1) {
  	$conn = mysql_connect("localhost","root","root") or die("链接数据库失败！！！");
  	mysql_select_db("student",$conn) or die ("选择数据库不存在！！！");
  	mysql_query("set names utf8");
  	$result = mysql_query("select stu_name from student where stu_num = $username");
    $list = mysql_fetch_array($result);
   // $list = mysql_fetch_row($result);    //mysql_fetch_array 与mysql_fetch_row 区别
    $username = $list["stu_name"];
  } else if ($level == 3 || $level == 1) {
  	$conn = mysql_connect("localhost","root","root") or die("链接数据库失败！！！");
  	mysql_select_db("student",$conn) or die ("选择数据库不存在！！！");
  	mysql_query("set names utf8");
  	$result = mysql_query("select stu_name,stu_num from student where stu_num = $username or stu_idnum = $username ");
    $list = mysql_fetch_array($result);
   // $list = mysql_fetch_row($result);    //mysql_fetch_array 与mysql_fetch_row 区别
    $username = $list["stu_name"];
	$stu_num = $list["stu_num"];
  }
  */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/Clock.js"></script>
<script type="text/javascript">
  $(function (){
	var clock = new Clock();
	clock.display(document.getElementById("clock"));
	});
</script>
</head>

<body>
<table id="top" cellpadding="0" cellspacing="0">
	<tr class="flash">
    	<td ><object  width="550"  height="160"  id="flashad" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"><param value="flash/logo.swf" name="movie"><param value="autohigh" name="quality"><param value="opaque" name="wmode"><embed  width="550"  height="160"  pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" swliveconnect="TRUE" name="flashad" wmode="opaque" quality="autohigh" src="flash/logo.swf"></object></td>
        <td align="right" ><object  width="540"  height="160"  id="flashad" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"><param value="flash/flash.swf" name="movie"><param value="autohigh" name="quality"><param value="opaque" name="wmode"><embed  width="540"  height="160"  pluginspage="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash" type="application/x-shockwave-flash" swliveconnect="TRUE" name="flashad" wmode="opaque" quality="autohigh" src="flash/flash.swf"></object></td>
    </tr>
    <tbody class="magess">
    <tr >
    	<td>
		    <img src="images/left_05.png" /><a href="welcome.html" target="main">首页</a>&nbsp;&nbsp;
		欢迎：<?php 
    	     if($level==1 || $level==3) {
    	     	echo $_SESSION["stu_num"]. $_SESSION["stu_name"]."  同学";
    	     } else {
    	     	echo $_SESSION["username"]."  老师";
    	     }
    	
    	
    	?> &nbsp;&nbsp;IP：<?php echo $ip;?> &nbsp;&nbsp; 时间：<span id="clock"></span></td>
        <td  align="right" style="padding-right:15px;">
		<?php 
		if ($level == 2) {
		?>
		    <a href="../../../../index.php/Function/confirmStuInfo" target="main">信息审核</a>&nbsp;&nbsp;
		<?php 
		}
		?>
		    <a href="../../../../index.php/Index/logout" target="_parent"><img src="images/top_10.jpg" />退出</a>
		</td>
    </tr>
    </tbody>
</table>
</body>
</html>
