
<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>用户列表</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">


    <style type="text/css">
        #pull_right{
            text-align:center;
        }
        .pull-right {
            /*float: left!important;*/
        }
        .pagination {
            display: inline-block;
            padding-left: 0;
            margin: 20px 0;
            border-radius: 4px;
        }
        .pagination > li {
            display: inline;
        }
        .pagination > li > a,
        .pagination > li > span {
            position: relative;
            float: left;
            padding: 6px 12px;
            margin-left: -1px;
            line-height: 1.42857143;
            color: #428bca;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #ddd;
        }
        .pagination > li:first-child > a,
        .pagination > li:first-child > span {
            margin-left: 0;
            border-top-left-radius: 4px;
            border-bottom-left-radius: 4px;
        }
        .pagination > li:last-child > a,
        .pagination > li:last-child > span {
            border-top-right-radius: 4px;
            border-bottom-right-radius: 4px;
        }
        .pagination > li > a:hover,
        .pagination > li > span:hover,
        .pagination > li > a:focus,
        .pagination > li > span:focus {
            color: #2a6496;
            background-color: #eee;
            border-color: #ddd;
        }
        .pagination > .active > a,
        .pagination > .active > span,
        .pagination > .active > a:hover,
        .pagination > .active > span:hover,
        .pagination > .active > a:focus,
        .pagination > .active > span:focus {
            z-index: 2;
            color: #fff;
            cursor: default;
            background-color: #428bca;
            border-color: #428bca;
        }
        .pagination > .disabled > span,
        .pagination > .disabled > span:hover,
        .pagination > .disabled > span:focus,
        .pagination > .disabled > a,
        .pagination > .disabled > a:hover,
        .pagination > .disabled > a:focus {
            color: #777;
            cursor: not-allowed;
            background-color: #fff;
            border-color: #ddd;
        }
        .clear{
            clear: both;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="row">
        <div class="col-md-12">
            <table class="table">
                <caption>
                    <span>管理员访问后台操作 </span>
                    <span class="btn btn-primary" style="float: right">
                        <a href="" style="text-decoration: none;color: #000000;">新增</a>
                    </span>
                </caption>

                <thead>
                <tr>
                    <th>id</th>
                    <th>用户名</th>
                    <th>uri</th>
                    <th>method</th>
                    <th>ip</th>
                    <th>返回码</th>
                    <th>操作时间</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $val)
                    <tr>
                        <td>{{$val->id}}</td>
                        <td>{{$val->adminName}}</td>
                        <td>{{$val->uri}}</td>
                        <td>{{$val->method}}</td>
                        <td>{{$val->ip}}</td>
                        <td>{{$val->statusCode}}</td>
                        <td>{{$val->operate_time}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-8 col-md-offset-2">
            {{$data->appends(['sort' => 'id-desc'])->links()}}
        </div>
    </div>
</div>

</body>
</html>
