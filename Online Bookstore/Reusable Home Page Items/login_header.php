<head>
    <script src="https://use.fontawesome.com/27a042602f.js"></script>
</head>
<nav>
    <a href="../Home Page/Home.php" id="nav_bar_logo">JCH BOOKSTORE</a>

    <label for="btn" class="icon">
        <span class="fa fa-bars"></span>
    </label>

    <input type="checkbox" id="btn" style="display:none;">
    <ul>
        <li><a href="../Home Page/Home.php">Home</a></li>
        <li>
            <label for="btn_1" class="show">Categories</label>
            <a href="#">Categories</a>
            <input type="checkbox" id="btn_1" style="display:none;">
            <ul>
                <li><a href="../Categories/cateogry.php?categoryid=1">Comic</a></li>
                <li><a href="../Categories/cateogry.php?categoryid=2">Education</a></li>
                <li><a href="../Categories/cateogry.php?categoryid=3">Novel</a></li>
                <li><a href="../Categories/cateogry.php?categoryid=4">Biography</a></li>
            </ul>
        </li>

        <li>
            <label for="btn_2" class="show">Contact Us</label>
            <a href="#">Contact Us</a>
            <input type="checkbox" id="btn_2" style="display:none;">
            <ul>
                <li><a href="../contact us/contact us .php">Ask Question</a></li>
                <li><a href="../contact us/view_reply.php">View Reply</a></li>
            </ul>
            
        </li>
        
        <li>
            <label for="btn_3" class="show"><?php echo $user_info_row["username"]; ?></label>
            <a href="#" class = "acc_button"><?php echo $user_info_row["username"]; ?></a>
            <input type="checkbox" id="btn_3" style="display:none;">
            <ul>
                <li><a href="../Account Information/account_info_user.php">Account</a></li>
                <li><a href="../Personal History/personal_history.php">History</a></li>
                <li><a href="../Home Page/logout.php">Log Out</a></li>
            </ul>
        </li>
        
        <li><a href="../Shopping cart/cart.php"><i style="color: white; font-size: 28px; margin-right: 5px;" class="fa fa-shopping-cart" aria-hidden="true"></i> Cart</a></li>
    </ul>
</nav>

