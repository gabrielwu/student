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
	function viewModuleEditInfo(id, module){
		var obj = new Object();
	    window.showModalDialog('<?php echo ($url); ?>/viewModuleEditInfo?id='+id+'&module='+module,obj,'dialogWidth:900px;dialogHeight:600px');
	      
	}

	function passModuleConfirm(id, module){
		if(confirm("确定通过审核?")){
			$("#form").attr("action","<?php echo ($url); ?>/passModuleConfirm/id/"+id+'/module/'+module);
			$("#form").submit();
			window.close();
		}
	}
	function nopassModuleConfirm(id, module){
		if(confirm("确定不允许此次修改?")){
			$("#form").attr("action","<?php echo ($url); ?>/nopassModuleConfirm/id/"+id+'/module/'+module);
			$("#form").submit();
			window.close();
		}
	}
</script>
</head>
<BODY>
<DIV id=wrap>
  <DIV id=title class=tab>
    <H2>审核信息</H2>
    <UL id=tab>
      <LI><A href="<?php echo ($url); ?>/confirmStuInfo" target="main" >基本信息</A></LI>
	  <LI class=current><A href="" target="main" >其他信息</A></LI>
    </UL>
  </DIV>

 <DIV id=content >
    <form action="#" method="post" id="form">
	    <table width="70%" >
            <tr class="">
                <th>以下同学更新了个人信息,等待您的审核</th>	 	
            </tr>
        </table>
        <table class="list" width="100%" cellpadding="0" cellspacing="0" >
            <tr class="">
                <th>姓名</th>
                <th>学号</th>
				<th>模块</th>
                <th colspan="3"><center>操&nbsp;&nbsp;作</center></th>
            </tr>
            <?php if(is_array($scholar_result)): $i = 0; $__LIST__ = $scholar_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>奖学金</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'scholar')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'scholar')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'scholar')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($innovation_result)): $i = 0; $__LIST__ = $innovation_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>创新项目</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'innovation')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'innovation')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'innovation')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($socialScholar_result)): $i = 0; $__LIST__ = $socialScholar_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>社会奖学金</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'social_scholar')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'social_scholar')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'social_scholar')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<?php if(is_array($competition_result)): $i = 0; $__LIST__ = $competition_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>大赛获奖</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'competition')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'competition')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'competition')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($party_result)): $i = 0; $__LIST__ = $party_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>党员积极分子</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'party')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'party')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'party')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($insurance_result)): $i = 0; $__LIST__ = $insurance_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>医疗保险</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'insurance')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'insurance')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'insurance')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($granting_result)): $i = 0; $__LIST__ = $granting_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>助学金</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'granting')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'granting')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'granting')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($loan_result)): $i = 0; $__LIST__ = $loan_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>助学贷款</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'loan')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'loan')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'loan')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($graduation_result)): $i = 0; $__LIST__ = $graduation_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>毕业去向</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'graduation')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'graduation')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'graduation')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php if(is_array($punish_result)): $i = 0; $__LIST__ = $punish_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$model): ++$i;$mod = ($i % 2 )?><tr class="">
                <td><?php echo ($model["stu_name"]); ?></td>
                <td><?php echo ($model["stu_num"]); ?></td>
				<td>处分</td>
     		    <td><a href="javascript:viewModuleEditInfo(<?php echo ($model["id"]); ?>, 'punish')">查看详情</a></td>
     		    <td><button type="button" class="button1" onclick="passModuleConfirm(<?php echo ($model["id"]); ?>, 'punish')">通过</button></td>
     		    <td><button type="button" class="button2" onclick="nopassModuleConfirm(<?php echo ($model["id"]); ?>, 'punish')">不通过</button></td>    
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
        </table>
      <input type="hidden" name="admin_id" id="admin_id" />
    </form>
  </DIV>
</DIV>
</BODY>

</html>