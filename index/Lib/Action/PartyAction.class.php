<?php
 class PartyAction extends Action{
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
		$stu_gender = $_GET['stu_gender'];
		$stu_nation = $_GET['stu_nation'];
		$apply_date = $_GET['apply_date'];
		$ready_date = $_GET['ready_date'];
		$active_date = $_GET['active_date'];
		$full_member_date = $_GET['full_member_date'];
		$alter_info = $_GET['alter_info'];	
		$date = $_GET['date'];
	
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_gender'] = $stu_gender;
		$condition['stu_nation'] = $stu_nation;
		$condition['apply_date'] = $apply_date;
		$condition['ready_date'] = $ready_date;
		$condition['active_date'] = $active_date;
		$condition['full_member_date'] = $full_member_date;
		$condition['alter_info'] = $alter_info;
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
		if ($stu_nation != '') {
		    $sqlWhere .= "and p.stu_nation like '$stu_nation%' ";
		}
		if ($apply_date != '') {
		    $sqlWhere .= "and p.apply_date like '$apply_date%' ";
		}
		if ($ready_date != '') {
		    $sqlWhere .= "and p.ready_date like '$ready_date%' ";
		}
		if ($active_date != '') {
		    $sqlWhere .= "and p.active_date like '$active_date%' ";
		}
		if ($full_member_date != '') {
		    $sqlWhere .= "and p.full_member_date like '$full_member_date%' ";
		}
		if ($alter_info != '') {
		    $sqlWhere .= "and p.alter_info = '$alter_info' ";
		}
		
		$sqlFrom = "from student s, party p where p.stu_id=s.stu_id ";	
		$sqlCount = "select count(p.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select p.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation ". $sqlFrom. $sqlWhere. $sqlLimit;		
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
	public function changeParty(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select p.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation ";
		$sqlFrom = "from student s, party p where p.stu_id=s.stu_id ";
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
	public function updateParty(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("party");
		$id = $_POST["id"];
		$data['apply_date'] = $_POST["apply_date"];
		$data['active_date'] = $_POST["active_date"];
		$data['ready_date'] = $_POST["ready_date"];
        $data['full_member_date'] = $_POST["full_member_date"];
        $data['alter_info'] = $_POST["alter_info"];
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("Party/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Party/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteParty(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("party");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Party/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("Party/index", "",2,"数据删除失败！！！");
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
		if(!$upload->upload("upload/party/")){
    		$this->error($upload->getErrorMsg());
		}else{
    		$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/party/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$party = M("party");
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
				        $stu_nation = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["apply_date"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["active_date"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				        $data["ready_date"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				        $data["full_member_date"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
				        $data["alter_info"] = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
						if ($party->add($data)) {
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
			$this->redirect("Party/index", "", 0.01);
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
		$stu_nation = $_POST['stu_nation'];
		$apply_date = $_POST['apply_date'];
		$ready_date = $_POST['ready_date'];
		$active_date = $_POST['active_date'];
		$full_member_date = $_POST['full_member_date'];
		$alter_info = $_POST['alter_info'];	
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
		$objActSheet->setCellValue('D1',"民族");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"申请时间");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"确定为积极分子时间");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"入党时间");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"转正时间");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"组织转出情况");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($stu_gender != '') {
		    $sqlWhere .= "and s.stu_gender like '$stu_gender%' ";
		}
		if ($stu_nation != '') {
		    $sqlWhere .= "and p.stu_nation like '$stu_nation%' ";
		}
		if ($apply_date != '') {
		    $sqlWhere .= "and p.apply_date like '$apply_date%' ";
		}
		if ($ready_date != '') {
		    $sqlWhere .= "and p.ready_date like '$ready_date%' ";
		}
		if ($active_date != '') {
		    $sqlWhere .= "and p.active_date like '$active_date%' ";
		}
		if ($full_member_date != '') {
		    $sqlWhere .= "and p.full_member_date like '$full_member_date%' ";
		}
		if ($alter_info != '') {
		    $sqlWhere .= "and p.alter_info = '$alter_info' ";
		}
		$sqlFrom = "from student s, party p where p.stu_id=s.stu_id ";	
		$sql = "select p.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation ". $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql); 
		
		$count = 2;
		for ($i=0;$i<count($result);$i++) {
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["stu_nation"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["apply_date"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["active_date"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["ready_date"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["full_member_date"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["alter_info"]);
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