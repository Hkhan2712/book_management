<?php 
class MainModel {
    protected $con;
    private static $instance = [];

    protected $table;
    protected function __construct() {
        $instanceDb = ConnectDb::getInstance();
        $this->con = $instanceDb->getConnection();
        if (!$this->table) $this->setTableName();
    }

    public static function getInstance() {
        $called_class = get_called_class();
        if (!array_key_exists($called_class, self::$instance)) {
            self::$instance[$called_class] = new $called_class();
        }
        return self::$instance[$called_class];
    }

    public function setTableName($table = null) {
        if ($table) {
            $this->table = $table;
        } else {
            $cln = get_class($this);
            if (str_ends_with($cln, 'Model')) {
                $baseName = substr($cln, 0, -strlen('Model'));
            } else {
                $baseName = $cln;
            }
            $snake = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $baseName)); 
            $this->table = NounUtils::pluralize($snake); 
        }
    }
    public function getTableName() {
        return $this->table;
    }

    public function showAllTables() {
        $sql = 'SHOW TABLES FROM '.DB_NAME;
        $query = mysqli_query($this->con, $sql);
        $result = [];
        if ($query) {
            while ($field = mysqli_fetch_row($query)) {
                array_push($result, $field[0]);
            }
        }
        return $result;
    }

    public function getAllFields($table) {
        $sql = 'SHOW COLUMNS FROM '.$table;
        $fields = $this->con->query($sql);
        $result = [];
        if ($field = mysqli_fetch_array($fields)) {
            array_push($result, $field['Field']);
        }
        return $result;
    }

    public function getAllRecords($fields='*', $options=null) {
        $conditions = '';
        if (isset($options['conditions'])) {
            $conditions .= ' where'.$options['conditions'];
        }
        $query = 'SELECT '.$fields.' FROM '.$this->table.$conditions;
        $result = mysqli_query($this->con, $query);
        return $result;
    }

    public function getRecord($id=null, $field='*', $options=null) {
        $condition = '';
        if (isset($options['conditions'])) {
            $conditions .= ' and'.$options['conditions'];
        }
        $query = "SELECT $field FROM $this->table WHERE id = $id".$conditions;
        $result = mysqli_query($this->con, $query);
        if ($result) {
            $record = mysqli_fetch_assoc($result);
        } else {
            $record = false;
        }
        return $record;
    }
    public function delRecord($id = null, $conditions = null) {
        if ($conditions) {
            $conditions = ' and '.$conditions;
        } 
        $query = "DELETE FROM $this->table WHERE id = $id".$conditions;
        return mysqli_query($this->con, $query);
    }
    public function addRecord($datas) {
        $fields = $values = '';
        $i = 0;
        foreach ($datas as $k => $v) {
            if ($i) {
                $k .= ',';
                $v .= ',';
            }
            $fields .= $k;
            $values .= "'".$v."'";
            $i++; 
        }
        $query = "INSERT INTO $this->table($fields) VALUES ($values)";
        return mysqli_query($this->con, $query);
    }
    public function editRecord($id, $datas) {
        $setDatas = '';
        $i = 0;
        foreach ($datas as $k => $v) {
            if ($i) {
                $setDatas .= ',';
            }
            $setDatas .= $k."='".$v."'";
        }
        $query = "UPDATE $this->table SET $setdatas WHERE id=$id";
        return mysqli_query($this->con, $query) or die("Mysql Error: ". mysqli_error($this->con) . "<hr>\nQuery: $query");
    }
    public static function convertToList($mysqliObject) {
        $arrReturn = [];
        while ($row = mysqli_fetch_array($mysqliObject)) {
            $arrayReturn[$row['id']] = $row['cat_name'];
        }
        return $arrReturn;
    }
    public static function covertMysqliObjectToList($mysqliObject) {
        $arrReturn = [];
        while ($row = mysqli_fetch_array($mysqliObject)) {
            $arrReturn[$row['id']] = $row['name'];
        }
        return $arrayReturn;
    }
}
?>