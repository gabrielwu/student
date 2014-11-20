<?php
 class GradeAction extends Action{
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

		$grade = $_GET['grade'];
		$name = $_GET['name'];
	
		$condition['grade'] = $grade;
		$condition['name'] = $name;
		$sqlWhere = "";		
		if ($grade != '') {
		    $sqlWhere .= "and g.grade_year like '$grade%' ";
		}
		if ($name != '') {
		    $sqlWhere .= "and a.admin_name like '$name%' ";
		}
		
		$sqlFrom = "from grade g, admin a where a.admin_id=g.assistant ";	
		$sqlCount = "select count(g.id) as count ". $sqlFrom. $sqlWhere;
		$totalCount = M();
		$countRs = $totalCount->query($sqlCount);
		$count = $countRs[0]['count'];	
		$page = new Page($count, 10);
		
		$sqlLimit = "limit $page->firstRow, $page->listRows";	
		$sql = "select g.grade_year as grade, g.grade_classnum, a.admin_name as name ". $sqlFrom. $sqlWhere. $sqlLimit;		
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
	public function change(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M();
		$grade = $_GET["grade"];
	
		$sqlSelect = "select a.admin_id, g.grade_year as grade, g.grade_classnum, a.admin_name as name ";
		$sqlFrom = "from grade g, admin a where a.admin_id=g.assistant ";
		$sqlWhere = "and g.grade_year=$grade";		
		$sql = $sqlSelect. $sqlFrom. $sqlWhere;			
		$result = $model->query($sql);
		$aList = M()->query("select admin_id, admin_name from admin where manager_level=1");
		$this->assign("result",$result[0]);
		$this->assign("aList",$aList);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function update(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("grade");
		$assistant = $_POST["assistant"]; 
		$grade = $_POST["grade"];
		$data['assistant'] = $assistant;
		if ($model->where("grade_year=$grade")->save($data)) {
			$this->redirect("Grade/index", "",1,"数据修改成功！！！");
		} else {
			$this->redirect("Grade/index", "",1,"数据修改失败！！！");
		}
	}
	public function delete(){
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
	
 }

?>