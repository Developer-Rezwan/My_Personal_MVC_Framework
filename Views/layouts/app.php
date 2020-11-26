<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
</head>
<style>
    body{
        font-family: Arial;
    }
    nav#first{
        color: tomato;
        padding: 5px;
        background: aqua;
    }
    ul li{
        list-style: none;
        display:inline;
        padding: 10px;
    }
    ul li a{
        text-decoration: none;
    }
    .container{
        max-width:95%;
        margin:auto;
    }
    .main-content{
        margin-top: 15px;
    }
    .footer{
        color: whitesmoke;
        background: #453636;
        padding: 5px;
        font-family: "Rage Italic";
        text-align: center;
        font-size: small;
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
    <hr/>
    <div class="main-content">
      @yield("content")
      @yield("form")
    </div>
<hr/>
<div class="footer">
    Copyright &copy; 2020.All right reserved by @yield("footer-name") .
</div>
</div>
</body>
</html>