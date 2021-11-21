<?php

    function cart($bid,$bookname, $bookimg, $bookprice){
        $element="

        <div class=\"product\">
            <img src=\"$bookimg\" alt=\"$bookname\">
            <div class=\"product-info\">
                <h2 class=\"product-name\">$bookname</h2>
                <h4 class=\"product-price\">RM $bookprice</h4>
                <p class=\"product-quantity\">Quantity: 1</p>
                <p class=\"product-remove\">
                    <i class=\"fas fa-trash\"></i>
                    <span class=\"remove\"><a href=\"delete_cart.php?bookid=$bid\" style=\"text-decoration: none; color: white;\" class=\"remove\" >Remove</a></span>
                </p>
            </div>
        </div>
        ";

        echo $element;

    }

?>
