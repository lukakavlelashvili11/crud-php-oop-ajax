<?php
class DB{
    protected $db_name='products';
    protected $db_username='root';
    protected $db_password='';
    protected $db_host='localhost';
    
    public function connection(){
        $conn=new mysqli($this->db_host,$this->db_username,$this->db_password,$this->db_name);
        if($conn->connect_error){
            die($conn->connect_error);
        }else{
            return $conn;
        }
    }
}