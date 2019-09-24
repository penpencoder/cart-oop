<?php
include '../model/model.php';

class Products extends Model{

    public function getAllProducts(){
        $result = $this->table('products')->getAll(); 
        $rowVals = mysqli_fetch_assoc($result);
        var_dump($rowVals);
    }

    public function getItem($code){

        $sql = "SELECT * FROM products WHERE sku='$code'";
        $result = mysqli_query($this->connect(), $sql);
        $rowVals = mysqli_fetch_array($result);
        mysqli_free_result($rowVals);

        return $rowVals;

    }

    public function insertProducts($datas){

        $target = "../assets/images/products/" . basename($_FILES['image']['name']);

            //add
        if(isset($_POST['submit'])){

        //$target = "../assets/images/products";
        
        $myArray = array(
            "image" => $_FILES["image"]['name'],
            "sku" => $_POST["sku"],
            "name" => $_POST["name"],
            "color" => $_POST["color"],
            "size" => $_POST["size"],
            "price" => $_POST["price"],
        );

        $this->insert('products', $myArray);
    }
        
        if($this){
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            header("Location: ../index.php");
        }

    }

    public function selectProducts($id){
        $sql = "SELECT * FROM products WHERE id = ". $id;
        $result = mysqli_query($this->connect(), $sql);
        $data = mysqli_fetch_array($result);

        return $data;
    }

    public function editProducts($id, $image, $sku, $name, $color, $size, $price){
        $sql = "UPDATE products SET image='$id', sku='$sku', name='$name', color='$color', size='$size', price='$price' WHERE id='$id' ";
        $result = mysqli_query($this->connect(), $sql);

        if($result){
            header("Location: ../index.php");
        }else{
            echo 'error';
        }
    }

    public function deleteProducts($id){
        $sql = "DELETE FROM products WHERE id='$id'";
        $result = mysqli_query($this->connect(), $sql);
    }


}

    $prod = new Products;

    // edit
    if(isset($_POST['edit'])){
        $id = $_POST['id'];
        $image = $_POST['image'];
        $sku = $_POST['sku'];
        $name = $_POST['name'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $price = $_POST['price'];

        $prod->editProducts($id, $image, $sku, $name, $color, $size, $price);
    }

    // delete
    if(isset($_GET['delete'])){
        $id = $_GET['delete'];

        $prod->deleteProducts($id);
    }


$prod -> getAllProducts();