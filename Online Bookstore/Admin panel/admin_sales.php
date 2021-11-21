<?php
	session_start();

	include "../config.php"; // link the configure php file

	require_once("../Admin panel/rows.php"); //use the embedded PHP code from another file

    error_reporting(0);  // the error will not be displayed

	$order = $_GET["order"];

	if ($order == "DESC") {
		$order = "DESC";
		$link = "ASC";
	} else if ($order == "ASC") {
		$order = "ASC";
		$link = "DESC";
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin | Sales</title>
	<link rel="stylesheet" href="admin_sales.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
	<!-- use the embedded PHP code from another file -->
	<?php require_once("../Admin panel/nav_bar.php"); ?>

	<div id="main">
		<div class="head">
			<h1 class="title_style">Recent Sales</h1>
			<div class="profile">
				<img src="images (5).jpg" class="pro-img">
				<p>JCH Admin<span>UI / Manager</span></p>
			</div>
		</div>
			
		
		<table>
			<thead>
				<tr>
					<th>Username</th>
					<th>Book Name</th>
					<th>Date Purchased  <a href="admin_sales.php?order=<?php echo $link ?>"><i class="fa fa-sort"></i></a></th>
					<th>Purchase Quantity</th>
					<th>Amount</th>
				</tr>
			</thead>

			<tbody>
				
				<?php 
					// extract all the personal history info that user_id is equal to the premary key of users table and order by DESC or ASC order
					$personal_history = mysqli_query($conn, "SELECT * FROM personal_history INNER JOIN users ON personal_history.user_id = users.id ORDER BY date_of_purchase $order");
					$personal_history_rows = mysqli_fetch_assoc($personal_history);

					if ($personal_history_rows != NULL){ // if condition not equal emapty 
						do { // extract out the personal history info from database based on the sql query above
							rows($personal_history_rows["username"], $personal_history_rows["book_name"], $personal_history_rows["date_of_purchase"], $personal_history_rows["amount"]);
						} while ($personal_history_rows = mysqli_fetch_assoc($personal_history)); // keep lopping it until reach the command of the query above
					} else {
						echo "<tr><td>No Sales Record</td></tr>"; // if condition equal empty then print this 
					}



				?>

			</tbody>
		</table>  
	</div>
		
	</div>
	<div class="clearfix"></div>
			
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>