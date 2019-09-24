<?php

include 'MyModel.php';
error_reporting();
class Model extends MyModel{
    
    public $condition;
    public $table;
    public $query;
    public $select;
    public $join;
    public $insert;
    public $update;

    public function __construct(){
        $this->condition = '';
        $this->table = '';
        $this->select = '*';
        $this->join = '';
        $this->insert = '';
        $this->update = '';
    }

    

    public function table($table){
       $this->table = $table;
       return $this;
    }

    public function select(...$select){
        $this->select = implode(',',$select);
        return $this;
    }

    public function getAll(){
        $sql = "SELECT " . $this->select . " FROM " . "'" . $this->table . "'";
        return $this->connect()->query($sql);
        // print_r($sql);
    }

    public function get($type = ''){
        
        $query = 'Select '.$this->select.' FROM '.$this->table. ' '.$this->join.' '.$this->condition;
    
        return $type != '' ?  $this->connect()->query($query)->fetch_assoc() : $this->connect()->query($query)->fetch_All(MYSQLI_ASSOC);
        
    }

    public function condition(...$condtions){
        if(count($condtions) < 3){
            $this->condition .= $this->condition == '' ? ' WHERE '.$condtions[0].' = '.$condtions[1] : ' AND '.$condtions[0].' = '.$condtions[1];
        } else {
            $this->condition .= $this->condition == '' ? ' WHERE '.$condtions[0].' '.$condtions[1].' '.$condtions[2] : ' AND '.$condtions[0].' '.$condtions[1].' '.$condtions[2];
        }

        return $this;
    }

    public function join($tbljoin,$tbljoinFiled,$tbtojoinField){
        $this->join = 'Join '.$tbljoin.' on '.$tbljoinFiled. ' = '.$tbtojoinField;

        return $this;
    }

    public function insert($table, $tbltoInsert){

        $this->insert .= "INSERT INTO " . $table;
        $this->insert .= " (" . implode("," , array_keys($tbltoInsert)) . ") VALUES ";
        $this->insert .= "('" . implode("','", array_values($tbltoInsert)) . "')";
        
        return $this->connect()->$this;
    }

    public function update($table, $values, $tblPK, $tblID){

        $this->update .= "UPDATE " . $table . " SET ";
        foreach($values as $key => $val){
            $this->update .= $key . " = '" . $val . "', ";
        }
        $this->update .= "WHERE " . $tblPK . " = '" . $tblID . "'";
        return $this->connect()->$this;
    }
    


}
    // join table_name on table_name.field = table_uppe.field
    $data = new model();
    //$values = $data->table('products')->get();
    // echo '<pre>';
    // print_r($values);
    // echo '</pre>';

    // foreach($values as $value){
    //     echo $value['name'].'<br>';
    // }

    $products = array(
        'name'=> 'stephen',
        'color'=> 'red',
        'test'=> 'test',
        'size'=> '150g'
    );
    


    // $data->table('products')->getAll();
