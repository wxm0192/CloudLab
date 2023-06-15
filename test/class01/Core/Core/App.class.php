<?php
/**
 * File: App.class.php 应用类文件，负责应用的初始化和执行
 * Athor  Wangjian
 */
 namespace Core;
class App {
    /**
     * 应用初始化，生成应用目录，读取应用配置
     * @return void
     */
    static public function init() {
	global $configs ;
	print_r($configs ) ;  // added at 2022-03-12
        //应用目录生成
        App::createDir();
        
        //读取应用配置文件
        config_load(APP_PATH.'Conf/config.php');
    }
    
    
    /**
     * 执行应用，初始化控制器，调用方法
     * @return void
     */
    static public function run() {
        //URL模式支持
        self::url_mode();
        
        //获取请求的模块名称并定义常量
        $module_name = @$_GET[C('MODULE_VAR')];
        define('MODULE_NAME', $module_name);
        
        //读取模块配置文件
        config_load(APP_PATH."$module_name/Conf/config.php");
        
        //获取请求的控制器名称并定义常量
        $controller_name = @$_GET[C('CONTROLLER_VAR')];
        $controller_name || $controller_name = 'Index';               //如果没有控制器参数，则赋值为默认控制器
        $controller_name .= 'Controller';
        define('CONTROLLER_NAME', $controller_name);                            //定义控制器名称常量
        
        //获取请求的方法名称并定义常量
        $action_name = @$_GET[C('ACTION_VAR')];
        $action_name || $action_name = 'index';
        define('ACTION_NAME', $action_name);                    //定义操作名称常量
        
        //实例化控制器
        $controller = "\\$module_name\\Controller\\$controller_name";
        $controller = new $controller();
        
        //调用操作
        $controller->$action_name();
    }
    
    static private function createDir() {
        //生成应用配置文件目录
        file_exists(APP_PATH.'Conf') || mkdir(APP_PATH.'Conf');
        //生成运行时目录
        file_exists(APP_PATH.'runtime') || mkdir(APP_PATH.'runtime');
        //生成模板编译目录
        file_exists(APP_PATH.'runtime/compile') || mkdir(APP_PATH.'runtime/compile');
        //生成模板缓存目录
        file_exists(APP_PATH.'runtime/cache') || mkdir(APP_PATH.'runtime/cache');
        //生成应用配置文件
        file_exists(APP_PATH.'/Conf/config.php') || file_put_contents(APP_PATH.'/Conf/config.php', "<?php\nreturn array(\n\t//配置项 => 配置值，具体有哪些配置项可参看系统配置文件\n);");
        //生成模块目录
        file_exists(APP_PATH.C('DEFAULT_MODULE')) || mkdir(APP_PATH.C('DEFAULT_MODULE'));
        //生成模块配置文件目录
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/Conf') || mkdir(APP_PATH.C('DEFAULT_MODULE').'/Conf');
        //生成MVC目录
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/Model') || mkdir(APP_PATH.C('DEFAULT_MODULE').'/Model');
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/View') || mkdir(APP_PATH.C('DEFAULT_MODULE').'/View');
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/Controller') || mkdir(APP_PATH.C('DEFAULT_MODULE').'/Controller');
        //生成默认控制器
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/Controller/IndexController.class.php') || file_put_contents(APP_PATH.C('DEFAULT_MODULE').'/Controller/IndexController.class.php', "<?php\nnamespace ".C('DEFAULT_MODULE')."\\Controller;\nuse Core\Controller;\n\nclass IndexController extends Controller {\n\tpublic function index() {\n\t\techo '<meta charset=utf-8>欢迎使用CorePHP';\n\t}\n}");
        //生成模块配置文件
        file_exists(APP_PATH.C('DEFAULT_MODULE').'/Conf/config.php') || file_put_contents(APP_PATH.C('DEFAULT_MODULE').'/Conf/config.php', "<?php\nreturn array(\n\t//配置项 => 配置值，具体有哪些配置项可参看系统配置文件\n);");
    }
    
    static private function url_mode() {
        //如果URL模式为path_info模式
        if(C('URL_MODE') == 1 && @$_SERVER['PATH_INFO']) {
            //获取path_info
            $path_info = trim($_SERVER['PATH_INFO'], '/');
            
            //path_info模式下路由支持
            $path_info = self::url_route($path_info);

        
            //将path_info分离成数组
            $path_infos = explode('/', $path_info);
        
            //获取模块名参数, 控制器名参数和操作名参数
            $_GET[C('MODULE_VAR')] = array_shift($path_infos);
            $_GET[C('CONTROLLER_VAR')] = array_shift($path_infos);
            $_GET[C('ACTION_VAR')] = array_shift($path_infos);
        
            //获取其他参数
            for($i = 0; $i < count($path_infos)-1; $i += 2) {
                $_GET[$path_infos[$i]] = $path_infos[$i+1];
            }
        }
    }
    
    
    /**
     * 路由功能，只在path_info模式下有效，路由从控制器名开始，模块名无法路由
     * @param string $path_info  PATH_INFO
     * @return string  返回路由之后的PATH_INFO
     */
    static private function url_route($path_info) {
        //将PATH_INFO分离成模块名和非模块名两部分
        $module_name = substr($path_info, 0, strpos($path_info, '/'));
        $not_module = substr($path_info, strpos($path_info, '/') + 1);
        
        //判断是否开启了路由功能
        if(C('URL_ROUTER_ON') === true) {
            //依次匹配路由规则, 直到匹配成功为止
            foreach(C('URL_ROUTE_RULES') as $key => $value) {
                //路由规则是否有$限定
                if(!preg_match('/\$\/$/', $key)) {
                    if(preg_match('/^'.trim($key, '/').'\//', $not_module)) {
                        return $module_name.'/'.preg_replace('/^'.trim($key, '/').'\//', $value.'/', $not_module);
                    }
                }
                
                if(preg_match('/^'.trim($key, '/').'$/', $not_module)) {
                    return $module_name.'/'.preg_replace('/^'.trim($key, '/').'$/', $value, $not_module);
                }
            }
        }
        
        return $path_info;
    }
}
