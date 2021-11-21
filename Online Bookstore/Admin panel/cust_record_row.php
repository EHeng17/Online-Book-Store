<?php

    function cust_row($fullname, $gender, $username, $email, $phonenum) {
        $element = "

            <tr>
                <td>$fullname</td>
                <td>$gender</td>
                <td>$username</td>
                <td>$email</td>
                <td>$phonenum</td>
            </tr>

        ";

        echo $element;
    }

?>