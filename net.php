<?php
    $net = mysqli_connect('localhost', 'root', '', 'admin_database');

    if(!$net) {
        die(mysqli_error($net));
    }
?>