<?php 

function inventory_rows($booknm, $qnt){
    $element = "

    <tr>
        <td>$booknm</td>
        <td>$qnt</td>
    </tr>

    ";

    echo $element;
}

?>