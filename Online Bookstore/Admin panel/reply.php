<?php
	session_start();

	include "../config.php"; // link the configure php file 

    error_reporting(0); // the error will not be displayed 

    // get the contactID from the source page and store in session var
    $_SESSION["contact_us_ID"] = $_GET['contactID'];

    // get the uid from the source page and store in a var
    $userid = $_GET['uid'];

    #Extracting book information from database
    $contact_info = "SELECT * FROM contactus 
                     WHERE contact_us_ID = $_SESSION[contact_us_ID]";
    $contact_info_result = mysqli_query($conn, $contact_info);
    $contact_info_row = mysqli_fetch_assoc($contact_info_result);

?>


<!DOCTYPE html>
<html>
<head>
	<title>JCH Bookstore | Reply customer inquiry</title>
	<link rel="stylesheet" href="reply.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>
        // a pop-up function that use at php code
        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Successfully Reply!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Admin panel/admin_cust_inquiry.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }
    </script>

</head>


<body>
    <!-- use the embedded PHP code from another file -->
    <?php require_once("../Admin panel/nav_bar.php"); ?>

    <div class="background">

        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text">Reply customer inquiry</p>

                <div class="input-group" style="display: flex;">
                    <input type="text" placeholder="customer's first name" name="cust_fnm" value="<?php echo $contact_info_row['first_name']; ?>" required style="margin-right: 30px; text-transform: capitalize;">
                    <input type="text" placeholder="customer's last name" name="cust_lnm" value="<?php echo $contact_info_row['last_name']; ?>" required style="text-transform: capitalize;">
                </div>

                <div class="input-group">
                    <input type="text" placeholder="customer's inquiry reason" name="cust_inquiry_reason" value="<?php echo $contact_info_row['Reason']; ?>" required>
                </div>

                <div class="input-group">
                    <textarea type="text" name="inquiry" rows="3" placeholder="Customer's inquiry" required><?php echo htmlspecialchars($contact_info_row['Question']); ?></textarea>
                </div>

                <div class="input-group">
                    <textarea type="text" maxlength="200" name="answer" rows="3" placeholder="Answer" required></textarea>
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Reply</button>
                </div>
            </form>
        </div>

    </div>
	
    <?php 
    // if isset is POST 'submit' only execute the code below
    if(isset($_POST['submit'])) {

        //a variable that to get the value that inputted by using POST method 
        $answer = $_POST['answer'];
        $reason = $_POST['cust_inquiry_reason'];
        $question = $_POST['inquiry'];

        // insert the inputted value above to inquiry_reply table 
        $sql = "INSERT INTO inquiry_reply (user_ID, reason, question, answer)
                VALUES ('$userid', '$reason', '$question', '$answer')";
        
        $result = mysqli_query($conn, $sql);  // connection between database and the update sql query
        
        // if $result successfully excuted, then run the following code
        if ($result) { 

            // delete the contactus info if the contact_us_ID is the $_SESSION[contact_us_ID]
            $delete_inquiry = "DELETE FROM contactus WHERE contact_us_ID = $_SESSION[contact_us_ID]";
            $delete_inquiry_result = mysqli_query($conn, $delete_inquiry);

            echo "<script>pop_up_success()</script>"; //print out the javascript function alert
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

    }

    ?>			
	


</body>