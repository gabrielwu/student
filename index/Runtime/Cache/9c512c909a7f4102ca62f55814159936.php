<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>创新项目信息修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/jquery-ui-1.8.14.custom.css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/demo.css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-1.5.1.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(function() {
	$("#apply_date").datepicker({
		changeMonth: true,
		changeYear: true,
	});
	$("#apply_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#apply_date").val('<?php echo ($result["apply_date"]); ?>');
	$("#win_date").datepicker({
		changeMonth: true,
		changeYear: true,
	});
	$("#win_date").datepicker("option", "dateFormat", "yy-mm-dd" );
	$("#win_date").val('<?php echo ($result["win_date"]); ?>');
});

function updateInnovation(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateInnovation" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			创新项目信息修改</br>
			    <span class="star" style="font-size:85%">*内容不可编辑</span>
			</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>学生<span class="star">*</span></th>
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
            <th>项目名称</th>
            <td>
			    <input name="project_name" id="project_name" value="<?php echo ($result["project_name"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
          <tr class="">
            <th>级别</th>
            <td>
			    <input name="level" id="level" value="<?php echo ($result["level"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>获奖情况</th>
            <td>
			    <input name="award" id="award" value="<?php echo ($result["award"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>申报时间<span class="star"></span></th>
            <td>
			    <input name="apply_date" id="apply_date" value="<?php echo ($result["apply_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>获奖时间<span class="star"></span></th>
            <td>
			    <input name="win_date" id="win_date" value="<?php echo ($result["win_date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>指导教师<span class="star"></span></th>
            <td>
			    <input name="tutor" id="tutor" value="<?php echo ($result["tutor"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>组长<span class="star"></span></th>
            <td>
			    <input name="leader" id="leader" value="<?php echo ($result["leader"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>成员<span class="star"></span></th>
            <td>
			    <input name="members" id="members" value="<?php echo ($result["members"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>依托学院<span class="star"></span></th>
            <td>
			    <input name="college" id="college" value="<?php echo ($result["college"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateInnovation()"  class="add">提交</button>
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