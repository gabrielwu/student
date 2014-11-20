<?php 
  $grade = $_GET["grade"];
  $class = $_GET["class"];
  $conn = mysql_connect("localhost","root","root") or die("链接数据库失败！！！");
  mysql_select_db("student",$conn) or die("未找到相应的数据库！！！");
  mysql_query("set names utf8");
  $sql = "select stu_id,stu_name,stu_photo from student where stu_grade=$grade and stu_class = $class";
  $result = mysql_query($sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link type="text/css" rel="stylesheet" href="css/ui.css" />
    <title>可视化查询班级信息</title>
    <style type="text/css">
    .studentrow {
        overflow: auto;
        zoom: 1;
        margin-top: 10px;
    }
    .studentimg {
        float: left;
        width: 110px;
        height: 170px;
        border: 1px solid #eee;
        margin-left: 10px;
        overflow: hidden;
    }
    .studentimg img {
        width: 96px;
        height: 128px;
        margin: 5px 0 0 7px;
    }
    .studentimg p {
        padding: 0;
        text-align: center;
        background: url(img/xsgl.png) no-repeat 8px;
    }
    .studentimg a {
    	padding-left: 0px;
        font-size: 12pt;
    }
    </style>
</head>
<body>
             <div class="toolbar">
                <a class="toolbartab" href="../../../../index.php/Function/queryAll">综合查询</a>
                <a class="toolbartab" href="/student/index.php/Function/search">信息检索</a>
            </div>
            <div class="view">
                <div class="viewtitle">
                	<img src="img/photo.png" alt="icon" />
	                <a href="../../../../index.php/Function/queryAll">软件学院</a> &gt;
	                <a href="../../../../index.php/Function/queryAll"><?php echo $grade;?>级</a> &gt;
	                <a href="../../../../index/Tpl/default/Function/studentview.php?grade=<?php echo $grade;?>&class=<?php echo $class;?>"><?php echo $class?>班</a>
            	</div>
                <div class="studentrow">
                <?php 
                   while($temp = mysql_fetch_array($result))
                   {
                   	   $stu_id = $temp["stu_id"];
                   	   $stu_name = $temp["stu_name"];
                   	   $stu_photo = $temp["stu_photo"];
                ?>
                    <div class="studentimg">
                        <div>
						    <a href="../../../../index.php/Function/studetail/stu_id/<?php echo $stu_id;?>">
							    <img src="../../../../upload/ID_Photo/<?php echo $stu_photo;?>"/>
								<p><?php echo $stu_name;?></p>
							</a>
                        </div>
                    </div>
                <?php }?>
                </div>
            </div>
</body>
</html>