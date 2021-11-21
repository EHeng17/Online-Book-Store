<?php 

    session_start();
    include '../config.php';
    error_reporting(0);

    /* Check to see if existing id exists in database*/
    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";

    /* Query between variable 'conn' and 'user_info' */
    $user_info_result = mysqli_query($conn, $user_info);
    $user_info_row = mysqli_fetch_assoc($user_info_result);
    

?>

<!DOCTYPE html>

<head>
    <title>JCH Bookstore | Change Email</title>
    <link href="style.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>

        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Email has been Updated!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Login&Register/login.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }

        function pop_up_error_email(){
            Swal.fire({
                icon:'error',
                title: 'Oops',
                text: 'Email Already Exist In Database !'
            })
        }

    </script>

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

    <div class="background">

        <div class="container" style="height: 350px;">

            <form action="" method="POST" class="login-email">
                
                <p class="login-text">Change Email</p>

                <div class="input-group">
                    <input value="Current Email: <?php echo $user_info_row["email"]; ?>" disabled >	
                </div>

                <div class="input-group" style="margin: auto; margin-bottom: 25px;" >
                    <input type="email" placeholder="New Email" name="email" value="<?php echo $email; ?>" required >
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Update</button>
                </div>

            </form>

        </div>

    </div>

</body>
</html>

    <?php 
    
        if(isset($_POST['submit'])){
            $email = $_POST['email'];

            # Check if inputted email equals to JCH Bookstore Admin's Email
            if ($email == "admin@gmail.com") {

                echo "<script>pop_up_error_email()</script>";

            } else {
                /* Check to see if inputted email exists in database*/
                $same_email = "SELECT * FROM users WHERE email='$email'";

                $same_email_result = mysqli_query($conn, $same_email);

                if (!$same_email_result->num_rows > 0) {

                    $update_email= "UPDATE users SET email = '$email' WHERE id = '$_SESSION[uid]'";

                    $update_email_result = mysqli_query($conn, $update_email);

                    if ($update_email_result) {
                        echo "<script>pop_up_success()</script>";
                    } else {
                        echo "<script>alert('Something went wrong')</script>";
                    }
                    
                } else {  /* If the number of row IS MORE THAN 0*/
                    echo "<script>pop_up_error_email()</script>";
                }

            }


        }
    
    ?>