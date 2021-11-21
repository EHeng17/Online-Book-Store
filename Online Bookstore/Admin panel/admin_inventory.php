<?php
    
	session_start();

	include "../config.php"; // link the configure php file

	require_once("../Admin panel/inventory_row.php"); // use the embedded PHP code from another file

    error_reporting(0);  // the error will not be displayed

	// extract all book info out
    $book_info = "SELECT * FROM books";
    $book_info_result = mysqli_query($conn, $book_info);
    $book_info_row = mysqli_fetch_assoc($book_info_result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin | Inventory</title>
	<link rel="stylesheet" href="admin_panel.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<style>
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
		.update-click:hover {
			background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9);
			background-size: 100%;
			background-clip: text;
			-webkit-background-clip: text; /* Chrome and Safari Compatibility */
			-moz-background-clip: text; /* Mozilla Firefox Compatibility */
			-webkit-text-fill-color: transparent;
			-moz-text-fill-color:transparent;
		}
		.update-click {
			font-weight: bold;
            cursor: pointer;
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
			<h1 class="title_style">Inventory</h1>
			<div class="profile">
				<img src="images (5).jpg" class="pro-img">
				<p>JCH Admin<span>UI / Manager</span></p>
			</div>
		</div>
			


        
		<div class="col-div-8">

			<div class="box-8">
				<div class="content-box">
					
					<br/>
					
					<br/><br/><br/><br/>

					<form method="POST">
						<div class="seach_container">
							<input class="search_box" type="text" name="search_key" placeholder="   Seach book name here" >
							<button class="search_click" type="submit" name="search_btn">SEARCH</button>
						</div>
					</form>
					<button class="add_button"><a href="../Add Book/add_book.php" class="add-btn">ADD BOOK</a></button>
					<table>
						
						<thead>
							<tr>
								<th>Book Title</th>
								<th>Genre</th>
								<th>Book author</th>
								<th>Book Format</th>
								<th>Book Price</th>
								<th>Quantities</th>
								<th style="color: white;">aaaa</th>
							</tr>
						</thead>

						<tbody>
						
							<?php

								// if search box is empty then execute the code below, else, show the result inserted in the search box
								$search_key = "";

								// if isset is POST 'search_btn' only execute the code below
								if(isset($_POST['search_btn'])){
									$search_key = $_POST['search_key']; //a variable that to get the value that inputted by using POST method
								}
								
								// extract all the user info that is username equal the inputted search value
								$category_info = "SELECT * FROM books 
												  INNER JOIN categories ON books.category_id = categories.category_id
												  WHERE book_name LIKE '%$search_key%' 
												  ORDER BY books.category_id";
                                $category_info_result = mysqli_query($conn, $category_info); // connection between database and the update sql query
                                $category_info_row = mysqli_fetch_assoc($category_info_result);

								if ($category_info_row != NULL){ // if condition not equal emapty 
									do { // extract out the book info from database based on the sql query above
										book_row($category_info_row['book_id'], $category_info_row["book_name"], $category_info_row["category_name"], $category_info_row["book_author"], $category_info_row["book_format"], $category_info_row["book_price"], $category_info_row["quantity"]);
									} while ($category_info_row = mysqli_fetch_array($category_info_result)); // keep lopping it until reach the command of the query above
								} else {
									echo "<tr><td>No Books Found in Database</td></tr>"; // if condition equal empty then print this 
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