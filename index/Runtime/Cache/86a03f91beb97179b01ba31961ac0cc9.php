<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>学生就业</TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updategrant(id){
	 var obj = new Object();
	 var stu_num = id;
	 $("#stu_num").attr("value",stu_num);
	 window.showModalDialog('<?php echo ($url); ?>/changegrant/stu_num/'+stu_num,obj,'dialogWidth:400px;dialogHeight:350px');
 }
 function deletegrant(id)
 {
    if(confirm("您确定要删除词条记录吗？？？"))
    {
    var stu_num = id;
    $("#stu_num").attr("value",stu_num);
    $("#form").submit();
    }
}
function searchdata(){
	$("#form").attr("action","<?php echo ($url); ?>/index");
	$("#form").attr("method","get");
	$("#form").submit();
}

</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>学生事务</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >学生就业首页</A></LI>
      <LI ><A href="<?php echo ($url); ?>/inputstream" target="main" >数据导入</A></LI>
      <LI ><A href="<?php echo ($url); ?>/outputstream" target="main" >数据导出</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deletegrant" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
      <tbody>
          <tr class="">
            <th colspan="9">查询条件：
            	按"毕业年份"<input type="text" name="graduate_date">
            	<button type="button" onclick="searchdata()" class="add" >查询</button>
            
            </th>
          </tr>
        </tbody>
        <tbody>
          <tr class="">
            <th>学号</th>
            <th>姓名</th>
            <th>学生年级</th>
            <th>学生班级</th>
            <th>工作详址及邮编</th>
            <th>联系电话</th>
            <th>毕业年份</th>
          </tr>
          <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["stu_num"]); ?></td>
            <td><?php echo ($list["stu_name"]); ?></td>
            <td align="center"><?php echo ($list["stu_grade"]); ?>级</td>
            <td align="center"><?php echo ($list["stu_class"]); ?>班</td>
            <td align="left"><?php echo ($list["workplace"]); ?>&nbsp;<?php echo ($list["postid"]); ?></td>
            <td align="center"><?php echo ($list["stu_tel"]); ?></td>
            <td align="center"><?php echo ($list["graduate_date"]); ?>年</td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
     </tbody>
        <tfoot>
          <tr class="">
             <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="stu_num" id="stu_num" />
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>