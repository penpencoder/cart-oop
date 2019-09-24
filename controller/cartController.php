<?php
//include 'productsController.php';
include '../model/MyModel.php';

class Cart extends MyModel{

        // public function getItem($code){

    //     $sql = "SELECT * FROM products WHERE sku='$code'";
    //     $result = mysqli_query($this->connect(), $sql);
    //     $rowVals = mysqli_fetch_array($result);
    //     mysqli_free_result($rowVals);

    //     return $rowVals;

    // }
    public function getProducts($id){
        $sql = "SELECT sku, price FROM products WHERE id = $id";
        $array = array();
        $result = mysqli_query($this->connect(), $sql);


        while($data = mysqli_fetch_assoc($result)){
            $array[] = $data;
        }
        //var_dump($array);
        return $array;
    }

}

// $cart = new Cart;

// if(isset($_GET['add'])){
//     $id = $_GET['add'];
//     //var_dump($id);
//     $cart->getProducts($id);
// }

?>