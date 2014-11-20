<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
    <title>查看基本信息修改提交申请</title>
    <link type="text/css" href="<?php echo ($current); ?>/style/viewEditInfo.css" rel="stylesheet" type="text/css" />        
</head>
<body>
	<br/>
	<div class="title" >
		<span class="tip"><font color="red">*提示：左边为原信息，右边为更改后信息（红色部分为所更改)</font></span>
		<br></br>
		<button type="button" class="button"  onclick="passConfirm(<?php echo ($list["stu_id"]); ?>);">通过审核</button>
        <button type="button" class="button"  onclick="nopassConfirm(<?php echo ($list["stu_id"]); ?>);">不通过审核</button>
    </div>
    <form action="#"  id="form" method="post" target="main">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
            <tr>
			    <th><label class="label1">头像</label></th>
       			<td align=center><img id="img1" src="<?php echo ($root); ?>/upload/ID_photo/<?php echo ($list["stu_photo"]); ?>" width="90" height="110"/></td>
            	<td align=center><img id="img2" src="<?php echo ($root); ?>/upload/ID_photo_temp/<?php echo ($list_edit["stu_photo"]); ?>" width="90" height="110"/></td>
			</tr>
			<tr>
            	<th><label class="label1">学生姓名</label></th>
            	<td><label class="label1"><?php echo ($list["stu_name"]); ?></label></td>
            	<td><label class="label2" id=stu_name><?php echo ($list_edit["stu_name"]); ?></label></td>
           	</tr>
            <tr>
            	<th><label class="label1">姓名拼音</label></th>
            	<td><label class="label1"><?php echo ($list["stu_pinyin"]); ?></label></td>
            	<td><label class="label2" id=stu_pinyin><?php echo ($list_edit["stu_pinyin"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">学号</label></th>
            	<td><label class="label1"><?php echo ($list["stu_num"]); ?></label></td>
            	<td><label class="label2" id="stu_num"><?php echo ($list_edit["stu_num"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">教学号</label></th>
            	<td><label class="label1"><?php echo ($list["stu_tnum"]); ?></label></td>
            	<td><label class="label2" id=stu_tnum><?php echo ($list_edit["stu_tnum"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">班内职务</label></th>
            	<td><label class="label1"><?php echo ($list["stu_duty"]); ?></label></td>
            	<td><label class="label2" id=stu_duty><?php echo ($list_edit["stu_duty"]); ?></label></td>
            </tr>
			<tr>
            	<th><label class="label1">学籍状态</label></th>
            	<td><label class="label1"><?php echo ($list["stu_status"]); ?></label></td>
            	<td><label class="label2" id=status><?php echo ($list_edit["stu_status"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">入学时间</label></th>
            	<td><label class="label1"><?php echo ($list["stu_indate"]); ?></label></td>
            	<td><label class="label2" id=stu_indate><?php echo ($list_edit["stu_indate"]); ?></label></td>
            </tr>
			<tr>
            	<th><label class="label1">预计毕业年份</label></th>
            	<td><label class="label1"><?php echo ($list["stu_gradyear"]); ?></label></td>
            	<td><label class="label2" id=stu_gradyear><?php echo ($list_edit["stu_gradyear"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">年级</label></th>
            	<td><label class="label1"><?php echo ($list["stu_grade"]); ?></label></td>
            	<td><label class="label2" id=stu_grade><?php echo ($list_edit["stu_grade"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">班级</label></th>
				<td><label class="label1"><?php echo ($list["stu_class"]); ?></label></td>
            	<td><label class="label2" id=stu_class><?php echo ($list_edit["stu_class"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">性别</label></th>
            	<td><label class="label1"><?php echo ($list["stu_gender"]); ?></label></td>
            	<td><label class="label2" id=stu_gender><?php echo ($list_edit["stu_gender"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">民族</label></th>
            	<td><label class="label1"><?php echo ($list["stu_nation"]); ?></label></td>
            	<td><label class="label2" id=stu_nation><?php echo ($list_edit["stu_nation"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">手机</label></th>
            	<td><label class="label1"><?php echo ($list["stu_mobile"]); ?></label></td>
            	<td><label class="label2" id=stu_mobile><?php echo ($list_edit["stu_mobile"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">qq</label></th>
            	<td><label class="label1"><?php echo ($list["stu_qqnum"]); ?></label></td>
            	<td><label class="label2" id=stu_qqnum><?php echo ($list_edit["stu_qqnum"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">邮箱</label></th>
            	<td><label class="label1"><?php echo ($list["stu_email"]); ?></label></td>
            	<td><label class="label2" id=stu_email><?php echo ($list_edit["stu_email"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">个人主页</label></th>
            	<td><label class="label1"><?php echo ($list["stu_homepage"]); ?></label></td>
            	<td><label class="label2" id=stu_homepage><?php echo ($list_edit["stu_homepage"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">身份证号码</label></th>
            	<td><label class="label1"><?php echo ($list["stu_idnum"]); ?></label></td>
            	<td><label class="label2" id=stu_idnum><?php echo ($list_edit["stu_idnum"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">政治面貌</label></th>
            	<td><label class="label1"><?php echo ($list["stu_political"]); ?></label></td>
                <td><label class="label2" id=stu_political><?php echo ($list_edit["stu_political"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">宗教信仰</label></th>
            	<td><label class="label1"><?php echo ($list["stu_faith"]); ?></label></td>
            	<td><label class="label2" id=stu_faith><?php echo ($list_edit["stu_faith"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">出生地</label></th>
            	<td><label class="label1"><?php echo ($list["stu_birthplace"]); ?></label></td>
            	<td><label class="label2" id=stu_birthplace><?php echo ($list_edit["stu_birthplace"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">出生日期</label></th>
            	<td><label class="label1"><?php echo ($list["stu_birthday"]); ?></label></td>
            	<td><label class="label2" id=stu_birthday><?php echo ($list_edit["stu_birthday"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">籍贯</label></th>
            	<td><label class="label1"><?php echo ($list["stu_hometown"]); ?></label></td>
            	<td><label class="label2" id=stu_hometown><?php echo ($list_edit["stu_hometown"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">籍贯地代码</label></th>
            	<td><label class="label1"><?php echo ($list["stu_homeadcode"]); ?></label></td>
            	<td><label class="label2" id=stu_homeadcode><?php echo ($list_edit["stu_homeadcode"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">户口所在地</label></th>
            	<td><label class="label1"><?php echo ($list["stu_residence"]); ?></label></td>
            	<td><label class="label2" id=stu_residence><?php echo ($list_edit["stu_residence"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">户口所在地代码</label></th>
            	<td><label class="label1"><?php echo ($list["stu_residcode"]); ?></label></td>
            	<td><label class="label2" id=stu_residcode><?php echo ($list_edit["stu_residcode"]); ?></label></td>
            </tr>
            <tr>
                <th><label class="label1">乘车区间</label></th>
            	<td><label class="label1"><?php echo ($list["stu_trainarea"]); ?></label></td>
            	<td><label class="label2" id=stu_trainarea><?php echo ($list_edit["stu_trainarea"]); ?></label></td>
            </tr>
            <tr>
                <th><label class="label1">港澳台侨</label></th>
            	<td><label class="label1"><?php echo ($list["stu_abroad"]); ?></label></td>
            	<td><label class="label2" id=stu_abroad><?php echo ($list_edit["stu_abroad"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">家庭地址(县)</label></th>
            	<td><label class="label1"><?php echo ($list["stu_homeaddr"]); ?></label></td>
            	<td><label class="label2" id=stu_homeaddr><?php echo ($list_edit["stu_homeaddr"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">家庭住址/村</label></th>
            	<td><label class="label1"><?php echo ($list["stu_homeaddr2"]); ?></label></td>
            	<td><label class="label2" id=stu_homeaddr2><?php echo ($list_edit["stu_homeaddr2"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">通讯地址(县)</label></th>
            	<td><label class="label1"><?php echo ($list["stu_contacaddr"]); ?></label></td>
            	<td><label class="label2" id=stu_contacaddr><?php echo ($list_edit["stu_contacaddr"]); ?></label></td>
            </tr>
            <tr>
            	<th><label class="label1">街道号/村</label></th>
            	<td><label class="label1"><?php echo ($list["stu_contaddr2"]); ?></label></td>
            	<td><label class="label2" id=stu_contaddr2><?php echo ($list_edit["stu_contaddr2"]); ?></label></td>
            </tr>
            <tr>
			    <th><label class="label1">邮政编码</label></th>
           		<td><label class="label1"><?php echo ($list["stu_zipcode"]); ?></label></td>
          		<td><label class="label2" id=stu_zipcode><?php echo ($list_edit["stu_zipcode"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">联系电话</label></th>
           		<td><label class="label1"><?php echo ($list["stu_phone"]); ?></label></td>
          		<td><label class="label2" id=stu_phone><?php echo ($list_edit["stu_phone"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">父亲姓名</label></th>
           		<td><label class="label1"><?php echo ($list["dad_name"]); ?></label></td>
          		<td><label class="label2" id=dad_name><?php echo ($list_edit["dad_name"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">母亲姓名</label></th>
           		<td><label class="label1"><?php echo ($list["mom_name"]); ?></label></td>
          		<td><label class="label2" id=mom_name><?php echo ($list_edit["mom_name"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">父亲联系方式</label></th>
           		<td><label class="label1"><?php echo ($list["dad_phone"]); ?></label></td>
          		<td><label class="label2" id=dad_phone><?php echo ($list_edit["dad_phone"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">母亲联系方式</label></th>
           		<td><label class="label1"><?php echo ($list["mom_phone"]); ?></label></td>
          		<td><label class="label2" id=mom_phone><?php echo ($list_edit["mom_phone"]); ?></label></td>
           	</tr>
			<tr>
			    <th><label class="label1">父亲工作单位</label></th>
           		<td><label class="label1"><?php echo ($list["dad_work_unit"]); ?></label></td>
          		<td><label class="label2" id=dad_work_unit><?php echo ($list_edit["dad_work_unit"]); ?></label></td>
           	</tr>
			    <th><label class="label1">母亲工作单位</label></th>
           		<td><label class="label1"><?php echo ($list["mom_work_unit"]); ?></label></td>
          		<td><label class="label2" id=mom_work_unit><?php echo ($list_edit["mom_work_unit"]); ?></label></td>
           	</tr>
            </tbody>       
      </table>
    </form>
</body>
<script type="text/javascript">
	function passConfirm(id){
		if(confirm("确定通过审核?")){
			$("#form").attr("action","<?php echo ($url); ?>/passConfirm/stu_id/"+id);
			$("#form").submit();
			window.close();
		}
    }

	function nopassConfirm(id){
		if(confirm("确定不允许此次修改?")){
        	$("#form").attr("action","<?php echo ($url); ?>/nopassConfirm/stu_id/"+id);
        	$("#form").submit();
        	window.close();
    	}
	}
</script>
</html>