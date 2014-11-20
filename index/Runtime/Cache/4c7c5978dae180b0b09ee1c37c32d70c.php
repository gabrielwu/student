<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/index" target="main" >学生贷款首页</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputstream" target="main" >数据导入</A></LI>
      <LI class=current><A href="#" target="main" >数据导出</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/downdatafile" method="post" id="form" enctype="multipart/form-data">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">学生贷款信息导出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" color="red">导出文件格式仅为*.xls格式
            按"学生年级"(如果是08年入学 即为 "2008")
     按"贷款开始时间" (如果是08年贷款 即为"2008")
             如果条件为空 则导出历年来的数据！！！
            
            </font></th>
          </tr>
        </thead>
        <thead>
          <tr class="">
            <th colspan="2" align="left">导出文件内容 <span class="star">*</span>
           	 查询条件：
            	按"学生年级"<input type="text" name="stu_grade">
            	按"贷款开始时间"<input type="text" name="load_year">
            	<button type="submit"  class="add" >导出</button>
              <div class="onShow" id="newpass_tip"> </div></th>
          </tr>
        </thead>
      </table>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>