<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action{
    public function index(){
        header("Content-Type:text/html; charset=utf-8");
        $this->assign("path",APP_PUBLIC_PATH);
        $this->assign("current",__CURRENT__);
        $this->assign("url",__URL__);
        $this->display("login");
    }
    public function right(){
    	header("Content-Type:text/html; charset=utf-8");
		$confirmStuCount = 0;
		$confirmCount = 0;
					
		$confirmStuCount += M("student_edit")->count();
		$confirmCount += M("competition_edit")->count();
		$confirmCount += M("graduation_edit")->count();
		$confirmCount += M("granting_edit")->count();
		$confirmCount += M("innovation_edit")->count();
		$confirmCount += M("insurance_edit")->count();
		$confirmCount += M("loan_edit")->count();
		$confirmCount += M("party_edit")->count();
		$confirmCount += M("punish_edit")->count();
		$confirmCount += M("scholar_edit")->count();
		$confirmCount += M("social_scholar_edit")->count();					

		$this->assign("confirmStuCount",$confirmStuCount);
		$this->assign("confirmCount",$confirmCount);
        $this->assign("path",APP_PUBLIC_PATH);
        $this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
        $this->assign("url",__URL__);
        $this->display();
    }
    public function checkuser() {
    	Session::start();
    	header("Content-Type:text/html; charset=utf-8");
    	$level = $_POST["level"];
    	$username = $_POST["username"];
    	$password = $_POST["password"];
    	if($level == 1) {
    		$student = M("student");
    		$stu_pw = $student->where("stu_num='$username'")->getField("stu_pw");
    		$stu_id = $student->where("stu_num='$username'")->getField("stu_id");
			$stu_name = $student->where("stu_num='$username'")->getField("stu_name");
			$stu_num = $student->where("stu_num='$username'")->getField("stu_num");
    		if($stu_pw!=null||$stu_pw!=""){
    			if($stu_pw == sha1($password)){
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("username",$username);
					Session::set("stu_name",$stu_name);
					Session::set("stu_num",$stu_num);
    				Session::set("user_id",$stu_id);
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
    				$this->display("index_s");
    			} else {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}
    		} else {
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
    	} else if($level == 2) {
    		$admin = M("admin");
    		$adminlist = $admin->where("admin_name='$username'")->select();
    		$admin_pw = $adminlist[0]["admin_pw"];
    		if($admin_pw!=null||$admin_pw!="") {
    			if($admin_pw == sha1($password)){
    				$admin_id = $adminlist[0]["admin_id"];
    				$manager_level = $adminlist[0]["manager_level"];
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("user_id",$admin_id);
    				Session::set("manager_level", $manager_level);
    				Session::set("username",$username);
					
					
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
					$this->assign("root",__ROOT__);
                    $this->assign("url",__URL__);
    				$this->display("index");
    			} else {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}
    		}else{
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
      	} else {
    		$student = M("student");
			$sha1Pw = sha1($password);
			$sqlWhere = "(stu_num='$username' or stu_name='$username' or stu_idnum='$username') and ".
			            "(stu_num='$password' or stu_pw='$sha1Pw' or stu_idnum='$password')";
			//$stu_pw = $student->where($sqlWhere)->getField("stu_pw");
			//$stu_id = $student->where($sqlWhere)->getField("stu_id");
			$sql = "select stu_id, stu_name, stu_num, stu_pw from student where ". $sqlWhere;
			$s = M()->query($sql);
			$stu_pw = $s[0]['stu_pw'];
			$stu_id = $s[0]['stu_id'];
			$stu_name = $s[0]['stu_name'];
			$stu_num = $s[0]['stu_num'];
			/*
    		$stu_pw = $student->where("stu_num=$username or stu_name=$username or stu_idnum=$username ")->getField("stu_pw");
    		$stu_id = $student->where("stu_num=$username or stu_name=$username or stu_idnum=$username ")->getField("stu_id");
    		$stu_idnum = $student->where("stu_num=$username or stu_name=$username or stu_idnum=$username ")->getField("stu_idnum");
			*/
    		if ($stu_pw!=null||$stu_pw!="") {
    			//if ($stu_pw == sha1($password)||$stu_pw == ($password)) {
    				Session::set("level",$level);
    				Session::set("password", $password);
    				Session::set("username",$username);
					Session::set("stu_name",$stu_name);
					Session::set("stu_num",$stu_num);
    				Session::set("user_id",$stu_id);
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
    				$this->display("index_g");
    			/*} else  {
    				$this->assign("path",APP_PUBLIC_PATH);
                    $this->assign("current",__CURRENT__);
                    $this->assign("url",__URL__);
                    $this->assign("loginerror","密码错误，登录失败！！！");
    				$this->display("login");
    			}*/
    		} else {
    			$this->assign("path",APP_PUBLIC_PATH);
                $this->assign("current",__CURRENT__);
                $this->assign("url",__URL__);
                $this->assign("loginerror","用户名错误，登录失败！！！");
                $this->display("login");
    		}
    	 }
    }
    public function logout(){
    	Session::start();
    	Session::clear();
    	Session::destroy();
    	header("Content-Type:text/html; charset=utf-8");
        $this->assign("path",APP_PUBLIC_PATH);
        $this->assign("current",__CURRENT__);
        $this->assign("url",__URL__);
        $this->display("login");
    	
    }
   }
?>