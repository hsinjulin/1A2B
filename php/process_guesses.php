<?php
    session_start();
    require_once 'db_connect.php';
    $id = $_SESSION['player'];
    $guess = $_SESSION['guess'];
    $result = end($_SESSION['results']);

    $sql = "INSERT INTO guesses (id, guess, result) VALUES($id, $guess, '$result')";
    if($rt = mysqli_query($link, $sql))
        echo "done.";

    mysqli_close($link);
?>
<br>
<a href="index.php">回首頁</a>