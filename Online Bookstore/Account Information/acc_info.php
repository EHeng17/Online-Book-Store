<?php 
    session_start(); 

    include '../config.php'; // link the configure php file

    error_reporting(0); // the error will not be displayed 

    //$_SESSION['email'] is equal to the 'email' that from the origin source link 
    $_SESSION['email'] = $_GET['email'];
    
    // Extract user info out where the id is $_SESSION[uid]
    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
    $user_info_result = mysqli_query($conn, $user_info);
    $user_info_row = mysqli_fetch_assoc($user_info_result);
?>

<!DOCTYPE html>

<head>
    <title>JCH Bookstore | Account</title>
    <link href="acc_info.css" rel="stylesheet" >
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    

    <script>
        // a pop-up function that use at php code
        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'User Profile Updated!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Login&Register/login.php" style="text-decoration:none; color:white; ">Log In</a>'
            })
        }

        function pop_up_error_mobile_num(){
            Swal.fire({
                icon:'error',
                title: 'Oops',
                text: 'Mobile Number Already Exist In Database ! Please make sure to double check !'
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

    <div class="background">

        <div class="container">
            <form action="" method="POST" class="acc_info">
                <p class="main_text">Account Information</p>

                <div class="fl_name">
                    <input type="text" placeholder="First Name" name="first_name" required style="margin-right: 25px;" value="<?php echo $user_info_row["first_name"]; ?>">
                    <input type="text" placeholder="Last Name" name="last_name" value="<?php echo $user_info_row["last_name"]; ?>"required>
                </div>

                <div class="input_group">
                    <input type="number" placeholder="Mobile Number" name="mobile_number" value="<?php echo $user_info_row["mobile_num"]; ?>" required >
                </div>

                <div class="input_group" style="margin: auto; margin-bottom: 25px;" >
                    <select name = "gender"  required>
                        <option value="" disabled selected>-- Select Gender --</option>
                        <option value="Male" 
                        
                            <?php
                                // if $user_info_row['gender'] is "Male" then will auto select the selection
                                if($user_info_row['gender'] == "Male"){
                                    echo 'selected="selected"';
                                }

                            ?>  
                        
                        >Male</option>
                        <option value="Female"
                        
                            <?php
                                // if $user_info_row['gender'] is "Female" then will auto select the selection
                                if($user_info_row['gender'] == "Female"){
                                    echo 'selected="selected"';
                                }

                            ?>  
                        
                        >Female</option>
                    </select>
                </div>
                <div class="input_group">
                    <button name="submit" class="btn">Update</button>
                </div>
            </form>
        </div>

    </div>
    
    <?php 
    // if isset is POST 'submit' only execute the code below
    if(isset($_POST['submit'])) {

        //a variable that to get the value that inputted by using POST method 
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $gender = $_POST['gender']; 
        $mobile_number = $_POST['mobile_number'];

        /* Check to see if inputted phone number exists in database */
        $same_mobile_num = "SELECT * FROM users WHERE mobile_num='$mobile_number'";
    
        /* Query between variable 'conn' and 'same_mobile_num' */
        $same_mobile_num_result = mysqli_query($conn, $same_mobile_num);

        // if the same number of mobile in database is less than of equal 1
        if ($same_mobile_num_result->num_rows <= 1) {

            // a sql variable that to update the users table and specific column with new value
            $sql = "UPDATE users SET first_name = '$first_name', last_name = '$last_name', mobile_num = '$mobile_number', gender = '$gender' WHERE email = '$_SESSION[email]'";
            
            // connection between database and the update sql query
            $result = mysqli_query($conn, $sql);
            
            // if $result successfully excuted, then run the following code
            if ($result) {
                echo "<script>pop_up_success()</script>";
            } else {
                echo "<script>alert('Something went wrong')</script>";
            }
        } else { 
            echo "<script>pop_up_error_mobile_num()</script>";
        }

    }

    ?>

    
</body>
</html>