<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield("title")</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<style>
    body{
        font-family: Arial;
    }
    nav#first{
        color: tomato;
        margin-top: 2px;
        padding: 5px;
        background: aqua;
    }
    nav ul{
        margin-top: 15px;
    }
    ul li{
        list-style: none;
        display:inline;
        padding: 10px;
    }
    ul li a{
        text-decoration: none;
        color: tomato;
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
    .register-btn{
        right: 80px;
        position: absolute;
        margin-top: -10px;
    }

    .login-btn{
        right: 160px;
        position: absolute;
        margin-top: -10px;
    }
</style>
<body>
<div class="container">
    <nav id="first">
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/profile">Profile</a></li>

            <!--- Authentication Menu ---->
            <li class="login-btn"><a href="/login">Login</a></li>
            <li class="register-btn"><a href="/register">Register</a></li>
        </ul>
    </nav>
    <hr/>
    <div class="main-content">
      @yield("content")
    </div>
<hr/>
<div class="footer">
    Copyright &copy; 2020.All right reserved by Developer_Rezwan .
</div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
</body>
</html>