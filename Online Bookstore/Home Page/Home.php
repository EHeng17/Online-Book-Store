<?php 

    session_start();

    include "../config.php";
    
    error_reporting(0);

    # Extract user information through session variable(IF ANY)
    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]"; # Query Command
    $user_info_result = mysqli_query($conn, $user_info); #Executing query
    $user_info_row = mysqli_fetch_assoc($user_info_result); #Fetch row related to query (THERE WILL ONLY BE 1 ROW)

?>

<!DOCTYPE html>
<html>

<head>
    <title>JCH Bookstore | Home</title>
    <link href="Style - c.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2d19a46833.js" crossorigin="anonymous"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Indie+Flower&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Ephesis&display=swap');
    </style>
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
    
    <!-- Hero Image Section -->
    <div class="hero" id="home">
        <div class="hero_section">
            <h1 class="hero_heading">A Book Shows Your <span>Personality</span></h1>
            <p class="hero_description">For Booklovers</p>
            <button class="main_button"><a href="#trending">Explore</a></button>
        </div>
    </div>



    <!-- Trending Section -->
    <div class="trending" id="trending"> 
        <h1>Trending Books</h1>
        <div class="trending_wrapper">

            <div class="trending_book"> <!-- Shell of One Trending Book -->
                <div class="card_inner"> <!-- Does the flipping animation -->
                    <div class="card_face card_face_front">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/61d8F8stCkS.jpg" class = "book_cover" alt="Billy Summers">
                    </div>

                    <div class="card_face card_face_back">

                        <div class="card_content">

                            <div class="card_header">
                                <h2>Billy Summers</h2>
                            </div>

                            <div class="card_body">
                                <p><b>Author:</b> Stephen King</p>
                                <br>
                                <p><b>Category:</b> Adventure</p>
                                <br>
                                <p><b>Rating:</b> 4.41/5</p>
                                <div class="trending_btn"><button onclick= "window.open('../Single Product Page/product.php?bookid=1&categoryid=3','_blank')">Buy Now</button></div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            
            <div class="trending_book">
                <div class="card_inner">
                    <div class="card_face card_face_front">
                        <img src="https://images-na.ssl-images-amazon.com/images/I/51ix3zjQtcL._SX324_BO1,204,203,200_.jpg" class = "book_cover" alt="Invincible_Compendium">
                    </div>

                    <div class="card_face card_face_back">
                        
                        <div class="card_content">

                            <div class="card_header">
                                <h2>Invincible Compendium</h2>
                            </div>

                            <div class="card_body">
                                <p><b>Author:</b> Robert Kirkman</p>
                                <br>
                                <p><b>Category:</b> Comics</p>
                                <br>
                                <p><b>Rating:</b> 4.57/5</p>
                                <div class="trending_btn"><button onclick= "window.open('../Single Product Page/product.php?bookid=32&categoryid=1','_blank')">Buy Now</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            
            </div>



            <div class="trending_book">
                <div class="card_inner">
                    <div class="card_face card_face_front">
                        <img src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5291/9781529100877.jpg" class = "book_cover" alt="A Deadly Education">
                    </div>

                    <div class="card_face card_face_back">

                        <div class="card_content">

                            <div class="card_header">
                                <h2>A Deadly Education</h2>
                            </div>

                            <div class="card_body">
                                <p><b>Author:</b> Naomi Novik</p>
                                <br>
                                <p><b>Category:</b> Education</p>
                                <br>
                                <p><b>Rating:</b> 5/5</p>
                                <div class="trending_btn"><button onclick= "window.open('../Single Product Page/product.php?bookid=17&categoryid=2','_blank')">Buy Now</button></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <div class="trending_book">
                <div class="card_inner">
                    <div class="card_face card_face_front">
                        <img src="https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/5098/9781509800193.jpg" class = "book_cover" alt="438 Days">
                    </div>

                    <div class="card_face card_face_back">

                        <div class="card_content">

                            <div class="card_header">
                                <h2>438 Days</h2>
                            </div>

                            <div class="card_body">
                                <p><b>Author:</b>  Jonathan Franklin</p>
                                <br>
                                <p><b>Category:</b> Biography</p>
                                <br>
                                <p><b>Rating:</b> 4.35/5</p>
                                <div class="trending_btn"><button onclick= "window.open('../Single Product Page/product.php?bookid=14&categoryid=4','_blank')">Buy Now</button></div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- Testimonials Section -->
    <div class="testimonial">
        <h1>Testimonials</h1>
        <div class="small_container">
            <div class="row">
                
                <div class="col_3">
                    <i class="fa fa-quote-left"></i>
                    <p>JCH Bookstore is extremely invaluable in introducing the book to important audiences I could not have reached otherwise. I was not an avid reader before discovering JCH Bookstore. I can't recommend them enough.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h3>Sean Parker</h3>
                </div>

                <div class="col_3">
                    <i class="fa fa-quote-left"></i>
                    <p>The team at JCH Bookstore is incredibly passionate about their authors. I’ve been blown away by their fast-communication, thoroughness, and the impeccable standard of professionalism that goes into each facet of their work.</p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h3>Peter Parker</h3>
                </div>

                <div class="col_3">
                    <i class="fa fa-quote-left"></i>
                    <p>I had an amazing experience with JCH Bookstore. They not only made connections with media outlets that I would not have been able to make on my own, they treated me like their most important client. </p>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <h3>Markus Sean</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- About us Section -->
    <div class="about_us" id="about_us">
        <div class="about_us_section">
            <div class="about_us_img"><img src="about_us.png" alt="JCH BOOKSTORE"></div>
            <div class="about_us_content">
                <h1 >About Us</h1>
                <p>At 2017, JCH Bookstore was founded by three young minded people. However, once the pandemic started, the founders of JCH Bookstore have to move their operations from a small store to a web based online book store. This was a good thing as JCH Bookstore has increased in popularity once they have moved to a web based book store.</p>
            </div>
        </div>
    </div>

    <!-- Organizer -->
    <div class="team_wrapper">
        <h1>Our Team</h1>

        <div class="group">
            <div class="organizer">
                <div class="group_img">
                    <img src="organizer1.png" alt="Justus Leong">
                </div>
                <h3>Justus Leong</h3>
                <p class="role">Co Founder</p>
                <p style="margin-bottom: 25px;">Age 19, graduated from Taylor's University. Founded JCH Bookstore alongside Chua E Heng and Ho Chang Yong. He is mainly involved in the UI designing of JCH Bookstore.</p>
                <div>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="organizer">
                <div class="group_img">
                    <img src="organizer2.png" alt="Chua E Heng">
                </div>
                <h3>Chua E Heng</h3>
                <p class="role">Co Founder</p>
                <p style="margin-bottom: 25px;">Age 19, graduated from Asia Pacific University. Founded JCH Bookstore alongside Justus Leong and Ho Chang Yong. He is mainly involved in the Database Developer of JCH Bookstore.</p>
                <div>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
            <div class="organizer">
                <div class="group_img">
                    <img src="organizer3.png" alt="Ho Chang Yong">
                </div>
                <h3>Ho Chang Yong</h3>
                <p class="role">Co Founder</p>
                <p style="margin-bottom: 25px;">Age 19, graduated from Sunway University. Founded JCH Bookstore alongside Justus Leong and Chua E Heng. He is mainly involved in the back-end development of JCH Bookstore.</p>
                <div>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="/" class="organizer_social_icon" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer Section -->
    <?php require_once("../Reusable Home Page Items/Footer.php"); ?>


    <script src = "app.js"> </script>

</body>
</html>