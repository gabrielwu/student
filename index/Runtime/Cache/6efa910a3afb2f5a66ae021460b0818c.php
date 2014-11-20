<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>党员积极分子</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updateParty(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/changeParty/id/'+id,obj,'dialogWidth:600px;dialogHeight:550px');
 }
 function deleteParty(id) {
    if(confirm("您确定要删除此条记录吗？？？")) {
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
      <LI class=current><A href="#" target="main" >党员积极分子</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deleteParty" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
        <tbody>
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
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
				<button type="button" onclick="downDataFile()" class="add" >导出</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_name"]); ?></td>
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["stu_gender"]); ?></td>
            <td><?php echo ($list["stu_nation"]); ?></td>
            <td><?php echo ($list["apply_date"]); ?></td>
			<td><?php echo ($list["active_date"]); ?></td>
            <td><?php echo ($list["ready_date"]); ?></td>
			<td><?php echo ($list["full_member_date"]); ?></td>
            <td><?php echo ($list["alter_info"]); ?></td>            
            <td align="center">
			   <button type="button" class="add" onclick="updateParty(<?php echo ($list["id"]); ?>)" value="修改">修改</button>
               <button type="button" class="reset" onclick="deleteParty(<?php echo ($list["id"]); ?>)" value="删除">删除</button>
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