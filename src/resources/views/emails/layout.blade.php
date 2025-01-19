<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>New User Registered | @yield('username') - @yield('email')</title>
    <style>
        * {
            box-sizing: border-box;
        }

        .container {
            max-width: 480px;
            width: 100%;
            margin-right: auto;
            margin-left: auto;
            text-align: center;
        }

        .confirm-button {
            padding: 12px;
            border: 1px solid #eb9130;
            border-radius: 5px;
            background-color: #eb9130;
            color: #fff;
            text-decoration: none;
            transition: all .3s ease;
        }
        .confirm-button:hover {
            background-color: #fff;
            color: #eb9130;
        }
    </style>
</head>
<body>
<div class="container">
    @yield('content')
</div>
</body>
</html>
