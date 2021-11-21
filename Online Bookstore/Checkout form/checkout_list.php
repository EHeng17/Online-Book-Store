<?php
	#Display book_id,category_id,bookname and bookprice
    function cart_list($book_id, $category_id, $bookname, $bookprice){
        $element="

            <p><a style=\"text-decoration: none;\" href=\"../Single Product Page/product.php?bookid=$book_id&categoryid=$category_id\">$bookname</a> <span class=\"price\">RM $bookprice</span></p>
            
        ";

        echo $element;

    }

?>