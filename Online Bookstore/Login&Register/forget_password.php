<?php 

    include '../config.php';

    session_start();

    error_reporting(0);

?>


<!DOCTYPE html>
<head>
    <title>JCH Bookstore | Change Password</title>
    <link href="../Account Information/style.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <?php
        if(isset($_POST['submit'])){
            $registered_email = $_POST['email'];

            $user_info = "SELECT * FROM users WHERE email = '$registered_email'";
            /* Query between variable 'conn' and 'user_info' */
            $user_info_result = mysqli_query($conn, $user_info);
            $user_info_row = mysqli_fetch_assoc($user_info_result);

            $_SESSION['uid'] = $user_info_row["id"];
            
        } 
        
    ?>

    <script>
		/*Display an error pop up notice*/
        function pop_up_error(){
            Swal.fire({
                icon:'error',
                title: 'Oops',
                text: 'Email and Mobile Number Combination Not Found !'
            })
        }
		/*Display a sucess pop up notice*/
        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Account Found ! Please Click On Continue',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Account Information/password.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }

    </script>

</head>


<body>
    <!-- Nav Bar Section -->
	<?php 
    
        require_once("../Reusable Home Page Items/guest_header.php"); # Use the guest header
    
    ?>

    <div class="background">

        <div class="container" style="height: 350px;">

            <form action="" method="POST" class="login-email">
                
                <p class="login-text">Forget Password</p>

                <div class="input-group">
                    <input type="email" placeholder="Enter Email" name="email" value="<?php echo $email ?>" required>
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Mobile Number" name="mobile_number" value="<?php echo $mobile_number; ?>" required >
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Continue</button>
                </div>

            </form>

        </div>

    </div>

</body>

</html>

<?php 
	
    if(isset($_POST['submit'])) {
		/* Collect inputted form data */
        $email = $_POST['email']; 
        $mobile_number = $_POST['mobile_number'];
		/* Check to see if existing email and mobile number exists in database*/
        $sql = "SELECT * FROM users WHERE email='$email' AND mobile_num='$mobile_number'";
		/* Query between variable 'conn' and 'sql'*/
        $result = mysqli_query($conn, $sql);

        if ($result->num_rows == 1) {
            echo "<script>pop_up_success()</script>";
        } else {
            echo "<script>pop_up_error()</script>";
        }
       
    }

?>