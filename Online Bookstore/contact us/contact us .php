<?php 

  session_start();
    
  error_reporting(0);

  include '../config.php';
  
  #Extracting user information from database
  $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
  $user_info_result = mysqli_query($conn, $user_info);
  $user_info_row = mysqli_fetch_assoc($user_info_result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="Contactus.css">
  <link href="../Home Page/style - c.css" rel="stylesheet" >
  <link href='https://image.flaticon.com/icons/png/128/3534/3534033.png' rel='icon' type='image/x-icon'/>
  <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <title>Contact us | Ask Question</title>

  <script>
	/*Display a pop up notice for pending reply */
    function pop_up_notification() {
      Swal.fire({
        icon:'warning',
        title: 'ALERT',
        text: 'An account is needed to contact us.',
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: '<a href="../Login&Register/login.php" style="text-decoration:none; color:white; ">Log In</a>',
        denyButtonText: '<a href="../Login&Register/register.php" style="text-decoration:none; color:white; ">Register</a>',
      })
    }
	/*Display an error pop up notice*/
    function pop_up_error_db() {
      Swal.fire({
        icon:'warning',
        title: 'ALERT',
        text: 'Something went wrong',
      })
    }
	/*Display a pop up notice*/
    function pop_up_success() {
      Swal.fire({
        icon:'success',
        title: 'Success',
        text: 'Question submitted !'
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

<section class="bodystyle">
  <div class="container">
    <form action="" method="POST">

      <div class="form-group">
        <b>First Name</b>
        <input type="text" id="firstName" name="firstName" value="<?php echo $user_info_row['first_name'];?>" required>
      </div>

      <div class="form-group">
        <b>Last Name</b>
        <input type="text" id="lastName" name="lastName" value="<?php echo $user_info_row['last_name'];?>" required>
      </div>

      <div class="form-group">
        <b>Email</b>
        <input type="email" id="email" name="email" value="<?php echo $user_info_row['email'];?>" required>
      </div>

      <div class="form-group">
        <b>Reason</b>
        <input type="text" maxlength="100" id="reason" name="reason" required>
      </div>

      <div class="form-group">
        <b>Question</b>
        <textarea type="text" maxlength="200" name="massage" id="massage" cols="30" rows="2" required></textarea>
      </div>

      <?php 
        if (isset($_SESSION['uid'])) {
          echo "<button type=\"submit\" class=\"btn\" name=\"submit\">Submit</button>";
        } else {
          echo "<button type=\"submit\" class=\"btn\" name=\"submit\">Submit</button>";
        }  
      ?>
    </form>
  </div>
  <div id="status"></div>
</section>

<?php require_once("../Reusable Home Page Items/Footer.php"); ?>

<?php

  if(isset($_POST['submit'])) {
	/* Collect all inputted form data */
    $firstnm = $_POST['firstName'];
    $lastnm = $_POST['lastName'];
    $reason = $_POST['reason'];
    $question = $_POST['massage'];
	/*Insert data into the database*/
    $sql="INSERT INTO contactus(userID, first_name, last_name, Reason, Question) VALUES ('$_SESSION[uid]', '$firstnm', '$lastnm', '$reason', '$question')";
	/* Query between variable 'conn' and 'sql'*/
    $result = mysqli_query($conn,$sql);

    if (!$result) {
        echo "<script>pop_up_notification()</script>";

    }else {
        echo '<script>pop_up_success()</script>';
    }
  }

?>

</body>
</html>

