<?php 

    session_start();

    include "../config.php";

    $viewed = $_GET['replyid'];

    #Extracting book id from book table
    $viewed_info = "SELECT * FROM inquiry_reply WHERE reply_id = $viewed";
    $viewed_info_result = mysqli_query($conn, $viewed_info);
    $viewed_info_row = mysqli_fetch_assoc($viewed_info_result);

    # Remove book from shoppingcart table
    $result = mysqli_query($conn,"DELETE FROM inquiry_reply WHERE replY_id =$viewed");

    mysqli_close($conn);

    $url= "view_reply.php";
    header("Location:" .$url);

?>