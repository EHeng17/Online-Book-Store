<?php 

  session_start();

  error_reporting (0);
  
  include "../config.php";

  require_once("../Checkout form/checkout_list.php");

  #Extracting user information from database
  $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
  $user_info_result = mysqli_query($conn, $user_info);
  $user_info_row = mysqli_fetch_assoc($user_info_result);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Checkout Card</title>
    <link href='https://image.flaticon.com/icons/png/128/3534/3534033.png' rel='icon' type='image/x-icon'/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- library validate -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
    <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
    <!-- style css -->
    <link rel="stylesheet" href="Checkout.css?v=<?php echo time(); ?>">

    <!--pop up alert-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>

    <style>
        .site_title {
            margin-top: 30px; 
            margin-bottom: 30px; 
            font-size: 40px;
            text-align: center;
            background: linear-gradient(to right, #f64f59, #c471ed, #12c2e9);
            background-size: 100%;
            background-clip: text;
            -webkit-background-clip: text; /* Chrome and Safari Compatibility */
            -moz-background-clip: text; /* Mozilla Firefox Compatibility */
            -webkit-text-fill-color: transparent;
            -moz-text-fill-color:transparent;
        }
        .title_adjust {
            margin-top: 20px;
            margin-bottom: 20px;
            font-size: 24px;
        }
    </style>

    <?php
                
        #Count the total number of carts added by user
        #Count the number of bookID from shoppingcart table with same userID that match to the user
        $total_book_num = "SELECT COUNT(bookID) FROM shoppingcart WHERE userID = $_SESSION[uid]";
        $num_rs = mysqli_query($conn, $total_book_num);
        $num_result = mysqli_fetch_array($num_rs);

        #Count total book prices
        #Sum all book_price from books table match with the userID and bookID in shoppingcart table 
        $totol_price = "SELECT SUM(book_price) FROM books
                        INNER JOIN shoppingcart ON books.book_id = shoppingcart.bookID
                        INNER JOIN users ON shoppingcart.userID = users.id WHERE shoppingcart.userID = $_SESSION[uid]";
        $total_rs = mysqli_query($conn, $totol_price);
        $total_result = mysqli_fetch_array($total_rs);

    ?>

    <script>
		/*Delete cart after the sucessful payment from the user and display a pop up notice*/
        function pop_up_success() {
            Swal.fire({
                icon:'success',
                title: 'Success',
                text: 'Your payment of <?php echo $num_result[0]; ?> books about RM <?php echo $total_result[0]; ?> is successful, we will deliver your products shortly !',
                confirmButtonText: '<a href="remove_finish_cart.php?uid=<?php echo $_SESSION['uid']; ?>" style="text-decoration:none; color:white; ">OK</a>',
            })
        }
		/*Display error pop up notice */
        function pop_up_error_db() {
            Swal.fire({
                icon:'warning',
                title: 'ALERT',
                text: 'Something went wrong',
            })
        }
		/*Display error pop up notice if the cart is empty */
        function pop_up_cart_empty() {
            Swal.fire({
                icon:'warning',
                title: 'ALERT',
                text: 'Your cart is empty, payment cannot be made',
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

    <h2 class="site_title">Checkout</h2>
    <div class="row">
        <div style="margin-bottom: 100px;" class="col-65">
            <div class="container">
                <form id="validate" method="POST" action="">
                    <div class="row">
                        <div class="col-50">
                            <h3 style="margin-top:30px; margin-bottom:30px; font-size:24px;">Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="fullname" placeholder="Batman bin Superman" value="<?php echo $user_info_row['first_name'] ." " . $user_info_row['last_name'] ?>" required>
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <input type="email" id="email" name="email" placeholder="Batman-bin-Superman@gmail.com" value="<?php echo $user_info_row['email'] ?>" required>
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="Ha-Ha Road" required>
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Klang" pattern="[a-zA-Z]*" required>

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="Selangor" pattern="[a-zA-Z]*" required >
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="number" id="zip" name="zip" placeholder="12000" minlength="5" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3 style="margin-top:30px; margin-bottom:30px; font-size:24px;">Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>

                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="Batman bin Superman" pattern="[a-zA-Z]*" required>
                            <label for="ccnum">Credit card number</label>
                            <input type="number" id="cardnumber" name="cardnumber" placeholder="1111222233334444" required minlength="16">

                            <label for="expmonth">Exp Month</label>
                            <select name = "gender"  required>
                                <option value="" disabled selected>-- Select Exp Month --</option>
                                <option>January</option>
                                <option>February</option>
                                <option>March</option>
                                <option>April</option>
                                <option>May</option>
                                <option>June</option>
                                <option>July</option>
                                <option>August</option>
                                <option>September</option>
                                <option>October</option>
                                <option>November</option>
                                <option>December</option>
                            </select>


                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="number" id="expyear" name="expyear" placeholder="2021" required min="2021" max="9999">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="number" id="cvv" name="cvv" placeholder="352" max="999" min="100" required >
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>
                    <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <button type="submit" name="checkout" class="btn">Continue to checkout</button>
                </form>
            </div>
        </div>

        <div class="col-35">
            <div class="container">

                <h4 class="title_adjust">Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i><b> <?php echo $num_result[0]; ?></b></span></h4>

                <?php

                    $sql = "SELECT book_id, book_name, book_price, category_id FROM books 
                            INNER JOIN shoppingcart ON books.book_id = shoppingcart.bookID
                            INNER JOIN users ON shoppingcart.userID = users.id WHERE shoppingcart.userID = $_SESSION[uid]";
                    $result = mysqli_query($conn, $sql);
                    $row = mysqli_fetch_assoc($result);

                    do {
                        cart_list($row["book_id"], $row["category_id"], $row["book_name"], $row["book_price"]);
                    } while ($row = mysqli_fetch_assoc($result));

                ?>
                <hr>
                <p><b>Total</b> <span class="price" style="color:black"><b>RM <?php echo $total_result[0]; ?></b></span></p>
            </div>
        </div>
    </div>


    <!-- script validate js -->
    <script>
		/*Cvv number validation*/
        cvv.oninput = function () {
            if (this.value.length > 3)
                this.value = this.value.slice(0,3); 
        }
		/*Expire year validation*/
        expyear.oninput = function () {
            if (this.value.length > 4)
                this.value = this.value.slice(0,4); 
        }
		/*Card number validation*/
        cardnumber.oninput = function () {
            if (this.value.length > 16)
                this.value = this.value.slice(0,16);
        }
        /*Zip code validation*/
        zip.oninput = function () {
            if (this.value.length > 5)
                this.value = this.value.slice(0,5);
        }

        $('#validate').validate({
            messages: {
                zip:"Please input a proper zip code*",
                cardname:"Please input card name*",
                cardnumber:"Please input a proper card number*",
                expyear:"Please input a proper expiry year*",
                cvv:"Please input a proper CVV number*"
            },
        });
    </script>

    <!-- Footer Section -->
    <?php require_once("../Reusable Home Page Items/Footer.php"); ?>

    <?php

        if(isset($_POST['checkout'])) {

            $check_empty_cart = mysqli_query($conn, "SELECT * FROM shoppingcart WHERE userID = $_SESSION[uid]");
            $check_result = mysqli_fetch_assoc($check_empty_cart);

            if($check_result) {

                #Extracting user information from database
                $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
                $user_info_result = mysqli_query($conn, $user_info);
                $user_info_row = mysqli_fetch_assoc($user_info_result);
				/* Collect all inputted form data */
                $name = $_POST['fullname'];
                $email = $_POST['email'];
                $address = $_POST['address'] ."," . $_POST['city'] ."," . $_POST['state'] ."," . $_POST['zip'];
				/*Insert data into the database*/
                $sql="INSERT INTO billing_address(userID, name, email, address) 
                VALUES ('$_SESSION[uid]', '$name', '$email', '$address')";
				/* Query between variable 'conn' and 'sql'*/
                $result = mysqli_query($conn,$sql);

                if (!$result) {
                    echo "<script>pop_up_error_db()</script>";

                }else {
                    echo '<script>pop_up_success()</script>';
                }
            } else {
                echo "<script>pop_up_cart_empty()</script>";
            }
        }

        

    ?>

</body>
</html>