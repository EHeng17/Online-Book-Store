<?php

    function cust_inquiry($contact_id, $uid, $fistnm, $lastnm, $email, $reason, $question) {
        $element = "

            <tr>
                <td>$fistnm</td>
                <td>$lastnm</td>
                <td>$email</td>
                <td>$reason</td>
                <td style=\"\">$question</td>
                <td class=\"inquiry_reply\"><a style=\"text-decoration: none;\" href=\"reply.php?contactID=$contact_id&uid=$uid\">Reply</td>
            </tr>

        ";

        echo $element;
    }

?>