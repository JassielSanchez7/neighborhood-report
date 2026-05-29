<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #F3F3F3;
            color: black;
            padding: 30px;
            /* text-align: center; */
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
            justify-content: space-between;            
        }
        .content {
            background: #E9EBE0;
            padding: 20px;
            text-align: center;
        }
        .button {
            display: inline-block;
            background: #3F5528;
            color: white;
            padding: 12px 30px;
            text-decoration: none;
            border-radius: 6px;
            margin: 20px 0;
        }
        a{
            text-decoration: none;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="logo">
            <img src="{{asset('assets/img/escudo_muni.png')}}" width="40" alt="">
            
        </div>
        <h3 style="margin:0;">Reporte Vecinal</h3>
    </div>

    <div class="content">
        <h4>Estimado Vecino, {{$incidence->neighbor->full_name}}</h4>
        <p>Se le comunica que hemos actualizado el estado de su incidencia <strong>#{{$incidence->id}}</strong>, gracias por contribuir con el desarrollo del distrito. Recuerda que el avance del distrito es parte de todos, que tenga un excelente día.</p>
        <a style="color:white;" href="{{route('neighbor.incidences')}}" class="button">Ver Incidencia</a>
    </div>

</body>
</html>