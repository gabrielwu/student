<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>年级导员信息修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/jquery-ui-1.8.14.custom.css">
<link rel="stylesheet" href="<?php echo ($root); ?>/jquery-ui/css/demo.css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-1.5.1.min.js"></script>
<script src="<?php echo ($root); ?>/jquery-ui/js/jquery-ui-1.8.14.custom.min.js"></script>
<script type="text/javascript">
$(function(){
    $("#assistant").val(<?php echo ($result["admin_id"]); ?>);
})
function update(){
	$("#form").submit();
	window.close();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/update" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th align="center" colspan="2">
			年级导员信息修改</br>
			    <span class="star" style="font-size:85%">*内容不可编辑</span>
			</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>年级<span class="star">*</span></th>
            <td>
			    <input name="grade" id="grade" disabled="disabled" value="<?php echo ($result["grade"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
          <tr class="">
            <th>班级数<span class="star">*</span></th>
            <td>
			    <input name="grade_classnum" id="grade_classnum" disabled="disabled" value="<?php echo ($result["grade_classnum"]); ?>" type="text">
                <div id=""></div>
			</td>
          </tr>
		  <tr class="">
            <th>导员<span class="star">*</span></th>
            <td>
			    <select name="assistant" id="assistant">
				<?php if(is_array($aList)): $i = 0; $__LIST__ = $aList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($list["admin_id"]); ?>"><?php echo ($list["admin_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <div id=""></div>
			</td>
          </tr>
          
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="update()"  class="add">提交</button>
            </td>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="grade" value="<?php echo ($result["grade"]); ?>">
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>