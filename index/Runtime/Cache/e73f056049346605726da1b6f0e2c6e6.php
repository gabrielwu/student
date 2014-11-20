<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE><?php echo ($title); ?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
$(function() {
    if (<?php echo ($level); ?> != 2) {
		$(".operate").remove();
	}
});
 function edit(id){
	 var obj = new Object();
	 var id = id;
	 $("#id").attr("value",id);
	 window.showModalDialog('<?php echo ($url); ?>/edit/id/'+id,obj,'dialogWidth:850px;dialogHeight:750px');
 }
 function deleteAdvanced(id) {
    if(confirm("您确定要删除此条记录吗？？？")) {
		var id = id;
		$("#id").attr("value",id);
		$("#form").submit();
    }
}
function add(type) {
	var obj = new Object();
    window.showModalDialog('<?php echo ($url); ?>/add/type/'+type,obj,'dialogWidth:850px;dialogHeight:750px');
}
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2><?php echo ($title); ?></H2>
	<UL id=tab>
      <LI class=current><A href="#" target="main" >列表</A></LI>
      <LI class="operator"><A href="javascript:add('<?php echo ($type); ?>')" target="main" >新建</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/delete" method="post" id="form">
      <table class="list" width="90%" cellpadding="0" cellspacing="0" >
        <tbody>
			<tr>
		        <th>标题</th>
				<th class="operate">操作</th>
			</tr>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$result): ++$i;$mod = ($i % 2 )?><tr>
				<td class="advanced">
				    <a href="<?php echo ($url); ?>/view/id/<?php echo ($result["id"]); ?>"><?php echo ($result["title"]); ?></a></td>  
				<td class="operate">
					<button type="button" class="add" onclick="edit(<?php echo ($result["id"]); ?>)" value="修改">修改</button>
					<button type="button" class="reset" onclick="deleteAdvanced(<?php echo ($result["id"]); ?>)" value="删除">删除</button>
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
	  <input type="hidden" name="type" id="type" value="<?php echo ($type); ?>" />
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>