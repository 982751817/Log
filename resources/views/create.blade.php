
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>新增</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">


    <style type="text/css">
       label{
           width: 100px!important;
       }
       input{
           width: auto!important;
           display: inline-block!important;
       }
    </style>
</head>
<body>
<form action="{{url('log')}}" method="post">
    <div class="form-group">
        <label for="userNameInputEmail1">UserName</label>
        <input type="text" class="form-control" name="userName" id="userNameInputEmail1" placeholder="userName">
    </div>
    <div class="form-group">
        <label for="exampleInputUri">uri</label>
        <input type="text" class="form-control" name="uri" id="exampleInputUri" placeholder="uri">
    </div>
    <div class="form-group">
        <label for="exampleInputMethod">method</label>
        <input type="text" class="form-control" name="method" id="exampleInputMethod" placeholder="method">
    </div>
    <div class="form-group">
        <label for="exampleInputIp">IP</label>
        <input type="text" class="form-control" name="ip" id="exampleInputIp" placeholder="ip">
    </div>

    <div class="form-group">
        <label for="exampleInputStatusCode">statusCode</label>
        <input type="text" class="form-control" name="statusCode" id="exampleInputStatusCode" placeholder="statusCode">
    </div>
    <button type="submit" class="btn btn-default">Submit</button>
</form>

</body>
</html>
