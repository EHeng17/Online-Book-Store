<?php 

  session_start(); # Start session to retrieve session variables

  error_reporting(0);# No errors will appear (If not placed, error will appear if there is no username)
  
  include "../config.php"; #Include config file to database

  require_once("../Categories/books.php"); # Require another php file to generate books from table

  $cid = $_GET['categoryid']; # Get category id variable from the link and store it in a session variable

  #Extracting category names from database
  $category_name = "SELECT * FROM categories WHERE category_id = $cid";
  $category_result = mysqli_query($conn, $category_name);
  $category_row = mysqli_fetch_assoc($category_result);

  #Extracting user information from database
  $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
  $user_info_result = mysqli_query($conn, $user_info);
  $user_info_row = mysqli_fetch_assoc($user_info_result);

  # Extracting necessary book information (Name, Author, Price) (Row 1-4)
  $sql = "SELECT * FROM books WHERE category_id = $cid ORDER BY book_name LIMIT 4 ";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);

  # Extracting necessary book information (Name, Author, Price) (Row 5-8)
  $sql2 = "SELECT * FROM books WHERE category_id = $cid ORDER BY book_name LIMIT 4 OFFSET 4";
  $result2 = mysqli_query($conn, $sql2);
  $row2 = mysqli_fetch_assoc($result2);

  # Extracting necessary book information (Name, Author, Price) (Row 9-12)
  $sql3 = "SELECT * FROM books WHERE category_id = $cid ORDER BY book_name LIMIT 4 OFFSET 8";
  $result3 = mysqli_query($conn, $sql3);
  $row3 = mysqli_fetch_assoc($result3);

  # Extracting necessary book information (Name, Author, Price) (Row 13-16)
  $sql4 = "SELECT * FROM books WHERE category_id = $cid ORDER BY book_name LIMIT 4 OFFSET 12";
  $result4 = mysqli_query($conn, $sql4);
  $row4 = mysqli_fetch_assoc($result4);

?>



<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
        <script src="https://use.fontawesome.com/eb0b37d7c5.js"></script>
        <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
        <title>Categories | <?php echo $category_row["category_name"] ?></title>
        <link href="../Home Page/style - c.css" rel="stylesheet" >
        <link rel="stylesheet" href="categories.css">
    </head>
    <body>

      <!-- Nav Bar Section -->
      <?php 

        
        if (isset($_SESSION['uid'])) { # If session variable 'uid' is found, 
            require_once("../Reusable Home Page Items/login_header.php"); # Retrieve login_header.php file
        } else {
            require_once("../Reusable Home Page Items/guest_header.php"); # Retrieve guest_header.php file
        }

      ?>

        <h1 class="title"><?php echo $category_row["category_name"] ?></h1>

        <center>
          <table style="width: 80%;">

            <tr>
              <?php
                # Loop through the code below if the are results in the $row variable
                do { 
                  books($row["category_id"], $row["book_id"], $row["book_name"], $row["book_img"], $row["book_price"], $row["book_author"]);
                } while ($row = mysqli_fetch_assoc($result))
              ?>
            </tr>

            <tr>
              <?php
                # Loop through the code below if the are results in the $row2 variable
                do {
                  books($row2["category_id"], $row2["book_id"], $row2["book_name"], $row2["book_img"], $row2["book_price"], $row2["book_author"]);
                } while ($row2 = mysqli_fetch_assoc($result2))

                ?>
            </tr>

            <tr>
              <?php

                if ($row3!=NULL) { # If $row3 is not empty/NULL, execute the code below.
                  # Loop through the code below if the are results in the $row3 variable
                  do {
                    books($row3["category_id"], $row3["book_id"], $row3["book_name"], $row3["book_img"], $row3["book_price"], $row3["book_author"]);
                  } while ($row3 = mysqli_fetch_assoc($result3));
                }
              
              ?>
            </tr>

            <tr>
              <?php

                if ($row4!=NULL) { # If $row4 is not empty/NULL, execute the code below.
                  # Loop through the code below if the are results in the $row4 variable
                  do {
                    books($row4["category_id"], $row4["book_id"], $row4["book_name"], $row4["book_img"], $row4["book_price"], $row4["book_author"]);
                  } while ($row4 = mysqli_fetch_assoc($result4));
                }
              
              ?>
            </tr>


          </table>

        </center>

      <?php require_once("../Reusable Home Page Items/Footer.php"); ?> <!-- execute footer.php (Retriveing html code for footer) -->
  
  
      <script src = "app.js"> </script>
    </body>
</html>