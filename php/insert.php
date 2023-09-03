<?php
    session_start();
    $id = $_POST['player'];
    $guess = $_POST['guess'];
    $_SESSION['guess'] = $guess;
    $randomNumbers = $_SESSION['randomNumbers'];
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["player"] = $_POST["player"];
        $_SESSION["guess"] = $_POST["guess"];
    }
    
    $guessString = str_split($guess);
    $A = 0;
    $ans_appear_times[10] = array();
    $guess_appear_times[10] = array();
    //計算有幾個A
    for($i=0; $i< 4; $i++) {
		
        if($guessString[$i] == $randomNumbers[$i]) {
            $A++;
        }
        else {
            $ans_appear_times[$randomNumbers[$i]]++;
            $guess_appear_times[$guessString[$i]]++;
        }
    }
    //計算有幾個B(已排除計算過的A)
    $B = 0;
    for($i=0; $i<10; $i++) { 
        if($guess_appear_times[$i] >= $ans_appear_times[$i]) {
            $B += $ans_appear_times[$i];
        }
        else {
            $B += $guess_appear_times[$i];
        }
    }
    
    //$results = array();
    $results = isset($_SESSION['results']) ? $_SESSION['results'] : array();
    $result = $guess . ">>" . $A ."A" . $B . "B";  
    $results[] = $result;
    $_SESSION['results'] = $results;
    //echo "<script>window.location.href = 'php/result.php?result=" . urlencode($result) . "';</script>";

    header("Location:index.php");
    
?>