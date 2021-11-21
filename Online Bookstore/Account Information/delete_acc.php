<?php 
    session_start();

    include "../config.php"; // link the configure php file

    // delete everything at the 'billing_address' table if the userID is $_SESSION[uid]
    $billing_address_remove = mysqli_query($conn,"DELETE FROM billing_address WHERE userID=$_SESSION[uid]");

    // delete everything at the 'personal_history' table if the user_id is $_SESSION[uid]
    $personal_history_remove = mysqli_query($conn,"DELETE FROM personal_history WHERE user_id=$_SESSION[uid]");

    // delete everything at the 'contactus' table if the user_ID is $_SESSION[uid]
    $contact_us_remove = mysqli_query($conn,"DELETE FROM contactus WHERE userID=$_SESSION[uid]");

    // delete everything at the 'users' table if the id is $_SESSION[uid]
    $result = mysqli_query($conn,"DELETE FROM users WHERE id=$_SESSION[uid]");

    session_destroy(); // the session command will be destroy

    header('Location: ../Home Page/Home.php'); // go back to Home page

?>
