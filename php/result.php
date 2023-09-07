<?php
    session_start();
    if (isset($_SESSION['results'])) {
        foreach($_SESSION['results'] as $result){
            echo $result."<br>";
        }
    }
?>