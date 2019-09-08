<?Php
session_start();
?>
<!doctype html public "-//w3c//dtd html 3.2//en">
<html>
<head>
<title>Demo of Session array used for cart from plus2net.com</title>
</head>
<body>

<?Php
$_SESSION['cart']=array(); // Declaring session array
array_push($_SESSION['cart'],'apple','mango','banana');
array_push($_SESSION['cart'],'333','444','555');

echo "Number of Items in the cart = ".sizeof($_SESSION['cart'])." <a href=cart-remove-all.php>Remove all</a><br>";
?>
</body>
</html>