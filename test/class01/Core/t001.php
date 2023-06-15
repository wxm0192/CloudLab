<?php
define("CORE_PATH","/root/app/test/class01/Core/");
define("APP_PATH","/root/app/test/class01/Core/");
$classname = "Core\Core\APP ";
 $namespace = substr($classname, 0, strrpos($classname, "\\"));
echo $namespace ; 

 $class = substr($classname, strrpos($classname, "\\")+1);
echo "\n"."This is Class Name :".$class."\n" ;

     //把命名空间分离成数组
     $namespaces = explode("\\", $namespace);
	print_r($namespaces) ;

     //判断第一级命名空间是否为框架核心命名空间
     $path = ($namespaces[0] == "Core" ? CORE_PATH : APP_PATH);
print_r( $path  ) ;

     //根据命名空间生成类文件所在目录
     foreach($namespaces as $space) {
         $path .= $space."/";
	echo "\n".$path."\n" ;

	}

	echo "\n"."Path is : ".$path."\n" ;
?>

