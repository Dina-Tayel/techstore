<?php 
namespace TechStore\Classes\Models;

abstract  class Db{
    protected $connect;
    protected $sql;

    public function __construct()
    {
        $this->connect=mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
    } 
    
    public function select($table,$column="*"){
        $this->sql="SELECT $column FROM $table";
        return $this;
    }
    public function getCount($column,$table) :int{
        $this->sql="SELECT COUNT($column) as ctn FROM $table";
        $query=mysqli_query($this->connect,$this->sql);
        return mysqli_fetch_assoc($query)["ctn"];
    }
    
    public function where($column,$op,$value){
        $this->sql .= " WHERE $column $op '$value' ";
        return $this;
    }
    public function andWhere($column,$op,$value){
        $this->sql .= " AND `$column` $op '$value' ";
        return $this;
    }
    public function orWhere($column,$op,$value){
        $this->sql .= " OR `$column` $op '$value' ";
        return $this;
    }
    public function getAllRows(){
        $query=mysqli_query($this->connect,$this->sql);
        return mysqli_fetch_all($query,MYSQLI_ASSOC);
    }
    public function getRow(){
        $query=mysqli_query($this->connect,$this->sql);
        return mysqli_fetch_assoc($query);
    }
    public function insert($table,$data){
        // $data['name'=>$name,'tilte'=>$title]
        $columns="";
        $values="";
        foreach($data as $column=>$value){
            $columns.="`$column`,";
            $values.="'$value',";
        }
        $columns=rtrim($columns,",");
        $values=rtrim($values,",");
        $this->sql="INSERT INTO $table ($columns) VALUES ($values) ";
        
        return $this;
    }
    public function insertAndGetId($table,$data){
        $columns="";
        $values="";
        foreach($data as $column=>$value){
            $columns.="`$column`,";
            $values.="'$value',";
        }
        $columns=rtrim($columns,",");
        $values=rtrim($values,",");
        $this->sql="INSERT INTO $table ($columns) VALUES ($values) ";
        
        mysqli_query($this->connect,$this->sql);
        return mysqli_insert_id($this->connect);

    }
    public function update($table,$data){
        $row="";
        foreach($data as $key=>$value){
            $row.="`$key`='$value',";
        }
        $row=rtrim($row,",");
        $this->sql="UPDATE $table SET $row";
        return $this;
    }
    public function delete($table){
        $this->sql ="DELETE FROM `$table`";
        return $this;
    }
    public function excute(){
        $query=mysqli_query($this->connect,$this->sql);
        return mysqli_affected_rows($this->connect);
    }

    public function join($type,$table,$primary,$foreign){
        $this->sql .= " $type JOIN `$table` ON $primary = $foreign  ";
        return $this;
    }
    public function search($column,$keyword){
        $this->sql .=" WHERE $column LIKE '%$keyword%' ";
        return $this;
    }
    public function fetchError(){
        return mysqli_error_list($this->connect)[0]['error'];
    }
    public function order($column,$orderType){
        $this->sql .="ORDER BY $column $orderType "; 
        return $this;
    }

    public function groupBy($table)
    {
        $this->sql .="GROUP BY $table "; 
        return $this;
    }


 
  }
