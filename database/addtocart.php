<?php
require('db.php');
class addtocart{
    private $db;

    public function __construct(){
        $DB=new DB();
        $this->db=$DB->connection();
    }
    /*
        check if the product already exists in the cart.
        if it exists quantity and sum will be changed with the update method,
        else add method will be used to add the product to the cart.
     */
    public function check($product_id,$quantity,$sum){
        $query="SELECT * FROM cart WHERE product_id='$product_id'";
        $rows=$this->db->query($query);
        if($rows->num_rows>0){
            $cart=$rows->fetch_assoc();
            $oldquantity=$cart['quantity'];
            $oldsum=$cart['sum'];
            $newquantity=$quantity+$oldquantity;
            $newsum=$oldsum+$sum;
            $this->update($product_id,$newquantity,$newsum);
        }else{
            $this->add($product_id,$quantity,$sum);
        }
    }
    public function add($product_id,$quantity,$sum){
        $stmt=$this->db->prepare("INSERT INTO cart (product_id,quantity,sum)VALUES(?,?,?)");
        $stmt->bind_param('iii',$product_id,$quantity,$sum);
        if($stmt->execute()){
            return "ok";
        }
    }
    public function update($product_id,$quantity,$sum){
        $query="UPDATE cart SET quantity='$quantity',sum='$sum' WHERE product_id='$product_id'";
        $this->db->query($query);
    }
}