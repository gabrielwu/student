<?php
class FunctionAction extends Action{
	public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if (Session::get("username")==null) {
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
	public function queryAll(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		Session::start();
		$user_id = $_SESSION["user_id"];
		$manager_level = $_SESSION["manager_level"];
		/*
		Session::start();
		$manager_level = $_SESSION["manager_level"];
		$sql = "select * from grade";
		if ($manager_level == 1) {
		    $user_id = $_SESSION["user_id"];
			$sql = $sql." where assistant = $user_id";
		}
        $sql = $sql." order by grade_year asc";
		$gradeList
		*/
		$this->assign("current",__CURRENT__);
		$this->assign("manager_level",$manager_level);
		$this->assign("user_id",$user_id);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->display();
	}
	public function search(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		if ($_POST) {
		    $stu_name = $_POST["stu_name"];
			$stu_num = $_POST["stu_num"];
			$stu_grade = $_POST["stu_grade"];
			$stu_class = $_POST["stu_class"];
			$sqlColumn = "select stu_id, stu_num, stu_name, stu_grade, stu_class ";
			$sqlFrom = "from student ";
			$sqlWhere = "where 1=1 ";
			if ($stu_name != "") {
			    $sqlWhere .= "and stu_name like '$stu_name%' ";
			}
			if ($stu_num != "") {
			    $sqlWhere .= "and stu_num = '$stu_num' ";
			}
			if ($stu_grade != "") {
			    $sqlWhere .= "and stu_grade = '$stu_grade' ";
			}
			if ($stu_class != "") {
			    $sqlWhere .= "and stu_class = '$stu_class' ";
			}
			$sql = $sqlColumn. $sqlFrom. $sqlWhere;
			$result = M()->query($sql);
			$this->assign("result",$result);
		}
		$this->assign("url",__URL__);
		$this->assign("current",__CURRENT__);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("root",__ROOT__);
		$this->display();
	}
	public function studetail(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$level = $_SESSION["level"];
		$manager_level = $_SESSION["manager_level"];
		
		$stu_id = $_GET["stu_id"];
		if ($_GET["tab"]) {
		    $tab = $_GET["tab"];
		} else {
		    $tab = 0;
		}
		
		$student = M("student");
		$sresult = $student->where("stu_id = $stu_id")->find();
		//$sresult = $list[0];
		$gradeTeacher = "1";
		if ($level == "2") {
		    $grade = $sresult['stu_grade'];
			$assistant_id = M("grade")->where("grade_year=$grade")->getField("assistant");
			$user_id = $_SESSION["user_id"];
			if ($user_id != $assistant_id && $manager_level != 2) {
			    $gradeTeacher = "0";
			}
		}
		
		$model = M();
		
		$partyList = $model->query("select * from party where stu_id=$stu_id");
		$partyResult = $partyList[0];
		
		$sqlGraduation = "select *, ".
		                 "case type when '1' then '考研' when '2' then '保研' when '3' then '工作' ".
						 "when '4' then '出国' when '5' then '公务员' end as type from graduation where stu_id=$stu_id";
		$graduationList = $model->query($sqlGraduation);
		$graduationResult = $graduationList[0];
		
		$insuranceList = $model->query("select * from insurance where stu_id=$stu_id");
		$insuranceResult = $insuranceList[0];

		$socialScholarList = $model->query("select * from social_scholar where stu_id=$stu_id");
		
		$scholarList = $model->query("select * from scholar where stu_id=$stu_id");
		
		$competitionList = $model->query("select * from competition where stu_id=$stu_id");
		
		$punishList = $model->query("select * from punish where stu_id=$stu_id");
		
		$loanList = $model->query("select * from loan where stu_id=$stu_id");
		
		$grantList = $model->query("select * from granting where stu_id=$stu_id");
		
		$insuranceList = $model->query("select * from insurance where stu_id=$stu_id");		
		
		$innovationList = $model->query("select * from innovation where stu_id=$stu_id");	
		
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("result",$sresult);
		$this->assign("partyResult",$partyResult);
		$this->assign("graduationResult",$graduationResult);
		$this->assign("insuranceResult",$insuranceResult);
		$this->assign("grantResult",$grantList);
		$this->assign("loanResult",$loanList);
		$this->assign("socialScholarResult",$socialScholarList);
		$this->assign("scholarResult",$scholarList);
		$this->assign("competitionResult",$competitionList);
		$this->assign("punishResult",$punishList);
		$this->assign("innovationResult",$innovationList);
		$this->assign("password",Session::get("password"));
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->assign("level",$level);
		$this->assign("gradeTeacher",$gradeTeacher);
		$this->assign("tabSelected",$tab);
		$this->display();
	}
	
	/* 弃用
	public function uploadPicture() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_POST["moduleId"];
		$module = $_POST["module"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->uploadReplace=true;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $id;
		
		if (!$upload->upload("upload/$module/picture_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$newPic =  $info[0]["savename"];
		echo "$newPic";
	}*/
	public function deleteModule() {
	    Session::start();
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$level = $_SESSION["level"];
		$module = $_POST["module"];
		$id = $_POST["id"];
		if ($level != 2) {
		} else {
		}
	}
	public function updateModule() {
	    Session::start();
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$level = $_SESSION["level"];
		$module = $_POST["module"];
		foreach ($_POST as $key => $value) { 
		    if ($key != "module") {
			    $data["$key"] = $value;
			}
		} 
		if ($level != 2) {
			$model = M("$module". "_edit");
			if (array_key_exists('id', $data)) {
				$id = $data['id'];
				if ($model->where("id=$id")->save($data)) {
					echo "1";
				} else if ($model->add($data)) {
					echo "1";
				} else {
					echo "0";
				}
			} else {
				$stu_id = $data['stu_id'];
				if ($model->where("stu_id=$stu_id")->save($data)) {
					echo "1";
				} else if ($model->add($data)) {
					echo "1";
				} else {
					echo "0";
				}
			}
		} else {
		    $model = M("$module");
		    if (array_key_exists('id', $data)) {
				$id = $data['id'];
				if ($model->where("id=$id")->save($data)) {
					echo "2";
				} else if ($model->add($data)) {
					echo "2";
				} else {
					echo "3";
				}
			} else {
				$stu_id = $data['stu_id'];
				if ($model->where("stu_id=$stu_id")->save($data)) {
					echo "2";
				} else if ($model->add($data)) {
					echo "2";
				} else {
					echo "3";
				}
			}
		}
	}
	public function changephoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_GET["stu_id"];
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->assign("stu_id",$stu_id);
		$this->display();
	}
	public function changePicture($module, $id){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_GET["id"];
		$module = $_GET["module"];
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->assign("id",$id);
		$this->assign("module",$module);
		$this->display();
	}
	/*
	public function uploadphoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $stu_id;

		if (!$upload->upload("upload/ID_photo_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$data["stu_photo"] =  $info[0]["savename"];
		$new_photo =  $info[0]["savename"];
		
		$student = M("student");
		$result = $student->where("stu_id=$stu_id")->getField("stu_photo");
		
		unlink("upload/ID_photo/$result");
		$file = "upload/ID_photo_temp/$new_photo"; //旧目录
        $newfile = "upload/ID_photo/$new_photo"; //新目录
        copy($file,$newfile); //拷贝到新目录
		unlink($file);

        $flag = $student->where("stu_id=$stu_id")->save($data);
		//if ($flag) {
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"头像上传成功！！！");
		//} else {
		//	$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"头像上传失败！！！");
		//} 
	}
	*/
	public function uploadPicture() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_POST["id"];
		$module = $_POST["module"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->uploadReplace=true;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $id;
		
		if (!$upload->upload("upload/$module/picture_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$newPic =  $info[0]["savename"];
		$ext = ".". $info[0]["extension"];
		$model = M("$module");
		$model_edit = M("$module"."_edit");
		$model_edit_result = $model_edit->where("id=$id")->find();
		$model_result = $model->where("id=$id")->find();
		$isEditedResult =  M()->query("select count(id) as count from ". $module."_edit where id=$id");
		$isEdited = $isEditedResult[0]['count'];
		$data["photo_ext"] =  $ext;
		if ($isEdited != 0){
			if ($model_edit->where("id=$id")->save($data)) {
				$msg = "上传照片申请提交成功！";
			} else if ($ext == $model_edit_result["photo_ext"]) {
				$msg = "上传照片申请提交成功！！";
			} else {
			    $msg = "上传照片申请提交失败！";
			}
		}else {
		    $data = $model_result;
			$data["photo_ext"] =  $ext;
		    if ($model_edit->add($data)) {
			    $msg = "上传照片申请提交成功！！！";
	        } else {
		        $msg = "上传照片申请提交失败！";
		    }
		}
		echo "<script language= 'javascript'>";
		echo "alert('$msg');";
		echo "</script> ";
	}
	public function uploadphoto(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		import("ORG.Net.UploadFile");
		$upload = new UploadFile();
		$upload->maxSize = 10485760;
		$upload->allowExts = array("jpeg","JPEG","JPG","jpg","png");
		$upload->saveRule = $stu_id;
		$upload->uploadReplace = true;

		if (!$upload->upload("upload/ID_photo_temp/")){
			$this->error($upload->getErrorMsg());
		} else {
			$info = $upload->getUploadFileInfo();
		}
		$data["stu_photo"] =  $info[0]["savename"];
		$new_photo =  $info[0]["savename"];
		$model = M();
		$student = M("student");
		$student_edit = M("student_edit");
		$student_edit_result=$student_edit->where("stu_id=$stu_id")->find();
		$student_result=$student->where("stu_id=$stu_id")->find();
		$isEditedResult =  $model->query("select count(stu_id) as count from student_edit where stu_id=$stu_id");
		$isEdited = $isEditedResult[0]['count'];
		if ($isEdited != 0){
			if ($student_edit->where("stu_id=$stu_id")->save($data)) {
				$msg = "上传照片申请提交成功！";
			} else if ($data["stu_photo"] == $student_edit_result["stu_photo"]) {
				$msg = "上传照片申请提交成功！！";
			} else {
		        $msg = "上传照片申请提交失败！";
		    }
		}else {
		    $data = $student_result;
			$data["stu_photo"] =  $new_photo;
		    if ($student_edit->add($data)) {
			    $msg = "上传照片申请提交成功！！！";
	        } else {
		        $msg = "上传照片申请提交失败！";
		    }
		}
		echo "<script language= 'javascript'>";
		echo "alert('$msg');";
		echo "</script> ";
    }
	public function perdetail(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_GET["stu_id"];
		$student = M("student");
		$list = $student->where("stu_id = $stu_id")->select();
		$sresult = $list[0];
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("result",$sresult);
		$this->assign("password",Session::get("password"));
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function createadmin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$manager_level = Session::get("manager_level");
		if ($manager_level!=0) {
			echo "对不起您没有创建管理员用户的权限！！！";
		} else {
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();
		}
	}
	public function submitadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$username = $_POST["username"];
		$password = $_POST["password"];
		$manager_level = $_POST["manager_level"];
		$admin = M("admin");
		$data = array();
		$data["admin_name"] = $username;
		$data["admin_pw"] = sha1($password);
		$data["manager_level"] = $manager_level;
		if ($admin->add($data)) {
			$this->redirect("Function/createadmin","",2,"创建管理员用户成功！！！");
		} else {
			$this->redirect("Function/createadmin","",2,"创建管理员用户失败！！！");
		}
	}
	public function changepassword(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$password = Session::get("password");
		$this->assign("password",$password);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updatepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$newpassword = $_POST["newpassword"];
		$oldpassword = $_POST["password"];
        $level = $_SESSION["level"];
        if ($level == 2) {
			$admin_id =  Session::get("user_id");
			$admin = M("admin");
			$data = array();
			$data["admin_pw"] = sha1($newpassword);
			if($admin->where("admin_id=$admin_id")->save($data)) {
				Session::set("password", $newpassword);
				$this->assign("password",$newpassword);
				echo "<script>alert('密码修改成功！！！')</script>";
			} else {
			    $this->assign("password",$oldpassword);
			    echo "<script>alert('密码修改失败！！！')</script>";
		    }
        } else if ($level == 1) {
            $stu_id =  Session::get("user_id");
            $stu = M("student");
		    $data = array();
		    $data["stu_pw"] = sha1($newpassword);
		    if ($stu->where("stu_id=$stu_id")->save($data)) {
			    Session::set("password", $newpassword);
			    $this->assign("password",$newpassword);
			    echo "<script>alert('密码修改成功！！！')</script>";
		    } else {
			    $this->assign("password",$oldpassword);
			    echo "<script>alert('密码修改失败！！！')</script>";
		    }
        } else {
            $stu_id =  Session::get("user_id");
            $work = M("work");
		    $data = array();
		    $data["stu_pw"] = sha1($newpassword);
		    if ($work->where("stu_id=$stu_id")->save($data)) {
			    Session::set("password", $newpassword);
			    $this->assign("password",$newpassword);
			    echo "<script>alert('密码修改成功！！！')</script>";
		    } else {
		    	$this->assign("password",$oldpassword);
			    echo "<script>alert('密码修改失败！！！')</script>";
		    }
        }
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display("changepassword");
	}
	public function managerlist(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Util.Page");
		$admin = M("admin");
		$count = $admin->count("admin_id");
		$page = new Page($count, 10);
		$show = $page->show();
		$list = $admin->limit($page->firstRow.",".$page->listRows)->select();
		$this->assign("list",$list);
		$this->assign("page",$show);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function updateadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$admin = M("admin");
		$admin_id = $_POST["admin_id"];
		$list = $admin->where("admin_id=$admin_id")->select();
		$this->assign("list",$list[0]);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function submitupdateadmin(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$admin = M("admin");
		$admin_id = $_POST["admin_id"];
		$admin_name = $_POST["username"];
		$admin_pw = sha1($_POST["password"]);
		$manager_level = $_POST["manager_level"];
		$data = array();
		$data["admin_name"] = $admin_name;
		$data["admin_pw"] = $admin_pw;
		$data["manager_level"] = $manager_level;
		$admin->where("admin_id=$admin_id")->save($data);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->redirect("Function/managerlist", "",2,"数据修改成功！！！");
	}
	public function stuchangepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		$this->assign("stu_id",$stu_id);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function stupdatepassword(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$stu_id = $_POST["stu_id"];
		$newpassword = $_POST["newpassword"];
		$student = M("student");
		$data = array();
		$data["stu_pw"] = sha1($newpassword);
		if ($student->where("stu_id=$stu_id")->save($data)) {
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"学生密码更新成功！！！");
		} else{
			$this->redirect("Function/studetail", array("stu_id"=>$stu_id),2,"学生密码更新失败！！！");
		}
	}
    public function confirmStuInfo(){//待审核学生信息   权限问题？
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();		
		$student_edit=M("student_edit");//创建更新表实例
		$where = "";
			$count = $student_edit->count();//统计记录数
			if ($count == 0) {
				$show="<br/><center>没有要审核的项目！！</center>";
			}
			$result = $student_edit->select();
			$this->assign("result",$result);
			$this->assign("length",count($result));
			$this->assign("admin",$_SESSION["username"]);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();
	}
	public function confirmModuleInfo(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();	
        $model = M();
		
		$sqlCommon = "select s.stu_num, s.stu_name, me.id from student s,";
		$sqlWhere = "where s.stu_id=m.stu_id and m.id=me.id";
		
		$sqlCompetition = $sqlCommon. "competition_edit me, competition m ". $sqlWhere;
		$sqlGraduation = $sqlCommon. "graduation_edit me, graduation m ". $sqlWhere;
		$sqlGranting = $sqlCommon. "granting_edit me, granting m ". $sqlWhere;
		$sqlInsurance = $sqlCommon. "insurance_edit me, insurance m ". $sqlWhere;
		$sqlLoan = $sqlCommon. "loan_edit me, loan m ". $sqlWhere;
		$sqlParty = $sqlCommon. "party_edit me, party m ". $sqlWhere;
		$sqlPunish = $sqlCommon. "punish_edit me, punish m ". $sqlWhere;
		$sqlScholar = $sqlCommon. "scholar_edit me, scholar m ". $sqlWhere;
		$sqlSocialScholar = $sqlCommon. "social_scholar_edit me, social_scholar m ". $sqlWhere;
		$sqlInnovation = $sqlCommon. "innovation_edit me, innovation m ". $sqlWhere;
		//echo $sqlInnovation;
        $competition_result = $model->query($sqlCompetition);	
		$graduation_result = $model->query($sqlGraduation);	
		$granting_result = $model->query($sqlGranting);	
		$insurance_result = $model->query($sqlInsurance);	
		$loan_result = $model->query($sqlLoan);	
		$party_result = $model->query($sqlParty);	
		$punish_result = $model->query($sqlPunish);	
		$scholar_result = $model->query($sqlScholar);
		$innovation_result = $model->query($sqlInnovation);
		//var_dump($innovation_result);
		$socialScholar_result = $model->query($sqlSocialScholar);	
			
			$this->assign("competition_result",$competition_result);
			$this->assign("graduation_result",$graduation_result);
			$this->assign("granting_result",$granting_result);
			$this->assign("loan_result",$loan_result);
			$this->assign("party_result",$party_result);
			$this->assign("punish_result",$punish_result);
			$this->assign("scholar_result",$scholar_result);
			$this->assign("innovation_result",$innovation_result);
			$this->assign("socialScholar_result",$socialScholar_result);
			$this->assign("admin",$_SESSION["username"]);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();
	}
	function viewModuleEditInfo(){//查看学生修改的详细信息
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		 
		$id = $_GET["id"];
		$module = $_GET["module"];
		$module_edit = M($module."_edit");
		$module_orig = M("$module");
		
		$model = M();
		if ($module != "graduation") {
		    $list_edit = $module_edit->where("id=$id")->find();
		    $list_orig = $module_orig->where("id=$id")->find();
		} else {
		    $sqlGraduation = "select *, ".
		                 "case type when '1' then '考研' when '2' then '保研' when '3' then '工作' ".
						 "when '4' then '出国' when '5' then '公务员' end as type "; 
			$list_edit = $model->query($sqlGraduation. "from graduation_edit where id=$id");
			$list_edit = $list_edit[0];
		    $list_orig = $model->query($sqlGraduation. "from graduation where id=$id");
			$list_orig = $list_orig[0];
		}
		
		$sql = "select s.stu_num, s.stu_name from student s,". $module. " m where m.stu_id=s.stu_id and m.id=$id";
		$student = $model->query($sql);
		$student_info = $student[0];
	 	foreach ($list_edit as $key=>$value){
		 	if($value == $list_orig[$key] && $key != "photo_ext"){
		 		$list_edit[$key]="";
		 	}
		}
		$this->assign("module", $module);
		$this->assign("list_edit", $list_edit);
		$this->assign("list", $list_orig);
		$this->assign("student", $student_info);
		$this->assign("admin",$_SESSION["username"]);
	    $this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display(); 
	}
	function viewEditInfo(){//查看学生修改的详细信息
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		 
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");
		$student = M("student");
		
		$list_edit = $student_edit->where("stu_id=$stu_id")->find();
		$list = $student->where("stu_id=$stu_id")->find();
		
	 	foreach ($list_edit as $key=>$value){
		 	if($value == $list[$key] && $key != "stu_photo"){
		 		$list_edit[$key]="";
		 	}
		}
		$this->assign("list_edit", $list_edit);
		$this->assign("list", $list);
		$this->assign("admin",$_SESSION["username"]);
	    $this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display(); 
	}
	function passModuleConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id = $_GET["id"];
		$module = $_GET["module"];
		$model_edit = M("$module". "_edit");
		$model = M("$module");
		
		$list_edit=$model_edit->where("id=$id")->find();
		$list = $model->where("id=$id")->find();	
		$photo = $id. $list['photo_ext'];
		$photo_edit = $id. $list_edit['photo_ext'];
		$diff['id'] = $id;
		foreach ($list_edit as $key=>$value){
		 	if($value != $list[$key] && $key != "stu_id" || $key == "photo_ext"){
		 		$diff[$key] = $value;
		 	}
		}
		if($model->where("id=$id")->save($diff) || $photo == $photo_edit){
			$model_edit->where("id=$id")->delete();
			$result = "操作成功！";
			if (file_exists("upload/$module/picture_temp/$photo_edit")) {
			    if (file_exists("upload/$module/picture/$photo")) {
				    unlink("upload/$module/picture/$photo");
				}
		        $file = "upload/$module/picture_temp/$photo_edit"; //旧目录
                $newfile = "upload/$module/picture/$photo_edit"; //新目录
                copy($file,$newfile); //拷贝到新目录
		        unlink($file);
			}
		} else {
		    $result = "操作失败！";
		}
		$this->redirect("confirmModuleInfo", "", 2, $result);
	}
	function passConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");
		$student = M("student");
		
		$list_edit=$student_edit->where("stu_id=$stu_id")->find();
		$list = $student->where("stu_id=$stu_id")->find();
		$photo = $list['stu_photo'];
		$photo_edit = $list_edit['stu_photo'];
		$diff['stu_id'] = $stu_id;
		foreach ($list_edit as $key=>$value) {
		 	if($value != $list[$key] &&  $key != "stu_pw" ||  $key == "stu_photo"){
		 		$diff[$key] = $value;
		 	}
		}
		if($student->where("stu_id=$stu_id")->save($diff) || $photo == $photo_edit){
		    if (file_exists("upload/ID_photo_temp/$photo_edit")) {
			    if (file_exists("upload/ID_photo/$photo")) {
				    unlink("upload/ID_photo/$photo");
				}
		        $file = "upload/ID_photo_temp/$photo_edit"; //旧目录
                $newfile = "upload/ID_photo/$photo_edit"; //新目录
                copy($file,$newfile); //拷贝到新目录
		        unlink($file);
			}
			$student_edit->where("stu_id=$stu_id")->delete();
			$result = "操作成功！";
		}else{
		    $result = "操作失败！";
		}
		$this->redirect("confirmStuInfo", "", 2, $result);
	}
	function nopassModuleConfirm(){//不通过审核，删除更新表记录
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id = $_GET["id"];
		$module = $_GET["module"];
		$module_edit = M("$module". "_edit");		
		if ($module_edit->where("id=$id")->delete()) {
		    $result = "操作成功！";
		} else {
		    $result = "操作失败！";
		}
		$this->redirect("confirmModuleInfo", "", 1, $result);
	}
	function nopassConfirm() {//不通过审核，删除更新表记录
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");		
		if ($student_edit->where("stu_id=$stu_id")->delete()) {
		    $result = "操作成功！";
		} else {
		    $result = "操作失败！";
		}
		$this->redirect("confirmStuInfo", "", 1, $result);
	}
	function passAllConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id_strs=$_GET["idstrs"];
		$id_strs=$id_strs.trim();
		$list_id=explode(" ",$id_strs);

		$student_edit=M("student_edit");
		$student=M("student");
		
		foreach($list_id as $stu_id){
			$list_edit = $student_edit->where("stu_id=$stu_id")->find();
		    $list = $student->where("stu_id=$stu_id")->find();
		    $photo = $list['stu_photo'];
		    $photo_edit = $list_edit['stu_photo'];
			$diff = array(array());
		    $diff['stu_id'] = $stu_id;
		    foreach ($list_edit as $key=>$value) {
		 	    if($value != $list[$key] &&  $key != "stu_pw" ||  $key == "stu_photo"){
		 		    $diff[$key] = $value;
		 	    }
		    }
		    if($student->where("stu_id=$stu_id")->save($diff) || $photo == $photo_edit){
		        if (file_exists("upload/ID_photo_temp/$photo_edit")) {
			        if (file_exists("upload/ID_photo/$photo")) {
				        unlink("upload/ID_photo/$photo");
				    }
		            $file = "upload/ID_photo_temp/$photo_edit"; //旧目录
                    $newfile = "upload/ID_photo/$photo_edit"; //新目录
                    copy($file,$newfile); //拷贝到新目录
		            unlink($file);
			    }
			    $student_edit->where("stu_id=$stu_id")->delete();
		    } else {
		    }
		}
		$this->redirect("confirmStuInfo","");
	}
	
	
	function nopassAllConfirm(){//批量不通过审核
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$id_strs=$_GET["idstrs"];
		$id_strs=$id_strs.trim();
	
		$list_id=explode(" ",$id_strs);//分割字符串

		$student_edit = M("student_edit");
		$student = M("student");
		
		foreach($list_id as $stu_id){
			$student_edit->where("stu_id=$stu_id")->delete();
		}
		
		$this->redirect("confirmStuInfo","");
	}
	
	/*
	function passConfirm(){
		Session::start();
		header("Content-Type:text/html;charset=utf-8");
		$this->checklogin();
		
		$stu_id = $_GET["stu_id"];
		$student_edit = M("student_edit");
		$student = M("student");
		
		$list_edit=$student_edit->where("stu_id=$stu_id")->find();
		$list = $student->where("stu_id=$stu_id")->find();
		if($student->where("stu_id=$stu_id")->save($list_update)){
			$student_update->where("stu_id=$stu_id")->delete();
		    $msg=M("msg_to_stu");//建系统消息表
		  
			$msgdata=array();
		   //$date=time();
		  // $date=$date->format("Y-m-d H:i:s");
			 $time=date('Y-m-d H:i:s');
		   $msgdata["time"]=$time;
			$msgdata["stu_id"]=$stu_id;
			
			$msgdata["content"]="修改操作已通过审核,你的个人信息已更新！";
			
			$msg->where("stu_id=$stu_id")->add($msgdata);
	
			$this->redirect("confirmStuInfo","");
		}else{
			//echo"操作失败！！！";
			//echo "{$stu_id}";
			//$this->redirect("confirmStuInfo","",2,"操作失败");
		}
	}
    public function confirmStuInfo(){//待审核学生信息   权限问题？
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();		
		$student_update=M("student_update");//创建更新表实例
		import("ORG.Util.Page");//用于分页，好强大
		$where = "";
		$result = array(array());//二维数组
		
		
			//$date =  date("Y");
			//$where = "stu_grade=$date";
			$count = $student_update->count();//统计记录数
			//echo"$count";
			$page = new Page($count, 10);
			$show = $page->show();
			if($show==null){
				$show="<br/><center>没有要审核的项目！！</center>";
			}
			$result = $student_update->limit($page->firstRow.",".$page->listRows)->order("stu_grade desc ,stu_class asc")->select();
			$this->assign("result",$result);
			$this->assign("length",count($result));
			$this->assign("admin",$_SESSION["username"]);
			$this->assign("page",$show);
			$this->assign("path",APP_PUBLIC_PATH);
			$this->assign("current",__CURRENT__);
			$this->assign("root",__ROOT__);
			$this->assign("url",__URL__);
			$this->display();

	}
	*/
}

?>