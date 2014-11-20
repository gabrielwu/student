<?php
        session_start();
    	$stu_id = $_SESSION["user_id"];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="style/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" language="javascript" src="js/jquery.js"></script>
<style type="text/css">
.menu_list {
	border-bottom:#999 solid 2px;
}
.menu_head {
	height:42px;
	line-height:42px;
	padding-left: 55px;
	cursor: pointer;
	position: relative;
	vertical-align:middle;
	font-size:13px;
	color:#4b4f5d;
	font-weight:bold;
    background:url(images/left_10.jpg) repeat-x;
}
.menu_head a{ height:42px;
	line-height:42px;
	cursor: pointer;
	position: relative;
	vertical-align:middle;
	font-size:13px;
	color:#4b4f5d;
	font-weight:bold;
	display:inline-block;}

.menu_head  img{ margin-right:10px; margin-top:11px;}

.menu_body {
	display:none;
	padding:8px 0px;
	border-top:#999 solid 1px;
	background:#bfc6cf;
}
.menu_body a 
{
	height:32px;
	
	line-height:32px;
	display:block;
	color:#4b4f5d;
	background:#bfc6cf;
	padding-left:55px;
	font-size:13px;
	font-weight:bold;
	text-decoration:none;
}
 .menu_body a:hover{
	
	background:#b1b8c1;

}
</style>
<script type="text/javascript">
 $(function(){
           
            $("#firstpane p#menu4").next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");           
            
            $("#firstpane p.menu_head").click(function()
            {
                $(this).next("div.menu_body").slideToggle(300).siblings("div.menu_body").slideUp("slow");           
            });
            $("#firstpane p.menu_head").mouseover(function()
            {
               $(this).css({background:"url(images/left_11.jpg) repeat-x "});
            });
            $("#firstpane p.menu_head").mouseout(function()
            {
               $(this).css({background:"url(images/left_10.jpg) repeat-x"});
            });
        });
</script>
</head>


<body>
<div id="left">

<div id="firstpane" class="menu_list">
  <p class="menu_head" id="menu1"><img src="images/left_15.png" />个人事务</p>
    <div class="menu_body">
        <a href="../../../../index.php/Function/studetail/stu_id/<?php echo $stu_id;?>" target="main">个人信息</a>
        <!--<a href="../../../../index.php/Function/gather/" target="main">信息采集</a>-->
        <a href="../../../../index.php/Function/changepassword" target="main">修改密码</a>
    
    </div>

<!--<p class="menu_head" id="menu3"><img src="images/left_09.png" />办公系统</p>
    <div class="menu_body">
	<a href="xwgg.html" target="main">新闻通告</a>
	<a href="xydt.html" target="main">学院动态</a>
	</div>
--></div>

</div>
</body>
</html>
