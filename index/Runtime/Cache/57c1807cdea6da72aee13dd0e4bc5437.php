<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($current); ?>/css/ui.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
</HEAD>
<BODY>
    <DIV id=wrap>
        <div class="toolbar">
            <a class="toolbartab" style="color:white" href="/student/index.php/Function/queryAll">综合查询</a>
            <a class="toolbartab" style="color:white" href="/student/index.php/Function/search">信息检索</a>
        </div>
        <DIV id=content >
            <form action="<?php echo ($url); ?>/search" method="post" id="form">
                <table class="list" width="100%" cellpadding="0" cellspacing="0">
                    <tbody>
				    	<tr class="">
						    <th>姓名</th>
							<th>学号</th>
							<th>年级</th>
							<th>班级</th>
							<th width="150px">操作</th>
						</tr>
						<tr class="">
							<th><input type="text" style="width:90%" name="stu_name" value="<?php echo ($condition["stu_name"]); ?>"></th>
							<th><input type="text" style="width:90%" name="stu_num" value="<?php echo ($condition["stu_num"]); ?>"></th>
							<th><input type="text" style="width:90%" name="stu_grade" value="<?php echo ($condition["stu_grade"]); ?>"></th>
							<th><input type="text" style="width:90%" name="stu_class" value="<?php echo ($condition["stu_class"]); ?>"></th>
							<th align="center"><button type="submit" class="add" >查询</button></th>
						 </tr>
						 <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): ++$i;$mod = ($i % 2 )?><tr class="">
							<td><?php echo ($list["stu_name"]); ?></td>
							<td><?php echo ($list["stu_num"]); ?></td>
							<td><?php echo ($list["stu_grade"]); ?></td>
							<td><?php echo ($list["stu_class"]); ?></td>      
							<td align="center"><a href="<?php echo ($url); ?>/studetail/stu_id/<?php echo ($list["stu_id"]); ?>">查看信息</a></td>
						  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>
                </table>
            </form>
        </DIV>
    </DIV>
</BODY>
</HTML>