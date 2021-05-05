<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.ico')}}">
    <title>ProductsReport</title>
    <style>
        html,
body {
    height: 100%;
}

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    border: 0;
    border-spacing: 0;
}

div.full-body {
    width: 100%;
    height: 100%;
    background: green;
    display: flex;
    justify-content: center;
    align-items: center;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 5px;
  text-align: left;
}

header {
    padding: 10px;
}
    </style>
</head>
<body>

<header>
    <h3>Relatório de Produtos em Estoque<h3>
    </header>

<br>
       <div>
            <table style="width:100%; padding: 0 5px;">

                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Valor</th>
                            <th>Descrição</th>
                            <th>Quantidade em Estoque</th>

                        </tr>
                        <!-- <tr><th></th></tr> -->
                    </thead>

                    <tbody>

                        @foreach ($produtos as $produto)
                            <tr>
                                <td>{{$produto->produto_nome}}</td>

                                <td>R$ {{number_format($produto->produto_valor,2)}}</td>

                                <td>{{$produto->produto_descricao}}</td>

                                <td>{{$produto->produto_quantidade}}</td>
                            </tr>

                        @endforeach
                    </tbody>

            </table>

       </div>


</body>
</html>
