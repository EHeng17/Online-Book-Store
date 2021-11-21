<?php 

  session_start();
    
  error_reporting(0);

  include '../config.php';
  require_once("view_row.php");
  
  #Extracting user information from database
  $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
  $user_info_result = mysqli_query($conn, $user_info);
  $user_info_row = mysqli_fetch_assoc($user_info_result);

  #Extracting user information from database
  $reply_info = "SELECT reply_id, reason, question, answer FROM inquiry_reply
                 WHERE user_ID = $_SESSION[uid]";
  $reply_info_result = mysqli_query($conn, $reply_info);
  $reply_info_row = mysqli_fetch_assoc($reply_info_result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <link href="view_reply.css?v=<?php echo time(); ?>" rel="stylesheet" >
  <link href='https://image.flaticon.com/icons/png/128/3534/3534033.png' rel='icon' type='image/x-icon'/>
  <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
  <title>Contact us | View Reply</title>

  <style>
    h1 {
        text-align: center; 
        font-size: 40px;
        margin-bottom: 20px;
        margin-top: 20px;
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

  <!-- Nav Bar Section -->
  <?php 

    if (isset($_SESSION['uid'])) {
        require_once("../Reusable Home Page Items/login_header.php"); 
    } else {
        require_once("../Reusable Home Page Items/guest_header.php");
    }

  ?>
    <div class="container">
        <h1>View Questions Reply</h1>
        <div class="container_box">
            <div class="answers">
                
                <?php

                    if ($reply_info_row != NULL){
                        do {
                          ans_row($reply_info_row['reply_id'], $reply_info_row['reason'], $reply_info_row["question"], $reply_info_row["answer"]);
                        } while ($reply_info_row = mysqli_fetch_assoc($reply_info_result));
                    } else {
                        echo "<h2 style=\"margin-bottom: 200px;\">No Question Replied</h2>";
                    }

                ?>

            </div>
        </div>
    </div>
    <br><br><br><br><br>


<?php require_once("../Reusable Home Page Items/Footer.php"); ?>


</body>
</html>

