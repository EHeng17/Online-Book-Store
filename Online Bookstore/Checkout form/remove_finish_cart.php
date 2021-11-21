<?php 

    session_start();

    include "../config.php";

    # Get today's code
    $today_date = date("Y-m-d");
	# Update purchase date base on the shopping cart date and userID
    $add_purchase_date = mysqli_query($conn, "UPDATE shoppingcart SET date = '$today_date' WHERE userID=$_SESSION[uid]");
	#Insert personal history into the sql querry
    $add_personal_history = mysqli_query($conn, "INSERT INTO personal_history(user_id,book_id,book_name,date_of_purchase, amount) 
                                                SELECT userID, books.book_id, books.book_name, date, books.book_price FROM shoppingcart
                                                INNER JOIN books ON books.book_id = shoppingcart.bookID
                                                WHERE userID=$_SESSION[uid]");

	#Delete data from cart from the sql querry 
    $delete_row = mysqli_query($conn,"DELETE FROM shoppingcart WHERE userID=$_SESSION[uid]");
    mysqli_close($conn);
    
    header("Location: ../Home Page/Home.php");

?>