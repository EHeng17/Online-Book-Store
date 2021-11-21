<?php 

	session_start();

    include '../config.php'; // link the configure php file

    error_reporting(0); // the error will not be displayed 

	// Extract user info out where the id is $_SESSION[uid]
    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
    $user_info_result = mysqli_query($conn, $user_info);
    $user_info_row = mysqli_fetch_assoc($user_info_result);
	

?>

<!DOCTYPE html>
<head>
    <title>JCH Bookstore | Account</title>
    <link rel="stylesheet" href="account_info_user.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

	<script>
		// a pop-up function that use at php code
		function pop_up_delete_acc(){
            Swal.fire({
                icon:'warning',
                title: 'ALERT',
                text: 'Are you sure that you want the account deleted ?',
                showCancelButton: true,
                confirmButtonText: '<a href="delete_acc.php" style="text-decoration:none; color:white; ">Yes</a>',
            })
        }
	</script>
</head>
<body>

	<!-- Nav Bar Section -->
	<?php 
		// if isset is $_SESSION['uid'] will excute the following function
        if (isset($_SESSION['uid'])) {
			// use the embedded PHP code from another file
            require_once("../Reusable Home Page Items/login_header.php"); 
        } else {
            require_once("../Reusable Home Page Items/guest_header.php");
        }
 
    ?>

	<div class="wrapper">
		<h2 class="colored_header">Account Information</h2>

		<div class="container" id="container">
			<div class="form-container email_pw_container">
				<form class="form_wrapper"  action="#">
					<h1 style="color: tomato;">Email & Password</h1>
					<input class="input_area" value="Email: <?php echo $user_info_row["email"]; ?>" disabled >	
					<input class="input_area" value="Password: HIDDEN" disabled >

					<a class="button" href="email.php?email=<?php echo $user_info_row['email']; ?>" style="text-decoration: none; color:white; width:232px;">Change Email</a>

					<a class="button" href="password.php" style="text-decoration: none; color:white;">Change Password</a>
				</form>
			</div>

			<div class="form-container personal_details_container">
				<form class="form_wrapper" action="#">
					<h1 style="color: tomato;">Personal Details</h1>
					<input class="input_area" value="First Name: <?php echo $user_info_row["first_name"]; ?>" disabled>
					<input class="input_area" value="Last Name: <?php echo $user_info_row["last_name"]; ?>" disabled>
					<input class="input_area" value="Mobile Number: <?php echo $user_info_row["mobile_num"]; ?>" disabled >
					<input class="input_area" value="Gender: <?php echo $user_info_row["gender"]; ?>" disabled >	
					<a class="button" href="acc_info.php?email=<?php echo $user_info_row['email']; ?>&uid=<?php echo $_SESSION['uid']; ?>">Edit Details</a>
				</form>
			</div>

			<div class="overlay-container">
				<div class="overlay">
					<div class="overlay-panel overlay-left">
						<h1>Edit Personal Details</h1>
						<button class="button ghost" id="personal_details">View Details</button>
					</div>
					<div class="overlay-panel overlay-right">
						<h1>Edit Email & Password</h1>
						<button class="button ghost" id="email_pw">View Details</button>
					</div>
				</div>
			</div>

		</div>
		<button class="button" style="background-color: red;" onclick="pop_up_delete_acc()">Delete Account</button>
	</div>

	

<script src = "app.js"> </script>
</body>
</html>