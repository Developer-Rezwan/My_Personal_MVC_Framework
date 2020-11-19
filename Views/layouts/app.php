<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To My Own MVC Framework</title>
</head>
<style>
    body{
        font-family: Arial;
    }
    #first{
        color: tomato;
        padding: 10px;
        background: aqua;
    }
    ul li{
        list-style: none;
    }
    .container{
        max-width:90%;
        margin:auto;
    }
    .main-content{
        margin-top: 15px;
    }
</style>
<body>
<div class="container">
    <nav id="first">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/contact">Contact</a></li>
        </ul>
    </nav>
    <div class="main-content">
      @yield
    </div>
</div>
</body>
</html>