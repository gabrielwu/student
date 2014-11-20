<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>创新项目</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updateInnovation(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/changeInnovation/id/'+id,obj,'dialogWidth:400px;dialogHeight:350px');
 }
 function deleteInnovation(id)
 {
    if(confirm("您确定要删除此条记录吗？？？"))
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
      <LI class=current><A href="#" target="main" >创新项目</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputStream" target="main" >数据导入</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deleteInnovation" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
        <tbody>
          <tr class="">
            <th>姓名</th>
            <th>学号</th>
            <th>创新项目名称</th>
            <th>级别</th>
            <th>获奖情况</th>
            <th>申报时间</th>
            <th>获奖时间</th>
            <th>指导教师</th>
            <th>组长</th>
            <th>成员</th>
            <th>依托学院</th>
            <th width="150px">操作</th>
          </tr>
		  <tr class="">
            <th><input type="text" style="width:90%" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
            <th><input type="text" style="width:90%" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
            <th><input type="text" style="width:90%" name="project_name" value="<?php echo ($condition["project_name"]); ?>"></th>
            <th><input type="text" style="width:90%" name="level" value="<?php echo ($condition["level"]); ?>"></th>
            <th><input type="text" style="width:90%" name="award" value="<?php echo ($condition["award"]); ?>"></th>
            <th><input type="text" style="width:90%" name="apply_date" value="<?php echo ($condition["apply_date"]); ?>"></th>
            <th><input type="text" style="width:90%" name="win_date" value="<?php echo ($condition["win_date"]); ?>"></th>
            <th><input type="text" style="width:90%" name="tutor" value="<?php echo ($condition["tutor"]); ?>"></th>
            <th><input type="text" style="width:90%" name="leader" value="<?php echo ($condition["leader"]); ?>"></th>
            <th><input type="text" style="width:90%" name="members" value="<?php echo ($condition["members"]); ?>"></th>
            <th><input type="text" style="width:90%" name="college" value="<?php echo ($condition["college"]); ?>"></th>
            <th align="center">
			    <button type="button" onclick="searchData()" class="add" >查询</button>
				<button type="button" onclick="downDataFile()" class="add" >导出</button>
			</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_name"]); ?></td>
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["project_name"]); ?></td>
            <td><?php echo ($list["level"]); ?></td>
            <td><?php echo ($list["award"]); ?></td>
			<td><?php echo ($list["apply_date"]); ?></td>
            <td><?php echo ($list["win_date"]); ?></td>    
            <td><?php echo ($list["tutor"]); ?></td>    
            <td><?php echo ($list["leader"]); ?></td>    
            <td><?php echo ($list["members"]); ?></td>    
            <td><?php echo ($list["college"]); ?></td>        
            <td align="center">
			    <button type="button" class="add" onclick="updateInnovation(<?php echo ($list["id"]); ?>)" value="修改">修改</button>
			    <button type="button" class="reset" onclick="deleteInnovation(<?php echo ($list["id"]); ?>)" value="删除">删除</button>
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