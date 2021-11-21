<?php 

function rows($bookname, $date, $bookprice){
    $element = "

    <tr>
        <td>$bookname</td>
        <td>$date</td>
        <td>RM $bookprice</td>
    </tr>

    ";

    echo $element;
}

?>