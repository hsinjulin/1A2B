<?php
    session_start();

    $id = $_POST['player'];
    $guess = $_POST['guess'];

    $_SESSION['guess'] = $guess;

    $randomNumbers = $_SESSION['randomNumbers'];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $_SESSION["player"] = $id;
        $_SESSION["guess"] = $guess;
    }
    
    
    $A = 0;
    $ans_appear_times = array_fill(0, 10, 0);
    $guess_appear_times = array_fill(0, 10, 0);

    $guessString = str_split($guess);

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
        $B +=  min($guess_appear_times[$i], $ans_appear_times[$i]);
    }
    
    $results = isset($_SESSION['results']) ? $_SESSION['results'] : array();
    $results[] = "$guess >> {$A}A{$B}B";  
    $_SESSION['results'] = $results;

    header("Location:index.php");
    
?>