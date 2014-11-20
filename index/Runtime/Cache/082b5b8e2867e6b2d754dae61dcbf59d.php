<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
 function updateadmin(id){
	 var admin_id = id;
	 $("#admin_id").attr("value",admin_id);
	 $("#form").attr("action","<?php echo ($url); ?>/updateadmin").submit();
 }

</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>系统设置</H2>
    <UL id=tab>
      <LI ><A href="<?php echo ($url); ?>/createadmin" target="main" >创建管理用户</A></LI>
      <LI class=current><A href="#" target="main" >管理员列表</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="#" method="post" id="form">
      <table class="list" width="100%" cellpadding="0" cellspacing="0" >
        <tbody>
          <tr class="">
            <th>用户名</th>
            <th>密码(sha1加密过)</th>
            <th>管理级别</th>
            <th>操作</th>
          </tr>
          <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
            <td><?php echo ($list["admin_name"]); ?></td>
            <td><?php echo ($list["admin_pw"]); ?></td>
            <td>
            <?php switch($list["manager_level"]): ?><?php case "0":  ?>超级管理员<?php break;?>
            	<?php case "2":  ?>学院领导<?php break;?>
            	<?php case "1":  ?>学生辅导员<?php break;?><?php endswitch;?>
            </td>
            <td><button type="submit" class="add" onclick="updateadmin(<?php echo ($list["admin_id"]); ?>)" value="编辑">编辑</button>
            </td>
          </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
        <tfoot>
          <tr class="">
             <TD colSpan="9" align="center"><?php echo ($page); ?></TD>
          </tr>
        </tfoot>
      </table>
      <input type="hidden" name="admin_id" id="admin_id" />
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>