<?php 

  session_start();

  error_reporting (0);
  
  include "../config.php";

  require_once("../Shopping cart/added_product.php");

  #Extracting user information from database
  $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
  $user_info_result = mysqli_query($conn, $user_info);
  $user_info_row = mysqli_fetch_assoc($user_info_result);

  $id = $_GET['bookid'];

  #Extracting book information from database
  $book_info = "SELECT * FROM books WHERE book_id = $id";
  $book_info_result = mysqli_query($conn, $book_info);
  $book_info_row = mysqli_fetch_assoc($book_info_result);

  $sql = "SELECT book_id, book_name, book_img, book_price FROM books 
		  INNER JOIN shoppingcart ON books.book_id = shoppingcart.bookID
		  INNER JOIN users ON shoppingcart.userID = users.id WHERE shoppingcart.userID = $_SESSION[uid]";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>

<html>

<head>

	<title>Shopping Cart</title>
	<link href='https://image.flaticon.com/icons/png/128/3534/3534033.png' rel='icon' type='image/x-icon'/>
	<link href="Cart.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
		
	<style>
		h1 {
			text-align: center; 
			font-size: 40px;
			margin-bottom: 20px;
			margin-top: 20px;
			background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9);
			background-size: 100%;
			background-clip: text;
			-webkit-background-clip: text; /* Chrome and Safari Compatibility */
			-moz-background-clip: text; /* Mozilla Firefox Compatibility */
			-webkit-text-fill-color: transparent;
			-moz-text-fill-color:transparent;
		}
	</style>
</head>

<body>

<!-- Nav Bar Section -->
<?php 

if (isset($_SESSION['uid'])) {
	require_once("../Reusable Home Page Items/login_header.php"); 
} else {
	require_once("../Reusable Home Page Items/guest_header.php");
}

?>

<div class="container">

	<h1>Shopping Cart</h1>

	<div class="cart">

		<div class="products">

			<?php

				if ($row != NULL){
					do {
						cart($row['book_id'],$row["book_name"], $row["book_img"], $row["book_price"]);
					} while ($row = mysqli_fetch_assoc($result));
				} else {
					echo "<h2>Cart Empty</h2>";
				}
				

			?>

		</div>
		
		<?php
			#Count the total number of carts added by user
			#Count the number of bookID from shoppingcart table with same userID that match to the user
			$total_book_num = "SELECT COUNT(bookID) FROM shoppingcart WHERE userID = $_SESSION[uid]";
			$num_rs = mysqli_query($conn, $total_book_num);
			$num_result = mysqli_fetch_array($num_rs);
			
			#Count total book prices
			#Sum all book_price from books table match with the userID and bookID in shoppingcart table 
			$totol_price = "SELECT SUM(book_price) FROM books
							INNER JOIN shoppingcart ON books.book_id = shoppingcart.bookID
							INNER JOIN users ON shoppingcart.userID = users.id WHERE shoppingcart.userID = $_SESSION[uid]";
			$total_rs = mysqli_query($conn, $totol_price);
			$total_result = mysqli_fetch_array($total_rs);

		?>

		<div style="margin-bottom: 200px;" class="cart-total">
			<p style="margin-bottom: 50px;">
				<span style="font-weight: bold;">Total Price</span>
				<span >RM <?php echo $total_result[0]; ?></span>
			</p>
			<p style="margin-bottom: 65px;">
				<span style="font-weight: bold;">Number of Books</span>
				<span ><?php echo $num_result[0]; ?></span>
			</p>

			<?php

				if ($num_result[0] != 0){
					echo '<a href="../Checkout form/Checkout Form.php">Proceed to Checkout</a>';
				}
	
			?>

			
		</div>
	</div>
</div>

<!-- Footer Section -->
<?php require_once("../Reusable Home Page Items/Footer.php"); ?>

</body>


</html>
