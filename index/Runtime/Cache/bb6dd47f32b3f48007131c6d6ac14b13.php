<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学生国家助学贷款</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updateInsurance(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/changeInsurance/id/'+id,obj,'dialogWidth:400px;dialogHeight:350px');
 }
 function deleteInsurance(id)
 {
    if(confirm("您确定要删除词条记录吗？？？"))
    {
    var id = id;
    $("#id").attr("value",id);
    $("#form").submit();
    }
}
function searchData(){
	$("#form").attr("action","<?php echo ($url); ?>/index");
	$("#form").attr("method","get");
	$("#form").submit();
}
function downDataFile(){
	$("#form").attr("action","<?php echo ($url); ?>/downDataFile");
	$("#form").attr("method","POST");
	$("#form").submit();
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >学生医疗保险</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deleteInsurance" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
        <tbody>
          <tr class="">
            <th>学号</th>
            <th>姓名</th>
            <th>年级</th>
            <th>班级</th>
            <th>参保年份</th>
            <th>停保年份</th>
            <th>缴费金额(元)</th>
            <th>是否减免</th>
			<th width="150px">操作</th>
          </tr>
		  <tr class="">
            <th><input type="text" style="width:90%" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
			<th><input type="text" style="width:90%" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_grade" value="<?php echo ($condition["stu_grade"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_class" value="<?php echo ($condition["stu_class"]); ?>"></th>
            <th><input type="text" style="width:90%" name="insu_beginyear" value="<?php echo ($condition["insu_beginyear"]); ?>"></th>
            <th><input type="text" style="width:90%" name="insu_endyear" value="<?php echo ($condition["insu_endyear"]); ?>"></th>
            <th><input type="text" style="width:90%" name="insu_amount" value="<?php echo ($condition["insu_amount"]); ?>"></th>
            <th><input type="text" style="width:90%" name="insu_reducable" value="<?php echo ($condition["insu_reducable"]); ?>"></th>
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
				<button type="button" onclick="downDataFile()" class="add" >导出</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["stu_name"]); ?></td>
            <td><?php echo ($list["stu_grade"]); ?></td>
            <td><?php echo ($list["stu_class"]); ?></td>
            <td><?php echo ($list["insu_beginyear"]); ?></td>
            <td><?php echo ($list["insu_endyear"]); ?></td>
            <td><?php echo ($list["insu_amount"]); ?></td>
            <td><?php echo ($list["insu_reducable"]); ?></td>
			<td align="center">
			    <button type="button" class="add" onclick="updateInsurance(<?php echo ($list["id"]); ?>)" value="修改">修改</button>
			    <button type="button" class="reset" onclick="deleteInsurance(<?php echo ($list["id"]); ?>)" value="删除">删除</button>
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