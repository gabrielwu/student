<?php
 class AdvancedAction extends Action{
    public function checklogin(){
		Session::start();
		header("Content-Type:text/html; charset=utf-8");
		if(Session::get("username")==null){
			$this->redirect("Index/index", "",2,"还没有登录系统，无权访问！！！");
		}
	}
	public function insert() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		$data['type'] = $_POST['type'];
		
		$type = $_POST['type'];
		
		$model = M("advanced");
		if ($model->add($data)) {
			$this->redirect("Advanced/index/type/$type", "", 2, "数据添加成功！！！");
		} else {
			$this->redirect("Advanced/index/type/$type", "", 2, "数据添加失败！！！");
		}
	}
	public function update() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_POST['id'];
		$data['title'] = $_POST['title'];
		$data['content'] = $_POST['content'];
		
		$model = M("advanced");
		if ($model->where("id=$id")->save($data)) {
			$this->redirect("Advanced/view/id/$id", "", 2, "数据修改成功！！！");
		} else {
			$this->redirect("Advanced/view/id/$id", "", 2, "数据修改失败！！！");
		}
	}
	public function add() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$type = $_GET['type'];
		$title = '';
		switch ($type) {
		    case "1":
			    $title = "先进集体新建";
				break;
			case "2":
			    $title = "先进个人新建";
				break;
		}
		$this->assign("title",$title);
		$this->assign("type",$type);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function edit() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$id = $_GET['id'];
		$model = M("advanced");
		$result = $model->where("id=$id")->find();
		
		$type = $result['type'];
		$title = '';
		switch ($type) {
		    case "1":
			    $title = "先进集体编辑";
				break;
			case "2":
			    $title = "先进个人编辑";
				break;
		}
		$this->assign("title",$title);
		$this->assign("result",$result);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function view() {
	    header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
	    $id = $_GET['id'];
		$model = M("advanced");
		$result = $model->where("id=$id")->find();
		$type = $result['type'];
		$title = '';
		switch ($type) {
		    case "1":
			    $title = "先进集体";
				break;
			case "2":
			    $title = "先进个人";
				break;
		}
		$this->assign("result",$result);
		$this->assign("title",$title);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function index(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		import("ORG.Util.Page");
		$level = $_SESSION["level"];
		$user_id = Session::get("user_id");
		$type = $_GET['type'];
		$title = '';
		switch ($type) {
		    case "1":
			    $title = "先进集体";
				break;
			case "2":
			    $title = "先进个人";
				break;
		}
		$model = M("advanced");
		$list = $model->where("type=$type")->select();
		$page = new Page($count, 10);
		$show = $page->show();
		$this->assign("level",$level);
		$this->assign("list",$list);
		$this->assign("title",$title);
		$this->assign("type",$type);
		$this->assign("page",$show);
		$this->assign("path",APP_PUBLIC_PATH);
		$this->assign("current",__CURRENT__);
		$this->assign("root",__ROOT__);
		$this->assign("url",__URL__);
		$this->display();
	}
	public function delete(){
		header("Content-Type:text/html; charset=utf-8");
		$this->checklogin();
		$model = M("advanced");
		$id = $_POST["id"];
		$type = $_POST["type"];
		if ($model->where("id=$id")->delete()) {
			$this->redirect("Advanced/index/type/$type", "",1,"数据删除成功！！！");
		} else {
			$this->redirect("Advanced/index/type/$type", "",1,"数据删除失败！！！");
		}
	}
 }

?>