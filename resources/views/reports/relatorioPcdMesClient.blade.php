<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" href="{{url('assets/dashboard/images/favicon.ico')}}">
    <title>ProcedPerMonthReport</title>
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
    <h3>Relatório de procedimentos realizados por mês/cliente<h3>
    </header>

<br>
       <div>             @foreach($pcd_sum as $key=>$p)
            <table style="width:100%; padding: 0 5px;">
                @if($key<1)
                <caption style="padding: 5px;">Mês selecionado: {{$mes}}</caption><br>
                @endif
                    <thead>
                        <tr>
                            <th>Cliente</th>
                            <th>Animal</th>
                            <th>Procedimento</th>
                            <th>Descrição</th>

                        </tr>
                        <!-- <tr><th></th></tr> -->
                    </thead>
                        @foreach ($gera_procedimentos as $procedimentos)
                            @if($procedimentos->id_cli == $p->id)
                    <tbody>



                            <tr>
                                <td>{{isset($procedimentos->nome) ? $procedimentos->nome : 'Empresa '.$procedimentos->nome_fantasia}}</td>

                                <td>{{$procedimentos->animal_nome.' | Chip:'.$procedimentos->chip}}</td>

                                <td>{{($procedimentos->procedimento_nome)}} | R$ {{number_format($procedimentos->pcd_valor,2)}}</td>

                                <td>{{$procedimentos->pcd_descricao}} </td>

                            </tr>

                    </tbody>
                            @endif
                        @endforeach
            </table>

       </div>
       <div style="margin-bottom:30px; padding: 0 10px;">
            <h5 style="float:right;">Total: R$ {{$p->valor}}</h5>
            <br>
       </div>
            @endforeach

    </div>
</body>
</html>
