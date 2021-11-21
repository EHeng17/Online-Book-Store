<?php 
#Display categoryid,bookid,bookname,bookimg,bookprice and bookaurthor
function books($categoryid, $bookid, $bookname, $bookimg, $bookprice, $bookauthor) {

    $element = "
    
    <td> 
        <div class=\"places\">
            <a href=\"../Single Product Page/product.php?bookid=$bookid&categoryid=$categoryid\">
            <img class=\"booksize\" src=\"$bookimg\" alt=\"$bookname\" >
            </a>
            
            <p class=\"weight\">$bookname</p><br />
            <p class=\"weight\" id=\"author\">by $bookauthor</p><br />
            <p class=\"weight\">RM $bookprice</p>
            <span style=\"margin-bottom: 20px;\" class=\"click\">
            <a href=\"../Single Product Page/product.php?bookid=$bookid&categoryid=$categoryid\"><i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i></a> 
            </span>
        </div>
    </td>
    ";

    echo $element;

}

?>