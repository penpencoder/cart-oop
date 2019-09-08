<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>

<head>
<title>Displaying Session Cart products from plus2net.com</title>
</head>

<body>
<?Php
echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=cart-remove-all.php>Remove all</a><br>";


while (list ($key, $val) = each ($_SESSION['cart'])) { 
echo "$key -> $val <br>"; 
}
?>
</body>
</html>