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
    <title>JCH Bookstore | Change Password</title>
    <link href="style.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>

        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Password has been Changed!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Login&Register/login.php" style="text-decoration:none; color:white; ">Log In</a>'
            })
        }

        function pop_up_error_pw(){
            Swal.fire({
                icon:'error',
                title: 'Oops',
                text: 'Password Not Matched !'
            })
        }

        function pop_up_error_same_pw(){
            Swal.fire({
                icon:'error',
                title: 'Oops',
                text: 'Password Cannot Be The Same As Previous Password !'
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
                
                <p class="login-text">Change Password</p>

                <div class="input-group">
                    <input type="password" placeholder="New Password" name="new_password" value="<?php echo $_POST['new_password']; ?>" required>
                </div>

                <div class="input-group">
                    <input type="password" placeholder="Confirm New Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
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

    if(isset($_POST['submit'])) {
        $password = md5($_POST['new_password']); /* md5 to give the password an encrypted look */
        $cpassword = md5($_POST['cpassword']);

        if ($password == $user_info_row['password'] ) {
            echo "<script>pop_up_error_same_pw()</script>";
        } else {
            /* If password variable equals to cpassword variable (Checking if password and confirm password is inputted the same) */
            if($password == $cpassword) {

                $update_pw= "UPDATE users SET password = '$password' WHERE id = '$_SESSION[uid]'";

                $update_pw_result = mysqli_query($conn, $update_pw);

                if($update_pw_result) {
                    echo "<script>pop_up_success()</script>";
                } else {
                    echo "<script>alert('Something went wrong')</script>";
                }

            } else { /* If password variable is not equal to cpassword variable  */
                echo "<script>pop_up_error_pw()</script>";
            }
        }

        
    }

?>