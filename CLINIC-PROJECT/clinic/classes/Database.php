<?php

class Database {
    
    public function connection($dataBase){
        $conn= mysqli_connect("localhost","root","",$dataBase);
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }
        return $conn;
    } 
    public function closeConnection($conn){
        mysqli_close($conn);
    }
    public function query($conn, $query){
        $result = mysqli_query($conn, $query);
        return $result;
    }
    public function fetchAssoc($result){
        return mysqli_fetch_assoc($result);
    }
    
    public function fetchAll($result){
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function numRows($result){
        return mysqli_num_rows($result);
    }
    public function escape($conn, $data){
        return mysqli_real_escape_string($conn, $data);
    }
    public function getRow($table_name,$id){
        global $conn;
        $sql = "SELECT * FROM `$table_name` WHERE id=$id";
       return mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }
    public function updateRow($table_name,$data,$id){
        global $conn;
        $set = '';
        foreach($data as $key => $value){
            $set.= "`$key` = '$value',";
        }
        $set = rtrim($set, ',');
        $sql = "UPDATE `$table_name` SET $set WHERE id=$id";
       return mysqli_query($conn,$sql);
    }
    public function gitAll($table_name){
        global $conn;
        $sql = "SELECT * FROM `$table_name`";
       return mysqli_query($conn,$sql);
    }
    public function insert($table_name,$data){
        global $conn;
        $keys = implode(',', array_keys($data));
        $values = "'". implode("','", array_values($data)). "'";
        $sql = "INSERT INTO `$table_name` ($keys) VALUES ($values)";
       return mysqli_query($conn,$sql);
    }
    public function delete($table_name,$id){
        global $conn;
        $sql = "DELETE FROM `$table_name` WHERE id=$id";
       return mysqli_query($conn,$sql);
    }
    public function search($table_name, $column, $value){
        global $conn;
        $sql = "SELECT * FROM `$table_name` WHERE `$column` LIKE '%$value%'";
        return mysqli_query($conn,$sql);
    }
    public function pagination($table_name, $limit, $page){
        global $conn;
        $offset = ($page - 1) * $limit;
        $sql = "SELECT * FROM `$table_name` LIMIT $offset, $limit";
        return mysqli_query($conn,$sql);
    }
    public function totalRows($table_name){
        global $conn;
        $sql = "SELECT COUNT(*) as total FROM `$table_name`";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        return $row['total'];
    }
    function joinTables( $table1, $table2,$id) {
        global $conn;
        $sql = "SELECT `$table1`.* , `$table2`.`name` , `$table2`.`id`AS `cat_id`  FROM `$table1` INNER JOIN `$table2` 
        ON `$table2`.`id`=`$table1`.`major_id`  WHERE $table1.id=$id";
       return mysqli_fetch_assoc(mysqli_query($conn,$sql));
    }
    
}





