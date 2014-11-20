<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo ($current); ?>/css/ui.css" />
    <script type="text/javascript" src="<?php echo ($current); ?>/js/base.js"></script>
    <script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
    <title>学生详细信息</title>
    <style type="text/css">
    .studetail {
    	
    }
    .studetailrow {
    	overflow: auto;
    	zoom: 1;
    	margin-top: 5px;
    }
    .studetail label.label1 {
    	float: left;
    	width: 120px;
    	text-align: right;
    	margin: 7px 10px 0 0;
    	font-size: 11pt;
    	color:#9999ff;
    }
    .studetail label.label2{
    	float: left;
    	width: 120px;
    	text-align: right;
    	margin: 7px 10px 0 0;
    	font-size: 11pt;
    }
    .studetail input {
    	float: left;
    	width: 200px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 20px;
    }
    .studetail input.button{
    	float: center;
    	width: 100px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 20px;
    }
    .studetail input.buttonlock{
    	background: url(<?php echo ($current); ?>/img/lock.png) no-repeat 0 3px;
    	color:#9999ff;
    	float: center;
    	width: 100px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 20px;
    }
    .studetail input.inputlock {
    	background: url(<?php echo ($current); ?>/img/lock.png) no-repeat 0 3px;
    	color:#9999ff;
    }
    .studetail input.inputunlock{
    }
    .studetail textarea {
    	width: 400px;
    	height: 100px;
    }
    .studetail select {
    	width: 200px;
    	height: 24px;
    }
    .studetail a:hover {
       color:red;
       font-size:11;
    }
    </style>
    <script type="text/javascript">
     function update1(){
		var a = $("#a").val();
		if(a==0)
		{
			var password = "<?php echo ($password); ?>";
			var tpassword = prompt("请输入您的登录密码：","");
	 		if(password==tpassword)
	 		{
				$("input").attr("class","inputunlock");
				$("input").removeAttr("readonly");
				$("label").attr("class","label2");
				$("#update").attr("class","button");
				$("#update").attr("value","取消编辑");
				$("#submit").attr("class","button");
				$("#submit").removeAttr("disabled");
				$("#password").attr("class","button");
				$("#password").removeAttr("disabled");
				$("#a").attr("value","1");
	 	 	}else{
					alert("密码输入错误！！！");
		 	 	}
		}else{
			$("input").attr("class","inputlock");
			$("input").attr("readonly","readonly");
			$("label").attr("class","label1");
			$("#update").attr("class","button");
			$("#update").attr("value","打开编辑");
			$("#submit").attr("class","buttonlock");
			$("#submit").attr("disabled","disabled");
			$("#password").attr("disabled","disabled");
			$("#password").attr("class","buttonlock");
			//$("#update").removeAttr("disabled");
			$("#a").attr("value","0");


		}
     }
     function changephoto(){
         var a = $("#a").val();
         if(a==0)
         {
             return false;
         }else{
        	 var stu_id = $("#stu_id").val();
             var obj = new Object();
    		window.showModalDialog('<?php echo ($url); ?>/changephoto/stu_id/'+stu_id,obj,'dialogWidth:400px;dialogHeight:150px');
         }
         }
     function stuchangepassword(){
			$("#form").attr("action","<?php echo ($url); ?>/stuchangepassword");
         }
    </script>
</head>
<body>
<form action="<?php echo ($url); ?>/studupdate" method="post" id="form" target="main">
       <!--     <div class="toolbar">
                <a class="toolbartab" href="#">&nbsp;</a>
                <a class="toolbartab" href="#">&nbsp;</a>
            </div> -->
            <div class="view">
                <div class="viewtitle">
                	<img src="<?php echo ($current); ?>/img/photo.png" alt="icon" />
	                <a>个人信息</a> &gt;
	               
            	</div>
            	<div class="studetail">
            		<div class="studetailrow">
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            			<img src="<?php echo ($root); ?>/upload/<?php echo ($result["stu_photo"]); ?>" width="110" height="140"/><br></br>
            			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            			<a href="#" id="changephoto" onclick="changephoto()">更换头像</a>
            			
            		</div>
            		<div class="studetailrow">
            			<label class="label1">学号</label>
            			<input class="inputlock" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
            			<label class="label1">教学号</label>
            			<input class="inputlock" type="text" name="stu_tnum" value="<?php echo ($result["stu_tnum"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">学籍状态</label>
            			<input class="inputlock" type="text" name="stu_status" value="<?php echo ($result["stu_status"]); ?>" readonly="readonly" />
            			<label class="label1">身份证号码</label>
            			<input class="inputlock" type="text" name="stu_idnum" value="<?php echo ($result["stu_idnum"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">学生姓名</label>
            			<input class="inputlock" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
            			<label class="label1">姓名拼音</label>
            			<input class="inputlock" type="text" name="stu_pinyin" value="<?php echo ($result["stu_pinyin"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">曾用名</label>
            			<input class="inputlock" type="text" name="stu_exname" value="<?php echo ($result["stu_exname"]); ?>" readonly="readonly" />
            			<label class="label1">入学年份</label>
            			<input class="inputlock" type="text" name="stu_indate" value="<?php echo ($result["stu_indate"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">学生类别</label>
            			<input class="inputlock" type="text" name="stu_type" value="<?php echo ($result["stu_type"]); ?>" readonly="readonly" />
            			<label class="label1">学制</label>
            			<input class="inputlock" type="text"  name="stu_schooling"  value="<?php echo ($result["stu_schooling"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">预计毕业年度</label>
            			<input class="inputlock" type="text" name="stu_gradyear" value="<?php echo ($result["stu_gradyear"]); ?>" readonly="readonly" />
            			<label class="label1">校区</label>
            			<input class="inputlock" type="text" name="stu_campus" value="<?php echo ($result["stu_campus"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">院系</label>
            			<input class="inputlock" type="text" name="stu_college" value="<?php echo ($result["stu_college"]); ?>" readonly="readonly" />
            			<label class="label1">专业</label>
            			<input class="inputlock" type="text"  name="stu_major"  value="<?php echo ($result["stu_major"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">年级</label>
            			<input class="inputlock" type="text"  name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" readonly="readonly" />
            			<label class="label1">班级</label>
            			<input class="inputlock" type="text" name="stu_class" value="<?php echo ($result["stu_class"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">性别</label>
            			<input class="inputlock" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">政治面貌</label>
            			<input class="inputlock" type="text" name="stu_political" value="<?php echo ($result["stu_political"]); ?>" readonly="readonly" />
            			<label class="label1">宗教信仰</label>
            			<input class="inputlock" type="text" name="stu_faith" value="<?php echo ($result["stu_faith"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">出生日期</label>
            			<input class="inputlock" type="text" name="stu_birthday" value="<?php echo ($result["stu_birthday"]); ?>" readonly="readonly" />
            			<label class="label1">籍贯</label>
            			<input class="inputlock" type="text" name="stu_hometown" value="<?php echo ($result["stu_hometown"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">出生地</label>
            			<input class="inputlock" type="text" name="stu_birthplace" value="<?php echo ($result["stu_birthplace"]); ?>" readonly="readonly" />
            			<label class="label1">户口所在地</label>
            			<input class="inputlock" type="text" name="stu_residence" value="<?php echo ($result["stu_residence"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">乘车区间</label>
            			<input class="inputlock" type="text" name="stu_trainarea" value="<?php echo ($result["stu_trainarea"]); ?>" readonly="readonly" />
            			<label class="label1">港澳台侨</label>
            			<input class="inputlock" type="text" name="stu_abroad"  value="<?php echo ($result["stu_abroad"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">家庭地址(县)</label>
            			<input class="inputlock" type="text" name="stu_homeaddr" value="<?php echo ($result["stu_homeaddr"]); ?>" readonly="readonly" />
            			<label class="label1">地区编码</label>
            			<input class="inputlock" type="text" name="stu_homeadcode" value="<?php echo ($result["stu_homeadcode"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">家庭住址/村</label>
            			<input class="inputlock" type="text" name="stu_homeaddr2" value="<?php echo ($result["stu_homeaddr2"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">通讯地址(县)</label>
            			<input class="inputlock" type="text" name="stu_contacaddr" value="<?php echo ($result["stu_contacaddr"]); ?>" readonly="readonly" />
            			<label class="label1">联系电话</label>
            			<input class="inputlock" type="text" name="stu_contadcode" value="<?php echo ($result["stu_contadcode"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">街道号/村</label>
            			<input class="inputlock" type="text" name="stu_contaddr2" value="<?php echo ($result["stu_contaddr2"]); ?>" readonly="readonly" />
            			<label class="label1">邮政编码</label>
            			<input class="inputlock" type="text" name="stu_zipcode" value="<?php echo ($result["stu_zipcode"]); ?>" readonly="readonly" />
            		</div>
            		<div class="studetailrow">
            			<label class="label1">&nbsp;</label>
            			<input  type="button" class="button" id="update" onclick="update1()"  value="打开编辑"  />
            			<label class="label1">&nbsp;</label>
            			<input  type="submit" class="buttonlock" id="submit" disabled="disabled" value="提交修改"  />
            			<input  type="submit" class="buttonlock" id="password" onclick="stuchangepassword()" disabled="disabled" value="修改密码"  />
            		</div>
            	</div>
            </div>
<input type="hidden" name="stu_id" id="stu_id" value="<?php echo ($result["stu_id"]); ?>"></input>
<input type="hidden" id="a" value="0"/>
</form>
</body>
</html>