<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.ico')}}">
    <title>ProductsReport</title>
</head>
<body>
    @foreach ($produtos as $produto)

        <h1>{{$produto->produto_nome}}</h1>
        <h2>{{$produto->produto_valor}}</h2>
        <h3>{{$produto->produto_quantidade}}</h3>

    @endforeach
</body>
</html>