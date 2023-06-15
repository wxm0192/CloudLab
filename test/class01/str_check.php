<?php
    // {path}/autoloader.php
    function str_check($className) {
        $fileName = '';
        $namespace = '';

        // Sets the include path as the "src" directory
        $includePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'src';

        if (false !== ($lastNsPos = strripos($className, '\\'))) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        $fullFileName = $includePath . DIRECTORY_SEPARATOR . $fileName;
        printf("This is the Name space :    %s <br> ", $namespace );
        printf("This is the file name  :    %s <br> ", $fileName  );
        printf("This is the Full file name  :    %s <br> ", $fullFileName  );
        if (file_exists($fullFileName)) {
            require $fullFileName;
        } else {
            echo 'Class "'.$className.'" does not exist.';
        }
    }
    //spl_autoload_register('loadClass'); // Registers the autoloader

	str_check("src\Pierstoval\Tools\MyTool"); 
	//str_check("src/Pierstoval/Tools/MyTool"); 
?>

