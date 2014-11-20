<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">

<link href="<?php echo ($current); ?>/style/confirm.css" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo ($root); ?>/index/Public/jquery-ui/css/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	
<script type="text/javascript" src="<?php echo ($root); ?>/index/Public/jquery-ui/js/jquery-1.5.1.min.js"></script>
<script type="text/javascript" src="<?php echo ($root); ?>/index/Public/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script language="javascript">
function SetCwinHeight()
{
var cwin=document.getElementById("cwin");
if (document.getElementById)
{
if (cwin && !window.opera)
{
if (cwin.contentDocument && cwin.contentDocument.body.offsetHeight)
cwin.height = cwin.contentDocument.body.offsetHeight;
else if(cwin.Document && cwin.Document.body.scrollHeight)
cwin.height = cwin.Document.body.scrollHeight;
}
}
}

</script>
</head>

<body> 
<div id="confirm" title="审核提示信息"></div>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>欢迎使用学生管理系统</H2>
    <UL id=tab>
    </UL>
  </DIV>
  <DIV id=content >
    <TABLE  width="100%" height="100%" cellpadding="0" cellspacing="0">
    <tbody>
      <TR>
      <td valign="middle" align="center" style="height:80%px; min-height:400px;"><img src="<?php echo ($current); ?>/images/ma_20.jpg"></td>
       </TR>
      </tbody>
      <TFOOT>
        <TR valign="bottom">
          <TD style="padding:20px 10px; color:#666">吉林大学软件学院copright © 2011/2012</TD>
        </TR>
      </TFOOT>
    </TABLE>
  </DIV>
</DIV>
<script language="javascript">
function autoheight(sid)
{var gid=document.getElementById(sid);gid.height=document.documentElement.offsetHeight-1;}
//window.setInterval("autoheight(\"main\")",100);

</script>
<script>
$(function() {
   // autoheight("main");
    var html;
    if ('<?php echo ($confirmStuCount); ?>' != '0') {
	    html = "<a href='<?php echo ($root); ?>/index.php/Function/confirmStuInfo'>当前有<?php echo ($confirmStuCount); ?>条基本信息修改申请，点击查看。</a>";
	    $("#confirm").append(html);
	}
	if ('<?php echo ($confirmCount); ?>' != '0') {
	    html = "<a href='<?php echo ($root); ?>/index.php/Function/confirmModuleInfo'>当前有<?php echo ($confirmCount); ?>条其他信息修改申请，点击查看。</a></br>";
	    $("#confirm").append(html);
	}
	if ('<?php echo ($confirmCount); ?>' != '0' || '<?php echo ($confirmStuCount); ?>' != '0') {
	    $( "#confirm" ).dialog({
		    height: 120,
		    width: 360,
		    modal: true
	    });
	}
});
</script>
</body>
</html>