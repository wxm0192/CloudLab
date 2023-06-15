<?php
namespace Core;

class Model {
    //定义常量
    const SELECT_MODE = 0;
    const UPDATE_MODE = 1;
    const DELETE_MODE = 2;
    const INSERT_MODE = 3;
    
    //PDO对象
    protected $pdo = null;
    
    //表名
    protected $tableName = '';
    
    //表前缀
    protected $tablePrefix = '';
    
    //含表前缀的表名
    protected $trueTableName = '';
    
    //数据库名
    protected $dbname = '';
    
    //连贯操作
    private $methods = array('table', 'where', 'field', 'limit', 'order');
    
    //数据库配置数组
    protected $config = array();
    
    //构造的sql语句
    private $sql = '';
    private $sqls = array();
   
    /**
     * 构造函数
     * @param string $name       模型对应的数据表名，可以同时指定数据库名，例如chat.user，表示chat数据库中的user数据表
     * @param string $prefix      表前缀
     * @param string $configs    数据库连接配置项
     */
    public function __construct($name = '', $prefix = '', $config = array()) {
        //数据库配置初始化
        global $configs;
        $this->config = array_merge($configs, $config);
        
        //表名的初始化
        if(!empty($name)) {
            //如果$name中含有.号，则表示同时指定数据库名和表名
            if(strpos($name, '.') !== false) {
                list($this->dbname, $this->tableName) = explode('.', $name);
            } else {
                $this->tableName = $name;
            }
        }
        //如果表名为空，则利用模型名自动生成表名
        if(empty($this->tableName)) {
            $modelName = substr(get_class($this), strrpos(get_class($this), "\\")+1);
            $this->tableName = substr($modelName, 0, strpos($modelName, 'Model'));
        }
        $this->tableName = strtolower($this->tableName);
        
        //表前缀的初始化
        !empty($prefix) && $this->tablePrefix = $prefix;
        empty($this->tablePrefix) && $this->tablePrefix = $this->config['DB_PREFIX'];
        
        //含表前缀的表明的初始化
        empty($this->trueTableName) && $this->trueTableName = $this->tablePrefix.$this->tableName;
        
        //构造DSN
        $dsn = $this->parseDSN();
        
        //PDO对象的初始化
        $this->pdo = new \PDO($dsn, $this->config['DB_USER'], $this->config['DB_PWD']);
        
        //设置字符串的编码
        $charset = $this->config['DB_CHARSET'];
        $this->execute("set names $charset");
    }
    
    /**
     * 执行数据查询语句
     * @param string $sql  查询语句
     * @return array           返回查询得到的结果集，为一个关联数组, 如果无匹配的结果，则返回空数组
     */
    public function query($sql) {
        $stat = $this->pdo->query($sql);
        if($stat === false) {
            return array();
        } else {
            return $stat->fetchAll(\PDO::FETCH_ASSOC);
        }
    }
    
    /**
     * 执行非数据查询语句
     * @param string $nosql  非查询语句
     * @return int                     返回受影响的行数
     */
    public function execute($nosql) {
        return $this->pdo->exec($nosql);
    }
    
    /**
     * 查询，可以利用连贯操作来生成查询条件
     * @return array  返回查询结果，为一个二维关联数组
     */
    public function select() {
        //构造sql语句
        $sql = $this->buildSql(self::SELECT_MODE);
        
        //执行
        return $this->query($sql);
    }
    
    /**
     * 查询，可以利用连贯操作来生成查询条件，只返回一条查询结果
     * @return array  返回一条查询结果，当结果集有多条记录时，只返回第一条，为一维数组
     */
    public function find() {
        //构造sql语句
        $sql = $this->buildSql(self::SELECT_MODE);
        
        //执行
        return $this->query($sql)[0];
    }
    
    /**
     * 更新，可以利用连贯操作来生成更新条件
     * @param array $data  更新数据映射
     * @return int  返回受影响的行数
     */
    public function save($data) {
        //如果没有指定where语句，则不执行更新操作，直接返回0
        if(empty($this->sqls['where'])) {
            return 0;
        }
        
        //构造sql语句
        $sql = $this->buildSql(self::UPDATE_MODE, $data);
        
        //执行
        return $this->execute($sql);
    }
    
    /**
     * 添加，可以利用连贯操作来生成添加条件
     * @param array $data  添加数据映射
     * @return int  返回受影响的行数
     */
    public function add($data) {    
        //构造sql语句
        $sql = $this->buildSql(self::INSERT_MODE, $data);
        
        //执行;
        return $this->execute($sql);
    }
    
    /**
     * 删除，可利用连贯操作来生成删除条件
     * @return int 返回受影响的行数
     */
    public function delete() {
        //如果没有指定where语句，则不执行更新操作，直接返回0
        if(empty($this->sqls['where'])) {
            return 0;
        }
        
        //构造sql语句
        $sql = $this->buildSql(self::DELETE_MODE);
        
        //执行
        return $this->execute($sql);
    }
    
    /**
     * 切换模型对应的数据库
     * @param string $dbname  数据库名
     * @return $this  返回自身实现连贯操作
     */
    public function db($dbname) {
        //更改模型的dbname属性
        $this->dbname = $dbname;
        
        //更改DSN
        $dsn = $this->parseDSN();
        
        $this->pdo = new \PDO($dsn, $this->config['DB_USER'], $this->config['DB_PWD']);
        
        return $this;
    }
    
    /**
     * 利用魔术方法__call来实现连贯操作
     * @param string $methodName   方法名
     * @param array $arguments         参数
     * @return $this  返回自身实现连贯操作
     */
    public function __call($methodName, $arguments) {
        //检查方法是否在methods属性中
        !in_array($methodName, $this->methods) && die("Model类中不存在{$methodName}方法");
        
        //实现methods中的方法
        if($methodName == 'table') {
            $this->sqls['table'] = $arguments[0];
            //返回自身来实现连贯操作
            return $this;
        } else if($methodName == 'where') {
            $this->sqls['where'] = $arguments[0];
            return $this;
        } else if($methodName == 'field') {
            $this->sqls['field'] = $arguments[0];
            return $this;
        } else if($methodName == 'limit') {
            $this->sqls['limit'] = $arguments[0];
            return $this;
        } else if($methodName == 'order') {
            $this->sqls['order'] = $arguments[0];
            return $this;
        }
    }
    
    /**
     * 生成构造PDO对象的DSN字符串
     * @return string 返回DSN字符串
     */
    protected function parseDSN() {
        //获取数据库类型
        $type =$this->config['DB_TYPE'];
        
        //获取数据库服务器IP
        $host = $this->config['DB_HOST'];
        
        //获取数据库服务器端口
        $port = $this->config['DB_PORT'];
        
        //获取数据库名
        $dbname = empty($this->dbname) ? $this->config['DB_NAME'] : $this->dbname;
        
        return "$type:host=$host;port=$port;dbname=$dbname";
    }
    
    /**
     * 生成sql语句
     * @param int $mode    操作模式，可选值为MODEL::SELECT_MODE, MODEL::UPDATE_MODE, MODEL_DELETE_MODE, MODEL_INSERT_MODE等常量
     * @param array $data
     * @return string  返回sql语句
     */
    protected function buildSql($mode, $data = array()) {
        if($mode == self::SELECT_MODE) {
            //如果为查询模式
            $field = @$this->sqls['field'];
            empty($field) && $field = '*';
            $table = @$this->sqls['table'];
            empty($table) && $table = $this->trueTableName;
            $where = @$this->sqls['where'];
            $order = @$this->sqls['order'];
            $limit = @$this->sqls['limit'];
            
            $sql = "select $field from $table ";
            !empty($where) && $sql .= "where $where ";
            !empty($order) && $sql .= "order by $order ";
            !empty($limit) && $sql .= "limit $limit ";
            
            return $sql;
        } else if($mode == self::UPDATE_MODE) {
            //如果为更新模式
            $table = @$this->sqls['table'];
            empty($table) && $table = $this->trueTableName;
            $where = @$this->sqls['where'];
            
            $sql = "update $table set ";
            foreach($data as $key => $value) {
                $sql .= is_string($value) ? "$key='$value'," : "$key=$value,";
            }
            $sql = rtrim($sql, ',');
            !empty($where) && $sql .= " where $where";
            
            return $sql;
        } else if($mode == self::INSERT_MODE) {
            //如果为插入模式
            $table = @$this->sqls['table'];
            empty($table) && $table = $this->trueTableName;
            
            $sql = "insert into $table";
            $field = '';
            $values = '';
            foreach($data as $key => $value) {
                $field .= "$key,";
                $values .= is_string($value) ? "'$value'," : "$value,";
            }
            $field = rtrim($field, ',');
            $values = rtrim($values, ',');
            
            return $sql."($field) values($values)";
        } else if($mode == self::DELETE_MODE) {
            $table = @$this->sqls['table'];
            empty($table) && $table = $this->trueTableName;
            $where = @$this->sqls['where'];
            
            $sql = "delete from $table ";
            !empty($where) && $sql .= "where $where";
            
            return $sql;
        }
    }
}