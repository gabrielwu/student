<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($root); ?>/index/Tpl/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2><?php echo ($title); ?></H2>
	<H2>></H2>
	<a href="<?php echo ($url); ?>/index/type/<?php echo ($result["type"]); ?>"><H2>返回列表</H2></a>
    <UL id=tab></UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/deleteAdvanced" method="post" id="form">
      <table class="list" width="90%" cellpadding="0" cellspacing="0" >
        <tbody>
			<tr>
				<td><h3><?php echo ($result["title"]); ?></h3></td>  
			</tr>
			<tr>
				<td class="advanced"><?php echo ($result["content"]); ?></td>  
			</tr>
		</tbody>
      </table>
      <input type="hidden" name="id" id="id" />
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>