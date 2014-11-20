<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML 
xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<link type="text/css" rel="stylesheet" href="style/table.css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
</HEAD>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>个人事务</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >信息采集</A></LI>
    </UL>
  </DIV>
  <DIV id=content >
    <form action="<?php echo ($url); ?>/updatepassword" method="post" id="form">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
          <tr class="">
            <th>姓名<span class="star">*</span></th>
            <td><input name="name" id="form_name" value="" type="text">
              <div id="onShow"></div></td>
          </tr>
          <tr class="">
            <th>学号 <span class="star">*</span></th>
            <td><input name="num" id="form_num" value="" type="text">
              <div class="onShow" id="newpass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>入学年份<span class="star">*</span></th>
            <td><input name="grade" id="form_grade" value="" type="text">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>毕业年份<span class="star">*</span></th>
            <td><input name="graduate" id="form_graduate" value="" type="text">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>班级<span class="star">*</span></th>
            <td><input name="class" id="form_class" value="" type="text">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>工作单位<span class="star">*</span></th>
            <td><input name="place" id="form_place" value="" type="text">
              <div class="onShow" id="repass_tip"> </div></td>
          </tr>
          <tr class="">
            <th>手机号码<span class="star">*</span></th>
            <td><input name="tel" id="form_tel" value="" type="text">
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