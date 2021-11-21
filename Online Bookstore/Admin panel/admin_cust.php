<?php

	include "../config.php"; // link the configure php file

	/// use the embedded PHP code from another file
	require_once("../Admin panel/cust_record_row.php");

	session_start();

    error_reporting(0); // the error will not be displayed 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin | Customers Dashboard</title>
	<link rel="stylesheet" href="admin_panel.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
		table {
			margin-top: -97px;
		}

		th{
			padding: 120px 32px 10px;
			text-transform: uppercase;
			letter-spacing: 2px;
			font-size: 15px;
			font-weight: 900;
		}
		.head {
			margin-bottom: -95px;
		}
		.search_box {
			margin-right: 10px;
			margin-left: 23px;
			margin-bottom: 40px;
			width: 400px;
			padding: 8px 5px;
			font-size: 12pt;
			border-radius: 20px;
			
		}

		.search_click {
			width: 100px;
			font-size: 12pt;
			padding: 10px 5px;
			background-color: #e8e5e1;
			color: purple;
			border-radius: 4px;
			cursor: pointer;
			border: none;
		}

		.search_click:hover {
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
	<!-- use the embedded PHP code from another file -->
	<?php require_once("../Admin panel/nav_bar.php"); ?>

	<div id="main">
		<div class="head">
			<h1 class="title_style">Customers</h1>
				<div class="profile">	
					<img src="images (5).jpg" class="pro-img">
					<p>JCH Admin<span>UI / Manager</span></p>
				</div>
		</div>
			
			<div class="clearfix"></div>
		</div>
		
		

		<div class="col-div-8">

			<div class="box-8">
				<div class="content-box">
					
					<br/>

					<br/><br/><br/><br/>

					<form method="POST">
						<div class="search_container">
							<input class="search_box" type="text" name="search_key" placeholder="   Seach customer username here" >
							<button class="search_click" type="submit" name="search_btn">SEARCH</button>
						</div>
					</form>
					<table>
						<thead>
							<tr>
								<th>Full name</th>
								<th>Gender</th>
								<th>username</th>
								<th>Email</th>
								<th>Phone Number</th>

							</tr>
						</thead>

						<tbody>
						
							<?php
								// if search box is empty then execute the code below, else, show the result inserted in the search box
								$search_name = "";

								// if isset is POST 'search_btn' only execute the code below
								if(isset($_POST['search_btn'])){
									$search_name = $_POST['search_key']; //a variable that to get the value that inputted by using POST method
								}
								
								// extract all the user info that is username equal the inputted search value
								$user_info = "SELECT * FROM users
											  WHERE username LIKE '%$search_name%'";
                                $user_info_result = mysqli_query($conn, $user_info); // connection between database and the update sql query
                                $user_info_row = mysqli_fetch_assoc($user_info_result);

								if ($user_info_row != NULL){ // if condition not equal emapty 
									do { // extract out the user info from database based on the sql query above
										$customer_full_name = $user_info_row["first_name"]." ".$user_info_row["last_name"];
										cust_row($customer_full_name, $user_info_row["gender"], $user_info_row["username"], $user_info_row["email"], $user_info_row["mobile_num"]);
									} while ($user_info_row = mysqli_fetch_assoc($user_info_result)); // keep lopping it until reach the command of the query above
								} else {
									echo '<tr><td>No user found</td></tr>'; // if condition equal empty then print this 
								}

							?>
						
						</tbody>
						
					</table>
				</div>
			</div>
		</div>
		
		
	</div>
	<div class="clearfix"></div>
			
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</body>

</html>