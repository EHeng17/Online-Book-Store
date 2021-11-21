<?php 

function rows($username, $bookname, $date, $bookprice){
    $element = "

    <tr>
        <td>$username</td>
        <td>$bookname</td>
        <td>$date</td>
        <td>1</td>
        <td>RM $bookprice</td>
    </tr>

    ";

    echo $element;
}

?>