<?php
 class PunishAction extends Action{
    public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if (Session::get("username")==null) {
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
		$stu_gender = $_GET['stu_gender'];
		$type = $_GET['type'];
		$cause = $_GET['cause'];
		$can_cancel = $_GET['can_cancel'];
		$date = $_GET['date'];
	
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_gender'] = $stu_gender;
		$condition['type'] = $type;
		$condition['cause'] = $cause;
		$condition['can_cancel'] = $can_cancel;
		$condition['date'] = $date;
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($stu_gender != '') {
		    $sqlWhere .= "and s.stu_gender like '$stu_gender%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and p.type like '$type%' ";
		}
		if ($cause != '') {
		    $sqlWhere .= "and p.cause like '$cause%' ";
		}
		if ($can_cancel != '') {
		    $sqlWhere .= "and p.can_cancel = '$can_cancel' ";
		}
		if ($date != '') {
		    $sqlWhere .= "and p.date like '$date%' ";
		}
		
		$sqlFrom = "from student s, punish p where p.stu_id=s.stu_id ";	
		$sqlCount = "select count(p.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select p.*, s.stu_num, s.stu_name, s.stu_gender ". $sqlFrom. $sqlWhere. $sqlLimit;		
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
			$this->assign("url",__URL__);
			$this->display();

	}
	public function changePunish(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select p.*, s.stu_num, s.stu_name, s.stu_gender ";
		$sqlFrom = "from student s, punish p where p.stu_id=s.stu_id ";
		$sqlWhere = "and p.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updatePunish(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("punish");
		$id = $_POST["id"];
        $data['type'] = $_POST["type"];
		$data['cause'] = $_POST["cause"];
		$data['can_cancel'] = $_POST["can_cancel"];
		$data['date'] = $_POST["date"];
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("Punish/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Punish/index", "",2,"数据修改失败！！！");
		}
	}
	public function deletePunish(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("punish");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Punish/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("Punish/index", "",2,"数据删除失败！！！");
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
		if(!$upload->upload("upload/punish/")){
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/punish/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$punish = M("punish");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
 
			for ($i = 2; $i <= $highestRow; $i++) {
				$stu_num = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();	
				foreach ($student as &$s) {
				    if ($s['stu_num'] == $stu_num) {
					    $data['stu_id'] = $s['stu_id'];
					    $stu_name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				        $stu_gender = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				        $data["type"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["cause"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["date"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				        $data["can_cancel"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
						if ($punish->add($data)) {
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
			$this->redirect("Punish/index", "", 0.01);
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
		
		$stu_num = $_POST['stu_num'];
		$stu_name = $_POST['stu_name'];
		$stu_gender = $_POST['stu_gender'];
		$type = $_POST['type'];
		$cause = $_POST['cause'];
		$can_cancel = $_POST['can_cancel'];
		$date = $_POST['date'];
		
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
		$objActSheet->setCellValue('C1',"性别");
		$objStyleN6 = $objActSheet->getStyle('C1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('D1',"处分类型");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"原由");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"处分时间");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"是否撤销");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($stu_gender != '') {
		    $sqlWhere .= "and s.stu_gender like '$stu_gender%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and p.type like '$type%' ";
		}
		if ($cause != '') {
		    $sqlWhere .= "and p.cause like '$cause%' ";
		}
		if ($can_cancel != '') {
		    $sqlWhere .= "and p.can_cancel = '$can_cancel' ";
		}
		if ($date != '') {
		    $sqlWhere .= "and p.date like '$date%' ";
		}
		
		$sqlFrom = "from student s, punish p where p.stu_id=s.stu_id ";	
		$sql = "select p.*, s.stu_num, s.stu_name, s.stu_gender ". $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql);
		
		$count = 2;
		for($i=0;$i<count($result);$i++) {
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["type"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["cause"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["date"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["can_cancel"]);
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
			Http::download("upload/tpl/party.xls","$time.xls");
	}
 }

?>