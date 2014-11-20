<?php
 class LoanAction extends Action{
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
		$apply_date = $_GET['apply_date'];
		$total = $_GET['total'];
		$tuition = $_GET['tuition'];
		$accommodation = $_GET['accommodation'];
		$stu_idnum = $_GET['stu_idnum'];
		$stu_nation = $_GET['stu_nation'];
		$stu_qqnum = $_GET['stu_qqnum'];
		$stu_email = $_GET['stu_email'];
		$stu_indate = $_GET['stu_indate'];
		$stu_grade = $_GET['stu_grade'];
		$stu_gradyear = $_GET['stu_gradyear'];
		$stu_addr = $_GET['stu_addr'];
		$stu_zipcode = $_GET['stu_zipcode'];
		$dad_name = $_GET['dad_name'];
		$dad_work_unit = $_GET['dad_work_unit'];
		$dad_phone = $_GET['dad_phone'];
		$mom_name = $_GET['mom_name'];
		$mom_work_unit = $_GET['mom_work_unit'];
		$mom_phone = $_GET['mom_phone'];
		$pay_off = $_GET['pay_off'];
		
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_gender'] = $stu_gender;
		$condition['apply_date'] = $apply_date;
		$condition['total'] = $total;
		$condition['tuition'] = $tuition;
		$condition['accommodation'] = $accommodation;
		$condition['stu_idnum'] = $stu_idnum;
		$condition['stu_nation'] = $stu_nation;
		$condition['stu_qqnum'] = $stu_qqnum;
		$condition['stu_email'] = $stu_email;
		$condition['stu_indate'] = $stu_indate;
		$condition['stu_grade'] = $stu_grade;
		$condition['stu_gradyear'] = $stu_gradyear;
		$condition['stu_addr'] = $stu_addr;
		$condition['stu_zipcode'] = $stu_zipcode;
		$condition['dad_name'] = $dad_name;
		$condition['dad_work_unit'] = $dad_work_unit;
		$condition['dad_phone'] = $dad_phone;
		$condition['mom_name'] = $mom_name;
		$condition['mom_work_unit'] = $mom_work_unit;
		$condition['mom_phone'] = $mom_phone;
		$condition['pay_off'] = $pay_off;
		
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
		if ($apply_date != '') {
		    $sqlWhere .= "and l.apply_date like '$apply_date%' ";
		}
		if ($total != '') {
		    $sqlWhere .= "and l.total = $total ";
		}
		if ($tuition != '') {
		    $sqlWhere .= "and l.tuition = $tuition ";
		}
		if ($accommodation != '') {
		    $sqlWhere .= "and l.accommodation = $accommodation ";
		}
		if ($stu_idnum != '') {
		    $sqlWhere .= "and s.stu_idnum like '$stu_idnum%' ";
		}
		if ($stu_nation != '') {
		    $sqlWhere .= "and s.stu_nation like '$stu_nation%' ";
		}
		if ($stu_qqnum != '') {
		    $sqlWhere .= "and s.stu_qqnum like '$stu_qqnum%' ";
		}
		if ($stu_email != '') {
		    $sqlWhere .= "and s.stu_email like '$stu_email%' ";
		}
		if ($stu_indate != '') {
		    $sqlWhere .= "and s.stu_indate like '$stu_indate%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade like '$stu_grade%' ";
		}
		if ($stu_gradyear != '') {
		    $sqlWhere .= "and s.stu_gradyear like '$stu_gradyear%' ";
		}
		if ($stu_addr != '') {
		    $sqlWhere .= "and concat(s.stu_homeaddr, s.stu_homeaddr2) like '$stu_addr%' ";
		}
		if ($stu_zipcode != '') {
		    $sqlWhere .= "and s.stu_zipcode like '$stu_zipcode%' ";
		}
		if ($dad_name != '') {
		    $sqlWhere .= "and s.dad_name like '$dad_name%' ";
		}
		if ($dad_phone != '') {
		    $sqlWhere .= "and s.dad_phone like '$dad_phone%' ";
		}
		if ($dad_work_unit != '') {
		    $sqlWhere .= "and s.dad_work_unit like '$dad_work_unit%' ";
		}
		if ($mom_name != '') {
		    $sqlWhere .= "and s.mom_name like '$mom_name%' ";
		}
		if ($mom_phone != '') {
		    $sqlWhere .= "and s.mom_phone like '$mom_phone%' ";
		}
		if ($mom_work_unit != '') {
		    $sqlWhere .= "and s.mom_work_unit like '$mom_work_unit%' ";
		}
		if ($pay_off != '') {
		    $sqlWhere .= "and l.pay_off = '$pay_off' ";
		}
		
		$sqlFrom = "from student s, loan l where l.stu_id=s.stu_id ";	
		$sqlCount = "select count(l.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sqlSelect = "select l.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
		             "s.stu_idnum, s.stu_qqnum, s.stu_email, s.stu_indate, s.stu_gradyear, ".
					 "s.stu_grade, s.stu_zipcode, s.dad_name, s.dad_phone, s.dad_work_unit, s.mom_name, s.mom_phone, s.mom_work_unit, ".
					 "concat(s.stu_homeaddr, s.stu_homeaddr2) stu_addr ";
        $sql = $sqlSelect. $sqlFrom. $sqlWhere. $sqlLimit;		
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
	public function changeLoan(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select l.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
		             "s.stu_idnum, s.stu_qqnum, s.stu_email, s.stu_indate, s.stu_gradyear, ".
					 "s.stu_grade, concat(s.stu_homeaddr, s.stu_homeaddr2) stu_addr ";
		$sqlFrom = "from student s, loan l where l.stu_id=s.stu_id ";	
		$sqlWhere = "and l.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateLoan(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("loan");
		$id = $_POST["id"];
		$data['apply_date'] = $_POST["apply_date"];
		$data['total'] = $_POST["total"];
		$data['tuition'] = $_POST["tuition"];
        $data['accommodation'] = $_POST["accommodation"];
		$data['pay_off'] = $_POST["pay_off"];
		if($model->where("id=$id")->save($data)) {
			$this->redirect("Loan/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Loan/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteLoan(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("Loan");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Loan/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("Loan/index", "",2,"数据删除失败！！！");
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
	public function uploadfile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 3145728;
		$upload->allowExts = array("xls");
		if(!$upload->upload("upload/loan/")){
    		$this->error($upload->getErrorMsg());
		}else{
    		$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/loan/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$loan = M("loan");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
 
			for ($i = 2; $i <= $highestRow; $i++) {
				$stu_num = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();	
				foreach ($student as &$s) {
				    if ($s['stu_num'] == $stu_num) {
					    $data['stu_id'] = $s['stu_id'];
					    $stu_name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				        $data["apply_date"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				        $data["total"] = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
				        $data["tuition"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["accommodation"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
						$data["pay_off"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
						if ($loan->add($data)) {
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
			$this->redirect("Loan/index", "", 0.01);
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
	public  function downDataFile(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		
		$stu_num = $_POST['stu_num'];
		$stu_name = $_POST['stu_name'];
		$stu_gender = $_POST['stu_gender'];
		$apply_date = $_POST['apply_date'];
		$total = $_POST['total'];
		$tuition = $_POST['tuition'];
		$accommodation = $_POST['accommodation'];
		$stu_idnum = $_POST['stu_idnum'];
		$stu_nation = $_POST['stu_nation'];
		$stu_qqnum = $_POST['stu_qqnum'];
		$stu_email = $_POST['stu_email'];
		$stu_indate = $_POST['stu_indate'];
		$stu_grade = $_POST['stu_grade'];
		$stu_gradyear = $_POST['stu_gradyear'];
		$stu_addr = $_POST['stu_addr'];
		$stu_zipcode = $_POST['stu_zipcode'];
		$dad_name = $_POST['dad_name'];
		$dad_work_unit = $_POST['dad_work_unit'];
		$dad_phone = $_POST['dad_phone'];
		$mom_name = $_POST['mom_name'];
		$mom_work_unit = $_POST['mom_work_unit'];
		$mom_phone = $_POST['mom_phone'];
		$pay_off = $_POST['pay_off'];
		
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
		$objActSheet->setCellValue('D1',"申请日期");
		$objStyleN6 = $objActSheet->getStyle('D1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('E1',"贷款总额");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"学费贷款");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"住宿费贷款");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"身份证号");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"民族");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('J1',"QQ");
		$objStyleN6 = $objActSheet->getStyle('J1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('K1',"电子邮箱");
		$objStyleN6 = $objActSheet->getStyle('K1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('L1',"入学年份");
		$objStyleN6 = $objActSheet->getStyle('L1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('M1',"年级");
		$objStyleN6 = $objActSheet->getStyle('M1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('N1',"毕业年份");
		$objStyleN6 = $objActSheet->getStyle('N1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('O1',"家庭住址");
		$objStyleN6 = $objActSheet->getStyle('O1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('P1',"邮编");
		$objStyleN6 = $objActSheet->getStyle('P1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('Q1',"父亲姓名");
		$objStyleN6 = $objActSheet->getStyle('Q1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('R1',"父亲联系方式");
		$objStyleN6 = $objActSheet->getStyle('R1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('S1',"父亲工作单位");
		$objStyleN6 = $objActSheet->getStyle('S1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('T1',"母亲姓名");
		$objStyleN6 = $objActSheet->getStyle('T1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('U1',"母亲联系方式");
		$objStyleN6 = $objActSheet->getStyle('U1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('V1',"母亲工作单位");
		$objStyleN6 = $objActSheet->getStyle('V1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('W1',"是否还清");
		$objStyleN6 = $objActSheet->getStyle('W1');
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
		if ($apply_date != '') {
		    $sqlWhere .= "and l.apply_date like '$apply_date%' ";
		}
		if ($total != '') {
		    $sqlWhere .= "and l.total = $total ";
		}
		if ($tuition != '') {
		    $sqlWhere .= "and l.tuition = $tuition ";
		}
		if ($accommodation != '') {
		    $sqlWhere .= "and l.accommodation = $accommodation ";
		}
		if ($stu_idnum != '') {
		    $sqlWhere .= "and s.stu_idnum like '$stu_idnum%' ";
		}
		if ($stu_nation != '') {
		    $sqlWhere .= "and s.stu_nation like '$stu_nation%' ";
		}
		if ($stu_qqnum != '') {
		    $sqlWhere .= "and s.stu_qqnum like '$stu_qqnum%' ";
		}
		if ($stu_email != '') {
		    $sqlWhere .= "and s.stu_email like '$stu_email%' ";
		}
		if ($stu_indate != '') {
		    $sqlWhere .= "and s.stu_indate like '$stu_indate%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade like '$stu_grade%' ";
		}
		if ($stu_gradyear != '') {
		    $sqlWhere .= "and s.stu_gradyear like '$stu_gradyear%' ";
		}
		if ($stu_addr != '') {
		    $sqlWhere .= "and concat(s.stu_homeaddr, s.stu_homeaddr2) like '$stu_addr%' ";
		}
		if ($stu_zipcode != '') {
		    $sqlWhere .= "and s.stu_zipcode like '$stu_zipcode%' ";
		}
		if ($dad_name != '') {
		    $sqlWhere .= "and s.dad_name like '$dad_name%' ";
		}
		if ($dad_phone != '') {
		    $sqlWhere .= "and s.dad_phone like '$dad_phone%' ";
		}
		if ($dad_work_unit != '') {
		    $sqlWhere .= "and s.dad_work_unit like '$dad_work_unit%' ";
		}
		if ($mom_name != '') {
		    $sqlWhere .= "and s.mom_name like '$mom_name%' ";
		}
		if ($mom_phone != '') {
		    $sqlWhere .= "and s.mom_phone like '$mom_phone%' ";
		}
		if ($mom_work_unit != '') {
		    $sqlWhere .= "and s.mom_work_unit like '$mom_work_unit%' ";
		}
		if ($pay_off != '') {
		    $sqlWhere .= "and l.pay_off = '$mom_work_unit' ";
		}
		$sqlFrom = "from student s, loan l where l.stu_id=s.stu_id ";	
		$sqlSelect = "select l.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
		             "s.stu_idnum, s.stu_qqnum, s.stu_email, s.stu_indate, s.stu_gradyear, ".
					 "s.stu_grade, s.stu_zipcode, s.dad_name, s.dad_phone, s.dad_work_unit, s.mom_name, s.mom_phone, s.mom_work_unit, ".
					 "concat(s.stu_homeaddr, s.stu_homeaddr2) stu_addr ";
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql); 
		
		$count = 2;
		for ($i=0;$i<count($result);$i++) {
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["apply_date"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["total"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["tuition"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["accommodation"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["stu_idnum"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["stu_nation"]);
			$objActSheet->setCellValue('J'.$count,$result[$i]["stu_qqnum"]);
			$objActSheet->setCellValue('K'.$count,$result[$i]["stu_email"]);
			$objActSheet->setCellValue('L'.$count,$result[$i]["stu_indate"]);
			$objActSheet->setCellValue('M'.$count,$result[$i]["stu_grade"]);
			$objActSheet->setCellValue('N'.$count,$result[$i]["stu_gradyear"]);
			$objActSheet->setCellValue('O'.$count,$result[$i]["stu_addr"]);
			$objActSheet->setCellValue('P'.$count,$result[$i]["stu_zipcode"]);
			$objActSheet->setCellValue('Q'.$count,$result[$i]["dad_name"]);
			$objActSheet->setCellValue('R'.$count,$result[$i]["dad_phone"]);
			$objActSheet->setCellValue('S'.$count,$result[$i]["dad_work_unit"]);
			$objActSheet->setCellValue('T'.$count,$result[$i]["mom_name"]);
			$objActSheet->setCellValue('U'.$count,$result[$i]["mom_phone"]);
			$objActSheet->setCellValue('V'.$count,$result[$i]["mom_work_unit"]);
			$objActSheet->setCellValue('W'.$count,$result[$i]["pay_off"]);
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
			Http::download("upload/tpl/loan.xls","$time.xls");
	}
 }

?>