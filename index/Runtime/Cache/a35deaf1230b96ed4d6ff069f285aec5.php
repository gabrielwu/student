<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function uploadFile(){
	var upfile = $("#upfile").val();
	if(upfile==""||upfile==null)
	{
		alert("导入文件不能为空！！！");
	}else{
		$("#form").submit();
	}
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/index" target="main" >大赛获奖首页</A></LI>
      <LI class=current><A href="#" target="main" >数据导入</A></LI>
      <LI ><A href="<?php echo ($url); ?>/outputStream" target="main" >数据导出</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/uploadFile" method="post" id="form" enctype="multipart/form-data">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">大赛获奖信息导入&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size="2" color="red">导入文件格式仅为*.xls格式</font></th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>当如文件附件：</th>
            <td><a href="<?php echo ($url); ?>/download">大赛获奖填写表格.xls(<font size="2" color="red">点击可下载</font>)</a>
              <div id=""></div></td>
          </tr>
          <tr class="">
            <th>导入文件 <span class="star">*</span></th>
            <td><input name="upfile" id="upfile" value="" type="file">
              <div class="onShow" id="newpass_tip"> </div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="uploadFile()" class="add">提交</button>
              <!--<button type="submit" class="edit">�༭</button>-->
              <button type="reset" class="reset">重置</button></td>
          </tr>
        </tfoot>
      </table>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>