<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/21
 * Time: 2:20
 */

class PdoMySQL{
    public static $config=array();
    public static $link=null;
    public static $pconnect=false;
    public static $dbVersion=null;
    public static $connected=false;
    public static $PDOStatement=null;
    public static $queryStr=null;
    public static $error=null;
    public static $lastInsertId=0;
    public static $numRows=0;

    /**
     * PdoMySQL constructor.
     * @param string $dbConfig
     *
     * 连接
     */
    public function __construct($dbConfig='')
    {
        if (!class_exists("PDO")){
            self::throw_excption('不支持PDO，请先开启');
        }
        if (!is_array($dbConfig)){
            $dbConfig=array(
                'hostname'=>DB_HOST,
                'username'=>DB_USER,
                'password'=>DB_PWD,
                'database'=>DB_NAME,
                'hostport'=>DB_PORT,
                'dbms'=>DB_TYPE,
                'dsn'=>DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME
            );
        }
        if (empty($dbConfig['hostname']))self::throw_excption('没有定义数据库配置');
        self::$config=$dbConfig;
        if (empty(self::$config['params']))self::$config['params']=array();
        if (!isset(self::$link)){
            $configs=self::$config;
            if (self::$pconnect){
                $configs['params'][constant("PDO::ATTR_PERSISTENT")]=true;
            }
            try{
                self::$link=new PDO($configs['dsn'],$configs['username'],$configs['password'],$configs['params']);
            }catch (PDOException $e){
                self::throw_excption($e->getMessage());
            }
            if (!self::$link){
                self::throw_excption("PDO连接错误");
            }
            self::$link->exec('SET NAMES '.DB_CHARSET);
            self::$dbVersion=self::$link->getAttribute(constant("PDO::ATTR_SERVER_VERSION"));
            self::$connected=true;
            unset($configs);
        }
    }

    /**
     * @param null $sql
     * @return mixed
     *
     * 得到所有记录
     */
    public static function getAll($sql=null){
        if ($sql!=null){
            self::query($sql);
        }
        $result=self::$PDOStatement->fetchAll(constant("PDO::FETCH_ASSOC"));
        return $result;
    }


    /**
     * @param string $sql
     * @return mixed
     * 得到结果集中的一条记录
     */
    public static function getRow($sql=null){
        if ($sql!=null){
            self::query($sql);
        }
        $result=self::$PDOStatement->fetch(constant("PDO::FETCH_ASSOC"));
        return $result;

    }

    /**
     * 根据主键查询相应的记录
     * @param string $tabName
     * @param int $priId
     * @param string $fields
     * @return mixed
     */
    public static function findById($tabName,$priId,$fields='*'){
        $sql='SELECT %s FROM %s WHERE id=%d';
        return self::getRow(sprintf($sql,self::parseFields($fields),$tabName,$priId));

    }


    /**
     *
     * 执行普通查询
     * @param string $tables
     * @param string $where
     * @param string $fields
     * @param string $group
     * @param string $having
     * @param string $order
     * @param null $limit
     * @return mixed
     */
    public static function find($tables,$where=null,$fields='*',$group=null,$having=null,$order=null,$limit=null){
        $sql="SELECT ".self::parseFields($fields)." FROM ".$tables
            .self::parseWhere($where)
            .self::parseGroup($group)
            .self::parseHaving($having)
            .self::parseOrder($order)
            .self::parseLimit($limit);
        $dataAll=self::getAll($sql);

        return count($dataAll)==1? $dataAll[0]:$dataAll;
    }

    /*
     * array(
        'username'=>'demo',
     *  'password'=>'demo
     * )
     *
     * INSERT user(username,password) VALUES('demo','demo');
     */
    /**
     * @param array $data
     * @param string $table
     * @return bool
     */
    public static function add($data,$table){
        $keys=array_keys($data);
        array_walk($keys,array('PdoMySQL','addSpecialChar'));
        $filesStr=join(',',$keys);
        $values="'".join("','",array_values($data))."'";
        $sql="INSERT {$table}({$filesStr}) VALUES({$values})";
        return self::execute($sql);
    }

    /*
     * array(
        'username'=>'demo',
     *  'password'=>'demo
     * )
     *
     * UPDATE user SET username='demo',password='demo' WHERE id<38 ORDER BY username limit 0,1
     */
    /**
     * 更新记录
     * @param array $data
     * @param string $table
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return bool
     */
    public static function update($data,$table,$where=null,$order=null,$limit=0){
        $sets=null;
        foreach ($data as $key=>$val){
            $sets.=$key."='".$val."',";
        }
        $sets=rtrim($sets,',');
        $sql="UPDATE {$table} SET {$sets} ".self::parseWhere($where).self::parseOrder($order).self::parseLimit($limit);
        return self::execute($sql);

    }


    /**
     *
     * 删除记录
     * @param string $table
     * @param string $where
     * @param string $order
     * @param int $limit
     * @return bool
     */
    public static function delete($table,$where=null,$order=null,$limit=0){
        $sql="DELETE FROM {$table} ".self::parseWhere($where).self::parseOrder($order).self::parseLimit($limit);
        return self::execute($sql);
    }

    /**
     * 得到最后执行的SQL语句
     * @return bool|null
     */
    public static function getLastSql(){
        $link=self::$link;
        if (!$link)return false;
        return self::$queryStr;
    }

    /**
     * 得到上一步插入操作产生AUTO_INCREMENT
     * @return bool|int
     */
    public static function getLastInsertId(){
        $link=self::$link;
        if (!$link)return false;
        return self::$lastInsertId;
    }

    /**
     * 得到数据库的版本
     * @return bool|mixed|null
     */
    public static function getDbVersion(){
        $link=self::$link;
        if (!$link)return false;
        return self::$dbVersion;
    }


    /**
     * 显示数据库的数据表
     * @return array
     */
    public static function showTable(){
        $tables=array();
        if (self::query("SHOW TABLES")){
            $result=self::getAll();
            foreach ($result as $key=>$val){
                $tables[$key]=current($val);
            }
        }
        return $tables;
    }

    /**
     * 解析where条件
     * @param  $where
     * @return string
     */
    public static function parseWhere($where){
        $whereStr='';
        if (is_string($where) && !empty($where)){
            $whereStr=$where;
        }
        return empty($whereStr)?'':' WHERE '.$whereStr;
    }

    /**
     * 解析分组 group by
     * @param $group
     * @return string
     */
    public static function parseGroup($group){
        $groupStr='';
        if (is_array($groupStr)){
            $groupStr.=' GROUP BY '.implode(',',$group);
        }elseif (is_string($group) && !empty($group)){
            $groupStr.=' GROUP BY'.$group;
        }
        return empty($groupStr)?'':$groupStr;
    }

    /**
     * 对分组结果having 句子进行二次删选
     * @param $having
     * @return string
     */
    public static function parseHaving($having){
        $havingStr='';
        if (is_string($having) && !empty($having)){
            $havingStr.=' HAVING '.$having;
        }
        return $havingStr;
    }

    /**
     *
     * 解析order by
     * @param $order
     * @return string
     */
    public static function parseOrder($order){
        $orderStr='';
        if (is_array($order)){
            $orderStr.=' ORDER BY '.join(',',$order);
        }elseif (is_string($order) && !empty($order)){
            $orderStr.=' ORDER BY '.$order;
        }
        return $orderStr;
    }

    /**
     * 解析限制显示的条数limit
     * limit 3
     * limit 0,3
     * @param $limit
     * @return string
     */
    public static function parseLimit($limit){
        $limitStr='';
        if (is_array($limit)){
            if (count($limit)>1){
                $limitStr.=' LIMIT '.$limit[0].','.$limit[1];
            }else{
                $limitStr.=' LIMIT '.$limit[0];
            }
        }elseif (is_string($limit) && !empty($limit)){
            $limitStr.=' LIMIT '.$limit;
        }
        return $limitStr;
    }


    /**
     * 解析字段
     * @param $fields
     * @return string
     */
    public static function parseFields($fields){
        if (is_array($fields)){
            array_walk($fields,array('PdoMySQL','addSpecialChar'));
            $fieldsStr=implode(',',$fields);
        }elseif (is_string($fields)&&!empty($fields)){
            if (strpos($fields,'`')===$fields){
                $fields=explode(',',$fields);
                array_walk($fields,array('PdoMySQL','addSpecialChar'));
                $fieldsStr=implode(',',$fields);
            }else{
                $fieldsStr=$fields;
            }
        }else{
            $fieldsStr="*";
        }
        return $fieldsStr;
    }

    /**
     * 通过反引号引用字段
     * @param $values
     * @return string
     */
    public static function addSpecialChar(&$values){
        if ($values==="*"||strpos($values,'.')!=false||strpos($values,'`')!=false){

        }elseif (strpos($values,'`')===false){
            $values='`'.trim($values).'`';
        }
        return $values;
    }

    /**
     * @param null $sql
     * @return bool
     *
     * 执行增删改操作，返回受影响记录的条数
     */
    public static function execute($sql=null){
        $link=self::$link;
        if (!$link)return false;
        self::$queryStr=$sql;
        if (!empty(self::$PDOStatement))self::free();
        $result=$link->exec(self::$queryStr);
        self::haveErrorThrowException();
        if ($result){
            self::$lastInsertId=$link->lastInsertId();
            self::$numRows=$result;
            return self::$numRows;
        }else{
            return false;
        }
    }

    /**
     * 释放结果集
     */
    public static function free(){
        self::$PDOStatement=null;
    }
    public static function query($sql=null){
        $link=self::$link;
        if (!$link)return false;
        if (!empty(self::$PDOStatement))self::free();
        self::$queryStr=$sql;
        self::$PDOStatement=$link->prepare(self::$queryStr);
        $res=self::$PDOStatement->execute();
        self::haveErrorThrowException();
        return $res;
    }

    public static function haveErrorThrowException(){
        $obj=empty(self::$PDOStatement)?self::$link:self::$PDOStatement;
        $arrError=$obj->errorInfo();
//        print_r($arrError);
        if ($arrError[0]!='00000'){
            self::$error='SQLSTATE:'.$arrError[0].'<br>SQL Error:'.$arrError[2].'<br>Error SQL:'.self::$queryStr;
            self::throw_excption(self::$error);
            return false;
        }
        if (self::$queryStr==''){
            self::throw_excption('没有执行的SQL语句');
            return false;
        }
    }

    /**
     * @param $errMsg
     *
     * 自定义错误处理
     */
    public static function throw_excption($errMsg){
        echo '<div style="width: 100%;background-color: #abcdef;color: black;font-size: 20px;">
                '.$errMsg.'
</div>';
    }

    public static function close(){
        self::$link=null;
    }
}
