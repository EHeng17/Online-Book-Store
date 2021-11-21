
<?php 

    session_start();
    
    error_reporting(0);

    include '../config.php';

    require_once("../Single Product Page/Related Products.php");
    
    #Extracting user information from database
    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
    $user_info_result = mysqli_query($conn, $user_info);
    $user_info_row = mysqli_fetch_assoc($user_info_result);

    $id = $_GET['bookid']; # Extracting bookid from the hyperlink
    $cid = $_GET['categoryid']; # Extracting categoryid from the hyperlink

    # Extracting genre information (Need to display name of category)
    $category_name = "SELECT * FROM categories WHERE category_id = $cid";
    $category_result = mysqli_query($conn, $category_name);
    $category_row = mysqli_fetch_assoc($category_result);

    #Extracting book information from database (Used to display all book information)
    $sql = "SELECT * FROM books WHERE book_id = $id"; 
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>

<head>
    <title>JCH Bookstore | <?php echo $row['book_name'] ?></title>
    <!-- To prevent cache issue, css must be li-->
    <link  href="../Single Product Page/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <script>

        function pop_up_notification(){
            Swal.fire({
                icon:'warning',
                title: 'ALERT',
                text: 'An account is needed to purchase this book.',
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: '<a href="../Login&Register/login.php" style="text-decoration:none; color:white; ">Log In</a>',
                denyButtonText: '<a href="../Login&Register/register.php" style="text-decoration:none; color:white; ">Register</a>',
            })
        }

        function pop_up_success() {
            Swal.fire({
                icon:'success',
                title: 'Success',
                text: 'Added Into Cart !'
            })
        }

        function pop_up_error_db() {
            Swal.fire({
            icon:'warning',
            title: 'ALERT',
            text: 'Something went wrong',
            })
        }

        function pop_up_error_samebook() {
            Swal.fire({
            icon:'warning',
            title: 'ALERT',
            text: 'This book already added',
            })
        }

        function pop_up_error_qnt_0() {
            Swal.fire({
            icon:'warning',
            title: 'ALERT',
            text: 'We are sorry, this book is currently out of stock',
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


    <!-- Product Information -->
    
    <form method="POST" action=""> <!-- Form is used because there is a button input -->
        <div class="container single-product">
            <div class="row">
                <div class="book">
                    <p><a href="../Home Page/Home.php">Home | </a><a href="#">Categories | </a><a href="#"><?php echo $category_row["category_name"] ?></a></p>
                    <br>
                    <img src="<?php echo $row['book_img']?>"  alt="<?php echo $row['book_name']?>">  
                </div>
                <div class="book_product_info">
                    <h1><?php echo $row['book_name']?></h1>
                    <br>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-alt"></i>
                    </div>
                    <br>
                    <h4>Author: <?php echo $row['book_author']?></h4>
                    <br>
                    <h4>RM <?php echo $row['book_price']?><p>Free Delivery Included<i class=" fa fa-truck"></i></p></h4>
                    <?php 
                        if (isset($_SESSION['uid'])) { #If there is something in $_SESSION['uid'], then run the code below if
                            echo "<button class=\"btn\" type=\"submit\" name=\"addtocart\">Add to Cart</button>";
                        } else { # Or else, run this code below
                            echo "<button class=\"btn\" type=\"submit\" name=\"addtocart\" >Add to Cart</button>";
                        }  
                    ?>
                    <br>
                    <h3>Description <i class="fa fa-align-justify"></i></h3>
                    <br>
                    <p><?php echo $row['book_desc']?>
                    </p>
                </div>
            </div>
        </div>
    </form>

    <!--  Product Details -->

    <div class="container">
        <div class="product_details">
            <h3>Product Details: </h3>
            <ul> <!-- Displaying book information after extracting book information (Extracting book information code at the top of the page)-->
                <li><b>Format: </b> <?php echo $row['book_format']?></li>
                <li><b>Language: </b><?php echo $row['book_lang']?></li>
                <li><b>Publication Date: </b><?php echo $row['book_pub_date']?></li>
                <li><b>Publisher: </b><?php echo $row['book_publisher']?></li>
                <li><b>Pages: </b> <?php echo $row['book_page']?> pages</li>

            </ul>
        </div>
    </div>


    <!--View More Section-->
    <div class="container">
        <div class="row row_2">
            <h2>Related Products</h2>
            <p><a class= "view_more" href="../Categories/cateogry.php?categoryid=<?php echo $cid ?>" >View more </a></p>
        </div>
    </div>

    <div class="trending">

        <div class="trending_wrapper">

            <?php 

                # Pick 4 random books from the database that belongs to the same category, and not the current book displayed
                $sql2 = "SELECT * FROM books WHERE book_id != $id AND category_id = $cid ORDER BY RAND() LIMIT 4";
                $result2 = mysqli_query($conn, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                
                # While loop to display 4 books
                do {
                    component($row2["category_id"], $row2["book_id"], $row2["book_name"], $row2["book_img"], $row2["book_price"]);
                } while ($row2 = mysqli_fetch_assoc($result2))

            ?>

            

        </div>
    </div>

    <!-- Footer Section -->

    <!-- require_once is used to execute code from another php file (link below contains footer code)-->
    <?php require_once("../Reusable Home Page Items/Footer.php"); ?>

    <?php

        # If the 'addtocart' button is clicked, run the code below
        if(isset($_POST['addtocart'])) {

            #Checking if current book that is added to cart is already contained in cart or not
            $same_book = "SELECT * FROM shoppingcart WHERE bookID='$id' AND userID='$_SESSION[uid]'"; # Search shoppingcart table to and find for rows that contains the bookid and the userid
            $same_book_result = mysqli_query($conn, $same_book); # Query between variable 'conn' and 'same_book' 

            #Check the book quantity in database is 0 or not
            $zero_qnt = "SELECT * FROM books WHERE book_id='$id' AND quantity = 0 "; #Search books table to check if the displyed book has 0 in the quantity column
            $zero_qnt_result = mysqli_query($conn, $zero_qnt); # Query between variable 'conn' and 'zero_qnt' 


            if($same_book_result->num_rows == 0){ # If the number of rows returned is 0, then execute the code in the if block

                if($zero_qnt_result->num_rows == 0) { # If the number of rows returned is 0, then execute the code in the if block

                    # SQL COMMAND (Inserting data into shoppping cart table (column name1, column name2,) VALUES (value for column name1, value for column name2) )
                    $sql_cart="INSERT INTO shoppingcart(userID, bookID, cart_quantity) VALUES ('$_SESSION[uid]', '$id', '1')";

                    $result = mysqli_query($conn,$sql_cart); # Query between variable 'conn' and 'sql_cart'

                    if (!$result) { # If the results of the code above didnt execute, run the code in the if block.
                        echo "<script>pop_up_notification()</script>";

                    }else {
                        # Command to minus quantity from book table
                        $minus_quantity = "UPDATE books SET quantity = quantity - 1 WHERE book_id = $id";
                        $minus_quantity_result = mysqli_query($conn,$minus_quantity);
                        echo '<script>pop_up_success()</script>';
                    }
                } else {
                    echo '<script>pop_up_error_qnt_0()</script>'; # Pop up notification to display that the book is out of stock
                }
            }else{
                echo "<script>pop_up_error_samebook()</script>"; # Pop up notification to display that the book is already in cart
            }
        }

    ?>

</body>
</html>