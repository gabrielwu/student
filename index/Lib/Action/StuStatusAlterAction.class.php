<?php
 class StuStatusAlterAction extends Action{
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
		$user_id = Session::get("user_id");		
		import("ORG.Util.Page");

		
		$stu_name = $_POST['stu_name'];
		$type = $_POST['type'];
		$date = $_POST['date'];
		$stu_num = $_POST['stu_num'];
		$pre_stu_num = $_POST['pre_stu_num'];
		$college = $_POST['college'];
		$pre_college = $_POST['pre_college'];
		$grade = $_POST['grade'];
		$pre_grade = $_POST['pre_grade'];
		$class = $_POST['class'];
		$pre_class = $_POST['pre_class'];
	
		
		$condition['stu_name'] = $stu_name;
		$condition['type'] = $type;
		$condition['date'] = $date;
		$condition['stu_num'] = $stu_num;
		$condition['pre_stu_num'] = $pre_stu_num;
		$condition['college'] = $college;
		$condition['pre_college'] = $pre_college;
		$condition['grade'] = $grade;
		$condition['pre_grade'] = $pre_grade;
		$condition['class'] = $class;
		$condition['pre_class'] = $pre_class;
		$sqlWhere = "";		
		
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and ss.type like '$type%' ";
		}
		if ($date != '') {
		    $sqlWhere .= "and ss.date like '$date%' ";
		}
		if ($stu_num != '') {
		    $sqlWhere .= "and ss.stu_num like '$stu_num%' ";
		}
		if ($pre_stu_num != '') {
		    $sqlWhere .= "and ss.pre_stu_num like '$pre_stu_num%' ";
		}
		if ($college != '') {
		    $sqlWhere .= "and ss.college like '$college%' ";
		}
		if ($pre_college != '') {
		    $sqlWhere .= "and ss.pre_college like '$pre_college%' ";
		}
		if ($grade != '') {
		    $sqlWhere .= "and ss.grade like '$grade%' ";
		}
		if ($pre_grade != '') {
		    $sqlWhere .= "and ss.pre_grade like '$pre_grade%' ";
		}
		if ($class != '') {
		    $sqlWhere .= "and ss.class like '$class%' ";
		}
		if ($pre_class != '') {
		    $sqlWhere .= "and ss.pre_class like '$pre_class%' ";
		}

		
		$sqlFrom = "from student s, stu_status_alter ss where ss.stu_id=s.stu_id ";
		$sqlCount = "select count(ss.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select ss.*, s.stu_num, s.stu_name ". $sqlFrom. $sqlWhere. $sqlLimit;
		$model = M();
		$result = $model->query($sql);
		foreach($condition as $key=>$val) {   
            $page->parameter .= "$key=".$val."&";   
        }
			$show = $page->show();
			$this->assign("result",$result);
			$this->assign("page",$show);
			$this->assign("condition",$condition);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("app",__APP__);
			$this->assign("url",__URL__);
			$this->display();

	}
	public function changeStuStatusAlter(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select ss.*, s.stu_num, s.stu_id, s.stu_name ";
		$sqlFrom = "from student s, stu_status_alter ss where ss.stu_id=s.stu_id ";
		$sqlWhere = "and ss.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateStuStatusAlter(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("stu_status_alter");
		$student = M("student");
		$id = $_POST["id"];
		$stu_id = $_POST["stu_id"];
		$data['type'] = $_POST["type"];
		$data['date'] = $_POST["date"];
		$data['stu_num'] = $_POST["stu_num"];
		$data['pre_stu_num'] = $_POST["pre_stu_num"];
		$data['college'] = $_POST["college"];
		$data['pre_college'] = $_POST["pre_college"];
		$data['grade'] = $_POST["grade"];
		$data['pre_grade'] = $_POST["pre_grade"];
		$data['class'] = $_POST["class"];
		$data['pre_class'] = $_POST["pre_class"];
		if ($model->where("id=$id")->save($data)) {
		    $data_stu['stu_status'] =  $data['type'];
		    $model->where("stu_id=$stu_id")->save($data_stu);
			$this->redirect("StuStatusAlter/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("StuStatusAlter/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteStuStatusAlter(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("stu_status_alter");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("StuStatusAlter/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("StuStatusAlter/index", "",2,"数据删除失败！！！");
		}
	}
	public function inputStream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function uploadFile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 3145728;
		$upload->allowExts = array("xls");
		if(!$upload->upload("upload/stu_status_alter/")){
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/stu_status_alter/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$stu_status_alter = M("stu_status_alter");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
 
			for ($i = 2; $i <= $highestRow; $i++) {
				$stu_num = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();	
				$pre_stu_num = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();	
				foreach ($student as &$s) {
				    if ($s['stu_num'] == $stu_num || $s['stu_num'] == $pre_stu_num) {
					    $data['stu_id'] = $s['stu_id'];
					    $stu_name = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();
				        $data["type"] = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				        $data["date"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				        $data["stu_num"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["pre_stu_num"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["college"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				        $data["pre_college"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				        $data["grade"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
				        $data["pre_grade"] = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
				        $data["class"] = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
				        $data["pre_class"] = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
						if ($stu_status_alter->add($data)) {
						    $model_stu = M("student");
							$stu_id = $s['stu_id'];
						    // 根据不同变动情况更新学生表
							switch ($data["type"]) {
							    case "降级":
								    $data_stu['stu_num'] = $data["stu_num"];
									$data_stu['stu_grade'] = $data["stu_grade"];
									$data_stu['stu_class'] = $data["stu_class"];
								    break;
							    case "休学":
								    $data_stu['stu_status'] = $data["type"];
								    break;
							    case "退学":
								    $data_stu['stu_status'] = $data["type"];
								    break;
							    case "转入":
								    $data_stu['stu_num'] = $data["stu_num"];
									$data_stu['stu_grade'] = $data["stu_grade"];
									$data_stu['stu_class'] = $data["stu_class"];
								    break;
							    case "转出":
								    $data_stu['stu_status'] = $data["type"];
								    break;
							}
							$model_stu->where("stu_id=$stu_id")->save($data_stu);
					        $count++;
				        }
						break;
					}
			    }				
			}
			unlink($uploadFile);
			$total = $highestRow - 1;
			$fail = $total - $count;
			$msg = "全部数据共". $total. "条，成功导入". $count. "条，失败". $fail. "条！！！";
			echo "<script>alert('$msg')</script>";
			$this->redirect("StuStatusAlter/index", "", 0.01);
	}
	public function outputStream(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function downDataFile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		
		$stu_name = $_POST['stu_name'];
		$type = $_POST['type'];
		$date = $_POST['date'];
		$stu_num = $_POST['stu_num'];
		$pre_stu_num = $_POST['pre_stu_num'];
		$college = $_POST['college'];
		$pre_college = $_POST['pre_college'];
		$grade = $_POST['grade'];
		$pre_grade = $_POST['pre_grade'];
		$class = $_POST['class'];
		$pre_class = $_POST['pre_class'];
		
		ini_set('memory_limit', '200M'); 
		require_once "./ThinkPHP/Vendor/PHPExcel.php"; 
		require "./ThinkPHP/Vendor/PHPExcel/Writer/Excel5.php";
		$time = time();
		$outputFileName = "$time.xls";
		$objExcel = new PHPExcel(); 
		$objExcel->setActiveSheetIndex(0);   //建立一个sheet表
		$objActSheet = $objExcel->getActiveSheet();  //获取当前的sheet表
		$objActSheet->setCellValue('A1',"姓名");
		$objStyleN6 = $objActSheet->getStyle('A1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('B1',"变动类型");
		$objStyleN6 = $objActSheet->getStyle('B1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('C1',"变动时间");
		$objStyleN6 = $objActSheet->getStyle('C1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('D1',"学号");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"原学号");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"学院");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"原学院");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"年级");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"原年级");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('J1',"班级");
		$objStyleN6 = $objActSheet->getStyle('J1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('K1',"原班级");
		$objStyleN6 = $objActSheet->getStyle('K1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$count = 2;
		
		$sqlWhere = "";		
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and ss.type like '$type%' ";
		}
		if ($date != '') {
		    $sqlWhere .= "and ss.date like '$date%' ";
		}
		if ($stu_num != '') {
		    $sqlWhere .= "and ss.stu_num like '$stu_num%' ";
		}
		if ($pre_stu_num != '') {
		    $sqlWhere .= "and ss.pre_stu_num like '$pre_stu_num%' ";
		}
		if ($college != '') {
		    $sqlWhere .= "and ss.college like '$college%' ";
		}
		if ($pre_college != '') {
		    $sqlWhere .= "and ss.pre_college like '$pre_college%' ";
		}
		if ($grade != '') {
		    $sqlWhere .= "and ss.grade like '$grade%' ";
		}
		if ($pre_grade != '') {
		    $sqlWhere .= "and ss.pre_grade like '$pre_grade%' ";
		}
		if ($class != '') {
		    $sqlWhere .= "and ss.class like '$class%' ";
		}
		if ($pre_class != '') {
		    $sqlWhere .= "and ss.pre_class like '$pre_class%' ";
		}
		
		$sqlFrom = "from student s, stu_status_alter ss where ss.stu_id=s.stu_id ";	
		$sql = "select ss.*, s.stu_num, s.stu_name ". $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql);
		
		for($i=0;$i<count($result);$i++){
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["type"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["date"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["pre_stu_num"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["college"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["pre_college"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["grade"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["pre_grade"]);
			$objActSheet->setCellValue('J'.$count,$result[$i]["class"]);
			$objActSheet->setCellValue('K'.$count,$result[$i]["pre_class"]);
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
			Http::download("upload/tpl/stu_status_alter.xls","$time.xls");
	}
 }

?>