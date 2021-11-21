<?php

    function book_row($bid, $booknm, $genre, $author, $format, $price, $quatity) {
        $element = "

            <tr>
                <td>$booknm</td>
                <td>$genre</td>
                <td>$author</td>
                <td>$format</td>
                <td>RM $price</td>
                <td>$quatity</td>
                <td class=\"update-click\"><a style=\"text-decoration: none;\" href=\"../Update book/update_book.php?bookid=$bid\">Update</a></td>
            </tr>
        ";

        echo $element;
    }

?>