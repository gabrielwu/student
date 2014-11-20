<?php
class  WorkAction extends Action{
public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("username")==null)
		{
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
public function index(){
	header("Content-Type:text/html; charset=utf-8");
	$this->checklogin();
	$loan = M("work");
	/*$grade = M("grade");
	$user_id = Session::get("user_id");
	$gradelist = $grade->where("assistant=$user_id")->select();*/
	$graduate_date = $_GET["graduate_date"];
	//$sch_year = $_GET["sch_year"];
	import("ORG.Util.Page");
	$where = "";
	$result = array(array());
	if($graduate_date!="")
	{
		$where = $where."graduate_date=$graduate_date";
	}
	/*if($stu_grade!=""&&$sch_year!="")
	{
		$where = $where." and sch_year=$sch_year";
	}
	if($stu_grade==""&&$sch_year!="")
	{*/
		/*for($i=0;$i<count($gradelist);$i++)
		{
			if($i==(count($gradelist)-1))
			{
				$temp = $gradelist[$i]["grade_year"];
				$where = $where." stu_grade=$temp";
			}else{
				$temp = $gradelist[$i]["grade_year"];
				$where = $where." stu_grade=".$temp."  or";
			}
		}
		if(!empty($gradelist))
		{
			$where = $where." and sch_year=$sch_year";
		}else{
			$where = $where." sch_year=$sch_year";
		}*/
		
	/*	$where = $where." sch_year=$sch_year";
	}*/
	if($where!="")
	{
		$count = $loan->where($where)->count();
		$page = new Page($count, 20);
		$show = $page->show();
		$result = $loan->where($where)->limit($page->firstRow.",".$page->listRows)->order("stu_grade desc ,stu_class asc")->select();
		$this->assign("result",$result);
		$this->assign("page",$show);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}else{
		$date =  date("Y");
		//$where = "stu_grade=$date";
		$count = $loan->count();
		$page = new Page($count, 20);
		$show = $page->show();
		$result = $loan->limit($page->firstRow.",".$page->listRows)->order("stu_grade desc ,stu_class asc")->select();
		$this->assign("result",$result);
		$this->assign("page",$show);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	}
	/*public function changegrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$grant = M("grantes");
		$stu_num = $_GET["stu_num"];
		$result = $grant->where("stu_num=$stu_num")->select();
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updategrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$grant = M("grantes");
		$stu_num = $_POST["stu_num"];
		$sch_level = $_POST["sch_level"];
		$data = array();
		$data["sch_level"] = $sch_level;
		if($grant->where("stu_num=$stu_num")->save($data))
		{
			$this->redirect("Grant/index", "",2,"数据修改成功！！！");
		}else{
			$this->redirect("Grant/index", "",2,"数据修改失败！！！");
		}
	}
	public function deletegrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$grant = M("grantes");
		$stu_num = $_POST["stu_num"];
		if($grant->where("stu_num=$stu_num")->delete())
		{
			$this->redirect("Grant/index", "",2,"数据删除成功！！！");
		}else{
			$this->redirect("Grant/index", "",2,"数据删除失败！！！");
		}
	}*/
	public function inputstream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function uploadfile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.UploadFile");
			$upload = new UploadFile();
			$upload->maxSize = 3145728;
			$upload->allowExts = array("xls");
			if(!$upload->upload("upload/grant/")){
				$this->error($upload->getErrorMsg());
			}else{
				$info = $upload->getUploadFileInfo();
			}
			ini_set('memory_limit', '200M'); 
			require_once './ThinkPHP/Vendor/PHPExcel.php';
			require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
			require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
			$filename=$info[0]["savename"];//获取上传后的文件名
			$uploadfile="upload/grant/$filename";
			$objReader  = PHPExcel_IOFactory::createReader('Excel5');
			$objPHPExcel = $objReader->load($uploadfile); 
			$sheet = $objPHPExcel->getSheet(0); 
			$highestRow = $sheet->getHighestRow(); // 取得总行数 
			$highestColumn = $sheet->getHighestColumn(); // 取得总列数
			$data = array();
			$grant = M("work");
			$count = 0;
			for($i=2;$i<=$highestRow;$i++)
			{
				$data["stu_num"] = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
				$data["stu_name"] = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				$data["stu_grade"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				$data["stu_class"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				$data["workplace"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				$data["postid"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				$data["stu_tel"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				$data["graduate_date"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
				if($grant->add($data))
				{
					$count++;
						
				}else{
					echo $grant->getLastSql()."词条信息插入失败！！！";
				}
			}
		
			$count++;
			if($count==$highestRow)
			{
				$count--;
				echo "<script>alert('所有数据全部导入成功，此次导入数据量为".$count."条！！！')</script>";
				unlink($uploadfile);
			}
			//print_r($data);
			$this->redirect("Work/index", "");
	}
	public function outputstream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public  function downdatafile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		ini_set('memory_limit', '200M'); 
		require_once "./ThinkPHP/Vendor/PHPExcel.php"; 
		require "./ThinkPHP/Vendor/PHPExcel/Writer/Excel5.php";
		$time = time();
		$outputFileName = "$time.xls";
		$objExcel = new PHPExcel(); 
		$objExcel->setActiveSheetIndex(0);   //建立一个sheet表
		$objActSheet = $objExcel->getActiveSheet();  //获取当前的sheet表
		$objActSheet->setCellValue('A1',"学号");
		$objStyleN6 = $objActSheet->getStyle('A1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('B1',"姓名");
		$objStyleN6 = $objActSheet->getStyle('B1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('C1',"学生年级");
		$objStyleN6 = $objActSheet->getStyle('C1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('D1',"学生班级");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"工作地详址");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"工作地邮编");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"联系电话");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"毕业时间");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$stu_grade = $_POST["stu_grade"];
		$graduate_date = $_POST["graduate_date"];
		$where = "";
		$result = array(array());
		if($stu_grade!="")
		{
			$where = $where." stu_grade=$stu_grade";
		}
		if($stu_grade!=""&&$graduate_date!="")
		{
			$where = $where." and graduate_date = '".$graduate_date."'";
		}
		if($stu_grade==""&&$graduate_date!="")
		{
			$where = $where." graduate_date = '".$graduate_date."'";
		}
		$grant = M("work");
		if($where!="")
		{
			$result = $grant->where($where)->order("stu_grade desc ,stu_class asc")->select();
		}else{
			$result = $grant->order("stu_grade desc ,stu_class asc")->select();
		}
		$count = 2;
		for($i=0;$i<count($result);$i++)
		{
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_grade"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["stu_class"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["workplace"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["postid"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["stu_tel"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["graduate_date"]);
			$count = $count+1;
		}
		$objWriter=new PHPExcel_Writer_Excel5($objExcel);
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header('Content-Disposition:inline;filename="'.$outputFileName.'"');
		header("Content-Transfer-Encoding: binary");
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Pragma: no-cache");
		$objWriter->save('php://output');
	}
	public function download(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.Http");
			$time = time();
			Http::download("upload/grant/1320996443.xls","$time.xls");
	}
}

?>