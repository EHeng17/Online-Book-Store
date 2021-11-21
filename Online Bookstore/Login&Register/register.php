<?php
    include '../config.php';

    session_start();

    error_reporting(0);

    if ($_SESSION['username'] != "") {
        header("Location: login.php");
    }


?>

<!DOCTYPE html>
<html>
    <head>
        <script src="https://use.fontawesome.com/9b3b4e8e2a.js"></script>
        <link href="Account.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <title>JCH BOOKSTORE | Account</title>  

        <?php
			/* Collect inputted form data */
            if(isset($_POST['submit'])){
                $registered_email = $_POST['email'];
            }
            
        ?>

        <script>
			/*Display an error pop up*/
            function pop_up_error_email(){
                Swal.fire({
                    icon:'error',
                    title: 'Oops',
                    text: 'Email Already Exist In Database !'
                })
            }
			/*Display an error pop up*/
            function pop_up_error_pw(){
                Swal.fire({
                    icon:'error',
                    title: 'Oops',
                    text: 'Password Not Matched !'
                })
            }
			/*Display a sucess pop up notice*/
            function pop_up_success(){
                Swal.fire({
                    icon:'success',
                    title: 'Success', 
                    text: 'User Registration Completed ! Please Click On Continue',
                    showDenyButton: false,
                    showCancelButton: false,
                    confirmButtonText: '<a href="../Account Information/acc_info.php?email=<?php echo $registered_email?>" style="text-decoration:none; color:white; ">Continue</a>'
                })
            }
			/*Display an error pop up*/
            function pop_up_error_database(){
                Swal.fire({
                    icon:'warning',
                    title: 'ERROR',
                    text: 'Something Went Wrong. Please Try Again Later.'
                })
            }
			/*Display an error pop up*/
            function pop_up_error_age(){
                Swal.fire({
                    icon:'error',
                    title: 'Oops',
                    text: 'You are too young to be using this website !'
                })
            }
	    </script>

    </head>
    <body>
        <?php 

        require_once("../Reusable Home Page Items/guest_header.php"); # Use the guest header

        ?>

        <div class="form_container" style="width: 450px;">
            <form action="" method="POST" class="login">
                <p class="login_word" style="font-size: 3rem; font-weight: 1000;">Register</p>

                <div class="input-field" style="display: flex;">
                    <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required style="width: 50%; margin-right:10px" maxlength="10" minlength="2">
                    <input type="text" name="dob" value="<?php echo $dob; ?>" required placeholder="Date of Birth" style="width: 50%;" onfocus="(this.type='date')" onblur="(this.type='text')">
                </div>

                <div class="input-field">
                    <input type="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>" required>
                </div>

                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>

                <div class="input-field">
                    <input type="password" placeholder="Confirm Password" name="cpassword" value="<?php echo $_POST['cpassword']; ?>" required>
                </div>

                <div class="input-field">
                    <button name="submit" class="btn">Register</button>
                </div>

                <p class="login-register_exchange">Have an account? <a class="account_a" href="login.php">Login Here</a></p>

            </form>
        </div>

        <?php 

        /* If name=submit is not empty */
            if(isset($_POST['submit'])) {
                
                $dob = $_POST['dob']; /* User's inputted date of birth */
                $date_today = date("Y-m-d"); /* Get today's date */

                /* Turn the years from string format to date format */
                $user_dob=new DateTime($dob);
                $current_date=new DateTime($date_today);

                $difference = $user_dob->diff($current_date); /* Difference between today's date and user's date of birth */

                $age= $difference->y; /* Extract the year out of the 'difference' variable */

                if ($age < 18){ /* If user is below 18 */

                    echo "<script>pop_up_error_age()</script>";

                }else{ 

                    /* Collect all inputted form data */
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = md5($_POST['password']); /* md5 to give the password an encrypted look */
                    $cpassword = md5($_POST['cpassword']);

                    /* If password variable equals to cpassword variable (Checking if password and confirm password is inputted the same) */
                    if($password == $cpassword) {

                        if ($email == "admin@gmail.com"){

                            echo "<script>pop_up_error_email()</script>";
                            
                        } else {
                            /* Check to see if inputted email exists in database*/
                            $sql = "SELECT * FROM users WHERE email='$email'";
                            
                            /* Query between variable 'conn' and 'sql'*/
                            $result = mysqli_query($conn, $sql);

                            /* If the number of row IS NOT MORE THAN 0*/
                            if(!$result->num_rows > 0) {

                                /* Insert all inputted values into 'users' table (in MySQL)*/
                                $sql = "INSERT INTO users (username, email, password)
                                        VALUES ('$username', '$email', '$password')";
                                $result = mysqli_query($conn, $sql);
                                if ($result) {
                                    echo "<script>pop_up_success()</script>";
                                    
                                } else {
                                    echo "<script>pop_up_error_database()</script>";
                                    //echo "<script>alert('OOPS! Something wrong went.')</script>";
                                }
                            } else {  /* If the number of row IS MORE THAN 0*/
                                echo "<script>pop_up_error_email()</script>";
                            }                            
                        }

                    } else { /* If password variable is not equal to cpassword variable  */
                        echo "<script>pop_up_error_pw()</script>";
                    }
                
                }

            }

        ?>
    </body>
</html>

