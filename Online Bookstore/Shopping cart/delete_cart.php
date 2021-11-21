<?php 

    session_start();

    include "../config.php";

    $book = $_GET['bookid'];

    #Extracting book id from book table
    $book_info = "SELECT * FROM books WHERE book_id = $book";
    $book_info_result = mysqli_query($conn, $book_info);
    $book_info_row = mysqli_fetch_assoc($book_info_result);

    # Adding back quantity into the book table
    $add_quantity = "UPDATE books SET quantity = quantity + 1 WHERE book_id = $book";
    $add_quantity_result = mysqli_query($conn,$add_quantity);

    # Remove book from shoppingcart table
    $result = mysqli_query($conn,"DELETE FROM shoppingcart WHERE userID=$_SESSION[uid] AND bookID=$book");

    mysqli_close($conn);

    $url= "cart.php";
    header("Location:" .$url);

?>