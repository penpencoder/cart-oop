<?php
    include 'model/model.php';
    // include 'model/MyModel.php';
    include 'controller/productsController.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>



    <div class="container">
        <!-- Products -->
        <div>
            <h3>Products</h3>
            <table>
                <thead>
                    <th>Image</th>
                    <th>SKU</th> 
                    <th>Name</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    <?php
                        $data = new Products;
                        $rows = $data->getAllProducts(); 
                        foreach($rows as $key => $row){
                        //break
                    ?>

                    <tr>
                        <td><img src="assets/images/products/<?php echo $row["image"];?>"></td>
                        <td><?php echo $row["sku"];?></td>
                        <td><?php echo $row["name"];?></td>
                        <td><?php echo $row["color"];?></td>
                        <td><?php echo $row["size"];?></td>
                        <td><?php echo $row["price"];?></td>
                        <td><button><a href="index.php?delete=<?php echo $row["id"];?>">Delete</a></button></td>
                        <td><button><a href="index.php?update=<?php echo $row["id"];?>">Edit</a></button></td>
                        <!-- <td><button><a href="index.php?add=<?php //echo $row["id"];?>">Add</a></button></td> -->
                        <td>
                        <form method="post" action="">
                            <input type="hidden" class="product-quantity" name="action" value="add" />
                            <input type="hidden" class="product-quantity" name="code" value="<?php echo $row["sku"];?>" />
                            <input type="hidden" class="product-quantity" name="quantity" value="1" />
                            <button type="submit" class="btnAddAction">Add Cart</button>
                        </form>
                        </td>
                    </tr>

                    <?php
                        }
                    ?>

                </tbody>
            </table>


<!-- Test Add To Cart on Submit -->
<?php

	if(!empty($_POST["quantity"])) {
		$productByCode = $data->getItem($_POST['code']);
        $itemArray = array(
            'name'=>$productByCode[0]["name"], 
            'code'=>$productByCode[0]["sku"], 
            'quantity'=>$_POST["quantity"], 
            'price'=>$productByCode[0]["price"]
        );
		
        // echo $productByCode['name'];
		print_r($itemArray);
		// if(!empty($_SESSION["cart_item"])) {
		// 	if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
		// 		foreach($_SESSION["cart_item"] as $k => $v) {
		// 				if($productByCode[0]["code"] == $k) {
		// 					if(empty($_SESSION["cart_item"][$k]["quantity"])) {
		// 						$_SESSION["cart_item"][$k]["quantity"] = 0;
		// 					}
		// 					$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
		// 				}
		// 		}
		// 	} else {
		// 		$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
		// 	}
		// } else {
		// 	$_SESSION["cart_item"] = $itemArray;
		// }
	}
?>


        </div>

        <!-- Add Product -->
        <div>
            <h3>Add Products</h3>

            <?php
                if(isset($_GET["update"])){
                    $prodID = $_GET["update"];
                    $row = $data->selectProducts($prodID);
                    // break
            ?>
            <!-- Update -->
            <form action="controller/productsController.php" method="post">
                <input type="hidden" name="id" value="<?php echo $prodID; ?>">
                <label for="image">Image</label>
                <input type="file" name="image" value = "<?php echo $row["image"]; ?>">
                <br>
                <input type="text" name="sku" value = "<?php echo $row["sku"]; ?>">
                <br>
                <input type="text" name="name" value = "<?php echo $row["name"]; ?>">
                <br>
                <input type="text" name="color" value = "<?php echo $row["color"]; ?>">
                <br>
                <input type="text" name="size" value = "<?php echo $row["size"]; ?>">
                <br>
                <input type="text" name="price" value = "<?php echo $row["price"]; ?>">
                <br>
                <input type="submit" value="Save" name="edit">
            </form>

            <?php
                }else{
            ?>
            
            <!-- Add -->
            <form action="controller/productsController.php" method="post" enctype="multipart/form-data">
                <label for="image">Image</label>
                <input type="file" name="image">
                <br>
                <input type="text" name="sku" placeholder="SKU">
                <br>
                <input type="text" name="name" placeholder="Name">
                <br>
                <input type="text" name="color" placeholder="Color">
                <br>
                <input type="text" name="size" placeholder="Size">
                <br>
                <input type="number" name="price" placeholder="Price">
                <br>
                <input type="submit" value="Add" name="submit">
            </form>

            <?php
                }
            ?>
        </div>

        <!-- Cart -->
        <div>
            <h3>Cart</h3>
            <table>
                <thead>
                    <th>Action</th>
                    <th>SKU</th>
                    <th>Price</th>
                </thead>
                <tbody>
                    <?php
                        $cart = new Cart;

                        if(isset($_GET['add'])){
                            $id = $_GET['add'];
                            //var_dump($id);
                            $rows = $cart->getProducts($id);
                        
                        foreach($rows as $key=> $row){
                    ?>

                    <tr>
                        <td><button>remove</button></td>
                        <td><?php echo $row["sku"];?></td>
                        <td><?php echo $row["price"];?></td>
                    </tr>

                    <?php
                        }}
                    ?>
                </tbody>
            </table>
        </div>

    </div>

</body>
</html>