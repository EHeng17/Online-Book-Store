<?php
	session_start();

	include "../config.php";

    error_reporting(0);

    $_SESSION["book_id"] = $_GET['bookid'];

    #Extracting book information from database
    $book_info = "SELECT * FROM books 
                  INNER JOIN categories ON books.category_id = categories.category_id
                  WHERE book_id = $_SESSION[book_id]";
    $book_info_result = mysqli_query($conn, $book_info);
    $book_info_row = mysqli_fetch_assoc($book_info_result);

?>

<!DOCTYPE html>
<html>
<head>
	<title>JCH Bookstore | Update Book</title>
	<link rel="stylesheet" href="update_book.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>
        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Book Update Successfully!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Admin panel/admin_inventory.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }

        function pop_up_success_delete(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Book Deleted Successfully!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Admin panel/admin_inventory.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }
    </script>


</head>

<body>

    <?php require_once("../Admin panel/nav_bar.php"); ?>

    <div class="background">

        <div class="container">
            <form action="" method="POST" class="login-email">
                <p class="login-text">Update Book</p>

                <div class="input-group">
                    <input type="text" placeholder="Book Name" name="book_name" value="<?php echo $book_info_row['book_name']; ?>" required>
                </div>

                <div class="input-group">
                    <input type="text" placeholder="Book author" name="book_author" value="<?php echo $book_info_row['book_author']; ?>" required >

                </div>

                <div class="input-group" style="display: flex;">
                    <input type="text" placeholder="Book Format" name="book_format" value="<?php echo $book_info_row['book_format']; ?>" required style="margin-right: 25px; text-transform: capitalize;">
                    
                    <select name = "book_category" required >
                        <option value="" disabled selected>-- Book Category --</option>

                        <!-- Determines which option to be displayed in the page -->
                        <option value="1" 
                        
                            <?php

                                # If category name of the selected book to update is comic, execute the code below
                                if($book_info_row['category_name'] == "Comic"){
                                    echo 'selected="selected"';
                                }

                            ?>  
                        
                        >Comic</option>

                        <option value="2"
                        
                            <?php

                                # If category name of the selected book to update is Education, execute the code below
                                if($book_info_row['category_name'] == "Education"){
                                    echo 'selected="selected"';
                                }

                            ?>
                        
                        >Education</option>

                        <option value="3"
                        
                            <?php

                                # If category name of the selected book to update is Novel, execute the code below
                                if($book_info_row['category_name'] == "Novel"){
                                    echo 'selected="selected"';
                                }

                            ?>
                        
                        >Novel</option>

                        <option value="4"
                        
                        <?php

                            # If category name of the selected book to update is Biography, execute the code below
                            if($book_info_row['category_name'] == "Biography"){
                                echo 'selected="selected"';
                            }

                        ?>
                        
                        >Biography</option>
                    </select>
                </div>

                <div class="input-group" style="margin: auto; margin-bottom: 25px; display: flex;" >
                    <input type="number" step="any" placeholder="Book Price" name="book_price" value="<?php echo $book_info_row['book_price']; ?>" required style="margin-right: 25px; text-transform: capitalize;">
                    <input type="number" placeholder="Book Quantity" name="book_quantity" value="<?php echo $book_info_row['quantity']; ?>" style="text-transform: capitalize;" required >
                </div>

                <div class="input-group">
                    <button name="submit" class="btn">Update</button>
                </div>

                <div class="input-group" >
                    <button name="delete" class="btn" style="background-color: red; width: 50%; margin-left: 149px;">Delete</button>
                </div>

            </form>
        </div>

    </div>

    <?php 
    
    # If the button with the name 'submit' is clicked, run the code below.
    if(isset($_POST['submit'])) { 

        #Extract form input with $_POST, and put them inside variables
        $book_name = $_POST['book_name'];
        $book_price = $_POST['book_price'];
        $book_format = $_POST['book_format'];
        $book_author = $_POST['book_author'];
        $book_quantity = $_POST['book_quantity'];
        $book_category = $_POST['book_category'];

        # Update new information into books table, WHERE the book_id = the book id of the book selected by the admins
        $result = mysqli_query($conn, "UPDATE books SET book_name='$book_name', category_id='$book_category', book_author='$book_author', 
                                       book_price='$book_price', book_format='$book_format', quantity='$book_quantity'
                                       WHERE book_id = $_SESSION[book_id]");
        
        if ($result) { #If query is successful, execute code from the if block
            echo "<script>pop_up_success()</script>"; # Pop-up notification that tells admin that book is successfully updated
        } else {
            echo "<script>alert('Something went wrong')</script>"; # Alert admins that something went wrong
        }

    }


    if(isset($_POST['delete'])) {
        $result = mysqli_query($conn, "DELETE FROM books WHERE book_id = $_SESSION[book_id]");

        if ($result) {
            echo "<script>pop_up_success_delete()</script>";
        }
    }

    ?>			
	
    

</body>

</html>