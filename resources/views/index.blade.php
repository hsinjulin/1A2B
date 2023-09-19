<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>1A2B</title>
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
        img{
            width: 50px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h1 class="t1">猜數字遊戲</h1>
    <div class="tit">        
        <form action="{{route('guess')}}" method="get" name="form1" id="form1">
            <p>
                <label for="playerName">玩家ID:</label>
                <input name="player" type="text" autofocus required id="player" size="50" value="{{session('player')}}">                
            </p>
            <p>
                <label for="guessName">已使用歷程:</label>
                <input name="guess" type="text" autofocus required id="guess" size="20">
                <input type="submit" name="submit" id="submit" value="猜猜看">
            </p>
        </form>
        <p>
            <iframe src="{{route('show')}}" frameborder="1" class="iframe-style"></iframe>
        </p>
        <p class="sql">
            <a href="{{route('insert')}}">寫回資料庫&nbsp</a>
            <a href="{{route('clear')}}">重設</a>
        </p>        
    </div>
    <div class="im">
        @foreach(session('randomNumbers', []) as $num)
        <!-- 使用asset()生成基于Laravel中的公共目錄結構的圖像文件的正确URL-->
            <img src="{{asset('../public/images/'.$num.'.png')}}">
        @endforeach
    </div>
</body>
</html>