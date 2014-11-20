<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学生医疗保险修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function updateInsurance(){
	$("#form").submit();
	window.close();
}

</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateInsurance" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">医疗保险修改</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>姓名<span class="star">*</span></th>
            <td><input name="stu_name" id="stu_name" disabled="disabled" value="<?php echo ($result["stu_name"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
          <tr class="">
            <th>学号<span class="star">*</span></th>
            <td><input name="stu_num" id="stu_num" disabled="disabled" value="<?php echo ($result["stu_num"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>年级<span class="star">*</span></th>
            <td><input name="stu_grade" id="stu_grade" disabled="disabled" value="<?php echo ($result["stu_grade"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>班级<span class="star">*</span></th>
            <td><input name="stu_class" id="stu_class" disabled="disabled" value="<?php echo ($result["stu_class"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>参保年份<span class="star"></span></th>
            <td><input name="insu_beginyear" id="insu_beginyear" value="<?php echo ($result["insu_beginyear"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>停保年份<span class="star"></span></th>
            <td><input name="insu_endyear" id="insu_endyear" value="<?php echo ($result["insu_endyear"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>缴费金额<span class="star"></span></th>
            <td><input name="insu_amount" id="insu_amount" value="<?php echo ($result["insu_amount"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
		  <tr class="">
            <th>是否减免<span class="star"></span></th>
            <td><input name="insu_reducable" id="insu_reducable" value="<?php echo ($result["insu_reducable"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateInsurance()"  class="add">提交</button>
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