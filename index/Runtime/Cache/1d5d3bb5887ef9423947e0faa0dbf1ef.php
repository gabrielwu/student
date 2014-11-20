<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="<?php echo ($current); ?>/style/table.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="<?php echo ($path); ?>/javascript/jquery.min.js"></script>
<title></title>
<style>
	body{ "宋体"; width:100%px; overflow:auto; font-weight:600;}
	
    #form{
		margin-left:50px;
		margin-right:auto;
		
	}
	#table{align:center;}
	
	#title{
		font-weight:600;
		font:16px
		background:url(<?php echo ($current); ?>/img/tab_05.jpg) repeat-x;
		height:50px;
		line-height:50px;
		text-align:center;
		vertical-align:middle;
		color:white
	}
	
.row{
	    font:16px
		background-color:#090909;
		font-weight:600;
		height:30px;
		line-height:30px;
		vertical-align:middle;
		
	}
	.list{
	    backgrounc-color:#F0F7FB;
		font-weight:600;
		font:13px;
	}
	
.button1 { width:61px; cursor: pointer;height:25px; background:url(<?php echo ($current); ?>/images/but_22.jpg) no-repeat; font-size:12px; color:#fff; line-height:25px;}
.button2 { width:61px; cursor: pointer;height:25px; background:url(<?php echo ($current); ?>/images/but_21.jpg) no-repeat; font-size:12px; color:#fff; line-height:25px;}
.button3 { width:61px; cursor: pointer;height:25px; background:url(<?php echo ($current); ?>/images/but_24.jpg) no-repeat; font-size:12px; color:#fff; line-height:25px;}		
</style>
<script>
    $(function() {
	    $("#checkall").click(function () {
		    if ($(this).attr("checked") == true){ // 全选 
                $(".check").each(function() { 
                   $(this).attr("checked", true); 
				}); 
			} else {
			    $(".check").each(function() { 
                   $(this).attr("checked", false); 
				}); 
			}
		});
	});
	function viewEditInfo(id){
		//alert(id);
		var obj = new Object();
	      window.showModalDialog('<?php echo ($url); ?>/viewEditInfo/stu_id/'+id,obj,'dialogWidth:900px;dialogHeight:600px');
	      
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

	function passAllConfirm(){
		var checkbox=document.getElementsByName("check");
		var sql="";
		for(var i=0;i<checkbox.length;i++){
			var obj = document.getElementsByName('check')[i];
			if(obj.type=="checkbox" && obj.checked == true){
	            sql += obj.value +' ';
			}
		}
		if(sql!=""){
			if(confirm("确定通过审核?")){
				$("#form").attr("action","<?php echo ($url); ?>/passAllConfirm/idstrs/"+sql);
				$("#form").submit();
			}
		}else{
			alert("请先选中！");
		}
		
	}

	function nopassAllConfirm(){
		var checkbox=document.getElementsByName("check");
		var sql="";
		for(var i=0;i<checkbox.length;i++){
			var obj = document.getElementsByName('check')[i];
			if(obj.type=="checkbox" && obj.checked == true){
	            sql += obj.value +' ';
			}
		}
		if(sql!=""){
			if(confirm("确定不允许此次修改?")){
				$("#form").attr("action","<?php echo ($url); ?>/nopassAllConfirm/idstrs/"+sql);
				$("#form").submit();
			}
		}else{
			alert("请先选中！");
		}
	}

</script>
</head>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>审核信息</H2>
    <UL id=tab>
      <LI class=current><A href="#" target="main" >基本信息</A></LI>
	  <LI><A href="<?php echo ($url); ?>/confirmModuleInfo" target="main" >其他信息</A></LI>
    </UL>
  </DIV>

 <DIV id=content >
    <form action="#" method="post" id="form">
	    <table width="70%" >
            <tr class="">
                <th>以下同学更新了个人信息,等待您的审核</th>
                <th><a href="javascript:passAllConfirm()">选中通过</a></th>
     	 	    <th><a href="javascript:nopassAllConfirm()">选中不通过</a></th>    	 	
            </tr>
        </table>
        <table class="list" width="100%" cellpadding="0" cellspacing="0" >
            <tr class="">
		        <th>选中<input type="checkbox" name="checkall" class="check" id="checkall"/></th>
                <th>姓名</th>
                <th>学号</th>
				<th>年级</th>
				<th>班级</th>
                <th colspan="3"><center>操&nbsp;&nbsp;作</center></th>
            </tr>
            <?php if(is_array($result)): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$student): ++$i;$mod = ($i % 2 )?><tr class="">
		        <td><input type="checkbox" name="check" class="check" id="check0" value="<?php echo ($student["stu_id"]); ?>"/></td>
                <td><?php echo ($student["stu_name"]); ?></td>
                <td><?php echo ($student["stu_num"]); ?></td>
				<td><?php echo ($student["stu_grade"]); ?></td>
                <td><?php echo ($student["stu_class"]); ?></td>
     		    <td><a href="javascript:viewEditInfo(<?php echo ($student["stu_id"]); ?>)">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passConfirm(<?php echo ($student["stu_id"]); ?>)">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassConfirm(<?php echo ($student["stu_id"]); ?>)">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
      <input type="hidden" name="admin_id" id="admin_id" />
    </form>
  </DIV>
</DIV>
</BODY>

</html>