<?php

	include "../config.php"; // link the configure php file

	require_once("../Admin panel/cust_inquiry_row.php"); // use the embedded PHP code from another file

	session_start();

    error_reporting(0); // the error will not be displayed 

?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin | Customer Inquiry</title>
	<link rel="stylesheet" href="admin_panel.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        .inquiry_reply {
            font-weight: bold;
            cursor: pointer;
        }

        .inquiry_reply:hover{
            background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9);
			background-size: 100%;
			background-clip: text;
			-webkit-background-clip: text; /* Chrome and Safari Compatibility */
			-moz-background-clip: text; /* Mozilla Firefox Compatibility */
			-webkit-text-fill-color: transparent;
			-moz-text-fill-color:transparent;
        }

		.head {
			margin-bottom: 15px;
		}
    </style>
</head>


<body>
	<!-- use the embedded PHP code from another file -->
	<?php require_once("../Admin panel/nav_bar.php"); ?>

	<div id="main">
		<div class="head">
			<h1 class="title_style">Customers' Inquiry</h1>
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
					<table>
						<thead>
							<tr>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Email</th>
								<th>Reason</th>
								<th>Question</th>
								<th style="color: white;">aaaa</th>
							</tr>
						</thead>

						<tbody>
						
							<?php
								// extract all the info form contactus table
								$contact_info = "SELECT * FROM contactus 
												 INNER JOIN users ON contactus.userID = users.id";
								$contact_info_result = mysqli_query($conn, $contact_info); // connection between database and the update sql query
								$contact_info_row = mysqli_fetch_assoc($contact_info_result);

								if ($contact_info_row != NULL){ // if condition not equal emapty 
									do { // extract out the contact us info from database based on the sql query above
										cust_inquiry($contact_info_row["contact_us_ID"], $contact_info_row["userID"], $contact_info_row["first_name"], $contact_info_row["last_name"], $contact_info_row["email"], $contact_info_row["Reason"], $contact_info_row["Question"]);
									} while ($contact_info_row = mysqli_fetch_assoc($contact_info_result)); // keep lopping it until end
								} else {
									echo "<tr><td>No Inquiries Asked</td></tr>"; // if condition equal empty then print this 
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