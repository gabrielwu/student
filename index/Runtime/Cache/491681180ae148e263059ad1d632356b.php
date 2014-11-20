<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>毕业生去向</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    $("#type option[value='<?php echo ($condition["type"]); ?>']").attr("selected", true);
});
 function updateGraduation(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/changeGraduation/id/'+id,obj,'dialogWidth:700px;dialogHeight:750px');
 }
 function deleteGraduation(id) {
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
<BODY onkeydown="if(event.keyCode==13){searchData()}">
<DIV id=wrap>
  <DIV id=title class=tab style="width:2720px">
    <H2>学生事务</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >毕业生去向</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deleteGraduation" method="post" id="form">
      <table class="list" width="2700px" cellpadding="0" cellspacing="0" >
        <tbody>
          <tr class="">
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>
			<th>民族</th>
			<th>年级</th>
			<th>在校职务</th>
			<th>政治面貌</th>
			<th>毕业去向</th>
			<th>毕业时间</th>
			<th>联系方式</th>
			<th>邮箱</th>
			<th>QQ</th>
			<th>用人单位(院校)</th>
			<th>单位电话</th>
			<th>单位地址</th>
			<th>单位邮箱</th>
			<th>档案邮寄情况</th>
			<th>父亲联系方式</th>
			<th>母亲联系方式</th>
            <th width="150px">操作</th>
          </tr>
		  <tr class="">
            <th><input type="text" style="width:90%" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
			<th><input type="text" style="width:90%" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_gender" value="<?php echo ($condition["stu_gender"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_nation" value="<?php echo ($condition["stu_nation"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_grade" value="<?php echo ($condition["stu_grade"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_duty" value="<?php echo ($condition["stu_duty"]); ?>"></th>
            <th><input type="text" style="width:90%" name="politics_status" value="<?php echo ($condition["politics_status"]); ?>"></th>
            <th>
			    <select style="width:90%" name="type" id="type" value="<?php echo ($condition["type"]); ?>">
				    <option value="">全部</option>
					<option value="3">工作</option>
					<option value="(1,2)">读研(保/考)</option>
					<option value="1">考研</option>
					<option value="2">保研</option>
					<option value="4">出国</option>
					<option value="5">公务员</option>
			    </select>
			</th>
            <th><input type="text" style="width:90%" name="date" value="<?php echo ($condition["date"]); ?>"></th>
            <th><input type="text" style="width:90%" name="phone" value="<?php echo ($condition["phone"]); ?>"></th>
            <th><input type="text" style="width:90%" name="email" value="<?php echo ($condition["email"]); ?>"></th>
            <th><input type="text" style="width:90%" name="qq" value="<?php echo ($condition["qq"]); ?>"></th>
            <th><input type="text" style="width:90%" name="receive_unit" value="<?php echo ($condition["receive_unit"]); ?>"></th>
            <th><input type="text" style="width:90%" name="ru_phone" value="<?php echo ($condition["ru_phone"]); ?>"></th>
            <th><input type="text" style="width:90%" name="ru_address" value="<?php echo ($condition["ru_address"]); ?>"></th>
            <th><input type="text" style="width:90%" name="ru_email" value="<?php echo ($condition["ru_email"]); ?>"></th>
            <th><input type="text" style="width:90%" name="post_info" value="<?php echo ($condition["post_info"]); ?>"></th>
            <th><input type="text" style="width:90%" name="dad_phone" value="<?php echo ($condition["dad_phone"]); ?>"></th>
            <th><input type="text" style="width:90%" name="mom_phone" value="<?php echo ($condition["mom_phone"]); ?>"></th>
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
				<button type="button" onclick="downDataFile()" class="add" >导出</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["stu_name"]); ?></td>
            <td><?php echo ($list["stu_gender"]); ?></td>
            <td><?php echo ($list["stu_nation"]); ?></td>
            <td><?php echo ($list["stu_grade"]); ?></td>
			<td><?php echo ($list["stu_duty"]); ?></td>
            <td><?php echo ($list["politics_status"]); ?></td> 
            <td><?php echo ($list["type"]); ?></td>
            <td><?php echo ($list["date"]); ?></td>
            <td><?php echo ($list["phone"]); ?></td>
            <td><?php echo ($list["email"]); ?></td>
			<td><?php echo ($list["qq"]); ?></td>
            <td><?php echo ($list["receive_unit"]); ?></td>  
            <td><?php echo ($list["ru_phone"]); ?></td>
            <td><?php echo ($list["ru_address"]); ?></td>
            <td><?php echo ($list["ru_email"]); ?></td>
            <td><?php echo ($list["post_info"]); ?></td>
			<td><?php echo ($list["dad_phone"]); ?></td>
            <td><?php echo ($list["mom_phone"]); ?></td>  			
            <td align="center">
			    <button type="button" class="add" onclick="updateGraduation(<?php echo ($list["id"]); ?>)" value="修改">修改</button>
			    <button type="button" class="reset" onclick="deleteGraduation(<?php echo ($list["id"]); ?>)" value="删除">删除</button>
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