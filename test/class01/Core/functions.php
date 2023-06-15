<?php
/**
 * File: 函数库文件
 * Author: WangJian
 */

/**
 * 命名空间自动加载到类
 * @param $classname  类名，类名中可以包含命名空间
 */
 function namespace_autoload($classname) {
     //获取命名空间
     $namespace = substr($classname, 0, strrpos($classname, "\\"));
     
     //获取不含命名空间的类名
     $class = substr($classname, strrpos($classname, "\\")+1);
     
     //把命名空间分离成数组
     $namespaces = explode("\\", $namespace);
     
     //判断第一级命名空间是否为框架核心命名空间
     $path = ($namespaces[0] == "Core" ? CORE_PATH : APP_PATH);
     
     //根据命名空间生成类文件所在目录
     foreach($namespaces as $space) {
         $path .= $space."/";
     }
      
     //引入类文件
     require_once $path.$class.".class.php";
 }
 
 
 /**
  * 获取或设置配置项，配置只对当前请求生效
  * @param $name  配置项名称
  * @param $value  配置值  若无此参数，则表示获取配置，有此参数，则表示设置配置
  * @return mixed   配置值
  */
 function C($name, $value = null) {
     global $configs;
     
     //判断是否设置了$value参数
     if($value !== null) {
         //有$value参数
         $configs[$name] = $value;
     }
     
     //返回配置值
     return $configs[$name];
 }
 
 
 /**
  * 
  */
 function config_load($file) {
     global $configs;
     
     //$configs = array_merge($configs, require_once ($file));
$conf02 =  array(
    //配置项 => 配置值，不建议直接修改系统配置文件

    //默认配置
    'MODULE_VAR' => 'm',                                                                                    //get参数中模块参数名
    'CONTROLLER_VAR' => 'c',                                                                            //get参数中控制器参数名
    'ACTION_VAR' => 'a',                                                                                       //get参数中操作参数名

    'DEFAULT_MODULE' => 'Home',

    'URL_MODE' => 1,                                                            //0表示普通模式，1表示path_info模式，此配
    'URL_ROUTER_ON' => false,                                                    //路由开关
    'URL_ROUTE_RULES' => array(),                                          //路由规则，除了正则表达式常规转义外，还须将/转义

    'DB_TYPE' => 'mysql',
    'DB_HOST' => 'localhost',
    'DB_PORT' => '3306',
    'DB_USER' => 'root',
    'DB_PWD' => '',
    'DB_NAME' => '',
    'DB_PREFIX' => '',
    'DB_CHARSET' => 'utf8',

    //模板引擎配置
    'TMPL_ENGINE_LEFT_DELIMITER' => '{',
    'TMPL_ENGINE_RIGHT_DELIMITER' => '}',
    'TMPL_EXT' => 'html',
    'CACHING' => false,
    'CACHE_LIFETIME' => 0,
);
     $configs = array_merge($configs, $conf02);

     //$configs = array_merge($configs, require_once $file); 2022-03-12
 }
