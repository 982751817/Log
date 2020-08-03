<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户注册</title>
</head>
<body>
<form action="{{url('/login')}}" method="post">
    <span>用户名：</span><input type="text" name="userName">
    <span>密码：</span><input   type="password" name="password">
    <input  type="submit" value="登录">
</form>
</body>
</html>
