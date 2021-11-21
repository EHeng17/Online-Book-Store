<?php 

    include "../config.php";

    require_once("../Personal History/rows.php");

    session_start();

    error_reporting(0);

    $user_info = "SELECT * FROM users WHERE id = $_SESSION[uid]";
    $user_info_result = mysqli_query($conn, $user_info);
    $user_info_row = mysqli_fetch_assoc($user_info_result);

    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>JCH Bookstore | History</title>
    <link rel="stylesheet" href="style.css">
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

    <div class="container">
        <h1 class="colored_header">Purchase History</h2>

        <table>
            <thead>
                <tr>
                    <th style="width: 60%;">Book Name</th>
                    <th>Date Purchased</th>
                    <th>Amount</th>
                </tr>
            </thead>

            <tbody>
                
                <?php 

                    $personal_history = mysqli_query($conn, "SELECT * FROM personal_history WHERE user_id = $_SESSION[uid] ORDER BY date_of_purchase DESC");
                    $personal_history_rows = mysqli_fetch_assoc($personal_history);

                    if ($personal_history_rows != NULL){
                        do {
                            rows($personal_history_rows["book_name"], $personal_history_rows["date_of_purchase"], $personal_history_rows["amount"]);
                        } while ($personal_history_rows = mysqli_fetch_assoc($personal_history));
					} else {
						echo "<tr><td>No Previous Purchase Record</td></tr>";
					}
                ?>

            </tbody>
        </table>  
    </div>
    
</body>
</html>