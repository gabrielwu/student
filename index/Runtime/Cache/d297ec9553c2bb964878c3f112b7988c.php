<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>年级导员</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function update(id){
	var obj = new Object();
	var id = id;
	$("#id").attr("value",id);
	window.showModalDialog('<?php echo ($url); ?>/change/grade/'+id,obj,'dialogWidth:400px;dialogHeight:350px');
 }
function searchData(){
	$("#form").attr("action","<?php echo ($url); ?>/index");
	$("#form").attr("method","get");
	$("#form").submit();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>年级导员</H2>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/delete" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
        
        <tbody>
          <tr class="">
            <th>年级</th>
            <th>班级数量</th>
            <th>导员姓名</th>
            <th width="150px">操作</th>
          </tr>
		  <tr class="">
            <th><input type="text" style="width:90%" name="grade" value="<?php echo ($condition["grade"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
            <th><input type="text" style="width:90%" name="name" value="<?php echo ($condition["name"]); ?>"></th>
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["grade"]); ?></td>
            <td><?php echo ($list["grade_classnum"]); ?></td>
            <td><?php echo ($list["name"]); ?></td>       
            <td align="center">
			    <button type="button" class="add" onclick="update(<?php echo ($list["grade"]); ?>)" value="修改">修改</button>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
     </tbody>
        <tfoot>
          <tr class="">
             <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="id" id="id" />
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>