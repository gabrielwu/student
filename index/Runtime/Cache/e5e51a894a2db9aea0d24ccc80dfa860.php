<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>

    <title></title>
    
    <style type="text/css">

	table.form tbody th {background:#FFFFFF;}
	
	.button{ 
    	 width:80px;
	 cursor: pointer;
	 height:36px;
	 background:url(<?php echo ($current); ?>/images/tab_10.jpg);
	 font-size:12px; 
	 color:#fff; 
	 line-height:36px;
  }

	body{
		width:800px;
		overflow:auto;  
	}
 
  
    
 
	label.label3 {
    	float:left;
    	width: 120px;
    	text-align: right;
    	margin: 7px 10px 0 10px;
    	font-size: 11pt;
    	color:#9999ff;
    }
    
	label.label4 {
    	float:left;
    	width: 120px;
    	text-align: right;
    	margin: 7px 10px 0 10px;
    	font-size: 12px;
    	color:red;
    	font-weigth:600;
    }
  

	.title{
		font-weight:600;
		font:16px
		background:url(<?php echo ($current); ?>/img/tab_05.jpg) repeat-x;
		height:90px;
		
		text-align:center;
	
		color:white
	}
	#title#tip{
		font-weight:600;
		font:16px
		color:red
	}
    </style>
    
    <script type="text/javascript">
    function signUpdate(){
     	if("<?php echo ($list_update["stu_num"]); ?>"!="<?php echo ($result["stu_num"]); ?>")
 			$("#stu_num").attr("class","label4");
     	if("<?php echo ($list_update["stu_tnum"]); ?>"!="<?php echo ($result["stu_tnum"]); ?>")
     		$("#stu_tnum").attr("class","label4");
     		 
        if("<?php echo ($list_update["stu_status"]); ?>"!="<?php echo ($result["stu_status"]); ?>")
     		$("#status").attr("class","label4");
     		 
     	if("<?php echo ($list_update["stu_idnum"]); ?>"!="<?php echo ($result["stu_idnum"]); ?>")
         	$("#stu_idnum").attr("class","label4");
        if("<?php echo ($list_update["stu_name"]); ?>"!="<?php echo ($result["stu_name"]); ?>")
     		$("#stu_name").attr("class","label4"); 
       if("<?php echo ($list_update["stu_pinyin"]); ?>"!="<?php echo ($result["stu_pinyin"]); ?>")
         	$("#stu_pinyin").attr("class","label4"); 
         if("<?php echo ($list_update["stu_exname"]); ?>"!="<?php echo ($result["stu_exname"]); ?>")
         $("#stu_exname").attr("class","label4"); 
        if("<?php echo ($list_update["stu_indate"]); ?>"!="<?php echo ($result["stu_indate"]); ?>")
             $("#stu_indate").attr("class","label4");  
             if("<?php echo ($list_update["stu_type"]); ?>"!="<?php echo ($result["stu_type"]); ?>")
       			$("#stu_type").attr("class","label4"); 
       		if("<?php echo ($list_update["stu_schooling"]); ?>"!="<?php echo ($result["stu_schooling"]); ?>")
           		$("#stu_schooling").attr("class","label4"); 
              if("<?php echo ($list_update["stu_gradyear"]); ?>"!="<?php echo ($result["stu_gradyear"]); ?>")
           		$("#stu_gradyear").attr("class","label4"); 
           	if("<?php echo ($list_update["stu_campus"]); ?>"!="<?php echo ($result["stu_campus"]); ?>")
               	$("#stu_campus").attr("class","label4");
              if("<?php echo ($list_update["stu_college"]); ?>"!="<?php echo ($result["stu_college"]); ?>")
           		$("#stu_college").attr("class","label4"); 
             if("<?php echo ($list_update["stu_major"]); ?>"!="<?php echo ($result["stu_major"]); ?>")
               	$("#stu_major").attr("class","label4"); 
               if("<?php echo ($list_update["stu_grade"]); ?>"!="<?php echo ($result["stu_grade"]); ?>")
               	$("#stu_grade").attr("class","label4"); 
              if("<?php echo ($list_update["stu_class"]); ?>"!="<?php echo ($result["stu_class"]); ?>")
                   $("#stu_class").attr("class","label4");
              if("<?php echo ($list_update["stu_gender"]); ?>"!="<?php echo ($result["stu_gender"]); ?>")
           	       $("#stu_gender").attr("class","label4"); 
           //	if(<?php echo ($list_update["stu_nation"]); ?>!=<?php echo ($result["stu_nation"]); ?>)
             //  	$("#stu_nation").attr("class","label4"); 
            if("<?php echo ($list_update["stu_political"]); ?>"!="<?php echo ($result["stu_political"]); ?>")
               	$("#stu_political").attr("class","label4"); 
              if("<?php echo ($list_update["stu_birthday"]); ?>"!="<?php echo ($result["stu_birthday"]); ?>")
                  $("#stu_birthday").attr("class","label4");
                if("<?php echo ($list_update["stu_hometown"]); ?>"!="<?php echo ($result["stu_hometown"]); ?>")
               $("#stu_hometown").attr("class","label4"); 
			if("<?php echo ($list_update["stu_birthplace"]); ?>"!="<?php echo ($result["stu_birthplace"]); ?>")
                  $("#stu_birthplace").attr("class","label4"); 
             if("<?php echo ($list_update["stu_residence"]); ?>"!="<?php echo ($result["stu_residence"]); ?>")
                   	$("#stu_residence").attr("class","label4"); 
             if("<?php echo ($list_update["stu_residcode"]); ?>"!="<?php echo ($result["stu_residcode"]); ?>")
                       $("#stu_residcode").attr("class","label4"); 
   if("<?php echo ($list_update["stu_trainarea"]); ?>"!="<?php echo ($result["stu_trainarea"]); ?>")
        $("#stu_trainarea").attr("class","label4");
if("<?php echo ($list_update["stu_abroad"]); ?>"!="<?php echo ($result["stu_abroad"]); ?>")
   $("#stu_abroad").attr("class","label4");   
if("<?php echo ($list_update["stu_homeaddr"]); ?>"!="<?php echo ($result["stu_homeaddr"]); ?>")
    $("#stu_homeaddr").attr("class","label4");    
if("<?php echo ($list_update["stu_homeadcode"]); ?>"!="<?php echo ($result["stu_homeadcode"]); ?>")
      $("#stu_homeadcode").attr("class","label4");    
if("<?php echo ($list_update["stu_homeaddr2"]); ?>"!="<?php echo ($result["stu_homeaddr2"]); ?>")
    $("#stu_homeaddr2").attr("class","label4");    
if("<?php echo ($list_update["stu_contacaddr"]); ?>"!="<?php echo ($result["stu_contacaddr"]); ?>")
  $("#stu_contacaddr").attr("class","label4");    
if("<?php echo ($list_update["stu_contadcode"]); ?>"!="<?php echo ($result["stu_contadcode"]); ?>")
      $("#stu_contadcode").attr("class","label4");   
      if("<?php echo ($list_update["stu_contaddr2"]); ?>"!="<?php echo ($result["stu_contaddr2"]); ?>")
          $("#stu_contaddr2").attr("class","label4");   
    if("<?php echo ($list_update["stu_zipcode"]); ?>"!="<?php echo ($result["stu_zipcode"]); ?>")
           $("#stu_zipcode").attr("class","label4");    
    //if(<?php echo ($list_update["stu_email"]); ?>!=<?php echo ($result["stu_email"]); ?>){
    //         $("#stu_email").attr("class","label4");    
   //if(<?php echo ($list_update["stu_homepage"]); ?>!=<?php echo ($result["stu_homepage"]); ?>){
    //      $("#stu_homepage").attr("class","label4");    
    //if(<?php echo ($list_update["stu_phone"]); ?>!=<?php echo ($result["stu_phone"]); ?>){
    //     $("#stu_phone").attr("class","label4");    
  //  if(<?php echo ($list_update["stu_mobile"]); ?>!=<?php echo ($result["stu_mobile"]); ?>){
           //  $("#stu_mobile").attr("class","label4");
          //   if(<?php echo ($list_update["stu_qqnum"]); ?>!=<?php echo ($result["stu_qqnum"]); ?>){
          //       $("#stu_qqnum").attr("class","label4");   
           if("<?php echo ($list_update["stu_faith"]); ?>"!="<?php echo ($result["stu_faith"]); ?>")
                  $("#stu_faith").attr("class","label4");    
        //   if(<?php echo ($list_update["stu_residtype"]); ?>!=<?php echo ($result["stu_residtype"]); ?>){
           //         $("#stu_residtype").attr("class","label4");    
         // if(<?php echo ($list_update["stu_marriage"]); ?>!=<?php echo ($result["stu_marriage"]); ?>){
                //  $("#stu_marriage").attr("class","label4");    
         //  if(<?php echo ($list_update["stu_speciality"]); ?>!=<?php echo ($result["stu_speciality"]); ?>){
          //    $("#stu_speciality").attr("class","label4");    
             			 
 		
 	    	
 	
      }




	function passConfirm(id){
		if(confirm("确定通过审核?")){
			$("#form").attr("action","<?php echo ($url); ?>/passConfirm/stu_id/"+id);
			$("#form").submit();
			window.close();
		}
    }

	function nopassConfirm(id){
		if(confirm("确定不允许此次修改?")){
        	$("#form").attr("action","<?php echo ($url); ?>/nopassConfirm/stu_id/"+id);
        	$("#form").submit();
        	window.close();
    	}
	}
    </script>
    
</head>
<body onload="signUpdate();" >
	<br/>
	<div class="title" >
			<span class="tip"><font color="red">*提示：左边为原信息，右边为更改后信息（红色部分为所更改)</font></span>
			<br></br>
			<button type="button" class="button"  onclick="passConfirm(<?php echo ($result["stu_id"]); ?>);">通过审核</button>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="button" class="button"  onclick="nopassConfirm(<?php echo ($result["stu_id"]); ?>);">不通过审核</button>
    </div>
    <form action="#"  id="form" method="post" target="main">
      <table class="form" width="100%" cellpadding="0" cellspacing="0">
        <tbody>
        
            		<tr>
            			<td colspan="2" align=center><img id="img1" src="<?php echo ($root); ?>/upload/<?php echo ($result["stu_photo"]); ?>" width="90" height="110"/></td>
            			
            			<td colspan="2" align=center><img id="img2" src="<?php echo ($root); ?>/upload/<?php echo ($list_update["stu_photo"]); ?>" width="90" height="110"/></td>
						
            		</tr>
            		<tr>
            			
            			<th><label class="label1">学号</label></th>
            			<td><label class="label1"><?php echo ($result["stu_num"]); ?></label></td>
            			<th><label class="label2" >学号</label></th>
            			<td><label id="stu_num"><?php echo ($list_update["stu_num"]); ?></label></td>
            		
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">教学号</label></th>
            			<td><label class="label1"><?php echo ($result["stu_tnum"]); ?></label></td>
            			<th><label class="label2">教学号</label></th>
            			<td><label  id=stu_tnum><?php echo ($list_update["stu_tnum"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">学籍状态</label></th>
            			<td><label class="label1"><?php echo ($result["stu_status"]); ?></label></td>
            			<th><label class="label2">学籍状态</label></th>
            			<td><label id=status><?php echo ($list_update["stu_status"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            		<th>	<label class="label1">身份证号码</label></th>
            			<td><label class="label1"><?php echo ($result["stu_idnum"]); ?></label></td>
            			<th><label class="label2">身份证号码</label></th>
            			<td><label  id=stu_idnum><?php echo ($list_update["stu_idnum"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">学生姓名</label></th>
            			<td><label class="label1"><?php echo ($result["stu_name"]); ?></label></td>
            			<th><label class="label2">学生姓名</label></th>
            			<td><label  id=stu_name><?php echo ($list_update["stu_name"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">姓名拼音</label></th>
            			<td><label class="label1"><?php echo ($result["stu_pinyin"]); ?></label></td>
            			<th><label class="label2">姓名拼音</label></th>
            			<td><label  id=stu_pinyin><?php echo ($list_update["stu_pinyin"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">曾用名</label></th>
            			<td><label class="label1"><?php echo ($result["stu_exname"]); ?></label></td>
            			<th><label class="label2">曾用名</label></th>
            			<td><label  id=stu_exname><?php echo ($list_update["stu_exname"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">入学年份</label></th>
            			<td><label class="label1"><?php echo ($result["stu_indate"]); ?></label></td>
            			<th><label class="label2">入学年份</label></th>
            			<td><label  id=stu_indate><?php echo ($list_update["stu_indate"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">学生类别</label></th>
            			<td><label class="label1"><?php echo ($result["stu_type"]); ?></label></td>
            			<th><label class="label2">学生类别</label></th>
            			<td><label  id=stu_type><?php echo ($list_update["stu_type"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">学制</label></th>
            			<td><label class="label1"><?php echo ($result["stu_schooling"]); ?></label></td>
            			<th><label class="label2">学制</label></th>
            			<td><label  id=stu_schooling><?php echo ($list_update["stu_schooling"]); ?></label></td>
            			
            			
            		</tr>
            		<tr>
            			
            			<th><label class="label1">预计毕业年度</label></th>
            			<td><label class="label1"><?php echo ($result["stu_gradyear"]); ?></label></td>
            			<th><label class="label2">预计毕业年度</label></th>
            			<td><label  id=stu_gradyear><?php echo ($list_update["stu_gradyear"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">校区</label></th>
            			<td><label class="label1"><?php echo ($result["stu_campus"]); ?></label></td>
            			<th><label class="label2">校区</label></th>
            			<td><label  id=stu_campus><?php echo ($list_update["stu_campus"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">院系</label></th>
            			<td><label class="label1"><?php echo ($result["stu_college"]); ?></label></td>
            			<th><label class="label2">院系</label></th>
            			<td><label  id=stu_college><?php echo ($list_update["stu_college"]); ?></label></td>
            		</tr>
            		<tr>
            			
            		<th>	<label class="label1">专业</label></th>
            			<td><label class="label1"><?php echo ($result["stu_major"]); ?></label></td>
            		<th>	<label class="label2">专业</label></th>
            			<td><label  id=stu_major><?php echo ($list_update["stu_major"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">年级</label></th>
            			<td><label class="label1"><?php echo ($result["stu_grade"]); ?></label></td>
            			<th><label class="label2">年级</label></th>
            			<td><label  id=stu_grade><?php echo ($list_update["stu_grade"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">班级</label></th>
            			<td><label class="label1"><?php echo ($result["stu_class"]); ?></label></td>
            			<th><label class="label2">班级</label></th>
            			<td><label  id=stu_class><?php echo ($list_update["stu_class"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">性别</label></th>
            			<td><label class="label1"><?php echo ($result["stu_gender"]); ?></label></td>
            			<th><label class="label2">性别</label></th>
            			<td><label  id=stu_gender><?php echo ($list_update["stu_gender"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">政治面貌</label></th>
            			<td><label class="label1"><?php echo ($result["stu_political"]); ?></label></td>
            			<th><label class="label2">政治面貌</label></th>
            		<td>	<label  id=stu_political><?php echo ($list_update["stu_political"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">宗教信仰</label></th>
            			<td><label class="label1"><?php echo ($result["stu_faith"]); ?></label></td>
            			<th><label class="label2">宗教信仰</label></th>
            			<td><label  id=stu_faith><?php echo ($list_update["stu_faith"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">出生日期</label></th>
            			<td><label class="label1"><?php echo ($result["stu_birthday"]); ?></label></td>
            			<th><label class="label2">出生日期</label></th>
            			<td><label  id=stu_birthday><?php echo ($list_update["stu_birthday"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">籍贯</label></th>
            			<td><label class="label1"><?php echo ($result["stu_hometown"]); ?></label></td>
            			<th><label class="label2">籍贯</label></th>
            			<td><label  id=stu_hometown><?php echo ($list_update["stu_hometown"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">出生地</label></th>
            			<td><label class="label1"><?php echo ($result["stu_birthplace"]); ?></label></td>
            			<th><label class="label2">出生地</label></th>
            			<td><label  id=stu_birthplace><?php echo ($list_update["stu_birthplace"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">户口所在地</label></th>
            			<td><label class="label1"><?php echo ($result["stu_residence"]); ?></label></td>
            			<th><label class="label2">户口所在地</label></th>
            			<td><label  id=stu_residence><?php echo ($list_update["stu_residence"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">乘车区间</label></th>
            			<td><label class="label1"><?php echo ($result["stu_trainarea"]); ?></label></td>
            			<th><label class="label2">乘车区间</label></th>
            			<td><label  id=stu_trainarea><?php echo ($list_update["stu_trainarea"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">港澳台侨</label></th>
            			<td><label class="label1"><?php echo ($result["stu_abroad"]); ?></label></td>
            			<th><label class="label2">港澳台侨</label></th>
            			<td><label  id=stu_abroad><?php echo ($list_update["stu_abroad"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">家庭地址(县)</label></th>
            			<td><label class="label1"><?php echo ($result["stu_homeaddr"]); ?></label></td>
            			<th><label class="label2">家庭地址(县)</label></th>
            			<td><label  id=stu_homeaddr><?php echo ($list_update["stu_homeaddr"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">通讯地址(县)</label></th>
            			<td><label class="label1"><?php echo ($result["stu_contacaddr"]); ?></label></td>
            			<th><label class="label2">通讯地址(县)</label></th>
            			<td><label  id=stu_contacaddr><?php echo ($list_update["stu_contacaddr"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">街道号/村</label></th>
            			<td><label class="label1"><?php echo ($result["stu_contaddr2"]); ?></label></td>
            			<th><label class="label2">街道号/村</label></th>
            			<td><label  id=stu_contaddr2><?php echo ($list_update["stu_contaddr2"]); ?></label></td>
            		</tr>
            		<tr>
            			
            			<th><label class="label1">邮政编码</label></th>
            			<td><label class="label1"><?php echo ($result["stu_zipcode"]); ?></label></td>
            			<th><label class="label2">邮政编码</label></th>
            			<td><label  id=stu_zipcode><?php echo ($list_update["stu_zipcode"]); ?></label></td>
            		</tr>
            </tbody>       
      </table>
    </form>
</body>
</html>