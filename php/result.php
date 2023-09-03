<?php
    session_start();
    if (isset($_SESSION['results'])) {
        $results = $_SESSION['results'];
        foreach($results as $result){
            echo $result."<br>";
        }
    }
?>