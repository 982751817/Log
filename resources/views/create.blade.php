
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>

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
<form  id="form_value">
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
    <input type="button" value="提交" onclick="subForm()">
</form>

</body>
<script>
    function subForm(){
        var data = $('#form_value').serialize();
        $.ajax({
            method:"post",
            data:data,
            url:"{{url('/log')}}",
            success:function(data){
                console.log(data);
                window.location.href="{{url('/log')}}";
            }
        })
    }
</script>
</html>
