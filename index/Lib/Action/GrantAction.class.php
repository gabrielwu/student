<?php
 class grantAction extends Action{
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
		$grant_name = $_GET['grant_name'];
		$level = $_GET['level'];
		$amount = $_GET['amount'];
		$date = $_GET['date'];
	
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_gender'] = $stu_gender;
		$condition['grant_name'] = $grant_name;
		$condition['level'] = $level;
		$condition['amount'] = $amount;
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
		if ($grant_name != '') {
		    $sqlWhere .= "and ss.competition_name like '$grant_name%' ";
		}
		if ($level != '') {
		    $sqlWhere .= "and ss.level like '$level%' ";
		}
		if ($amount != '') {
		    $sqlWhere .= "and ss.amount = $amount ";
		}
		if ($date != '') {
		    $sqlWhere .= "and ss.date like '$date%' ";
		}
		
		$sqlFrom = "from student s, granting ss where ss.stu_id=s.stu_id ";
		$sqlCount = "select count(ss.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select ss.*, s.stu_num, s.stu_name, s.stu_gender ". $sqlFrom. $sqlWhere. $sqlLimit;		

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
	public function changegrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select ss.*, s.stu_num, s.stu_name, s.stu_gender ";
		$sqlFrom = "from student s, granting ss where s.stu_id=s.stu_id ";
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
	public function updategrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("granting");
		$id = $_POST["id"];
        $data['grant_name'] = $_POST["grant_name"];
		$data['level'] = $_POST["level"];
		$data['amount'] = $_POST["amount"];
		$data['date'] = $_POST["date"];
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("grant/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("grant/index", "",2,"数据修改失败！！！");
		}
	}
	public function deletegrant(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("granting");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("grant/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("grant/index", "",2,"数据删除失败！！！");
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
		$uploadFile="upload/grant/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$grant = M("granting");
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
				        $data["grant_name"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["level"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["amount"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
				        $data["date"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
						if ($grant->add($data)) {
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
			$this->redirect("grant/index", "", 0.01);
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
		$grant_name = $_POST['grant_name'];
		$level = $_POST['level'];
		$amount = $_POST['amount'];
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
		$objActSheet->setCellValue('D1',"助学金名称");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"等级");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"金额");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"获助时间");
		$objStyleN6 = $objActSheet->getStyle('G1');
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
		if ($stu_gender != '') {
		    $sqlWhere .= "and s.stu_gender like '$stu_gender%' ";
		}
		if ($grant_name != '') {
		    $sqlWhere .= "and ss.competition_name like '$grant_name%' ";
		}
		if ($level != '') {
		    $sqlWhere .= "and ss.level like '$level%' ";
		}
		if ($amount != '') {
		    $sqlWhere .= "and ss.amount = $amount ";
		}
		if ($date != '') {
		    $sqlWhere .= "and ss.date like '$date%' ";
		}
		
		$sqlFrom = "from student s, granting ss where ss.stu_id=s.stu_id ";	
		$sql = "select ss.*, s.stu_num, s.stu_name, s.stu_gender ". $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql);
		
		for($i=0;$i<count($result);$i++){
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["grant_name"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["level"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["amount"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["date"]);
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
			Http::download("upload/tpl/grant.xls","$time.xls");
	}
 }

?>