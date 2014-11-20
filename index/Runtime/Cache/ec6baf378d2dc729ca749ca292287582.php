<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学生国家助学贷款</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updateLoan(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/changeLoan/id/'+id,obj,'dialogWidth:400px;dialogHeight:350px');
 }
 function deleteLoan(id) {
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
  <DIV style="width:2800px" id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >学生贷款首页</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
    </UL>
  </DIV>
  <DIV id=content style="padding:0" >
    <form action="<?php echo ($url); ?>/deleteLoan" method="post" id="form">
      <table class="list" width="2800px" cellpadding="0" cellspacing="0" >
        <tbody>
          <tr class="">
            <th>学号</th>
            <th>姓名</th>
            <th>性别</th>     
			<th>申请日期</th>
			<th>贷款总额(元)</th>
			<th>学费贷款(元)</th>
			<th>住宿贷款(元)</th>
			<th>身份证号</th>
            <th>民族</th>
            <th>QQ</th>
            <th>邮箱</th>
            <th>院系</th>
			<th>专业</th>
			<th>入学年份</th>
			<th>年级</th>
			<th>毕业年份</th>
			<th>家庭住址</th>
			<th>邮编</th>
			<th>父亲姓名</th>
			<th style="width:140px">父亲工作单位</th>
			<th>父亲联系方式</th>
			<th>母亲姓名</th>
			<th style="width:140px">母亲工作单位</th>
			<th>母亲联系方式</th>	
			<th>是否还清</th>	
            <th style="width:200px" >操作</th>			
          </tr>
		  <tr class="">
            <th><input style="width:90%" type="text" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
            <th><input style="width:90%" type="text" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
            <th><input style="width:90%" type="text" name="stu_gender" value="<?php echo ($condition["stu_gender"]); ?>"></th>
            <th><input style="width:90%" type="text" name="apply_date" value="<?php echo ($condition["apply_date"]); ?>"></th>
			<th><input style="width:90%" type="text" name="total" value="<?php echo ($condition["total"]); ?>"></th>
			<th><input style="width:90%" type="text" name="tuition" value="<?php echo ($condition["tuition"]); ?>"></th>
			<th><input style="width:90%" type="text" name="accommodation" value="<?php echo ($condition["accommodation"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_idnum" value="<?php echo ($condition["stu_idnum"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_nation" value="<?php echo ($condition["stu_nation"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_qqnum" value="<?php echo ($condition["stu_qqnum"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_email" value="<?php echo ($condition["stu_email"]); ?>"></th>
			<th>软件学院</th>
			<th>软件工程</th>
			<th><input style="width:90%" type="text" name="stu_indate" value="<?php echo ($condition["stu_indate"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_grade" value="<?php echo ($condition["stu_grade"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_gradyear" value="<?php echo ($condition["stu_gradyear"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_addr" value="<?php echo ($condition["stu_addr"]); ?>"></th>
			<th><input style="width:90%" type="text" name="stu_zipcode" value="<?php echo ($condition["stu_zipcode"]); ?>"></th>
			<th><input style="width:90%" type="text" name="dad_name" value="<?php echo ($condition["dad_name"]); ?>"></th>
			<th><input style="width:90%" type="text" name="dad_work_unit" value="<?php echo ($condition["dad_work_unit"]); ?>"></th>
			<th><input style="width:90%" type="text" name="dad_phone" value="<?php echo ($condition["dad_phone"]); ?>"></th>
			<th><input style="width:90%" type="text" name="mom_name" value="<?php echo ($condition["mom_name"]); ?>"></th>
			<th><input style="width:90%" type="text" name="mom_work_unit" value="<?php echo ($condition["mom_work_unit"]); ?>"></th>
			<th><input style="width:90%" type="text" name="mom_phone" value="<?php echo ($condition["mom_phone"]); ?>"></th>
			<th><input style="width:90%" type="text" name="pay_off" value="<?php echo ($condition["pay_off"]); ?>"></th>
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
				<button type="button" onclick="downDataFile()" class="add" >导出</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["stu_name"]); ?></td>
            <td><?php echo ($list["stu_gender"]); ?></td>
			<td><?php echo ($list["apply_date"]); ?></td>
			<td><?php echo ($list["total"]); ?></td>
			<td><?php echo ($list["tuition"]); ?></td>
			<td><?php echo ($list["accommodation"]); ?></td>
			<td><?php echo ($list["stu_idnum"]); ?></td>
			<td><?php echo ($list["stu_nation"]); ?></td>
			<td><?php echo ($list["stu_qqnum"]); ?></td>
			<td><?php echo ($list["stu_email"]); ?></td>
			<td>软件学院</td>
			<td>软件工程</td>
			<td><?php echo ($list["stu_indate"]); ?></td>
			<td><?php echo ($list["stu_grade"]); ?></td>
			<td><?php echo ($list["stu_gradyear"]); ?></td>
			<td><?php echo ($list["stu_addr"]); ?></td>
            <td><?php echo ($list["stu_zipcode"]); ?></td>
            <td><?php echo ($list["dad_name"]); ?></td>
            <td><?php echo ($list["dad_work_unit"]); ?></td>
            <td><?php echo ($list["dad_phone"]); ?></td>
			<td><?php echo ($list["mom_name"]); ?></td>
            <td><?php echo ($list["mom_work_unit"]); ?></td>
            <td><?php echo ($list["mom_phone"]); ?></td>
			<td><?php echo ($list["pay_off"]); ?></td>
			<td align="center">
			   <button type="button" class="add" onclick="updateLoan(<?php echo ($list["id"]); ?>)" value="修改">修改</button>
               <button type="button" class="reset" onclick="deleteLoan(<?php echo ($list["id"]); ?>)" value="删除">删除</button>
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