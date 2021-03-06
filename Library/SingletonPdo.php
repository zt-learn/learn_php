<?php
namespace lib;
class SingletonPdo
{
    private $dbms;//数据库类型
    private $host;//数据库主机名
    private $dbName;//使用的数据库
    private $user;//数据库连接用户名
    private $pass;//对应的密码
    private $dsn;
    private $pdo;
    private static $_instance; //存储对象

    private function __construct()
    {
        $this->dbms = DBMS;     //数据库类型
        $this->host = HOST; //数据库主机名
        $this->dbName = DBNAME;    //使用的数据库
        $this->user = USER;      //数据库连接用户名
        $this->pass = PASS;          //对应的密码
        $this->dsn = "$this->dbms:host=$this->host;dbname=$this->dbName";
        $this->pdo = new \PDO($this->dsn, $this->user, $this->pass, array(\PDO::ATTR_PERSISTENT => true));
        $this->pdo->query('set names uft8');
    }

    private function __clone()
    {
    }

    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*执行查询语句，返回数组，*/
    public function query($sql)
    {
        $rows = $this->pdo->query($sql);
        $result = array();

        $i = 0;
        foreach ($rows as $row) {
            foreach ($row as $k => $v) {
                if (!is_numeric($k))
                    $result[$i][$k] = $v;
            }
            $i++;
        }
        return $result;
    }

    /*执行update，delete，insert语句，如果成功返回true*/
    public function execute($sql)
    {
        if ($this->pdo->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}

?>