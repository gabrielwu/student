<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学生国家助学贷款修改</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function updategrant(){
	$("#form").submit();
	window.close();
}

</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updategrant" method="post" id="form" target="main">
      <table class="form" width="400" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">助学贷款修改</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>学生<span class="star">*</span></th>
            <td><input name="stu_name" id="form_pass" disabled="disabled" value="<?php echo ($result["stu_name"]); ?>-<?php echo ($result["stu_num"]); ?>" type="text">
              <div id=""></div></td>
          </tr>
          <tr class="">
            <th>级别 <span class="star">*</span></th>
            <td>
            <select name="sch_level">
            	<?php switch($result["sch_level"]): ?><?php case "三等":  ?><option value="一等">一等</option>
            			<option value="二等">二等</option>
            			<option value="三等" selected="selected">三等</option><?php break;?>
            		<?php case "二等":  ?><option value="一等">一等</option>
            			<option value="二等" selected="selected">二等</option>
            			<option value="三等">三等</option><?php break;?>
            		<?php case "一等":  ?><option value="一等" selected="selected">一等</option>
            			<option value="二等">二等</option>
            			<option value="三等">三等</option><?php break;?><?php endswitch;?>
            </select>
              <div class="onShow" id="newpass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>获助年份<span class="star">*</span></th>
            <td><input name="sch_year" id="form_repass" disabled="disabled" value="<?php echo ($result["sch_year"]); ?>" type="text">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updategrant()"  class="add">提交</button>
              <!--<button type="submit" class="edit">�༭</button>-->
            </td>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="stu_num" value="<?php echo ($result["stu_num"]); ?>">
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>