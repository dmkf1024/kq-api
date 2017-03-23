<?php
class DB {

    static private $_instance;
    static private $_connectedSource;
    private $_dbConfig = array (
        'host' => '127.0.0.1',
        'user' => 'admin',
        'password' => 'admin123'
    );

    private function __construct() {
        
    }

    /**
     * 获取实例
     */
    static public function getInstance() {
        if (!self::$_instance instanceof self) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * 连接数据库
     */
    public function connect() {
        if (!self::$_connectedSource) {
            self::$_connectedSource = @mysql_connect($this->_dbConfig['host'], $this->_dbConfig['user'], $this->_dbConfig['password']);

            if (!self::$_connectedSource) {
                throw new Exception('mysql connected error'.mysql_error(), 1);
            }

            mysql_select_db($this->_dbConfig['database'], self::$_connectedSource);
            mysql_query("set names UTF-8", self::$_connectedSource);
        }
        return self::$_connectedSource;
    }

    /**
     * 判断数据库表中有没有已经有数值的字段
     */
    public function isExist($connect, $tableName, $key, $value) {
        $sql = "select " . $key . " from " . $tableName . " where " . $key . " = '" . $value . "'";
        $result = mysql_query($sql, $connect);
        $connect = mysql_fetch_assoc($result);
        if ($connect == false) {
            return 0;
        } else {
            return count($content);
        }
    }

    
}
?>