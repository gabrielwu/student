<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>毕业生去向修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/jquery-ui-1.8.14.custom.css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/demo.css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-1.5.1.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(function() {
	$( "#date" ).datepicker({
		changeMonth: true,
		changeYear: true,
	});
	$("#date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#date").val('<?php echo ($result["date"]); ?>');
});
$(function() {
	$("#type option[value='<?php echo ($result["type"]); ?>']").attr("selected", true);
});
function updateGraduation(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateGraduation" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			毕业生去向信息修改</br>
			    <span class="star" style="font-size:85%">*内容不可编辑</span>
			</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>姓名<span class="star">*</span></th>
            <td>
			    <input name="stu_name" id="stu_name" disabled="disabled" value="<?php echo ($result["stu_name"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
          <tr class="">
            <th>学号 <span class="star">*</span></th>
            <td>
			    <input name="stu_num" id="stu_num" disabled="disabled" value="<?php echo ($result["stu_num"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>民族 <span class="star">*</span></th>
            <td>
			    <input name="stu_nation" id="stu_nation" disabled="disabled" value="<?php echo ($result["stu_nation"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>性别<span class="star">*</span></th>
            <td>
			    <input name="stu_gender" id="stu_gender" disabled="disabled" value="<?php echo ($result["stu_gender"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>年级<span class="star">*</span></th>
            <td>
			    <input name="stu_grade" id="stu_grade" disabled="disabled" value="<?php echo ($result["stu_grade"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
          <tr class="">
            <th>在校职务<span class="star">*</span></th>
            <td>
			    <input name="stu_duty" id="stu_duty" disabled="disabled" value="<?php echo ($result["stu_duty"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>政治面貌<span class="star"></span></th>
            <td>
			    <input name="politics_status" id="politics_status" value="<?php echo ($result["politics_status"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>毕业时间<span class="star"></span></th>
            <td>
			    <input name="date" id="date" value="<?php echo ($result["date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>毕业去向<span class="star"></span></th>
            <td>
			    <select name="type" id="type" value="<?php echo ($result["type"]); ?>">
					<option value="3">工作</option>
					<option value="1">考研</option>
					<option value="2">保研</option>
					<option value="4">出国</option>
					<option value="5">公务员</option>
			    </select>
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>用人单位(院校)<span class="star"></span></th>
            <td>
			    <input name="receive_unit" id="receive_unit" value="<?php echo ($result["receive_unit"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>用人单位(院校)地址<span class="star"></span></th>
            <td>
			    <input name="ru_address" id="ru_address" value="<?php echo ($result["ru_address"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>用人单位(院校)电话<span class="star"></span></th>
            <td>
			    <input name="ru_phone" id="ru_phone" value="<?php echo ($result["ru_phone"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>用人单位(院校)邮箱<span class="star"></span></th>
            <td>
			    <input name="ru_email" id="ru_email" value="<?php echo ($result["ru_email"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>档案邮寄情况<span class="star"></span></th>
            <td>
			    <input name="post_info" id="post_info" value="<?php echo ($result["post_info"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>QQ<span class="star"></span></th>
            <td>
			    <input name="qq" id="qq" value="<?php echo ($result["qq"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>联系方式<span class="star"></span></th>
            <td>
			    <input name="phone" id="phone" value="<?php echo ($result["phone"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>邮箱<span class="star"></span></th>
            <td>
			    <input name="email" id="email" value="<?php echo ($result["email"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>父亲联系方式<span class="star">*</span></th>
            <td>
			    <input name="dad_phone" id="dad_phone" disabled="disabled" value="<?php echo ($result["dad_phone"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>母亲联系方式<span class="star">*</span></th>
            <td>
			    <input name="mom_phone" id="mom_phone" disabled="disabled" value="<?php echo ($result["mom_phone"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateGraduation()"  class="add">提交</button>
            </td>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="id" value="<?php echo ($result["id"]); ?>">
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>