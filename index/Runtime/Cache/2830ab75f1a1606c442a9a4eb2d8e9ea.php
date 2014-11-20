<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
    <title>查看其他信息修改提交申请</title>
    <link type="text/css" href="<?php echo ($current); ?>/style/viewModuleEditInfo.css" rel="stylesheet" type="text/css" />        
</head>
<body>
	<br/>
	<div class="title" >
		<h2 id="titleModule"></h2>
		<button type="button" id="button1"  onclick="passConfirm(<?php echo ($list["id"]); ?>)" >通过</button>
        <button type="button" id="button2"  onclick="nopassConfirm(<?php echo ($list["id"]); ?>)" >不通过</button>
		<span class="tip"><font color="red">*提示：左边为原信息，右边为更改后信息（红色部分为所更改)</font></span>
    </div>
	    <table class="form student_info" width="100%" cellpadding="0" cellspacing="0">
		    <tr>
			    <th><label class="label1">学生姓名：<?php echo ($student["stu_name"]); ?></label></th>
				<th><label class="label1">学生学号：<?php echo ($student["stu_num"]); ?></label></th>
			</tr>
		</table>
		<table class="form" width="100%" cellpadding="0" cellspacing="0">
            <tr>
			    <th><label class="label1">照片</label></th>
       			<td align=center><img id="img1" src="<?php echo ($root); ?>/upload/<?php echo ($module); ?>/picture/<?php echo ($list["id"]); ?><?php echo ($list["photo_ext"]); ?>" height="200"/></td>
            	<td align=center><img id="img2" src="<?php echo ($root); ?>/upload/<?php echo ($module); ?>/picture_temp/<?php echo ($list["id"]); ?><?php echo ($list_edit["photo_ext"]); ?>" height="200"/></td>
			</tr>
		</table>
    <form action="#"  id="form" method="post" target="main">
        <table id='scholar' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">奖学金名称</label></th>
            	    <td><label class="label1"><?php echo ($list["scholar_name"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["scholar_name"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">等级</label></th>
            	    <td><label class="label1"><?php echo ($list["level"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["level"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">金额</label></th>
            	    <td><label class="label1"><?php echo ($list["amount"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["amount"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">获奖时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='social_scholar' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">奖学金名称</label></th>
            	    <td><label class="label1"><?php echo ($list["scholar_name"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["scholar_name"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">等级</label></th>
            	    <td><label class="label1"><?php echo ($list["level"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["level"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">金额</label></th>
            	    <td><label class="label1"><?php echo ($list["amount"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["amount"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">获奖时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
            </tbody>        
        </table>
		<table id='competition' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">参加赛事</label></th>
            	    <td><label class="label1"><?php echo ($list["competition_name"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["competition_name"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">级别</label></th>
            	    <td><label class="label1"><?php echo ($list["level"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["level"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">获奖情况</label></th>
            	    <td><label class="label1"><?php echo ($list["award"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["award"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">获奖时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='party' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">申请时间</label></th>
            	    <td><label class="label1"><?php echo ($list["apply_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["apply_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">确定为积极分子时间</label></th>
            	    <td><label class="label1"><?php echo ($list["active_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["active_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">成为预备党员时间</label></th>
            	    <td><label class="label1"><?php echo ($list["ready_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["ready_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">转正时间</label></th>
            	    <td><label class="label1"><?php echo ($list["full_member_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["full_member_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">组织转出情况</label></th>
            	    <td><label class="label1"><?php echo ($list["alter_info"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["alter_info"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='loan' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">贷款总额</label></th>
            	    <td><label class="label1"><?php echo ($list["apply_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["apply_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">学费贷款</label></th>
            	    <td><label class="label1"><?php echo ($list["total"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["total"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">住宿费贷款</label></th>
            	    <td><label class="label1"><?php echo ($list["tuition"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["tuition"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">申请时间</label></th>
            	    <td><label class="label1"><?php echo ($list["accommodation"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["accommodation"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">是否还清</label></th>
            	    <td><label class="label1"><?php echo ($list["pay_off"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["pay_off"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='granting' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">助学金名称</label></th>
            	    <td><label class="label1"><?php echo ($list["grant_name"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["grant_name"]); ?></label></td>
           	    </tr>
				 <tr>
            	    <th><label class="label1">等级</label></th>
            	    <td><label class="label1"><?php echo ($list["level"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["level"]); ?></label></td>
           	    </tr>
				 <tr>
            	    <th><label class="label1">金额</label></th>
            	    <td><label class="label1"><?php echo ($list["amount"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["amount"]); ?></label></td>
           	    </tr>
				 <tr>
            	    <th><label class="label1">获助时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='punish' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">处分类型</label></th>
            	    <td><label class="label1"><?php echo ($list["type"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["type"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">原由</label></th>
            	    <td><label class="label1"><?php echo ($list["cause"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["cause"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">处分时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">是否撤销</label></th>
            	    <td><label class="label1"><?php echo ($list["can_cancel"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["can_cancel"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='insurance' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">参保年份</label></th>
            	    <td><label class="label1"><?php echo ($list["insu_beginyear"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["insu_beginyear"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">停保年份</label></th>
            	    <td><label class="label1"><?php echo ($list["insu_endyear"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["insu_endyear"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">缴费金额</label></th>
            	    <td><label class="label1"><?php echo ($list["insu_amount"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["insu_amount"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">是否减免</label></th>
            	    <td><label class="label1"><?php echo ($list["insu_reducable"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["insu_reducable"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
		<table id='innovation' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">项目名称</label></th>
            	    <td><label class="label1"><?php echo ($list["project_name"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["project_name"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">级别</label></th>
            	    <td><label class="label1"><?php echo ($list["level"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["level"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">获奖情况</label></th>
            	    <td><label class="label1"><?php echo ($list["award"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["award"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">申报时间</label></th>
            	    <td><label class="label1"><?php echo ($list["apply_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["apply_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">获奖时间</label></th>
            	    <td><label class="label1"><?php echo ($list["win_date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["win_date"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">指导教师</label></th>
            	    <td><label class="label1"><?php echo ($list["tutor"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["tutor"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">组长</label></th>
            	    <td><label class="label1"><?php echo ($list["leader"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["leader"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">成员</label></th>
            	    <td><label class="label1"><?php echo ($list["members"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["members"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">依托学院</label></th>
            	    <td><label class="label1"><?php echo ($list["college"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["college"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
        <table id='graduation' class="form" width="100%" cellpadding="0" cellspacing="0">
            <tbody>
			    <tr>
            	    <th><label class="label1">联系电话</label></th>
            	    <td><label class="label1"><?php echo ($list["phone"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["phone"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">电子邮箱</label></th>
            	    <td><label class="label1"><?php echo ($list["email"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["email"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">QQ号码</label></th>
            	    <td><label class="label1"><?php echo ($list["qq"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["qq"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">政治面貌</label></th>
            	    <td><label class="label1"><?php echo ($list["politics_status"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["politics_status"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">接收单位</label></th>
            	    <td><label class="label1"><?php echo ($list["receive_unit"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["receive_unit"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">单位地址</label></th>
            	    <td><label class="label1"><?php echo ($list["ru_address"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["ru_address"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">单位电话</label></th>
            	    <td><label class="label1"><?php echo ($list["ru_phone"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["ru_phone"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">单位邮箱</label></th>
            	    <td><label class="label1"><?php echo ($list["ru_email"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["ru_email"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">邮寄情况</label></th>
            	    <td><label class="label1"><?php echo ($list["post_info"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["post_info"]); ?></label></td>
           	    </tr>
			    <tr>
            	    <th><label class="label1">毕业去向</label></th>
            	    <td><label class="label1"><?php echo ($list["type"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["type"]); ?></label></td>
           	    </tr>
				<tr>
            	    <th><label class="label1">毕业时间</label></th>
            	    <td><label class="label1"><?php echo ($list["date"]); ?></label></td>
            	    <td><label class="label2"><?php echo ($list_edit["date"]); ?></label></td>
           	    </tr>
            </tbody>       
        </table>
	</form>
</body>
<script type="text/javascript">
	$(function(){
	    $("#form table[id!='<?php echo ($module); ?>']").remove();
		switch ("<?php echo ($module); ?>") {
		    case 'scholar':
			    $("#titleModule").html('奖学金信息修改申请');
			    break;
			case 'social_scholar':
			    $("#titleModule").html('社会奖学金信息修改申请');
			    break;
			case 'competition':
			    $("#titleModule").html('大赛获奖信息修改申请');
			    break;
			case 'granting':
			    $("#titleModule").html('助学金信息修改申请');
			    break;
			case 'loan':
			    $("#titleModule").html('助学贷款信息修改申请');
			    break;
			case 'punish':
			    $("#titleModule").html('处分信息修改申请');
			    break;
			case 'graduation':
			    $("#titleModule").html('毕业去向信息修改申请');
			    break;
			case 'insurance':
			    $("#titleModule").html('医疗保险信息修改申请');
			    break;
			case 'party':
			    $("#titleModule").html('党员积极分子信息修改申请');
			    break;
		}
	});
	function passConfirm(id){
		if(confirm("确定通过审核?")){
			$("#form").attr("action","<?php echo ($url); ?>/passModuleConfirm/id/"+id+"/module/<?php echo ($module); ?>");
			$("#form").submit();
			window.close();
		}
    }

	function nopassConfirm(id){
		if(confirm("确定不允许此次修改?")){
        	$("#form").attr("action","<?php echo ($url); ?>/nopassModuleConfirm/id/"+id+"/module/<?php echo ($module); ?>");
        	$("#form").submit();
        	window.close();
    	}
	}
</script>
</html>