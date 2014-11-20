<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生管理系统登录</title>
<link href="<?php echo ($current); ?>/style/index.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo ($current); ?>/js/jquery.js"></script>
<script type="text/javascript">
$(function(){
    $("#l1").click(function(){
	    $("#username_msg").html("学号，55开头");
		$("#password_msg").html("初始密码为学号");
	});
    $("#l2").click(function(){
	    $("#username_msg").html("导员姓名");
		$("#password_msg").html("");
	});
    $("#l3").click(function(){
	    $("#username_msg").html("学号、身份证号和姓名均可");
		$("#password_msg").html("学号、身份证号均可");
	});
})
   function checksubmit(){
	   var username =  $("#username").val();
       if(username == ""|| username == null)
       {
           alert("用户名不能为空！！！");
       }else{
           var password = $("#password").val();
           if(password == ""||password == null)
           { 
               alert("密码不能为空！！！");
           }
           else{
                  $("#form").submit();
               }
       }
   }
</script>
</head>
<body onkeydown= "if(event.keyCode==13){checksubmit()}">
<div id="war">
  <div id="middle">
    <div id="box" class="bg">
      <div class="title"><img src="<?php echo ($current); ?>/images/log_06.png" /></div>
      <div class="form">
        <form action="<?php echo ($url); ?>/checkuser" method="post"  id="form">
          <ul>
            <li>
              <label class="lablename">用户名：</label>
              <input type="text" name="username" id="username"  />
			  <span id="username_msg">学号，55开头</span>
            </li>
            <li>
              <label class="lablename">密码：</label>
              <input type="password" name="password" id="password"  />
			  <span id="password_msg">初始密码为学号</span>
            </li>
            <li style=" padding-left:40px; margin-top:5px;">
             <input type="radio" id="l1" name="level" value="1" class="radio" checked = "checked" />
              <label class="lablename1">学生</label>
              <input type="radio" id="l2" name="level" value="2" class="radio" />
              <label class="lablename1">教师</label>
              <input type="radio" id="l3" name="level" value="3" class="radio" />
              <label class="lablename1">校友</label>
              
              <input type="button" class="but" onclick="checksubmit()"  value="" />
            </li>
          </ul>
        </form>
      </div>
      <div id="msg" class="magess"><?php echo ($loginerror); ?></div>
      <div class="bottom">吉林大学软件学院</div>
    </div>
  </div>
</div>
</body>
</html>