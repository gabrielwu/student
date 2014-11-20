<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>奖学金信息修改</TITLE>
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

function updateScholar(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateScholar" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			奖学金信息修改</br>
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
            <th>性别<span class="star">*</span></th>
            <td>
			    <input name="stu_gender" id="stu_gender" disabled="disabled" value="<?php echo ($result["stu_gender"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
          <tr class="">
            <th>奖学金名称</th>
            <td>
			    <input name="scholar_name" id="scholar_name" value="<?php echo ($result["scholar_name"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>等级</th>
            <td>
			    <input name="level" id="level" value="<?php echo ($result["level"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>金额<span class="star"></span></th>
            <td>
			    <input name="amount" id="amount" value="<?php echo ($result["amount"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>获奖时间<span class="star"></span></th>
            <td>
			    <input name="date" id="date" value="<?php echo ($result["date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateScholar()"  class="add">提交</button>
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