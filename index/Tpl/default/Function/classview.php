<?php 
 //session_start();
 $conn = mysql_connect("localhost","root","root") or die("链接数据库失败！！！");
 mysql_select_db("student",$conn) or die("未找到相应的数据库！！！");
 mysql_query("set names utf8");
 $sql = "select * from grade";
 //echo $manager_level = $_SESSION["manager_level"];
 /*$manager_level = $_GET["manager_level"];
 if($manager_level==1){
 	//$user_id = $_SESSION["user_id"];
	$user_id = $_GET["user_id"];
 	$sql = $sql." where assistant = $user_id";
 }
 */
 $sql = $sql." order by grade_year asc";
 $result = mysql_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link type="text/css" rel="stylesheet" href="css/ui.css" />
    
    <title>可视化查询班级信息</title>
</head>
<body>
    
          <div class="toolbar">
                <a class="toolbartab" href="../../../../index.php/Function/queryAll">综合查询</a>
                <a class="toolbartab" href="/student/index.php/Function/search">信息检索</a>
            </div>
            
            <div class="view">
                <div class="viewtitle"><img src="img/photo.png" alt="icon" />
                <a href="../../../../index.php/Function/queryAll">软件学院</a>
                </div>
                <?php 
                   while($temp = mysql_fetch_array($result))
                   {
                ?>
                
                <div>
                    <div class="graderow-title"><?php echo $temp["grade_year"];?>级</div>
                    <div class="graderow">
                    <?php 
                        $class_num = $temp["grade_classnum"];
                        $grade = $temp["grade_year"];
                        for($i=1;$i<=$class_num;$i++)
                        {
                    ?>
					<a href="studentview.php?grade=<?php echo $grade;?>&class=<?php echo $i;?>">
                        <div class="classfolder">
                            <?php echo $i;?>班
                        </div>
					</a>
                     <?php }?>
                    </div>
                </div>
                <?php }?>
                
            </div>
</body>
</html>