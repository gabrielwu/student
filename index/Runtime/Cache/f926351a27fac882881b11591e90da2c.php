<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学籍变动信息修改</TITLE>
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

function updateStuStatusAlter(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updateStuStatusAlter" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			学籍变动信息修改</br>
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
            <th>学籍变动类别</th>
            <td>
			    <input name="type" id="type" value="<?php echo ($result["type"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>变动时间<span class="star"></span></th>
            <td>
			    <input name="date" id="date" value="<?php echo ($result["date"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>学号<span class="star"></span></th>
            <td>
			    <input name="stu_num" id="stu_num" value="<?php echo ($result["stu_num"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>原学号<span class="star"></span></th>
            <td>
			    <input name="pre_stu_num" id="pre_stu_num" value="<?php echo ($result["pre_stu_num"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>学院<span class="star"></span></th>
            <td>
			    <input name="college" id="college" value="<?php echo ($result["college"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>原学院<span class="star"></span></th>
            <td>
			    <input name="pre_college" id="pre_college" value="<?php echo ($result["pre_college"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>年级<span class="star"></span></th>
            <td>
			    <input name="grade" id="grade" value="<?php echo ($result["grade"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>原年级<span class="star"></span></th>
            <td>
			    <input name="pre_grade" id="pre_grade" value="<?php echo ($result["pre_grade"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>班级<span class="star"></span></th>
            <td>
			    <input name="class" id="class" value="<?php echo ($result["class"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>原班级<span class="star"></span></th>
            <td>
			    <input name="pre_class" id="pre_class" value="<?php echo ($result["pre_class"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updateStuStatusAlter()"  class="add">提交</button>
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