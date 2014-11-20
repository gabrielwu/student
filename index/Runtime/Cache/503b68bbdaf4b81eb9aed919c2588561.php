<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<script type="text/javascript">
function updatepassword(){
	var password = "<?php echo ($password); ?>";
	var form_pass = $("#form_pass").val();
	var form_newpass = $("#form_newpass").val();
	var form_repass = $("#form_repass").val();
	if(password != form_pass)
	{
		alert("原密码输入错误！！！");
		return false;
	}else{
		if(form_newpass != form_repass)
		{
			alert("新密码与确认密码不符！！！");
			return false;
		}else{

			$("#form").submit();
		}
	}
	
	
}

</script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>个人设置</H2>
    <UL id=tab>
      <!--<LI ><A href="grxxwh.html" target="main" >个人信息维护</A></LI>
      --><LI class=current><A href="#" target="main" >修改密码</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updatepassword" method="post" id="form">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <thead>
          <tr class="">
            <th colspan="2">修改密码</th>
          </tr>
        </thead>
        <tbody>
          <tr class="">
            <th>原始密码<span class="star">*</span></th>
            <td><input name="password" id="form_pass" value="" type="password">
              <div id=""></div></td>
          </tr>
          <tr class="">
            <th>新密码 <span class="star">*</span></th>
            <td><input name="newpassword" id="form_newpass" value="" type="password">
              <div class="onShow" id="newpass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>再次输入密码<span class="star">*</span></th>
            <td><input name="repassword" id="form_repass" value="" type="password">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
        </tbody>
        <tfoot>
          <tr class="">
            <td></td>
            <td><button type="button" onclick="updatepassword()" class="add">提交</button>
              <!--<button type="submit" class="edit">�༭</button>-->
              <button type="reset" class="reset">重置</button></td>
          </tr>
        </tfoot>
      </table>
    </form>
  </DIV>
</DIV>
</BODY>
</HTML>