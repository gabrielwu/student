<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/index" target="main" >党员积极分子首页</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
      <LI class=current><A href="#" target="main" >数据导出</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/downDataFile" method="post" id="form" enctype="multipart/form-data">
	党员积极分子信息导出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" color="red">导出文件格式仅为*.xls格式</font>
      <table width="100%" class="list" cellpadding="0" cellspacing="0">
		  <tr class="">
            <th style="width:10%">姓名</th>
            <th style="width:10%">学号</th>
            <th style="width:6%">性别</th>
            <th style="width:6%">民族</th>
            <th style="width:10%">申请时间</th>
            <th style="width:10%">确定为积极分子时间</th>
            <th style="width:10%">入党时间</th>
            <th style="width:10%">转正时间</th>
            <th style="width:10%">组织转出情况</th>
			<th >操作</th>
          </tr>
		  <tr class="">
            <th><input style="width:90%" type="text" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
            <th><input style="width:90%" type="text" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
            <th><input style="width:90%" type="text" name="stu_gender" value="<?php echo ($condition["stu_gender"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_nation" value="<?php echo ($condition["stu_nation"]); ?>"></th>
            <th><input style="width:90%" type="text" name="apply_date" value="<?php echo ($condition["apply_date"]); ?>"></th>
            <th><input style="width:90%" type="text" name="active_date" value="<?php echo ($condition["active_date"]); ?>"></th>
            <th><input style="width:90%" type="text" name="ready_date" value="<?php echo ($condition["ready_date"]); ?>"></th>
            <th><input style="width:90%" type="text" name="full_member_date" value="<?php echo ($condition["full_member_date"]); ?>"></th>
			<th><input style="width:90%" type="text" name="alter_info" value="<?php echo ($condition["alter_info"]); ?>"></th>
            <th align="center"><button type="submit"  class="add" >导出</button></th>
          </tr>
      </table>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>