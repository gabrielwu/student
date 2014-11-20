<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<link href="<?php echo ($current); ?>/style/edit.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script charset="utf-8" src="<?php echo ($root); ?>/index/public/kindeditor/kindeditor.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('textarea[name="content"]', {
			resizeType : 1,
			allowPreviewEmoticons : false,
			allowImageUpload : true,
			items : ['source',  'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
		K('input[name=clear]').click(function(e) {
			editor.html('');
		});
	});
	$(function() {
		$('input[name=submit]').click(function(e) {
			$("#form").submit();
			window.close();
		});
	});
</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2><?php echo ($title); ?></H2>
    <UL id=tab>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/insert" method="post" id="form" target="main">
	    <input type="hidden" name="id" id="id" value="<?php echo ($result["id"]); ?>"/>
	    <div class="common"><span>标题</span></br><input name="title" id="title" value=""/></div>
		<div class="common">
		    <span>内容</span></br>
		    <textarea name="content" style="width:800px;height:400px;visibility:hidden;"></textarea>
			<p>
			    <input type="submit" name="submit" value="提交" />
				<input type="button" name="clear" value="清空" />
			</p>
		</div>
		<input type="hidden"  name="type" id="type" value="<?php echo ($type); ?>"/>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>