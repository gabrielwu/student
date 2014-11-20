<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="<?php echo ($current); ?>/css/ui.css" />
    <!--<script type="text/javascript" src="<?php echo ($current); ?>/js/base.js"></script>-->
	<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
	<link type="text/css" href="<?php echo ($root); ?>/index/Public/jquery-ui/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
	<script type="text/javascript" src="<?php echo ($root); ?>/index/Public/jquery-ui/js/jquery-1.5.1.min.js"></script>
	<script type="text/javascript" src="<?php echo ($root); ?>/index/Public/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
    <title>学生详细信息</title>
    <style type="text/css">
    .studetail {
    	
    }
    .studetailrow {
    	overflow: auto;
    	zoom: 1;
    	margin: 5px auto;
		width: 99%;
    }
    label.label1 {
    	float: left;
    	width: 160px;
    	text-align: right;
    	margin: 7px 10px 0 0;
    	font-size: 11pt;
    	color:#9999ff;
    }
    label.label2{
    	float: left;
    	width: 160px;
    	text-align: right;
    	margin: 7px 10px 0 0;
    	font-size: 11pt;
    }
    input {
    	float: left;
    	width: 200px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 20px;
    } 
	.td_input{
    	width: 75px;
    	height: 100%;
		padding: 0;
		margin: 0 0 0 10px;
		text-align: center;
    }
    input.button{
    	float: center;
    	width: 100px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 0px;
    }
    input.buttonlock{
    	background: url(<?php echo ($current); ?>/img/lock.png) no-repeat 0 3px;
    	color:#9999ff;
    	float: center;
    	width: 100px;
    	height: 24px;
    	margin-right: 10px;
    	padding-left: 20px;
    }
    input.inputlock {
    	background: url(<?php echo ($current); ?>/img/lock.png) no-repeat 0 3px;
    	color:#9999ff;
    }
	input.inputlock1 {
    	background: url(<?php echo ($current); ?>/img/lock.png) no-repeat 0 3px;
    	color:#9999ff;
    }
	.inputEdit {
	    display: none;
	}
    input.inputunlock{
    }
    select {
    	width: 200px;
    	height: 24px;
    }
    a:hover {
       color:red;
       font-size:11;
    }
	.studentPhoto {
	    float: right;
		margin: 0 40px -210px 0;
	}
	.studentPhoto a{ 
	    margin: 0 0 0 20px;
	}
	#picture {
		width:500px;
	}
	.picUpload {
	    margin: auto;
		width: 80px;
	}
	textarea.inputlock{
	    color:#9999ff;
	    width: 300px;
		heigth:70px;
	}
	textarea.inputEdit{
	    width: 300px;
		heigth:70px;
	}
    </style>
</head>
<body>
            <div class="toolbar" id="toolbar">
                <a class="toolbartab" style="color:white" href="/student/index.php/Function/queryAll">综合查询</a>
                <a class="toolbartab" style="color:white" href="/student/index.php/Function/search">信息检索</a>
            </div> 
			
			<div class="view">
				<div id="hierarchy" class="">
					<img src="<?php echo ($current); ?>/img/photo.png" alt="icon" />
					<a href="/student/index.php/Function/queryAll">软件学院</a> &gt;
					<a href="/student/index.php/Function/queryAll"><?php echo ($result["stu_grade"]); ?>级</a> &gt;
					<a href="/student/index/Tpl/default/Function/studentview.php?grade=<?php echo $result["stu_grade"];?>&class=<?php echo $result["stu_class"];?>"><?php echo ($result["stu_class"]); ?>班</a> &gt;
					<a><?php echo ($result["stu_name"]); ?></a>
				</div>
					<div id="tabs">
						<ul>
							<li><a href="#tab_student">基本信息</a></li>
							<li><a href="#tabScholar">奖学金</a></li>
							<li><a href="#tabSocialScholar">社会奖学金</a></li>
							<li><a href="#tabCompetition">大赛获奖</a></li>
							<li><a href="#tab_party">党员积极分子</a></li>
							<li><a href="#tab_insurance">医疗保险</a></li>
							<li><a href="#tabGranting">助学金</a></li>
							<li><a href="#tabLoan">助学贷款</a></li>
							<li><a href="#tab_graduation">毕业去向</a></li>
							<li><a href="#tabPunish">处分</a></li>
							<li><a href="#tabInnovation">创新项目</a></li>
						</ul>
						<div id="tab_student">
							<div class="studentPhoto">
								<img src="<?php echo ($root); ?>/upload/ID_photo/<?php echo ($result["stu_photo"]); ?>" width="110" height="140"/><br>
								<input id="photoHidden" type="hidden" value="<?php echo ($result["stu_photo"]); ?>" />
								<a href="javascript:changephoto()" id="changephoto" onclick="changephoto()">更换头像</a>
								
							</div>
							<div class="studetailrow">
								<label class="label1">学生姓名</label>
								<input class="inputlock" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" />
								<label class="label1">姓名拼音</label>
								<input class="inputlock" type="text" name="stu_pinyin" value="<?php echo ($result["stu_pinyin"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_pinyin" value="<?php echo ($result["stu_pinyin"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">学号</label>
								<input class="inputlock" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" />
								<label class="label1">教学号</label>
								<input class="inputlock" type="text" name="stu_tnum" value="<?php echo ($result["stu_tnum"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_tnum" value="<?php echo ($result["stu_tnum"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">班内职务</label>
								<input class="inputlock" type="text" name="stu_duty" value="<?php echo ($result["stu_duty"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_duty" value="<?php echo ($result["stu_duty"]); ?>" />
								<label class="label1">学籍状态</label>
								<input class="inputlock" type="text" name="stu_status" value="<?php echo ($result["stu_status"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_status" value="<?php echo ($result["stu_status"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">入学时间</label>
								<input class="inputlock" type="text" name="stu_indate" value="<?php echo ($result["stu_indate"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_indate" value="<?php echo ($result["stu_indate"]); ?>" />
								<label class="label1">预计毕业年份</label>
								<input class="inputlock" type="text" name="stu_gradyear" value="<?php echo ($result["stu_gradyear"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_gradyear" value="<?php echo ($result["stu_gradyear"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">年级</label>
								<input class="inputlock" type="text"  name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text"  name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" />
								<label class="label1">班级</label>
								<input class="inputlock" type="text" name="stu_class" value="<?php echo ($result["stu_class"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_class" value="<?php echo ($result["stu_class"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">性别</label>
								<input class="inputlock" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" />
								<label class="label1">民族</label>
								<input class="inputlock" type="text" name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">手机</label>
								<input class="inputlock" type="text" name="stu_mobile" value="<?php echo ($result["stu_mobile"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_mobile" value="<?php echo ($result["stu_mobile"]); ?>"  />
								<label class="label1">qq号码</label>
								<input class="inputlock" type="text" name="stu_qqnum" value="<?php echo ($result["stu_qqnum"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_qqnum" value="<?php echo ($result["stu_qqnum"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">邮箱</label>
								<input class="inputlock" type="text" name="stu_email" value="<?php echo ($result["stu_email"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_email" value="<?php echo ($result["stu_email"]); ?>"  />
								<label class="label1">个人主页</label>
								<input class="inputlock" type="text" name="stu_homepage" value="<?php echo ($result["stu_homepage"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_homepage" value="<?php echo ($result["stu_homepage"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">身份证号码</label>
								<input class="inputlock" type="text" name="stu_idnum" value="<?php echo ($result["stu_idnum"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_idnum" value="<?php echo ($result["stu_idnum"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">政治面貌</label>
								<input class="inputlock" type="text" name="stu_political" value="<?php echo ($result["stu_political"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_political" value="<?php echo ($result["stu_political"]); ?>" />
								<label class="label1">宗教信仰</label>
								<input class="inputlock" type="text" name="stu_faith" value="<?php echo ($result["stu_faith"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_faith" value="<?php echo ($result["stu_faith"]); ?>" />
							</div>
							
							<div class="studetailrow">
								<label class="label1">出生地</label>
								<input class="inputlock" type="text" name="stu_birthplace" value="<?php echo ($result["stu_birthplace"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_birthplace" value="<?php echo ($result["stu_birthplace"]); ?>" />
								<label class="label1">出生日期</label>
								<input class="inputlock" type="text" name="stu_birthday" value="<?php echo ($result["stu_birthday"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_birthday" value="<?php echo ($result["stu_birthday"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">籍贯</label>
								<input class="inputlock" type="text" name="stu_hometown" value="<?php echo ($result["stu_hometown"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_hometown" value="<?php echo ($result["stu_hometown"]); ?>" />
								<label class="label1">籍贯地代码</label>
								<input class="inputlock" type="text" name="stu_homeadcode" value="<?php echo ($result["stu_homeadcode"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_homeadcode" value="<?php echo ($result["stu_homeadcode"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">户口所在地</label>
								<input class="inputlock" type="text" name="stu_residence" value="<?php echo ($result["stu_residence"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_residence" value="<?php echo ($result["stu_residence"]); ?>" />
								<label class="label1">户口所在地代码</label>
								<input class="inputlock" type="text" name="stu_residcode" value="<?php echo ($result["stu_residcode"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_residcode" value="<?php echo ($result["stu_residcode"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">乘车区间</label>
								<input class="inputlock" type="text" name="stu_trainarea" value="<?php echo ($result["stu_trainarea"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_trainarea" value="<?php echo ($result["stu_trainarea"]); ?>" />
								<label class="label1">港澳台侨</label>
								<input class="inputlock" type="text" name="stu_abroad"  value="<?php echo ($result["stu_abroad"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_abroad"  value="<?php echo ($result["stu_abroad"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">家庭地址(县)</label>
								<input class="inputlock" type="text" name="stu_homeaddr" value="<?php echo ($result["stu_homeaddr"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_homeaddr" value="<?php echo ($result["stu_homeaddr"]); ?>" />
								<label class="label1">家庭住址/村</label>
								<input class="inputlock" type="text" name="stu_homeaddr2" value="<?php echo ($result["stu_homeaddr2"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_homeaddr2" value="<?php echo ($result["stu_homeaddr2"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">通讯地址(县)</label>
								<input class="inputlock" type="text" name="stu_contacaddr" value="<?php echo ($result["stu_contacaddr"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_contacaddr" value="<?php echo ($result["stu_contacaddr"]); ?>" />
								<label class="label1">街道号/村</label>
								<input class="inputlock" type="text" name="stu_contaddr2" value="<?php echo ($result["stu_contaddr2"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_contaddr2" value="<?php echo ($result["stu_contaddr2"]); ?>"  />
							</div>
							<div class="studetailrow">
								<label class="label1">邮政编码</label>
								<input class="inputlock" type="text" name="stu_zipcode" value="<?php echo ($result["stu_zipcode"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_zipcode" value="<?php echo ($result["stu_zipcode"]); ?>" />
								<label class="label1">联系电话</label>
								<input class="inputlock" type="text" name="stu_phone" value="<?php echo ($result["stu_phone"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="stu_phone" value="<?php echo ($result["stu_phone"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">父亲姓名</label>
								<input class="inputlock" type="text" name="dad_name" value="<?php echo ($result["dad_name"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="dad_name" value="<?php echo ($result["dad_name"]); ?>" />
								<label class="label1">母亲姓名</label>
								<input class="inputlock" type="text" name="mom_name" value="<?php echo ($result["mom_name"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="mom_name" value="<?php echo ($result["mom_name"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">父亲联系方式</label>
								<input class="inputlock" type="text" name="dad_phone" value="<?php echo ($result["dad_phone"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="dad_phone" value="<?php echo ($result["dad_phone"]); ?>" />
								<label class="label1">母亲联系方式</label>
								<input class="inputlock" type="text" name="mom_phone" value="<?php echo ($result["mom_phone"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="mom_phone" value="<?php echo ($result["mom_phone"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">父亲工作单位</label>
								<input class="inputlock" type="text" name="dad_work_unit" value="<?php echo ($result["dad_work_unit"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="dad_work_unit" value="<?php echo ($result["dad_work_unit"]); ?>" />
								<label class="label1">母亲工作单位</label>
								<input class="inputlock" type="text" name="mom_work_unit" value="<?php echo ($result["mom_work_unit"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="mom_work_unit" value="<?php echo ($result["mom_work_unit"]); ?>" />
							</div>
							<div class="studetailrow">
							    <table style="width:60%;margin:auto">
								    <tr>
								        <td class="tdEdit"><input  type="button" class="button" id="edit_student" value="打开编辑"  /></td>
								        <td class="tdEdit"><input  type="submit" class="buttonlock" id="submit_student" disabled="disabled" value="提交修改"  /></td>
								    </tr>
								</table>
							</div>
						</div>
							
						<div id="tabInnovation">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
									<tbody>
									  <tr class="">
										<th>项目名称</th>
										<th>级别</th>
										<th>获奖情况</th>
										<th>申报时间</th>
										<th>获奖时间</th>
										<th>指导教师</th>
										<th>组长</th>
										<th>成员</th>
										<th>依托学院</th>
										<th>照片(点击查看大图)</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($innovationResult)): $i = 0; $__LIST__ = $innovationResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$innovationList): ++$i;$mod = ($i % 2 )?><tr id="innovation<?php echo ($innovationList["id"]); ?>"  class="">
										<td class="text"><?php echo ($innovationList["project_name"]); ?></td>
										<td class="text"><?php echo ($innovationList["level"]); ?></td>
										<td class="text"><?php echo ($innovationList["award"]); ?></td>
										<td class="text"><?php echo ($innovationList["apply_date"]); ?></td>  
										<td class="text"><?php echo ($innovationList["win_date"]); ?></td>  
										<td class="text"><?php echo ($innovationList["tutor"]); ?></td>  
										<td class="text"><?php echo ($innovationList["leader"]); ?></td>  
										<td class="text"><?php echo ($innovationList["members"]); ?></td> 
										<td class="text"><?php echo ($innovationList["college"]); ?></td>  
										<td>
										    <a href="javascript:viewPicture('<?php echo ($root); ?>/upload/innovation/picture/<?php echo ($innovationList["id"]); ?><?php echo ($innovationList["photo_ext"]); ?>')">
										       <img style="height:70px" src="<?php echo ($root); ?>/upload/innovation/picture/<?php echo ($innovationList["id"]); ?><?php echo ($innovationList["photo_ext"]); ?>"/>
											</a>
											<a class="tdEdit" href="javascript:changePicture('innovation','<?php echo ($innovationList["id"]); ?>')"></br>上传</a>
										</td> 
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('innovation',<?php echo ($innovationList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('innovation', <?php echo ($innovationList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="12" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
						
						<div id="tabScholar">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
									<tbody>
									  <tr class="">
										<th>奖学金名称</th>
										<th>等级</th>
										<th>金额</th>
										<th>获奖时间</th>
										<th>照片(点击查看大图)</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($scholarResult)): $i = 0; $__LIST__ = $scholarResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$scholarList): ++$i;$mod = ($i % 2 )?><tr id="scholar<?php echo ($scholarList["id"]); ?>"  class="">
										<td class="text"><?php echo ($scholarList["scholar_name"]); ?></td>
										<td class="text"><?php echo ($scholarList["level"]); ?></td>
										<td class="text"><?php echo ($scholarList["amount"]); ?></td>
										<td class="text"><?php echo ($scholarList["date"]); ?></td>  
										<td>
										    <a href="javascript:viewPicture('<?php echo ($root); ?>/upload/scholar/picture/<?php echo ($scholarList["id"]); ?><?php echo ($scholarList["photo_ext"]); ?>')">
										       <img style="height:70px" src="<?php echo ($root); ?>/upload/scholar/picture/<?php echo ($scholarList["id"]); ?><?php echo ($scholarList["photo_ext"]); ?>"/>
											</a>
											<a class="tdEdit" href="javascript:changePicture('scholar','<?php echo ($scholarList["id"]); ?>')">上传</a>
										</td> 
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('scholar',<?php echo ($scholarList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('scholar', <?php echo ($scholarList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
						
						<div id="tabSocialScholar">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
								  <tbody>
									</tbody>
									<tbody>
									  <tr class="">
										<th>奖学金名称</th>
										<th>等级</th>
										<th>金额</th>
										<th>获奖时间</th>
										<th>照片(点击查看大图)</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($socialScholarResult)): $i = 0; $__LIST__ = $socialScholarResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$socialScholarList): ++$i;$mod = ($i % 2 )?><tr id="socialScholar<?php echo ($socialScholarList["id"]); ?>" class="">
										<td class="text"><?php echo ($socialScholarList["scholar_name"]); ?></td>
										<td class="text"><?php echo ($socialScholarList["level"]); ?></td>
										<td class="text"><?php echo ($socialScholarList["amount"]); ?></td>
										<td class="text"><?php echo ($socialScholarList["date"]); ?></td> 
										<td style="text-algin:">
										    <a href="javascript:viewPicture('<?php echo ($root); ?>/upload/social_scholar/picture/<?php echo ($socialScholarList["id"]); ?><?php echo ($socialScholarList["photo_ext"]); ?>')">
										       <img style="height:70px" src="<?php echo ($root); ?>/upload/social_scholar/picture/<?php echo ($socialScholarList["id"]); ?><?php echo ($socialScholarList["photo_ext"]); ?>"/>
											</a>
											<a class="tdEdit" href="javascript:changePicture('social_scholar','<?php echo ($socialScholarList["id"]); ?>')">上传</a>
										</td> 										
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('socialScholar',<?php echo ($socialScholarList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('social_scholar', <?php echo ($socialScholarList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
						
						<div id="tabGranting">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
								  <tbody>
									</tbody>
									<tbody>
									  <tr class="">
										<th>助学金名称</th>
										<th>等级</th>
										<th>金额</th>
										<th>获助时间</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($grantingResult)): $i = 0; $__LIST__ = $grantingResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$grantingList): ++$i;$mod = ($i % 2 )?><tr id="granting<?php echo ($grantingList["id"]); ?>"  class="">
										<td class="text"><?php echo ($grantingList["granting_name"]); ?></td>
										<td class="text"><?php echo ($grantingList["level"]); ?></td>
										<td class="text"><?php echo ($grantingList["amount"]); ?></td>
										<td class="text"><?php echo ($grantingList["date"]); ?></td>            
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('granting',<?php echo ($grantingList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('granting', <?php echo ($grantingList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
															
                        <div id="tabLoan">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
								  <tbody>
									</tbody>
									<tbody>
									  <tr class="">
										<th>贷款总额</th>
										<th>学费贷款</th>
										<th>住宿费贷款</th>
										<th>申请时间</th>
										<th>是否还清</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($loanResult)): $i = 0; $__LIST__ = $loanResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$loanList): ++$i;$mod = ($i % 2 )?><tr id="loan<?php echo ($loanList["id"]); ?>" class="">
										<td class="text"><?php echo ($loanList["total"]); ?></td>
										<td class="text"><?php echo ($loanList["tuition"]); ?></td>
										<td class="text"><?php echo ($loanList["accommodation"]); ?></td>
										<td class="text"><?php echo ($loanList["apply_date"]); ?></td> 
										<td class="text"><?php echo ($loanList["pay_off"]); ?></td> 
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('loan',<?php echo ($loanList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('loan', <?php echo ($loanList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
						
						<div id="tabPunish">
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
								  <tbody>
									</tbody>
									<tbody>
									  <tr class="">
										<th>处分类型</th>
										<th>原由</th>
										<th>处分时间</th>
										<th>是否撤销</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($punishResult)): $i = 0; $__LIST__ = $punishResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$punishList): ++$i;$mod = ($i % 2 )?><tr id="punish<?php echo ($punishList["id"]); ?>" class="">
										<td class="text"><?php echo ($punishList["type"]); ?></td>
										<td class="text"><?php echo ($punishList["cause"]); ?></td>
										<td class="text"><?php echo ($punishList["date"]); ?></td>
										<td class="text"><?php echo ($punishList["can_cancel"]); ?></td>            
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('punish', <?php echo ($punishList["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('punish', <?php echo ($punishList["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
						
                        <div id="tabCompetition">						
							<div class="studetailrow">
								<label class="label1" style="width:80px">姓名</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">学号</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
								<label class="label1" style="width:80px">性别</label>
								<input class="inputlock1" style="width:80px" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
							
								<table class="list" width="100%" cellpadding="0" cellspacing="0" >
								  <tbody>
									</tbody>
									<tbody>
									  <tr class="">
										<th>参加赛事</th>
										<th>级别</th>
										<th>获奖情况</th>
										<th>获奖时间</th>
										<th>照片(点击查看大图)</th>
										<th class="tdEdit">修改</th>
										<th class="tdDelete">删除</th>
									  </tr>
									  <?php if(is_array($competitionResult)): $i = 0; $__LIST__ = $competitionResult;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$competitionlist): ++$i;$mod = ($i % 2 )?><tr id="competition<?php echo ($competitionlist["id"]); ?>" class="">
										<td class="text"><?php echo ($competitionlist["competition_name"]); ?></td>
										<td class="text"><?php echo ($competitionlist["level"]); ?></td>
										<td class="text"><?php echo ($competitionlist["award"]); ?></td>
										<td class="text"><?php echo ($competitionlist["date"]); ?></td>   
										<td>
										    <a href="javascript:viewPicture('<?php echo ($root); ?>/upload/competition/picture/<?php echo ($competitionlist["id"]); ?><?php echo ($competitionlist["photo_ext"]); ?>')">
										       <img style="height:70px" src="<?php echo ($root); ?>/upload/competition/picture/<?php echo ($competitionlist["id"]); ?><?php echo ($competitionlist["photo_ext"]); ?>"/>
											</a>
											<a class="tdEdit" href="javascript:changePicture('competition','<?php echo ($competitionlist["id"]); ?>')">上传</a>
										</td> 
										<td class="tdEdit" align="center"><button type="button" class="add" onclick="edit('competition',<?php echo ($competitionlist["id"]); ?>)" value="修改">修改</button></td>
										<td class="tdDelete" align="center"><button type="button" class="reset" onclick="deleteModule('competition', <?php echo ($competitionlist["id"]); ?>)" value="删除">删除</button>
										</td>
									  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
								 </tbody>
									<tfoot>
									  <tr class="">
										 <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
									  </tr>
									</tfoot>
								</table>
							</div>
						</div>
					
					    <div id="tab_party">
							<div class="studetailrow">
								<label class="label1">姓名</label>
								<input class="inputlock1" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1">学号</label>
								<input class="inputlock1" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">性别</label>
								<input class="inputlock1" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
								<label class="label1">民族</label>
								<input class="inputlock1" type="text" name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">申请时间</label>
								<input class="inputlock" type="text" name="apply_date" value="<?php echo ($partyResult["apply_date"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="apply_date" value="<?php echo ($partyResult["apply_date"]); ?>" />
								<label class="label1">确定为积极分子时间</label>
								<input class="inputlock" type="text" name="active_date" value="<?php echo ($partyResult["active_date"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="active_date" value="<?php echo ($partyResult["active_date"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">成为预备党员时间</label>
								<input class="inputlock" type="text" name="ready_date" value="<?php echo ($partyResult["ready_date"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="ready_date" value="<?php echo ($partyResult["ready_date"]); ?>" />
								<label class="label1">转正时间</label>
								<input class="inputlock" type="text" name="full_member_date" value="<?php echo ($partyResult["full_member_date"]); ?>" readonly="readonly" />
							    <input class="inputEdit" type="text" name="full_member_date" value="<?php echo ($partyResult["full_member_date"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">组织转出情况</label>
								<textarea class="inputlock" type="text" name="alter_info" value="" readonly="readonly" ><?php echo ($partyResult["alter_info"]); ?></textarea>
							    <textarea class="inputEdit" type="text" name="alter_info" value="" ><?php echo ($partyResult["alter_info"]); ?></textarea>
							</div>
							<div class="studetailrow">
							    <table style="width:60%;margin:auto">
								    <tr>
								        <td class="tdEdit"><input  type="button" class="button" id="edit_party" value="打开编辑"  /></td>
								        <td class="tdEdit"><input  type="submit" class="buttonlock" id="submit_party" disabled="disabled" value="提交修改"  /></td>
								    </tr>
								</table>
							</div>
						</div>
						
						<div id="tab_graduation">
							<div class="studetailrow">
								<label class="label1">姓名</label>
								<input class="inputlock1" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1">学号</label>
								<input class="inputlock1" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">性别</label>
								<input class="inputlock1" type="text" name="stu_gender" value="<?php echo ($result["stu_gender"]); ?>" readonly="readonly" />
								<label class="label1">民族</label>
								<input class="inputlock1" type="text" name="stu_nation" value="<?php echo ($result["stu_nation"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">年级</label>
								<input class="inputlock1" type="text" name="stu_grade" value="<?php echo ($result["stu_grade"]); ?>" readonly="readonly" />
								<label class="label1">在校职务</label>
								<input class="inputlock1" type="text" name="stu_duty" value="<?php echo ($result["stu_duty"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">政治面貌</label>
								<input class="inputlock" type="text" name="politics_status" value="<?php echo ($graduationResult["politics_status"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="politics_status" value="<?php echo ($graduationResult["politics_status"]); ?>" />
								<label class="label1">毕业去向</label>
								<input class="inputlock" type="text" name="type" value="<?php echo ($graduationResult["type"]); ?>" readonly="readonly" />
								<select class="inputEdit" type="text" name="type" id="graduationType">
								    <option value="1">考研</option>
									<option value="2">保研</option>
									<option value="3">工作</option>
									<option value="4">出国</option>
									<option value="5">公务员</option>
								</select>
							</div>
							<div class="studetailrow">
								<label class="label1">毕业时间</label>
								<input class="inputlock" type="text" name="date" value="<?php echo ($graduationResult["date"]); ?>" readonly="readonly" />
							    <input class="inputEdit" type="text" name="date" value="<?php echo ($graduationResult["date"]); ?>" />
							    <label class="label1">联系方式</label>
								<input class="inputlock" type="text" name="phone" value="<?php echo ($graduationResult["phone"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="phone" value="<?php echo ($graduationResult["phone"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">邮箱</label>
								<input class="inputlock" type="text" name="email" value="<?php echo ($graduationResult["email"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="email" value="<?php echo ($graduationResult["email"]); ?>" />
							    <label class="label1">QQ</label>
								<input class="inputlock" type="text" name="qq" value="<?php echo ($graduationResult["qq"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="qq" value="<?php echo ($graduationResult["qq"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">用人单位(院校)</label>
								<input class="inputlock" type="text" name="receive_unit" value="<?php echo ($graduationResult["receive_unit"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="receive_unit" value="<?php echo ($graduationResult["receive_unit"]); ?>" />
							    <label class="label1">单位电话</label>
								<input class="inputlock" type="text" name="ru_phone" value="<?php echo ($graduationResult["ru_phone"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="ru_phone" value="<?php echo ($graduationResult["ru_phone"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">单位地址</label>
								<input class="inputlock" type="text" name="ru_address" value="<?php echo ($graduationResult["ru_address"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="ru_address" value="<?php echo ($graduationResult["ru_address"]); ?>" />
							    <label class="label1">单位邮箱</label>
								<input class="inputlock" type="text" name="ru_email" value="<?php echo ($graduationResult["ru_email"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="ru_email" value="<?php echo ($graduationResult["ru_email"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">父亲联系方式</label>
								<input class="inputlock1" type="text" name="dad_phone" value="<?php echo ($result["dad_phone"]); ?>" readonly="readonly" />
							    <label class="label1">母亲联系方式</label>
								<input class="inputlock1" type="text" name="mom_phone" value="<?php echo ($result["mom_phone"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">档案邮寄情况</label>
								<textarea class="inputlock" type="text" name="post_info" readonly="readonly" ><?php echo ($graduationResult["post_info"]); ?></textarea>
							    <textarea class="inputEdit" type="text" name="post_info" value="" ><?php echo ($graduationResult["post_info"]); ?></textarea>
							</div>
							<div class="studetailrow">
							    <table style="width:60%;margin:auto">
								    <tr>
								        <td class="tdEdit"><input  type="button" class="button" id="edit_graduation" value="打开编辑"  /></td>
								        <td class="tdEdit"><input  type="submit" class="buttonlock" id="submit_graduation" disabled="disabled" value="提交修改"  /></td>
								    </tr>
								</table>
							</div>
						</div>
						
						<div id="tab_insurance">
						    <div class="studetailrow">
								<label class="label1">姓名</label>
								<input class="inputlock1" type="text" name="stu_name" value="<?php echo ($result["stu_name"]); ?>" readonly="readonly" />
								<label class="label1">学号</label>
								<input class="inputlock1" type="text" name="stu_num" value="<?php echo ($result["stu_num"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">年级</label>
								<input class="inputlock1" type="text" name="stu_gender" value="<?php echo ($result["stu_grade"]); ?>" readonly="readonly" />
								<label class="label1">班级</label>
								<input class="inputlock1" type="text" name="stu_nation" value="<?php echo ($result["stu_class"]); ?>" readonly="readonly" />
							</div>
							<div class="studetailrow">
								<label class="label1">参保年份</label>
								<input class="inputlock" type="text" name="insu_beginyear" value="<?php echo ($insuranceResult["insu_beginyear"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="insu_beginyear" value="<?php echo ($insuranceResult["insu_beginyear"]); ?>"  />
								<label class="label1">停保年份</label>
								<input class="inputlock" type="text" name="insu_endyear" value="<?php echo ($insuranceResult["insu_endyear"]); ?>" readonly="readonly" />								
								<input class="inputEdit" type="text" name="insu_endyear" value="<?php echo ($insuranceResult["insu_endyear"]); ?>" />
							</div>
							<div class="studetailrow">
								<label class="label1">缴费金额</label>
								<input class="inputlock" type="text" name="insu_amount" value="<?php echo ($insuranceResult["insu_amount"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="insu_amount" value="<?php echo ($insuranceResult["insu_amount"]); ?>" />
								<label class="label1">是否减免</label>
								<input class="inputlock" type="text" name="insu_reducable" value="<?php echo ($insuranceResult["insu_reducable"]); ?>" readonly="readonly" />
								<input class="inputEdit" type="text" name="insu_reducable" value="<?php echo ($insuranceResult["insu_reducable"]); ?>" />
							</div>
							<div class="studetailrow">
							    <table style="width:60%;margin:auto">
								    <tr>
								        <td class="tdEdit"><input  type="button" class="button" id="edit_insurance" value="打开编辑"  /></td>
								        <td class="tdEdit"><input  type="submit" class="buttonlock" id="submit_insurance" disabled="disabled" value="提交修改"  /></td>
								    </tr>
								</table>
							</div>						
						</div>
					</div>
					<input type="hidden" name="id" id="id" />
                </div>
            </div>
			
<input type="hidden" name="stu_id" id="stu_id" value="<?php echo ($result["stu_id"]); ?>"/>
<input type="hidden" id="a" value="1"/>
<input type="hidden" id="module" value=""/>
<input type="hidden" id="moduleId" value=""/>
<div id="pictureDialog" title="照片">
	<p><img id="picture" src=""></p>
</div>

</body>
<script type="text/javascript">
$(function(){
	// Tabs
	$('#tabs').tabs({
		selected: <?php echo ($tabSelected); ?>
	});
	$('viewtitle').css("background","");
	
	var partyId = "<?php echo ($partyResult["id"]); ?>";
	var graduationId = "<?php echo ($graduationResult["id"]); ?>";
	var insuranceId = "<?php echo ($insuranceResult["id"]); ?>";
	if (partyId == "") {
		$("#edit_party").remove();
		$("#submit_party").remove();
	} else {
		$("#edit_party").bind("click",function(){ 
			editUnique("party", partyId); 
		});	
		$("#submit_party").bind("click",function(){ 
			submitEditUnique("party", partyId); 
		});
	
	}
	if (graduationId == "") {
		$("#edit_graduation").remove();
		$("#submit_graduation").remove();
	} else {	    
		$("#edit_graduation").bind("click",function(){ 
			editUnique("graduation", "<?php echo ($graduationResult["id"]); ?>"); 
		});
		$("#submit_graduation").bind("click",function(){ 
			submitEditUnique("graduation", "<?php echo ($graduationResult["id"]); ?>"); 
		});
	}
	if (insuranceId == "") {
		$("#edit_insurance").remove();
		$("#submit_insurance").remove();
	} else {
	    $("#edit_insurance").bind("click",function(){ 
			editUnique("insurance", "<?php echo ($insuranceResult["id"]); ?>"); 
		});
		$("#submit_insurance").bind("click",function(){ 
			submitEditUnique("insurance", "<?php echo ($insuranceResult["id"]); ?>"); 
		});
	}
	$("#edit_student").bind("click",function(){ 
	    editUnique("student", "<?php echo ($result["stu_id"]); ?>"); 
	});
	$("#submit_student").bind("click",function(){ 
	    submitEditUnique("student", "<?php echo ($result["stu_id"]); ?>"); 
	});

	var graduationTypeId;
	var graduationType = "<?php echo ($graduationResult["type"]); ?>";
	switch (graduationType) {
	    case '考研': 
		    graduationTypeId = '1';
			break;
		case '保研': 
		    graduationTypeId = '2';
			break;
		case '工作': 
		    graduationTypeId = '3';
			break;
		case '出国': 
		    graduationTypeId = '4';
			break;
		case '公务员': 
		    graduationTypeId = '5';
			break;
		default : 
		    graduationTypeId = '1';
			break;
	}
	$("#graduationType").val(graduationTypeId);
	//$(".inputEdit").css("display", "none");
	if (<?php echo ($level); ?> != 2) {
	    $("#toolbar").remove();
		$("#hierarchy").remove();
		$(".tdDelete").remove();
	} else if (<?php echo ($gradeTeacher); ?> != 1) {
	    $(".tdDelete").remove();
		$(".tdEdit").remove();
	}
});
function deleteModule(module, id) {
    if (confirm("确定删除?")){
	    var password = "<?php echo ($password); ?>";
	    var tpassword = prompt("请输入您的登录密码：","");
		var tabId;
 	    if (password == tpassword) {
		    switch (module) {
				case 'scholar':
					tabId = 1;
					var model = new scholar();
					break;
				case 'social_scholar':
					tabId = 2;
					var model = new scholar();
					break;
				case 'competition':
					tabId = 3;
					var model = new competition();
					break;
				case 'granting':
					tabId = 6;
					var model = new granting();
					break;
				case 'loan':
					tabId = 7;
					var model = new loan();
					break;
				case 'punish':
					tabId = 9;
					var model = new punish();
					break;
			    case 'innovation':
					tabId = 10;
					var model = new innovation();
					break;
			}
			model.module = module;
	        model.id = id;
		    $.ajax({
            url: "<?php echo ($url); ?>/deleteModule",
			type: 'POST',
			data: model,
            success: function(result){
                        switch (result) { 
							case '0':
                                alert("申请提交失败！");	
                                break;	
					        case '1':
							    alert("申请提交成功！");
								break;
                            case '2':
							    alert("删除成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("删除失败！");	
                                break;									
						 }
                     }
            });
     	} else {
	    	alert("密码输入错误！！！");
	    }
	}
}
function insurance() {
    var stu_id;
    var module;
    var id;
    var insu_beginyear;
    var insu_endyear;
    var insu_amount;
    var insu_reducable;
}
function graduation() {
    var stu_id;
    var module;
    var id;
    var phone;
    var email;
    var qq;
    var politics_status;
	var receive_unit;
    var ru_address;
    var ru_phone;
    var ru_email;
	var post_info;
    var type;
	var date;
}
function party() {
    var stu_id;
    var module;
    var id;
    var apply_date;
    var active_date;
    var ready_date;
    var full_member_date;
	var alter_info;
}
function student() {
    var module;
    var stu_id;
    var stu_num;
    var stu_pw;
    var stu_tnum;
    var stu_status;
    var stu_idnum;
    var stu_name;
    var stu_pinyin;
    var stu_exname;
    var stu_indate;
    var stu_type;
    var stu_schooling;
    var stu_gradyear;
    var stu_campus;
    var stu_college;
    var stu_major;
    var stu_grade;
    var stu_class;
    var stu_gender;
    var stu_nation;
    var stu_political;
    var stu_birthday;
    var stu_hometown;
    var stu_birthplace;
    var stu_birplacode;
    var stu_residence;
    var stu_residcode;
    var stu_trainarea;
    var stu_abroad;
    var stu_homeaddr;
    var stu_homeadcode;
    var stu_homeaddr2;
    var stu_contacaddr;
    var stu_contadcode;
    var stu_contaddr2;
    var stu_zipcode;
    var stu_email;
    var stu_homepage;
    var stu_phone;
    var stu_mobile;
    var stu_qqnum;
    var stu_bloodtype;
    var stu_faith;
    var stu_residtype;
    var stu_marriage;
    var stu_speciality;
    var stu_photo;
    var dad_name;
    var mom_name;
    var dad_phone;
    var mom_phone;
    var dad_work_unit;
    var mom_work_unit;
    var stu_duty;
}
function editUnique(module, id){
	var password = "<?php echo ($password); ?>";
	var tpassword = prompt("请输入您的登录密码：","");
 	if (password == tpassword) {
		$("#tab_" + module + " .inputlock").css("display","none");
		$("#tab_" + module + " .inputEdit").css("display","inline");
		$("#tab_" + module + " label").attr("class","label2");
		$("#edit_"+ module).attr("value","取消编辑");
		$("#edit_"+ module).unbind("click");
		$("#edit_"+ module).bind("click",function(){ 
		    cancelEditUnique(module, id); 
		});
		$("#submit_"+ module).attr("class","button");
		$("#submit_"+ module).removeAttr("disabled");
		$("#password").attr("class","button");
		$("#password").removeAttr("disabled");
 	} else {
		alert("密码输入错误！！！");
	}
}
function cancelEditUnique(module, id){
		$("#tab_" + module + " .inputlock").css("display","inline");
		$("#tab_" + module + " .inputEdit").css("display","none");
		$("#tab_" + module + " label").attr("class","label1");
		$("#edit_"+ module).attr("value","打开编辑");
		$("#edit_"+ module).unbind("click");
		$("#edit_"+ module).bind("click",function(){ 
		    editUnique(module, id); 
		});
		$("#submit_"+ module).attr("class","buttonlock");
		$("#submit_"+ module).removeAttr("disabled");
		$("#password").attr("class","buttonlock");
		$("#password").attr("disabled","disabled");
}
function submitEditUnique(module, id) {
    var tabId;
    switch (module) {
		    case 'student':
			    tabId = 0;
			    var model = new student();
				model.stu_num = $("#tab_" + module + " .inputEdit[name='stu_num']").val();
				model.stu_tnum = $("#tab_" + module + " .inputEdit[name='stu_tnum']").val();
				model.stu_status = $("#tab_" + module + " .inputEdit[name='stu_status']").val();
				model.stu_idnum = $("#tab_" + module + " .inputEdit[name='stu_idnum']").val();
				model.stu_name = $("#tab_" + module + " .inputEdit[name='stu_name']").val();
				model.stu_pinyin = $("#tab_" + module + " .inputEdit[name='stu_pinyin']").val();
				model.stu_indate = $("#tab_" + module + " .inputEdit[name='stu_indate']").val();
				model.stu_gradyear = $("#tab_" + module + " .inputEdit[name='stu_gradyear']").val();
				model.stu_grade = $("#tab_" + module + " .inputEdit[name='stu_grade']").val();
				model.stu_class = $("#tab_" + module + " .inputEdit[name='stu_class']").val();
				model.stu_gender = $("#tab_" + module + " .inputEdit[name='stu_gender']").val();
				model.stu_nation = $("#tab_" + module + " .inputEdit[name='stu_nation']").val();
				model.stu_political = $("#tab_" + module + " .inputEdit[name='stu_political']").val();
				model.stu_birthday = $("#tab_" + module + " .inputEdit[name='stu_birthday']").val();
				model.stu_hometown = $("#tab_" + module + " .inputEdit[name='stu_hometown']").val();
				model.stu_birthplace = $("#tab_" + module + " .inputEdit[name='stu_birthplace']").val();
				model.stu_residence = $("#tab_" + module + " .inputEdit[name='stu_residence']").val();
				model.stu_trainarea = $("#tab_" + module + " .inputEdit[name='stu_trainarea']").val();
				model.stu_abroad = $("#tab_" + module + " .inputEdit[name='stu_abroad']").val();
				model.stu_homeaddr = $("#tab_" + module + " .inputEdit[name='stu_homeaddr']").val();
				model.stu_homeaddr2 = $("#tab_" + module + " .inputEdit[name='stu_homeaddr2']").val();
				model.stu_contacaddr = $("#tab_" + module + " .inputEdit[name='stu_contacaddr']").val();
				model.stu_contaddr2 = $("#tab_" + module + " .inputEdit[name='stu_contaddr2']").val();
				model.stu_zipcode = $("#tab_" + module + " .inputEdit[name='stu_zipcode']").val();
				model.stu_email = $("#tab_" + module + " .inputEdit[name='stu_email']").val();
				model.stu_homepage = $("#tab_" + module + " .inputEdit[name='stu_homepage']").val();
				model.stu_mobile = $("#tab_" + module + " .inputEdit[name='stu_mobile']").val();
				model.stu_qqnum = $("#tab_" + module + " .inputEdit[name='stu_qqnum']").val();
				model.stu_faith = $("#tab_" + module + " .inputEdit[name='stu_faith']").val();
				model.dad_name = $("#tab_" + module + " .inputEdit[name='dad_name']").val();
				model.mom_name = $("#tab_" + module + " .inputEdit[name='mom_name']").val();
				model.dad_phone = $("#tab_" + module + " .inputEdit[name='dad_phone']").val();
				model.mom_phone = $("#tab_" + module + " .inputEdit[name='mom_phone']").val();
				model.dad_work_unit = $("#tab_" + module + " .inputEdit[name='dad_work_unit']").val();
				model.mom_work_unit = $("#tab_" + module + " .inputEdit[name='mom_work_unit']").val();
				model.stu_duty = $("#tab_" + module + " .inputEdit[name='stu_duty']").val();
				model.stu_homeadcode = $("#tab_" + module + " .inputEdit[name='stu_homeadcode']").val();
				model.stu_residcode = $("#tab_" + module + " .inputEdit[name='stu_residcode']").val();
				model.stu_phone = $("#tab_" + module + " .inputEdit[name='stu_phone']").val();
				model.stu_photo = $("#photoHidden").val();
			//	model.stu_exname = $("#tab_" + module + " .inputEdit[name='stu_exname']").val();
			//	model.stu_residtype = $("#tab_" + module + " .inputEdit[name='stu_residtype']").val();
			//	model.stu_marriage = $("#tab_" + module + " .inputEdit[name='stu_marriage']").val();
			//	model.stu_speciality = $("#tab_" + module + " .inputEdit[name='stu_speciality']").val();
			//	model.stu_photo = $("#tab_" + module + " .inputEdit[name='stu_photo']").val();
			//	model.stu_bloodtype = $("#tab_" + module + " .inputEdit[name='stu_bloodtype']").val();
			//	model.stu_phone = $("#tab_" + module + " .inputEdit[name='stu_phone']").val();
			//	model.stu_contadcode = $("#tab_" + module + " .inputEdit[name='stu_contadcode']").val();
			//	model.stu_birplacode = $("#tab_" + module + " .inputEdit[name='stu_birplacode']").val();
			//	model.stu_residcode = $("#tab_" + module + " .inputEdit[name='stu_residcode']").val();
			//	model.stu_campus = $("#tab_" + module + " .inputEdit[name='stu_campus']").val();
			//	model.stu_college = $("#tab_" + module + " .inputEdit[name='stu_college']").val();
			//	model.stu_major = $("#tab_" + module + " .inputEdit[name='stu_major']").val();
			//	model.stu_type = $("#tab_" + module + " .inputEdit[name='stu_type']").val();
			//	model.stu_schooling = $("#tab_" + module + " .inputEdit[name='stu_schooling']").val();
			//	model.stu_pw = $("#tab_" + module + " .inputEdit[name='stu_pw']").val();
			    break;
			case 'party':
			    tabId = 4;
			    var model = new party();
				model.id = id;
				model.apply_date = $("#tab_" + module + " .inputEdit[name='apply_date']").val();
				model.active_date = $("#tab_" + module + " .inputEdit[name='active_date']").val();
				model.ready_date = $("#tab_" + module + " .inputEdit[name='ready_date']").val();
				model.full_member_date = $("#tab_" + module + " .inputEdit[name='full_member_date']").val();
				model.alter_info = $("#tab_" + module + " .inputEdit[name='alter_info']").val();
			    break;
			case 'graduation':
			    tabId = 8;
			    var model = new graduation();
				model.id = id;
				model.phone = $("#tab_" + module + " .inputEdit[name='phone']").val();
				model.email = $("#tab_" + module + " .inputEdit[name='email']").val();
				model.qq = $("#tab_" + module + " .inputEdit[name='qq']").val();
				model.politics_status = $("#tab_" + module + " .inputEdit[name='politics_status']").val();
				model.receive_unit = $("#tab_" + module + " .inputEdit[name='receive_unit']").val();
				model.ru_phone = $("#tab_" + module + " .inputEdit[name='ru_phone']").val();
				model.ru_email = $("#tab_" + module + " .inputEdit[name='ru_email']").val();
				model.post_info = $("#tab_" + module + " .inputEdit[name='post_info']").val();
				model.type = $("#tab_" + module + " .inputEdit[name='type']").val();
				model.ru_address = $("#tab_" + module + " .inputEdit[name='ru_address']").val();
				model.date = $("#tab_" + module + " .inputEdit[name='date']").val();
			    break;
			case 'insurance':
			    tabId = 5;
			    var model = new insurance();
				model.id = id;
				model.insu_beginyear = $("#tab_" + module + " .inputEdit[name='insu_beginyear']").val();
				model.insu_endyear = $("#tab_" + module + " .inputEdit[name='insu_endyear']").val();
				model.insu_amount = $("#tab_" + module + " .inputEdit[name='insu_amount']").val();
				model.insu_reducable = $("#tab_" + module + " .inputEdit[name='insu_reducable']").val();
			    break;
		}
		model.stu_id = <?php echo ($result["stu_id"]); ?>;
		model.module = module;
		$.ajax({
            url: "<?php echo ($url); ?>/updateModule",
			type: 'POST',
			data: model,
            success: function(result){
                        switch (result) { 
							case '0':
                                alert("申请提交失败！");	
								cancelEditUnique(module, id);
                                break;	
					        case '1':
							    alert("申请提交成功！");
								cancelEditUnique(module, id);
								break;
                            case '2':
							    alert("修改成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("修改失败！");	
								cancelEditUnique(module, id);
                                break;									
						 }
                     }
        });
}
var a = 0;
function changephoto(){
    if (a == 0) {
	    a = 1;
		//return false;
    } else {
       	var stu_id = $("#stu_id").val();
        var obj = new Object();
   		window.showModalDialog('<?php echo ($url); ?>/changephoto/stu_id/'+stu_id,obj,'dialogWidth:400px;dialogHeight:150px');
		a = 0;
    }
}
function changePicture(module, id){
    var obj = new Object();
	window.showModalDialog('<?php echo ($url); ?>/changePicture/module/'+module+"/id/"+id,obj,'dialogWidth:400px;dialogHeight:150px');
}
function stuchangepassword(){
	$("#form").attr("action","<?php echo ($url); ?>/stuchangepassword");
}
function viewPicture(url) {
    $("#picture").attr("src", url);
	$("#picture").css("display", "block");
	$( "#pictureDialog" ).dialog({
		height: 450,
		width: 540,
		modal: true
	});
}
function scholar() {
    var module;
    var stu_id;
	var id;
	var scholar_name;
	var level;
	var date;
	var amount;
}
function innovation() {
    var module;
    var stu_id;
	var id;
	var project_name;
	var level;
	var award;
	var apply_date;
	var win_date;
	var tutor;
	var members;
	var leader;
	var college;
}
function granting() {
    var module;
    var stu_id;
	var id;
	var granting_name;
	var level;
	var date;
	var amount;
}
function loan() {
    var module;
    var stu_id;
	var id;
	var total;
	var tuition;
	var accommodation;
	var apply_date;
	var pay_off;
}
function punish() {
    var module;
    var stu_id;
	var id;
	var type;
	var cause;
	var date;
	var can_cancel;
}
function competition() {
    var module;
    var stu_id;
	var id;
	var competition_name;
	var level;
	var date;
	var award;
}
function submitEdit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
	var tabId;
    switch (module) {
	    case 'scholar':
		    tabId = 1;
		    editTd = 6;
		    var model = new scholar();
		    model.scholar_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'socialScholar':
		    tabId = 2;
		    editTd = 6;
		    var model = new scholar();
		    model.scholar_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'competition':
		    tabId = 3;
		    editTd = 6;
		    var model = new competition();
		    model.competition_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.award = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		
		case 'granting':
		    tabId = 6;
		    editTd = 5;
		    var model = new granting();
		    model.granting_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.amount = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
		case 'loan':
		    tabId = 7;
		    editTd = 6;
		    var model = new loan();
		    model.total = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.tuition = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.accommodation = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.apply_date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			model.pay_off = $("#" + itemId + " td::nth-child(5) input[type='text']").val();
			break;
		case 'punish':
		    tabId = 9;
		    editTd = 5;
		    var model = new punish();
		    model.type = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.cause = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.date = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.can_cancel = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			break;
	    case 'innovation':
		    tabId = 10;
		    editTd = 11;
		    var model = new innovation();
		    model.project_name = $("#" + itemId + " td::nth-child(1) input[type='text']").val();
			model.level = $("#" + itemId + " td::nth-child(2) input[type='text']").val();
			model.award = $("#" + itemId + " td::nth-child(3) input[type='text']").val();
			model.apply_date = $("#" + itemId + " td::nth-child(4) input[type='text']").val();
			model.win_date = $("#" + itemId + " td::nth-child(5) input[type='text']").val();
			model.tutor = $("#" + itemId + " td::nth-child(6) input[type='text']").val();
			model.leader = $("#" + itemId + " td::nth-child(7) input[type='text']").val();
			model.members = $("#" + itemId + " td::nth-child(8) input[type='text']").val();
			model.college = $("#" + itemId + " td::nth-child(9) input[type='text']").val();
			break;
	}
	model.module = module;
	model.id = id;
	model.stu_id = <?php echo ($result["stu_id"]); ?>;
	$.ajax({
            url: "<?php echo ($url); ?>/updateModule",
			type: 'POST',
			data: model,
            success: function(result){
			            switch (result) { 
							case '0':
                                alert("申请提交失败！");						
                                break;	
					        case '1':
							    alert("申请提交成功！");
								break;
                            case '2':
							    alert("修改成功！");
								window.location.href = "<?php echo ($url); ?>/studetail/stu_id/<?php echo ($result["stu_id"]); ?>/tab/"+tabId;
								break;
							case '3':
                                alert("修改失败！");	
                                break;						
						 }
						 $("#" + itemId + " td.text").each(function () {
							 html = $(this).find("input[type='hidden']").val();
						    $(this).html(html);
						});
						$("#" + itemId + " td::nth-child(" + editTd + ") #submitEdit").remove();
						$("#" + itemId + " td::nth-child(" + editTd + ") #cancelEdit").remove();
						$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "");	
                     }
    });
}
function item() {
    var module;
	var id;
}
function edit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
    switch (module) {
	    case 'scholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'socialScholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'competition':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'punish':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'loan':
		    tdNum = 5;
			editTd = 6;
			break;
		case 'innovation':
		    tdNum = 9;
			editTd = 11;
			break;
	}	
	
	for (var i = 1; i <= tdNum; i++) {
	    var value = $("#" + itemId + " td::nth-child(" + i + ")").text();
		var editElement = "<input class='td_input' type='text' value='" + value + "' />";
		editElement += "<input class='td_input' type='hidden' value='" + value + "' />";
		$("#" + itemId + " td::nth-child(" + i + ")").html(editElement);
	}
	submitButton = "<button id='submitEdit' type='button' class='add' onclick=submitEdit('"+module+"',"+id+")>提交</button>";
	cancelButton = "<button id='cancelEdit' type='button' class='add' onclick=cancelEdit('"+module+"',"+id+")>取消</button>";
	$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "none");
    $("#" + itemId + " td::nth-child(" + editTd + ")").append(submitButton + cancelButton );
	
}	
function cancelEdit(module, id) {
    var itemId = module + id;
	var tdNum;
	var editTd;
    switch (module) {
	    case 'scholar':
	    	tdNum = 4;
			editTd = 6;
			break;
		case 'socialScholar':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'competition':
		    tdNum = 4;
			editTd = 6;
			break;
		case 'granting':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'punish':
		    tdNum = 4;
			editTd = 5;
			break;
		case 'loan':
		    tdNum = 5;
			editTd = 6;
			break;
		case 'innovation':
		    tdNum = 9;
			editTd = 11;
			break;
	}
	for (var i = 1; i <= tdNum; i++) {
	    var value = $("#" + itemId + " td::nth-child(" + i + ") input[type='hidden']").val();
		$("#" + itemId + " td::nth-child(" + i + ")").text(value);
	}
    $("#" + itemId + " td::nth-child(" + editTd + ") #submitEdit").remove();
	$("#" + itemId + " td::nth-child(" + editTd + ") #cancelEdit").remove();
	$("#" + itemId + " td::nth-child(" + editTd + ") button").css("display", "");	
}
</script>
</html>