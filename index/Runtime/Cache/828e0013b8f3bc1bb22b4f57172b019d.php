<?php if (!defined('THINK_PATH')) exit();?><?php
define("THINK_PATH", "./ThinkPHP");
define("APP_NAME", "index");
define("APP_PATH", "./index");
require_once THINK_PATH.'/ThinkPHP.php';
App::run();
?>