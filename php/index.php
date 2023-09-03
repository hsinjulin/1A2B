<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>numbers</title>
    <style>
        body{
            text-align: center;
        }
        h1{
            color: red;
        }
        .tit{
            background-color: rgb(250, 222, 170);
            width: 500px;
            height: auto;    
            margin: auto;
            padding: 5px;
        }
        .iframe-style{
            background-color: rgb(255, 255, 255);
            width: 500px;
            height: 200px;
            overflow: auto;
        }
    </style>
</head>
<body>
    <?php session_start();?>
    <h1 class="t1">猜數字遊戲</h1>
    <div class="tit">        
        <form action="insert.php" method="post" name="form1" id="form1">
            <p>
                <label for="textfield">玩家ID:</label>
                <input name="player" type="text" autofocus required id="player" size="50" value="<?php echo isset($_SESSION["player"]) ? $_SESSION["player"] : ""; ?>">                
            </p>
            <p>
                <label for="textfield">已使用歷程:</label>
                <input name="guess" type="text" autofocus required id="guess" size="20">
                <input type="submit" name="submit" id="submit" value="猜猜看">
            </p>
        </form>
        <p>
            <iframe src="result.php" frameborder="1" class="iframe-style"></iframe>
        </p>
        <p class="sql">
            <a href="process_guesses.php">寫回資料庫&nbsp</a>
            <a href="clear.php">重設</a>
        </p>        
    </div>
    <div class="im">
        <iframe src="img.php" frameborder="0" width="500" ></iframe>
    </div>
</body>
</html>