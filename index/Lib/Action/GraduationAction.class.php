<?php
 class GraduationAction extends Action{
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

		$stu_num = $_POST['stu_num'];
		$stu_name = $_POST['stu_name'];
		$stu_gender = $_POST['stu_gender'];
		$stu_nation = $_POST['stu_nation'];
		$stu_grade = $_POST['stu_grade'];
		$stu_duty = $_POST['stu_duty'];
		$date = $_POST['date'];
		$politics_status = $_POST['politics_status'];
		$type = $_POST['type'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$qq = $_POST['qq'];
		$receive_unit = $_POST['receive_unit'];
		$ru_phone = $_POST['ru_phone'];
		$ru_address = $_POST['ru_address'];
		$ru_email = $_POST['ru_email'];
		$post_info = $_POST['post_info'];
		$dad_phone = $_POST['dad_phone'];
		$mom_phone = $_POST['mom_phone'];
		
		$condition['stu_num'] = $stu_num;
		$condition['stu_name'] = $stu_name;
		$condition['stu_gender'] = $stu_gender;
		$condition['stu_nation'] = $stu_nation;
		$condition['stu_grade'] = $stu_grade;
		$condition['stu_duty'] = $stu_duty;
		$condition['date'] = $date;
		$condition['politics_status'] = $politics_status;
		$condition['type'] = $type;
		$condition['phone'] = $phone;
		$condition['email'] = $email;
		$condition['qq'] = $qq;
		$condition['receive_unit'] = $receive_unit;
		$condition['ru_phone'] = $ru_phone;
		$condition['ru_address'] = $ru_address;
		$condition['ru_email'] = $ru_email;
		$condition['dad_phone'] = $dad_phone;
		$condition['mom_phone'] = $mom_phone;
		
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
		    $sqlWhere .= "and s.stu_nation like '$stu_nation%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade = $stu_grade ";
		}
		if ($stu_duty != '') {
		    $sqlWhere .= "and s.stu_duty = $stu_duty ";
		}
		if ($date != '') {
		    $sqlWhere .= "and g.date like '$date%' ";
		}
		if ($politics_status != '') {
		    $sqlWhere .= "and g.politics_status like '$politics_status%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and g.type in $type ";
		}
		if ($phone != '') {
		    $sqlWhere .= "and g.phone like '$phone%' ";
		}
		if ($email != '') {
		    $sqlWhere .= "and g.email like '$email%' ";
		}
		if ($qq != '') {
		    $sqlWhere .= "and g.qq like '$qq%' ";
		}
		if ($receive_unit != '') {
		    $sqlWhere .= "and g.receive_unit like '$receive_unit%' ";
		}
		if ($ru_phone != '') {
		    $sqlWhere .= "and g.ru_phone like '$ru_phone%' ";
		}
		if ($ru_address != '') {
		    $sqlWhere .= "and g.ru_address like '$ru_address%' ";
		}
		if ($ru_email != '') {
		    $sqlWhere .= "and g.ru_email like '$ru_email%' ";
		}
		if ($dad_phone != '') {
		    $sqlWhere .= "and s.dad_phone like '$dad_phone%' ";
		}
		if ($mom_phone != '') {
		    $sqlWhere .= "and s.mom_phone like '$mom_phone%' ";
		}
		
		$sqlFrom = "from student s, graduation g where g.stu_id=s.stu_id ";	
		$sqlCount = "select count(g.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sqlSelect = "select g.*, ".
		             "case type when '1' then '考研' when '2' then '保研' when '3' then '工作' when '4' then '出国' when '5' then '公务员' end as type, ".
					 "s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
					 "s.stu_grade, s.dad_phone, s.mom_phone, s.stu_duty ";
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
	public function changeGraduation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$id = $_GET["id"];	
		$sqlSelect = "select g.*, s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
					 "s.stu_grade, s.dad_phone, s.mom_phone, s.stu_duty ";
		$sqlFrom = "from student s, graduation g where g.stu_id=s.stu_id ";	
		$sqlWhere = "and g.id=$id";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		
		$this->assign("result",$result[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateGraduation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("graduation");
		$id = $_POST["id"];
		$data['date'] = $_POST['date'];
		$data['politics_status'] = $_POST['politics_status'];
		$data['type'] = $_POST['type'];
		$data['phone'] = $_POST['phone'];
		$data['email'] = $_POST['email'];
		$data['qq'] = $_POST['qq'];
		$data['receive_unit'] = $_POST['receive_unit'];
		$data['ru_phone'] = $_POST['ru_phone'];
		$data['ru_address'] = $_POST['ru_address'];
		$data['ru_email'] = $_POST['ru_email'];
		$data['post_info'] = $_POST['post_info'];
		if($model->where("id=$id")->save($data)) {
			$this->redirect("Graduation/index", "",2,"数据修改成功！！！");
		} else {
			$this->redirect("Graduation/index", "",2,"数据修改失败！！！");
		}
	}
	public function deleteGraduation(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("graduation");
		$id = $_POST["id"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Graduation/index", "",2,"数据删除成功！！！");
		} else {
			$this->redirect("Graduation/index", "",2,"数据删除失败！！！");
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
		if(!$upload->upload("upload/graduation/")){
    		$this->error($upload->getErrorMsg());
		}else{
    		$info = $upload->getUploadFileInfo();
		}
		ini_set('memory_limit', '200M'); 
		require_once './ThinkPHP/Vendor/PHPExcel.php';
		require_once './ThinkPHP/Vendor/PHPExcel/IOFactory.php';
		require_once './ThinkPHP/Vendor/PHPExcel/Reader/Excel5.php';
		$filename=$info[0]["savename"];//获取上传后的文件名
		$uploadFile="upload/graduation/$filename";
		$objReader  = PHPExcel_IOFactory::createReader('Excel5');
		$objPHPExcel = $objReader->load($uploadFile); 
		$sheet = $objPHPExcel->getSheet(0); 
		$highestRow = $sheet->getHighestRow(); // 取得总行数 
		$graduation = M("graduation");
		$student_model = M("student");
		$model = M();
		$student = $model->query("select stu_id, stu_num from student");
		$count = 0;
 
			for ($i = 2; $i <= $highestRow; $i++) {
				$stu_num = $objPHPExcel->getActiveSheet()->getCell("A$i")->getValue();	
				foreach ($student as &$s) {
				    if ($s['stu_num'] == $stu_num) {
					    $data['stu_id'] = $s['stu_id'];
					    $stu_name = $objPHPExcel->getActiveSheet()->getCell("B$i")->getValue();
				        $data["politics_status"] = $objPHPExcel->getActiveSheet()->getCell("C$i")->getValue();
				        $type = $objPHPExcel->getActiveSheet()->getCell("D$i")->getValue();
						switch ($type) {
						    case '考研':
							    $data["type"] = 1;
								break;
							case 'b保研':
							    $data["type"] = 2;
								break;
							case '工作':
							    $data["type"] = 3;
								break;
							case '出国':
							    $data["type"] = 4;
								break;
							case '公务员':
							    $data["type"] = 5;
								break;
							default:
							    $data["type"] = 3;
								break;
						}
				        $data["date"] = $objPHPExcel->getActiveSheet()->getCell("E$i")->getValue();
				        $data["phone"] = $objPHPExcel->getActiveSheet()->getCell("F$i")->getValue();
						$data["email"] = $objPHPExcel->getActiveSheet()->getCell("G$i")->getValue();
				        $data["qq"] = $objPHPExcel->getActiveSheet()->getCell("H$i")->getValue();
						$data["receive_unit"] = $objPHPExcel->getActiveSheet()->getCell("I$i")->getValue();
				        $data["ru_phone"] = $objPHPExcel->getActiveSheet()->getCell("J$i")->getValue();
						$data["ru_address"] = $objPHPExcel->getActiveSheet()->getCell("K$i")->getValue();
				        $data["ru_email"] = $objPHPExcel->getActiveSheet()->getCell("L$i")->getValue();
						$data["post_info"] = $objPHPExcel->getActiveSheet()->getCell("M$i")->getValue();
						if ($graduation->add($data)) {
						    $stu_data['stu_status'] = '毕业';
							$stu_id = $data['stu_id'];
						    $student_model->where("stu_id=$stu_id")->save($stu_data);
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
			$this->redirect("Graduation/index", "", 0.01);
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
		
		$stu_num = $_GET['stu_num'];
		$stu_name = $_GET['stu_name'];
		$stu_gender = $_GET['stu_gender'];
		$stu_nation = $_GET['stu_nation'];
		$stu_grade = $_GET['stu_grade'];
		$stu_duty = $_GET['stu_duty'];
		$date = $_GET['date'];
		$politics_status = $_GET['politics_status'];
		$type = $_GET['type'];
		$phone = $_GET['phone'];
		$email = $_GET['email'];
		$qq = $_GET['qq'];
		$receive_unit = $_GET['receive_unit'];
		$ru_phone = $_GET['ru_phone'];
		$ru_address = $_GET['ru_address'];
		$ru_email = $_GET['ru_email'];
		$post_info = $_GET['post_info'];
		$dad_phone = $_GET['dad_phone'];
		$mom_phone = $_GET['mom_phone'];
		
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
		$objActSheet->setCellValue('E1',"年级");
		$objStyleN6 = $objActSheet->getStyle('E1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('F1',"在校职务");
		$objStyleN6 = $objActSheet->getStyle('F1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('G1',"毕业时间");
		$objStyleN6 = $objActSheet->getStyle('G1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('H1',"政治面貌");
		$objStyleN6 = $objActSheet->getStyle('H1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('I1',"毕业去向");
		$objStyleN6 = $objActSheet->getStyle('I1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('J1',"联系方式");
		$objStyleN6 = $objActSheet->getStyle('J1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('K1',"电子邮箱");
		$objStyleN6 = $objActSheet->getStyle('K1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('L1',"QQ");
		$objStyleN6 = $objActSheet->getStyle('L1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('M1',"用人单位(院校)");
		$objStyleN6 = $objActSheet->getStyle('M1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('N1',"单位电话");
		$objStyleN6 = $objActSheet->getStyle('N1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('O1',"单位地址");
		$objStyleN6 = $objActSheet->getStyle('O1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('P1',"单位邮箱");
		$objStyleN6 = $objActSheet->getStyle('P1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('Q1',"档案邮寄情况");
		$objStyleN6 = $objActSheet->getStyle('Q1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('R1',"父亲联系方式");
		$objStyleN6 = $objActSheet->getStyle('R1');
		$objAlignN6 = $objStyleN6->getAlignment();
		$objAlignN6->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
		$objActSheet->setCellValue('S1',"母亲联系方式");
		
		
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
		    $sqlWhere .= "and s.stu_nation like '$stu_nation%' ";
		}
		if ($stu_grade != '') {
		    $sqlWhere .= "and s.stu_grade = $stu_grade ";
		}
		if ($stu_duty != '') {
		    $sqlWhere .= "and s.stu_duty = $stu_duty ";
		}
		if ($date != '') {
		    $sqlWhere .= "and g.date like '$date%' ";
		}
		if ($politics_status != '') {
		    $sqlWhere .= "and g.politics_status like '$politics_status%' ";
		}
		if ($type != '') {
		    $sqlWhere .= "and g.type in $type ";
		}
		if ($phone != '') {
		    $sqlWhere .= "and g.phone like '$phone%' ";
		}
		if ($email != '') {
		    $sqlWhere .= "and g.email like '$email%' ";
		}
		if ($qq != '') {
		    $sqlWhere .= "and g.qq like '$qq%' ";
		}
		if ($receive_unit != '') {
		    $sqlWhere .= "and g.receive_unit like '$receive_unit%' ";
		}
		if ($ru_phone != '') {
		    $sqlWhere .= "and g.ru_phone like '$ru_phone%' ";
		}
		if ($ru_address != '') {
		    $sqlWhere .= "and g.ru_address like '$ru_address%' ";
		}
		if ($ru_email != '') {
		    $sqlWhere .= "and g.ru_email like '$ru_email%' ";
		}
		if ($dad_phone != '') {
		    $sqlWhere .= "and s.dad_phone like '$dad_phone%' ";
		}
		if ($mom_phone != '') {
		    $sqlWhere .= "and s.mom_phone like '$mom_phone%' ";
		}
		$sqlFrom = "from student s, graduation g where g.stu_id=s.stu_id ";	
		$sqlSelect = "select g.*, ".
		             "case type when '1' then '考研' when '2' then '保研' when '3' then '工作' when '4' then '出国' when '5' then '公务员' end as type, ".
					 "s.stu_num, s.stu_name, s.stu_gender, s.stu_nation, ".
					 "s.stu_grade, s.dad_phone, s.mom_phone, s.stu_duty ";
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;		
		$model = M();
		$result = $model->query($sql); 
		
		$count = 2;
		for ($i=0;$i<count($result);$i++) {
			$objActSheet->setCellValue('A'.$count,$result[$i]["stu_num"]);
			$objActSheet->setCellValue('B'.$count,$result[$i]["stu_name"]);
			$objActSheet->setCellValue('C'.$count,$result[$i]["stu_gender"]);
			$objActSheet->setCellValue('D'.$count,$result[$i]["stu_nation"]);
			$objActSheet->setCellValue('E'.$count,$result[$i]["stu_grade"]);
			$objActSheet->setCellValue('F'.$count,$result[$i]["stu_duty"]);
			$objActSheet->setCellValue('G'.$count,$result[$i]["date"]);
			$objActSheet->setCellValue('H'.$count,$result[$i]["politics_status"]);
			$objActSheet->setCellValue('I'.$count,$result[$i]["type"]);
			$objActSheet->setCellValue('J'.$count,$result[$i]["phone"]);
			$objActSheet->setCellValue('K'.$count,$result[$i]["email"]);
			$objActSheet->setCellValue('L'.$count,$result[$i]["qq"]);
			$objActSheet->setCellValue('M'.$count,$result[$i]["receive_unit"]);
			$objActSheet->setCellValue('N'.$count,$result[$i]["ru_phone"]);
			$objActSheet->setCellValue('O'.$count,$result[$i]["ru_address"]);
			$objActSheet->setCellValue('P'.$count,$result[$i]["ru_email"]);
			$objActSheet->setCellValue('Q'.$count,$result[$i]["post_info"]);
			$objActSheet->setCellValue('R'.$count,$result[$i]["dad_phone"]);
			$objActSheet->setCellValue('S'.$count,$result[$i]["mom_phone"]);
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
			Http::download("upload/tpl/graduation.xls","$time.xls");
	}
 }

?>