<?php
namespace Core;

class View {
    //模板变量
    private  $tpl_vars = array();
    
    //模板路径
    protected $tpl = '';
    
    //生成编译路径的函数，生成的路径不包含扩展名，可以使用多个方法，例如md5|strtolower相当于调用md5(strtolower())
    protected $compile_path_method = 'md5';
    
    //生成缓存路径的函数，生成的路径不包含扩展名，可以使用多个方法
    protected $cache_path_method = 'md5';
    
    //是否开启缓存功能
    protected $caching;
    
    //缓存时间
    protected $cache_lifetime;
    
    //nocache标签中的内容
    protected $nocache = array();
    
    //模板左右分隔符，为了方便进行模板编译，在需要转义的字符前添加\
    protected $left_deli;
    protected $right_deli;
    
    /**
     * 构造函数
     * @param string $tpl  模板文件路径
     */
    public function __construct($tpl) {
        //左右分隔符的初始化
        $this->left_deli = $this->getRegular(C('TMPL_ENGINE_LEFT_DELIMITER'));
        $this->right_deli = $this->getRegular(C('TMPL_ENGINE_RIGHT_DELIMITER'));
        
        //模板文件路径
        $this->tpl = $tpl;
        
        //缓存配置初始化
        $this->caching = C('CACHING');
        $this->cache_lifetime = C('CACHE_LIFETIME');
    }
    
    /**
     * 设置属性，可设置的属性有: caching, cache_lifetime, tpl
     * @param string $property  属性名
     * @param string $value  属性值
     */
    public function __set($property, $value) {
        if($property == 'caching' || $property == 'cache_lifetime' || $property == 'tpl') {
            $this->$property = $value;
        }
    }
    
    /**
     * 获取属性值，可获取的属性有: caching, cache_lifetime, tpl
     * @param string $property  属性名
     * @return mixed  返回对应的属性值
     */
    public function __get($property) {
    if($property == 'caching' || $property == 'cache_lifetime' || $property == 'tpl') {
            return $this->$property;
        }
    }
    
    
    /**
     * 给模板变量赋值
     * @param string $name  变量名
     * @param string $value  变量值
     */
    public function assign($name, $value) {
        $this->tpl_vars[$name] = $value;
    }
    
    /**
     * 渲染模板，并返回生成的html内容
     * @return string  返回生成的html内容
     */
    public function fetch() {
        //模板编译
        $this->compile($this->tpl);
        
        ob_start();
        include APP_PATH.'runtime/compile/'.$this->getCompilePath();
        $content = ob_get_contents();
        ob_end_clean();
        
        return $content;
    }
    
    /**
     * 输出模板
     * @param mixed $cache_id  缓存id
     */
    public function display($cache_id='') {
        //判断是否开启了缓存功能
        if($this->caching === true) {
            //判断缓存是否有效以及模板文件是否被修改
            if($this->isCached($cache_id)) {
                //如果缓存有效且模板文件未被修改，直接include缓存文件
                include(APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id));
                return;
            } else {
                //如果缓存失效，则生成缓存
                
                //获取渲染之后的html内容
                $content = $this->fetch();
                
                //输出模板           
                echo $content;
                
                //将缓存器信息写入缓存文件
                $content = "<!-- lifetime=".$this->cache_lifetime." -->\n".$content;
                
                //将nocache之间的部分替换回PHP代码
                $content = $this->backNocache($content);
                
                //写入
                file_put_contents(APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id), $content);              
                return;
            }
        }
        
        echo $this->fetch();
    }
    
    /**
     * 模板编译
     */
    protected function compile() {
        //如果文件修改了则重新编译
       if(!@filemtime(APP_PATH.'runtime/compile/'.$this->getCompilePath()) || @filemtime(APP_PATH.'runtime/compile/'.$this->getCompilePath()) < @filemtime($this->tpl)) {
            //读取模板文件
             $tpl_content = file_get_contents($this->tpl);
             
            //普通变量支持
            $tpl_content = $this->parseVars($tpl_content);
            
            //分支，循环等逻辑结构的支持
            $tpl_content = $this->parseLogic($tpl_content);
            
            //将nocache标签替换成html注释代码
            $tpl_content = $this->compileNocache($tpl_content);
               
            //定界符编译
            $tpl_content = $this->parseDelimiter($tpl_content);
            
            //获取nocache标签中的内容
            $this->nocache = $this->getNocacheContent($tpl_content);
            
            //将编译后的内容写入编译文件
            file_put_contents(APP_PATH.'runtime/compile/'.$this->getCompilePath(), $tpl_content);
       }
    }
    
    /**
     * 生成编译文件名
     * @return string   编译文件名
     */
    protected function getCompilePath() {
        $methods = explode('|', $this->compile_path_method);
        
        $compile_path = $this->tpl;
        for($i = count($methods)-1; $i >= 0; $i--) {
            $method = $methods[$i];
            $compile_path = $method($compile_path);
        }
        
        return $compile_path.'.php';
    }
    
    /**
     * 生成缓存文件名
     * @param mixed $cache_id  缓存id
     * @return string  缓存文件名
     */
    protected function getCachePath($cache_id) {
        $methods = explode('|', $this->cache_path_method);
        
        $cache_path = $this->tpl.$cache_id;
        for($i = count($methods)-1; $i >= 0; $i--) {
            $method = $methods[$i];
            $cache_path = $method($cache_path);
        }
        
        return $cache_path;
    }
    
    /**
     * 基础变量支持，包括数组点访问和对象访问
     * @param string $content  待编译的内容
     * @return string 编译之后的内容
     */
    protected function parseVars($content) {
        $pattern = array(
            //cookies变量支持
            '/\$core.cookies\.(\w+)/',
            //session变量支持
            '/\$core.session\.(\w+)/',
            //get变量支持
            '/\$core.get\.(\w+)/',
            //post变量支持
            '/\$core.post\.(\w+)/',
            //对象访问支持
            '/\$(?!(?:this->tpl_vars|_COOKIE|_SESSION|_GET|_POST))(\w+)->(\w+)/',
            //三次点访问支持
            '/\$(?!(?:this->tpl_vars|_COOKIE|_SESSION|_GET|_POST))(\w+)\.(\w+)\.(\w+)\.(\w+)/',
            //两次点访问支持
            '/\$(?!(?:this->tpl_vars|_COOKIE|_SESSION|_GET|_POST))(\w+)\.(\w+)\.(\w+)/',
            //数组点访问支持
            '/\$(?!(?:this->tpl_vars|_COOKIE|_SESSION|_GET|_POST))(\w+)\.(\w+)/',
            //普通变量访问支持
            '/\$(?!(?:this->tpl_vars|_COOKIE|_SESSION|_GET|_POST))(\w+)/'
        );
        $replace = array(
            '$_COOKIE["$1"]',
            '$_SESSION["$1"]',
            '$_GET["$1"]',
            '$_POST["$1"]',
            '$this->tpl_vars["$1"]->$2',
            '$this->tpl_vars["$1"]["$2"]["$3"]["$4"]',
            '$this->tpl_vars["$1"]["$2"]["$3"]',
            '$this->tpl_vars["$1"]["$2"]',
            '$this->tpl_vars["$1"]',
        );     
        //提取$content中定界符之内的内容
        if(($contents = $this->getTemplateContent($content)) !== false) {
            //对定界符之内的内容进行变量替换
            foreach($contents as $cont) {
                $new_content = preg_replace($pattern, $replace, $cont);
                
                //将替换后的内容覆盖$content中的原始内容
                $content = str_replace($cont, $new_content, $content);
            }
        }
        
        return $content;
    }
    
    /**
     * 逻辑结构支持，包括foreach循环结构和if分支结构
     * @param string $content  待编译的内容
     * @return string  返回编译后的内容
     */
    protected function parseLogic($content) {
        $pattern = array(
            //{foreach $items as $key => $value}支持
            '/'.$this->left_deli.'\s*foreach\s+(.*?)\s+as\s+(.*?)\s+->\s+(.*?)\s*'.$this->right_deli.'/',
            //{foreach $items as $item}支持
            '/'.$this->left_deli.'\s*foreach\s+(.*?)\s+as\s+(.*?)\s*'.$this->right_deli.'/',
            //{/foreach}>支持
            '/'.$this->left_deli.'\s*\/foreach\s*'.$this->right_deli.'/',
            
            //if语句支持
            '/'.$this->left_deli.'\s*if\s+(.*?)'.$this->right_deli.'/',
            '/'.$this->left_deli.'\s*\/if\s*'.$this->right_deli.'/',
        );
        $replace = array(
            '<?php foreach($1 as $2 => $3) { ?>',
            '<?php foreach($1 as $2) { ?>',
            '<?php } ?>',
            '<?php if($1) { ?>',
            '<?php } ?>',
        );
        return preg_replace($pattern, $replace, $content);
    }
    
    /**
     * 替换定界符
     * @param string $content  待替换的内容
     * @return string  返回替换后的内容
     */
    protected function parseDelimiter($content) {
        $pattern = '/'.$this->left_deli.'(.*?)'.$this->right_deli.'/';
        $replace = '<?php echo $1 ?>';
        return preg_replace($pattern, $replace, $content);
    }
    
    /**
     * 将字符串转换成正则表达式格式，即在需要转义的字符前添加\
     * @param string $string  待转换的字符串
     * @return string  返回转换后的字符串
     */
    protected function getRegular($string) {
        //遍历字符串中的字符，判断是否需要转义
        for($i = 0; $i < strlen($string); $i++) {
            switch($string{$i}) {
                case '$': ;
                case '(': ;
                case ')': ;
                case '*': ;
                case '+': ;
                case '.': ;
                case '[': ;
                case ']': ;
                case '?': ;
                case "\\": ;
                case '/': ;
                case '^': ;
                case '{': ;
                case '}': ;
                case '|' : $chars[] = "\\".$string{$i}; break;
                default: $chars[] = $string{$i};
            }
        }
        
        //将$chars合并成字符串并返回
        return implode('', $chars);
    }
    
    /**
     * 将定界符中的内容提取出来
     * @param string $content  待提取的原始内容
     * @return array  提取成功返回一个一维数组，否则返回false
     */
    protected function getTemplateContent($content) {
        //将$content中的定界符之内的内容以数组的方式提取出来
        $pattern = '/'.$this->left_deli.'(.*?)'.$this->right_deli.'/';
        
        $ret = preg_match_all($pattern, $content, $matches);
        
        if($ret > 0) {
            return $matches[1];
        } else {
            return false;
        }
    }
    
    /**
     * 判断模板是否有未过期的缓存
     * @param mixed  $cache_id  缓存id
     * @return bool  如果缓存存在并未过期，返回true，否则返回false
     */
    public function isCached($cache_id) {
        //判断缓存是否存在
        if(file_exists(APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id))) {
            //获取缓存生存期
            $lifetime = $this->getCacheLifetime(APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id));       
            
            //判断缓存是否过期
            if(filemtime(APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id)) + $lifetime > time()) {
                //判断模板是否被修改
                if(@filemtime(APP_PATH.'runtime/compile/'.$this->getCompilePath()) && @filemtime(APP_PATH.'runtime/compile/'.$this->getCompilePath()) > @filemtime($this->tpl)) {
                    return true;
                }           
            }
        }
        
        return false;
    }
    
    /**
     * 获取缓存文件的生存期
     * @param string $cache_filename  缓存文件名
     * @return int  缓存文件的生存期，单位为秒
     */
    protected function getCacheLifetime($cache_filename) {
        $content = file_get_contents($cache_filename);
        
        $pattern = '/<!-- lifetime=(\w+) -->/';
        
        preg_match($pattern, $content, $matches);
        return intval($matches[1]);
    }
    
    /*
     * 将nocache标签替换成HTML注释代码
     * @param string $content  待替换的内容
     * @return array  返回一个数组
     */
    protected function compileNocache($content) {
        //将nocache标签替换成html注释代码
        $pattern = array(
            '/'.$this->left_deli.'\s*nocache\s*'.$this->right_deli.'/',
            '/'.$this->left_deli.'\s*\/nocache\s*'.$this->right_deli.'/',
        );
        $replace = array(
            '<!-- nocache start -->',
            '<!-- nocache end -->',
        );
        
        return preg_replace($pattern, $replace, $content);
    }
    
    /**
     * 获取nocache标签之间的内容
     * @param string $content  原始内容
     * @return array  返回一个数组
     */
    protected function getNocacheContent($content) {
        $pattern = '/<!-- nocache start -->(.*?)<!-- nocache end -->/s';
        
        preg_match_all($pattern, $content, $matches);
        return $matches[1];
    }
    
    /**
     * 将nocache之间的部分替换回编译代码(即PHP代码)
     * @param string $content  待替换的内容
     * @return string  返回替换后的内容
     */
    protected function backNocache($content) {
        $pattern = '/<!-- nocache start -->.*?<!-- nocache end -->/s';
        foreach($this->nocache as $item) {
            $content = preg_replace($pattern, $item, $content);
        }
        
        return $content;
    }
    
    /**
     * 删除缓存
     * @param string $cache_id  缓存id
     */
    public function deleteCache($cache_id) {
        //获取缓存文件名
        $cache_filename = APP_PATH.'runtime/cache/'.$this->getCachePath($cache_id);
        
        //如果文件存在，则删除
        if(file_exists($cache_filename)) {
            unlink($cache_filename);
        }
    }
    
    /**
     * 删除所有缓存
     */
    public function clearCache() {
        if(($dir = @opendir(APP_PATH.'runtime/cache/')) !== false) {
            while($filename = readdir($dir)) {
                if($filename != '.' && $filename != '..') {
                    unlink(APP_PATH.'/runtime/cache/'.$filename);
                }
            }
        }
    }
}