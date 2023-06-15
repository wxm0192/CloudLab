<?php
namespace Core;

class Controller {
    //视图变量
    protected $view = null;
    
    /**
     * 构造函数
     */
    public function __construct() {
        //使用默认模板实例化View
        $this->view = new \Core\View($this->getDefaultTemplate());
    }
    
    /**
     * 模板赋值
     * @param string $name  变量名
     * @param mixed $value  变量值
     */
    public function assign($name, $value) {
        $this->view->assign($name, $value);
    }
    
    /**
     * 模板渲染
     * @param string $tpl  模板文件名
     * @return string  生成的html内容
     */
    public function fetch($tpl = '') {
        //指定模板
        !empty($tpl) && $this->view->set('tpl', $tpl);
        
        return $this->view->fetch();
    }
    
    /**
     * 输出模板
     * @param string $tpl  模板文件名
     * @param string $cache_id  缓存id
     */
    public function display($tpl = '', $cache_id = '') {
        //指定模板
        !empty($tpl) && $this->view->set('tpl', $tpl);
        
        $this->view->display($cache_id);
    }
    
    /**
     * 设置属性值
     * @param string $property  属性名
     * @param string $value  属性值
     */
    public function __set($property, $value) {
        $this->view->$property = $value;
    }
    
    /**
     * 判断模板是否被缓存并且有效
     * @param string $tpl  模板文件名
     * @param mixed $cache_id  缓存id
     * @return bool  如果存在且有效，返回true，否则返回false
     */
    public function isCached($tpl = '', $cache_id = '') {
        //如果关闭了缓存功能，则直接返回false
        if($this->view->caching === false) {
            return false;
        }
        
        //指定模板
        !empty($tpl) && $this->view->set('tpl', $tpl);
        
        return $this->view->isCached($cache_id);
    }
    
    protected function getDefaultTemplate() {
        //获取当前所在的模块名
        $module_name = substr(get_class($this), 0, strpos(get_class($this), "\\"));
        
        return $module_name.'/View/'.substr(CONTROLLER_NAME, 0, strpos(CONTROLLER_NAME, 'Controller')).'/'.ACTION_NAME.'.'.C('TMPL_EXT');
    }
    
    /**
     * 删除缓存
     * @param string $tpl  模板文件名
     * @param mixed $cache_id  缓存id
     */
    public function deleteCache($tpl = '', $cache_id = '') {
        //指定模板
        !empty($tpl) && $this->view->set('tpl', $tpl);
        
        //删除缓存
        $this->view->deleteCache($cache_id);
    }
    
    /**
     * 清理缓存
     */
    public function clearCache() {
        $this->view->clearCache();
    }
}