<?php
 class InnovationAction extends Action{
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

		$stu_num = $_GET['stu_num'];
		$stu_name = $_GET['stu_name'];
		$project_name = $_GET['project_name'];
		$level = $_GET['level'];
		$award = $_GET['award'];
		$apply_date = $_GET['apply_date'];
		$win_date = $_GET['win_date'];
		$tutor = $_GET['tutor'];
		$members = $_GET['members'];
		$leader = $_GET['leader'];
		$college = $_GET['college'];
	
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['project_name'] = $project_name;
		$condition['level'] = $level;
		$condition['award'] = $award;
		$condition['apply_date'] = $apply_date;
		$condition['win_date'] = $win_date;
		$condition['tutor'] = $tutor;
		$condition['members'] = $members;
		$condition['leader'] = $leader;
		$condition['college'] = $college;
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($project_name != '') {
		    $sqlWhere .= "and i.project_name like '$project_name%' ";
		}
		if ($level != '') {
		    $sqlWhere .= "and i.level like '$level%' ";
		}
		if ($award != '') {
		    $sqlWhere .= "and i.award like '$award%' ";
		}
		if ($apply_date != '') {
		    $sqlWhere .= "and i.apply_date like '$apply_date%' ";
		}
		if ($win_date != '') {
		    $sqlWhere .= "and i.win_date like '$win_date%' ";
		}
		if ($tutor != '') {
		    $sqlWhere .= "and i.tutor like '$tutor%' ";
		}
		if ($members != '') {
		    $sqlWhere .= "and i.members like '%$members%' ";
		}
		if ($college != '') {
		    $sqlWhere .= "and i.college like '$college%' ";
		}
		
		$sqlFrom = "from student s, innovation i where i.stu_id=s.stu_id ";
		$sqlCount = "select count(i.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select i.*, s.stu_num, s.stu_name ". $sqlFrom. $sqlWhere. $sqlLimit;		

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
	public function changeInnovation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select i.*, s.stu_num, s.stu_name ";
		$sqlFrom = "from student s, innovation i where s.stu_id=i.stu_id ";
		$sqlWhere = "and i.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;	
		$result = $model->query($sql);
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateInnovation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("innovation");
		$id = $_POST["id"];
        $data['project_name'] = $_POST["project_name"];
		$data['level'] = $_POST["level"];
		$data['award'] = $_POST["award"];
		$data['apply_date'] = $_POST["apply_date"];
		$data['win_date'] = $_POST["win_date"];
		$data['tutor'] = $_POST["tutor"];
		$data['leader'] = $_POST["leader"];
		$data['members'] = $_POST["members"];
		$data['college'] = $_POST["college"];
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("Innovation/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Innovation/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteInnovation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("innovation");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Innovation/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("Innovation/index", "",2,"数据删除失败！！！");
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
		if(!$upload->upload("upload/innovation/")){
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/Innovation/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$Innovation = M("innovation");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
 
			for ($i = 2; $i <= $highestRow; $i++) {
				$stu_num = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();	
				foreach ($student as &$s) {
				    if ($s['stu_num'] == $stu_num) {
					    $data['stu_id'] = $s['stu_id'];
					    $stu_name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				        $data["project_name"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				        $data["apply_date"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["level"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["award"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				        $data["win_date"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
						$data["leader"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
						$data["members"] = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
						$data["tutor"] = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
						$data["college"] = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
						if ($Innovation->add($data)) {
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
			$this->redirect("Innovation/index", "", 0.01);
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
		
        $data['project_name'] = $_POST["project_name"];
		$data['level'] = $_POST["level"];
		$data['award'] = $_POST["award"];
		$data['apply_date'] = $_POST["apply_date"];
		$data['win_date'] = $_POST["win_date"];
		$data['tutor'] = $_POST["tutor"];
		$data['leader'] = $_POST["leader"];
		$data['members'] = $_POST["members"];
		$data['college'] = $_POST["college"];
		
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
		$objActSheet->setCellValue('C1',"项目名称");
		$objStyleN6 = $objActSheet->getStyle('C1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('D1',"申报时间");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"级别");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"获奖情况");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"获奖时间");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"组长");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"成员");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('J1',"指导教师");
		$objStyleN6 = $objActSheet->getStyle('J1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('K1',"依托学院");
		$objStyleN6 = $objActSheet->getStyle('K1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$count = 2;
		
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($project_name != '') {
		    $sqlWhere .= "and i.project_name like '$project_name%' ";
		}
		if ($level != '') {
		    $sqlWhere .= "and i.level like '$level%' ";
		}
		if ($award != '') {
		    $sqlWhere .= "and i.award like '$award%' ";
		}
		if ($apply_date != '') {
		    $sqlWhere .= "and i.apply_date like '$apply_date%' ";
		}
		if ($win_date != '') {
		    $sqlWhere .= "and i.win_date like '$win_date%' ";
		}
		if ($tutor != '') {
		    $sqlWhere .= "and i.tutor like '$tutor%' ";
		}
		if ($members != '') {
		    $sqlWhere .= "and i.members like '%$members%' ";
		}
		if ($college != '') {
		    $sqlWhere .= "and i.college like '$college%' ";
		}
		
		
		$sqlFrom = "from student s, innovation i where i.stu_id=s.stu_id ";	
		$sql = "select i.*, s.stu_num, s.stu_name ". $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql);
		
		for($i=0;$i<count($result);$i++){
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["project_name"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["apply_date"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["level"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["award"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["win_date"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["leader"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["members"]);
			$objActSheet->setCellValue('J'.$count,$result[$i]["tutor"]);
			$objActSheet->setCellValue('K'.$count,$result[$i]["college"]);
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
			Http::download("upload/tpl/innovation.xls","$time.xls");
	}
 }

?>