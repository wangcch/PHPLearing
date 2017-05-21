<?php
/**
 * Created by PhpStorm.
 * User: DEMON
 * Date: 2017/5/21
 * Time: 2:20
 */
header('content-type:text/html;charset=utf-8');

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
     * @param null $sql
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
        return self::getRow(sprintf($sql,self::parseField($fields),$tabName,$priId));

    }

    /**
     * 解析字段
     * @param $fields
     * @return string
     */
    public static function parseField($fields){
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
}

require_once 'config.php';

$PdoMySQL=new PdoMySQL();
//$sql="SELECT * FROM user";
//print_r($PdoMySQL->getAll($sql));
//
//$sql="SELECT * FROM user WHERE id=10";
//print_r($PdoMySQL->getRow($sql));

//$sql="INSERT user(username,password)";
//$sql.="VALUES('demo9','demo')";
//var_dump($PdoMySQL->execute($sql));

$tabName='user';
$priId='10';
//$fields='username,password';
$fields=array('username','password');
print_r($PdoMySQL->findById($tabName,$priId,$fields));