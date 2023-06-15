<?php
namespace Core;

//引入函数库文件
define("CORE_PATH","/root/app/test/class01/Core/");
define("APP_PATH","/root/app/test/class01/Core/");
//require_once 'functions.php';
require_once CORE_PATH.'functions.php';
//命名空间自动加载到类
spl_autoload_register("namespace_autoload");

//读取核心配置
$configs = array();
config_load(CORE_PATH.'/Conf/config.php');

//应用初始化
//Core\App::init();
App::init();

//应用执行
//Core\App::run();
//App::run();


?>
