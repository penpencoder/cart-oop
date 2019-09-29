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
    public $delete;

    public function __construct(){
        $this->condition = '';
        $this->table = '';
        $this->select = '*';
        $this->join = '';
        $this->insert = '';
        $this->update = '';
        $this->delete = '';
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
        $result = $this->connect()->query($sql);
        $rows = $result->num_rows;
        if($rows > 0){
            while($row = $result->fetch_assoc()){
                $data[] = $row;
            }
            var_dump($data);
        }
        
    }

    public function get($type = ''){
        
        $query = 'SELECT '.$this->select.' FROM '.$this->table. ' '.$this->join.' '.$this->condition;
    
        //return $type != '' ?  $this->connect()->query($query)->fetch_assoc() : $this->connect()->query($query)->fetch_All(MYSQLI_ASSOC);
        
        print_r($query);
    }

    public function condition(...$condtions){
        if(count($condtions) < 3){
            $this->condition .= $this->condition == '' ? ' WHERE '.$condtions[0].' = '.$condtions[1] : ' AND '.$condtions[0].' = '.$condtions[1];
        } else {
            $this->condition .= $this->condition == '' ? ' WHERE '.$condtions[0].' '.$condtions[1].' '.$condtions[2] : ' AND '.$condtions[0].' '.$condtions[1].' '.$condtions[2];
        }

        return $this;
    }

    public function join($tbl, $tbljoinFiled,$tbtojoinField){
        $this->join = 'JOIN '.$tbl.' ON '.$tbljoinFiled. ' = '.$tbtojoinField;

        return $this;
    }

    public function insert($values){

        $this->insert .= "INSERT INTO " . $this->tables;
        $this->insert .= " (" . implode("," , array_keys($values)) . ") VALUES ";
        $this->insert .= "('" . implode("','", array_values($value)) . "')";
        
        return $this->connect()->$this;
    }

    public function update($values){

        $this->update .= "UPDATE " . $this->table . " SET ";
        foreach($values as $key => $val){
            $this->update .= $key . " = '" . $val . "', ";
        }
        $this->update .= $this->condition;
        //return $this->connect()->$this;
        print_r($this->update);
    }

    public function delete(){
        $this->delete = "DELETE FROM " . $this->table;
        $this->delete .= $this->condition;

        print_r($this->delete);
    }
    


}
    $test = new Model;
  

    $products = array(
        'name'=> 'stephen',
        'color'=> 'red',
        'test'=> 'test',
        'size'=> '150g'
    );
    
    $test->table('products')->getAll();
    // foreach($datas as $data){
    //     echo $data['name'];
    //     echo $data['sku'];
    // }
