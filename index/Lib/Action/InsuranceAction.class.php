<?php
class InsuranceAction extends Action{
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
		$stu_grade = $_GET['stu_grade'];
		$stu_class = $_GET['stu_class'];
		$insu_beginyear = $_GET['insu_beginyear'];
		$insu_endyear = $_GET['insu_endyear'];
		$insu_amount = $_GET['insu_amount'];
		$insu_reducable = $_GET['insu_reducable'];
	
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_grade'] = $stu_grade;
		$condition['stu_class'] = $stu_class;
		$condition['insu_beginyear'] = $insu_beginyear;
		$condition['insu_endyear'] = $insu_endyear;
		$condition['insu_amount'] = $insu_amount;
		$condition['insu_reducable'] = $insu_reducable;
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade like '$stu_grade%' ";
		}
		if ($stu_class != '') {
		    $sqlWhere .= "and s.stu_class like '$stu_class%' ";
		}
		if ($insu_beginyear != '') {
		    $sqlWhere .= "and i.insu_beginyear like '$insu_beginyear%' ";
		}
		if ($insu_endyear != '') {
		    $sqlWhere .= "and i.insu_endyear like '$insu_endyear%' ";
		}
		if ($insu_amount != '') {
		    $sqlWhere .= "and i.insu_amount = '$insu_amount' ";
		}
		if ($insu_reducable != '') {
		    $sqlWhere .= "and i.insu_reducable = '$insu_reducable' ";
		}
		
		$sqlFrom = "from student s, insurance i where i.stu_id=s.stu_id ";
		$sqlCount = "select count(i.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select i.*, s.stu_num, s.stu_name, s.stu_grade , s.stu_class ". $sqlFrom. $sqlWhere. $sqlLimit;		

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
	public function changeInsurance(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		
		$id = $_GET["id"];	
		$sqlSelect = "select i.*, s.stu_num, s.stu_name, s.stu_grade , s.stu_class ";
		$sqlFrom = "from student s, insurance i where i.stu_id=s.stu_id ";
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
	public function updateInsurance(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("insurance");
		$id = $_POST["id"];
		$data['insu_beginyear'] = $_POST["insu_beginyear"];
		$data['insu_endyear'] = $_POST["insu_endyear"];
		$data['insu_amount'] = $_POST["insu_amount"];
        $data['insu_reducable'] = $_POST["insu_reducable"];
		if($model->where("id=$id")->save($data)) {
			$this->redirect("Insurance/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Insurance/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteInsurance(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("insurance");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Insurance/index", "",2,"数据删除成功！！！");
		}else{
			$this->redirect("Insurance/index", "",2,"数据删除失败！！！");
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
		if(!$upload->upload("upload/Insurance/")){
			$this->error($upload->getErrorMsg());
		}else{
			$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadfile="upload/Insurance/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadfile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$insurance = M("insurance");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
		
		for ($i = 2; $i <= $highestRow; $i++) {
			$stu_num = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();	
			foreach ($student as &$s) {
			    if ($s['stu_num'] == $stu_num) {
				    $data['stu_id'] = $s['stu_id'];
				    $stu_name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
					$data["insu_beginyear"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
					$data["insu_endyear"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
					$data["insu_amount"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
					$data["insu_reducable"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
					if ($insurance->add($data)) {
				        $count++;
			        }
					break;
			   }
		    }				
		}
		//unlink($uploadFile);
		$total = $highestRow - 1;
		$fail = $total - $count;
		$msg = "全部数据共". $total. "条，成功导入". $count. "条，失败". $fail. "条！！！";
		echo "<script>alert('$msg')</script>";
		$this->redirect("Insurance/index", "", 0.01);
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
		$stu_grade = $_POST['stu_grade'];
		$stu_class = $_POST['stu_class'];
		$insu_beginyear = $_POST['insu_beginyear'];
		$insu_endyear = $_POST['insu_endyear'];
		$insu_amount = $_POST['insu_amount'];
		$insu_reducable = $_POST['insu_reducable'];
		
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
		$objActSheet->setCellValue('E1',"参保年份");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"停保年份");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"参保金额");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"是否减免");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		
		$sqlWhere = "";		
		if ($stu_num != '') {
		    $sqlWhere .= "and s.stu_num like '$stu_num%' ";
		}
		if ($stu_name != '') {
		    $sqlWhere .= "and s.stu_name like '$stu_name%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade like '$stu_grade%' ";
		}
		if ($stu_class != '') {
		    $sqlWhere .= "and s.stu_class like '$stu_class%' ";
		}
		if ($insu_beginyear != '') {
		    $sqlWhere .= "and i.insu_beginyear like '$insu_beginyear%' ";
		}
		if ($insu_endyear != '') {
		    $sqlWhere .= "and i.insu_endyear like '$insu_endyear%' ";
		}
		if ($insu_amount != '') {
		    $sqlWhere .= "and i.insu_amount = '$insu_amount' ";
		}
		if ($insu_reducable != '') {
		    $sqlWhere .= "and i.insu_reducable = '$insu_reducable' ";
		}
		$sqlFrom = "from student s, insurance i where i.stu_id=s.stu_id ";	
		$sql = "select i.*, s.stu_num, s.stu_name, s.stu_grade , s.stu_class ". $sqlFrom. $sqlWhere;		
		$model = M();

		$result = $model->query($sql); 
		
		$count = 2;
		for($i=0;$i<count($result);$i++) {
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_grade"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["stu_class"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["insu_beginyear"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["insu_endyear"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["insu_amount"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["insu_reducable"]);
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
			Http::download("upload/tpl/insurance.xls","$time.xls");
	}
}

?>