<?php
    session_start();

    include '../config.php';

    error_reporting(0);

    if (isset($_SESSION['uid'])) {
        header("Location: ../Home Page/Home.php");
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <link href="Account.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
        <title>JCH BOOKSTORE | Login</title>

        <script>
			/*Display an error pop up*/
            function pop_up(){
                Swal.fire({
                    icon:'error',
                    title: 'Oops',
                    text: 'You have entered the wrong email or password.',
                    showCancelButton: true,
                    confirmButtonText: '<a href="forget_password.php" style="text-decoration:none; color:white; ">Forget Password</a>'
                })
            }
        </script>

    </head>
    <body>
        <?php 

        require_once("../Reusable Home Page Items/guest_header.php"); # Use the guest header

        ?>

        <div class="form_container">
            <form action="" method="POST" class="login">
                <p class="login_word" style="font-size: 3rem; font-weight: 1000;">Login</p>
                <div class="input-field">
                    <input type="email" placeholder="Email Address" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="input-field">
                    <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-field">
                    <button name="submit" class="btn">Login</button>
                </div>
                <p class="login-register_exchange">Don't have an account? <a class="account_a" href="register.php">Register Here</a></p>
            </form>
        </div>

        
    </body>
</html>

<?php 
    if (isset($_POST['submit'])) {

        /* Collect inputted form data */
        $email = $_POST['email'];
        $password = md5($_POST['password']);
    
        /* Check to see if existing email and password combination exists in database*/
        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        
        /* Query between variable 'conn' and 'sql'*/
        $result = mysqli_query($conn, $sql);
    
        if ($result->num_rows > 0) {
            /*Fetch a result row as an associative array*/
            $row = mysqli_fetch_assoc($result);
            $_SESSION['uid'] = $row['id'];
            header("Location: ../Home Page/Home.php");
            exit;
        } else if ($email == "admin@gmail.com" and $password == md5("admin")) {
            header("Location: ../Admin panel/Admin main page.php");
            exit;
        } else {
            echo "<script>pop_up()</script>";
        }
    }
?>