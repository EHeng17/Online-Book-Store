<?php

	include "../config.php"; // link the configure php file

	session_start();

	error_reporting(0); // the error will not be displayed 

	require_once("../Admin panel/mainpage_inventory_row.php"); /// use the embedded PHP code from another file

	#Count the total number of registered user
	#use COUNT to count the number of id from users table 
	$total_user = "SELECT COUNT(id) FROM users";
	$num_rs = mysqli_query($conn, $total_user);
	$num_result = mysqli_fetch_array($num_rs);

	#Count the total number of inquiry
	#use COUNT to count the number of contact us id from contactus table 
	$total_inquiry = "SELECT COUNT(contact_us_ID) FROM contactus";
	$total_result = mysqli_query($conn, $total_inquiry);
	$total_row = mysqli_fetch_array($total_result);

	#Count the total number of book stock 
	#use COUNT to count the number of book_id from books table 
	$total_book = "SELECT COUNT(book_id) FROM books";
	$total_book_result = mysqli_query($conn, $total_book);
	$total_book_row = mysqli_fetch_array($total_book_result);

	#Count the total number of book stock 
	#use COUNT to count the number of book_id from books table 
	$total_sales = "SELECT COUNT(history_id) FROM personal_history";
	$total_sales_result = mysqli_query($conn, $total_sales);
	$total_sales_row = mysqli_fetch_array($total_sales_result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Dashboard</title>
	<link rel="stylesheet" href="mainpage.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		.head {
			margin-bottom: 15px;
		}

		.top_img {
			width: 200px; 
			height: 250px; 
			margin-top: -70px;
			margin-left: 200px; 
			margin-bottom:-10px;
		}
	</style>

</head>


<body>
	<!-- use the embedded PHP code from another file -->
	<?php require_once("../Admin panel/nav_bar.php"); ?>

	<div id="main">
		<div class="head">
			<h1 class="title_style">Main Dashboard</h1>
				<div class="profile">	
					<img src="images (5).jpg" class="pro-img">
					<p>JCH Admin<span>UI / Manager</span></p>
				</div>
		</div>
			
			<div class="clearfix"></div>

		<div class="small_box">
			<a href="admin_cust.php">
				<div class="box">
					<p><?php echo $num_result[0]; ?><br/><span>Customers</span></p>
					<i class="fa fa-users box-icon"></i>		
				</div>
			</a>
		</div>
		
		<div class="small_box">
			<a href="admin_cust_inquiry.php">
				<div class="box">
					<p><?php echo $total_row[0]; ?><br/><span>Customer Inquiry</span></p>
					<i class="fa fa-shopping-bag box-icon"></i>
				</div>
			</a>
		</div>
		
		<div class="small_box">
			<a href="admin_inventory.php">
				<div class="box">
					<p><?php echo $total_book_row[0]; ?><br/><span>Inventory</span></p>
					<i class="fa fa-cubes box-icon"></i>
				</div>
			</a>
		</div>
		
		<div class="small_box">
			<a href="admin_sales.php?order=DESC">
				<div class="box">
					<p><?php echo $total_sales_row[0]; ?><br/><span>Sales</span></p>
					<i class="fa fa-tags box-icon"></i>
				</div>
			</a>
		</div>
		
		<div class="clearfix"></div>
		<br/><br/>
		
		<div class="chart">
			<br><h1 style="margin-left: 15%;">Total Sales</h1><br><br>
			<div class="numbers">
				<li><span style="margin-left: 240%;">100%</span></li>
				<li><span style="margin-left: 240%;">50%</span></li>
				<li><span style="margin-left: 240%;">0%</span></li>
			</div>
			<div class="bars">
				<li><div class="bar" data-percentage="50"></div><span>January</span></li>
				<li><div class="bar" data-percentage="30"></div><span>February</span></li>
				<li><div class="bar" data-percentage="60"></div><span>March</span></li>
				<li><div class="bar" data-percentage="100"></div><span>April</span></li>
				<li><div class="bar" data-percentage="80"></div><span>May</span></li>
				<li><div class="bar" data-percentage="20"></div><span>June</span></li>
				<li><div class="bar" data-percentage="40"></div><span>July</span></li>
				<li><div class="bar" data-percentage="65"></div><span>August</span></li>
				<li><div class="bar" data-percentage="90"></div><span>September</span></li>
				<li><div class="bar" data-percentage="50"></div><span>October</span></li>
				<li><div class="bar" data-percentage="15"></div><span>November</span></li>
				<li><div class="bar" data-percentage="75"></div><span>December</span></li>
			</div>
		</div>
	
	    <div class="clearfix"></div>
		<br/><br/>
		<div class="inv_column">
			<h1 style="margin-left: 12px;">Inventory</h1><br>
			<div class="inv_box">
				
				<div class="content-box">
					<p><a href="admin_inventory.php"><span style="cursor: pointer;">View All</span></a></p>
					<br><br><br>
					<table>

						<?php

							# show 4 books' name and quantity that from books table order by publish date
							$sql = "SELECT book_name, quantity FROM books ORDER BY book_pub_date LIMIT 4 ";
							$result = mysqli_query($conn, $sql); // connection between database and the update sql query
							$row = mysqli_fetch_assoc($result);

							do { // extract out the books from database based on the sql query above 
								inventory_rows($row['book_name'], $row['quantity']);
							} while ($row = mysqli_fetch_assoc($result)); // keep lopping it until reach the command of the query above


						?>
						
					</table>
				</div>
			</div>
		</div>
		
		<div class="best_sales_column">
			<h1 >Best Sales</h1><br>
			<div class="best_sales_box">
				<div class="content-box">
				<br><br><br>
					<table>

						<?php
							# count the same book_id number from personal_history and select the highest one after counting
							// extract book info from 2 table and count the book_id
							$top1 = "SELECT books.book_img, books.book_id, COUNT(personal_history.book_id) AS total_sales, personal_history.book_name 
									 FROM books, personal_history
									 WHERE books.book_id = personal_history.book_id 
									 GROUP BY personal_history.book_id HAVING COUNT(personal_history.book_id)>=1 ORDER BY total_sales DESC"; // result group by the count of book_id that more 1 and order by descending order 
							$top1_result = mysqli_query($conn, $top1);
							$result1_row = mysqli_fetch_assoc($top1_result);

						?>
						
						<tr>
							<td style="border-bottom: none;">
								<img class="top_img" src="<?php echo $result1_row['book_img'];?>" alt="<?php echo $result1_row['book_name'];?>"> <!-- print out the wanted result based on the query above -->
							</td>
						</tr>
						<tr>
							<td style="text-align: center; border-bottom: none;"><strong><?php echo $result1_row['book_name'];?></strong> have reach the top sales which sold <strong><?php echo $result1_row['total_sales'];?></strong> books</td>
						</tr>					
						
					</table>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
			
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
$(function(){
      $('.bars li .bar').each(function(key, bar){
        var percentage = $(this).data('percentage');
        $(this).animate({
          'height' : percentage + '%'
        },1000);
      });
    });
</script>

</body>

</html>