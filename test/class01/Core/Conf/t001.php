<?php 
/**
 * 系统配置文件
 */

$arr =  array(
    //配置项 => 配置值，不建议直接修改系统配置文件
    
    //默认配置
    'MODULE_VAR' => 'm',                                                                                    //get参数中模块参数名
    'CONTROLLER_VAR' => 'c',                                                                            //get参数中控制器参数名
    'ACTION_VAR' => 'a',                                                                                       //get参数中操作参数名
    
    //模块配置
    'DEFAULT_MODULE' => 'Home',
    
    //URL模式配置
    'URL_MODE' => 1,                                                                                                //0表示普通模式，1表示path_info模式，此配置项必须在应用级别以上的配置文件中设置
    
    //路由配置
    'URL_ROUTER_ON' => false,                                                                        //路由开关
    'URL_ROUTE_RULES' => array(),                                                               //路由规则，除了正则表达式常规转义外，还须将/转义

    // 数据库配置 
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
header('Content-type: text/css');
print_r($arr) ;

?>
