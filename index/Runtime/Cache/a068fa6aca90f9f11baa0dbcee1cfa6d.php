<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>党员积极分子信息修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/jquery-ui-1.8.14.custom.css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/demo.css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-1.5.1.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(function() {
	$( "#apply_date" ).datepicker({
		changeMonth: true,
		changeYear: true,
	});
	$( "#active_date" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
	$( "#ready_date" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
	$( "#full_member_date" ).datepicker({
		changeMonth: true,
		changeYear: true
	});
	$("#apply_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#active_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#ready_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#full_member_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#apply_date").val('<?php echo ($result["apply_date"]); ?>');
	$("#active_date").val('<?php echo ($result["active_date"]); ?>');
	$("#ready_date").val('<?php echo ($result["ready_date"]); ?>');
	$("#full_member_date").val('<?php echo ($result["full_member_date"]); ?>');
});

function updateParty(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateParty" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			党员积极分子信息修改</br>
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
            <th>性别<span class="star">*</span></th>
            <td>
			    <input name="stu_gender" id="stu_gender" disabled="disabled" value="<?php echo ($result["stu_gender"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>民族<span class="star">*</span></th>
            <td>
			    <input name="stu_nation" id="stu_nation" disabled="disabled" value="<?php echo ($result["stu_nation"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>申请时间<span class="star"></span></th>
            <td>
			    <input name="apply_date" id="apply_date" value="<?php echo ($result["apply_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>确定为积极分子时间<span class="star"></span></th>
            <td>
			    <input name="active_date" id="active_date" value="<?php echo ($result["active_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>入党时间<span class="star"></span></th>
            <td>
			    <input name="ready_date" id="ready_date" value="<?php echo ($result["ready_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>转正时间<span class="star"></span></th>
            <td>
			    <input name="full_member_date" id="full_member_date" value="<?php echo ($result["full_member_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>组织转出情况<span class="star"></span></th>
            <td>
			    <textarea name="alter_info" id="alter_info" value="<?php echo ($result["alter_info"]); ?>" ><?php echo ($result["alter_info"]); ?></textarea>
                <div id=""></div>
			</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateParty()"  class="add">提交</button>
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