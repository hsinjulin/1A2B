<?php
    session_start();
    if(!isset($_SESSION['randomNumbers'])){
        $randomNumbers = array();
        while (count($randomNumbers) < 4) {
            $randomNumber = rand(0, 9);
            if (!in_array($randomNumber, $randomNumbers)) {
                $randomNumbers[] = $randomNumber;
            }
        }    
        $_SESSION['randomNumbers'] = $randomNumbers;
    }else{
        $randomNumbers = $_SESSION['randomNumbers'];
    }
    // 根據隨機數字顯示相應的圖片
    $imageFileNames = array();
    foreach ($randomNumbers as $number) {
        $imageFileNames[] = "../images/$number.png";
        //echo "<img src='$imageFileName' alt='$number'/>";
    }       
       
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Images</title>
    <style>
        body{
            text-align:center;
        }
        img{
            width: 50px;height: 100px;
        }
    </style>
</head>
<body>
    <?php foreach ($imageFileNames as $imageFileName): ?>
        <?php echo "<img src=" . $imageFileName . " alt=" . $imageFileName . ">" ?>
    <?php endforeach; ?>
</body>
</html>

