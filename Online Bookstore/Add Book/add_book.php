<?php
	session_start();

	include "../config.php"; // link the configure php file

?>


<!DOCTYPE html>
<html>
<head>
	<title>JCH Bookstore | Add Book</title>
	<link rel="stylesheet" href="style.css?v=<?php echo time(); ?>" type="text/css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>
        // a pop-up function that use at php code
        function pop_up_success(){
            Swal.fire({
                icon:'success',
                title: 'Success', 
                text: 'Book Successfully Added!',
                showDenyButton: false,
                showCancelButton: false,
                confirmButtonText: '<a href="../Admin panel/admin_inventory.php" style="text-decoration:none; color:white; ">Continue</a>'
            })
        }
    </script>

</head>


<body>
    <!-- Nav Bar Section -->
    <?php 
        // use the embedded PHP code from another file
        require_once("../Admin panel/nav_bar.php"); 
    ?>

    <div class="background">

        <div class="container">
            <form action="" method="POST" class="add_book">
                <p class="main_text">Add Book</p>

                <div class="input_group">
                    <input type="text" placeholder="Book Name" name="book_name" required>
                </div>

                <div class="input_group">
                    <input type="text" placeholder="Book Image Link" name="book_img" required>
                </div>

                <div class="input_group" style="display: flex;">
                    <input type="text" placeholder="Book Author" name="book_author" required style="margin-right: 25px; text-transform: capitalize;">
                    <input type="number" step="any" placeholder="Book Price" name="book_price" required >
                </div>

                <div class="input_group">
                    <textarea type="text" name="book_desc" rows="3" placeholder="Book Description" required></textarea>
                </div>

                <div class="input_group" style="margin: auto; margin-bottom: 25px; display: flex;" >
                    <select name = "book_format" style="margin-right: 25px;" required>
                        <option value="" disabled selected>-- Book Format --</option>
                        <option value="Paperback" >Paperback</option>
                        <option value="Hardback">Hardback</option>
                    </select>
                    <input type="number" placeholder="Book Quantity" name="book_quantity" style="text-transform: capitalize;" required >
                </div>

                <div class="input_group" style="display: flex;">
                    <input type="text" placeholder="Book Publisher" name="book_pub" required style="margin-right: 25px; text-transform: capitalize;">
                    <input type="text" placeholder="Publish Date (Date/Month/Year)" name="book_pub_date" required >
                </div>

                <div class="input_group" style="display: flex;">
                    <input type="number" placeholder="Page Number" name="book_page_num" required style="margin-right: 25px;">

                    <select name = "book_category" required >
                        <option value="" disabled selected>-- Book Category --</option>
                        <option value="1" >Comic</option>
                        <option value="2">Education</option>
                        <option value="3">Novel</option>
                        <option value="4">Biography</option>
                    </select>

                </div>

                <div class="input_group">
                    <button name="submit" class="btn">Add Book</button>
                </div>
            </form>
        </div>

    </div>
	
    <?php 
    // if isset is POST 'submit' only execute the code below
    if(isset($_POST['submit'])) {
        
        //a variable that to get the value that inputted by using POST method 
        $book_name = $_POST['book_name'];
        $book_img = $_POST['book_img'];
        $book_author = $_POST['book_author'];
        $book_price = $_POST['book_price'];
        $book_desc = addslashes($_POST['book_desc']); // 'addslashes()' is to add a "\" at every quotation'
        $book_format = $_POST['book_format'];
        $book_quantity = $_POST['book_quantity'];
        $book_pub = $_POST['book_pub'];
        $book_pub_date = $_POST['book_pub_date'];
        $book_page_num = $_POST['book_page_num'];
        $book_category = $_POST['book_category'];

        // a sql query to inert the value above to books table at database
        $sql = "INSERT INTO books (book_name, book_author, 	book_price, book_img, book_desc, book_format, book_lang, book_pub_date, book_publisher, book_page, quantity, category_id )
                VALUES ('$book_name','$book_author', '$book_price','$book_img','$book_desc','$book_format', 'English','$book_pub_date','$book_pub', '$book_page_num', '$book_quantity', '$book_category')";
        
        // connection between database and the update sql query
        $result = mysqli_query($conn, $sql);
        
        // if $result successfully excuted, then run the following code
        if ($result) {
            echo "<script>pop_up_success()</script>";
        } else {
            echo "<script>alert('Something went wrong')</script>";
        }

    }

    ?>			
	
</body>
</html>