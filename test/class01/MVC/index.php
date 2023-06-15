    <?php
    /**
     * MVC路由功能简单实现
     * @desc 简单实现MVC路由功能
     * $Author: Zhihua_W
     */

    //定义application路径
    define('APPPATH', trim(__DIR__));

    //获得请求地址
    $root = $_SERVER['SCRIPT_NAME'];
	echo "SCRIPT_NAME:".$_SERVER['SCRIPT_NAME']."<br>";
	echo "SCRIPT_NAME:".$root."<br>";
    $request = $_SERVER['REQUEST_URI'];
	echo "REQUEST_URI:".$_SERVER['REQUEST_URI']."<br>";
	echo "REQUEST_URI:".$request."<br>";

    $URI = array();

    //获得index.php 后面的地址
    $url = trim(str_replace($root, '', $request), '/');
    echo "URL is : ".$url."<br>"  ;

    //如果为空，则是访问根地址
    if (empty($url)) {
        //默认控制器和默认方法
        $class = 'index';
        $func = 'welcome';
    } else {
        $URI = explode('/', $url);
	print_r( $URI) ;
        //如果function为空 则默认访问index
        if (count($URI) < 2) {
            $class = $URI[0];
            $func = 'index';
        } else {
            $class = $URI[0];
            $func = $URI[1];
        }
    }

    //把class加载进来

    include(APPPATH . '/' . 'test/class01/application/controllers/' . $class . '.php');
	echo "<br>"."Class Name:  ".$class."<br>";
    //实例化
    $obj =ucfirst($class);

    call_user_func_array(
        //调用内部function
        array($obj, $func),
        //传递参数
        array_slice($URI, 2)
    );
    ?>
