<?php 

function component($categoryid, $bookid, $bookname, $bookimg, $bookprice){
    $element = "

    <div class=\"trending_book\">
        <a href=\"product.php?bookid=$bookid&categoryid=$categoryid\" target=\"_blank\">
        <img src=\"$bookimg\">
        </a>
        <a class = \"text_decoration\" href=\"product.php?bookid=$bookid&categoryid=$categoryid\" target=\"_blank\">
        <h4>$bookname</h4>
        </a>
        <div class=\"rating\">
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star\"></i>
            <i class=\"fa fa-star-o\"></i>
        </div>
        <p>RM $bookprice</p>
    </div>

    ";

    echo $element;
}

?>