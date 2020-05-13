<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de YuniTic</title>
</head>
<body>
    <p>Hola! {{$cliente->nombre}}, {{$cliente->apellido}}</p>
    <p>Desde YiniTic, nos ponemos en contacto con usted, para comunicarle que su equipo: </p>
    <ul>
        <li>Marca: {{$ordene->marcaEquipo}}</li>
        <li>Modelo: {{$ordene->modeloEquipo}}</li>
        <li>Estado: {{$ordene->estadoOrden}}</li>
    </ul>
    <p>Está listo para recogerlo, no olvide el Nº de Serial: {{$ordene->serialOrden}}</p>
    <ul>
        <li>precio: {{$ordene->pvp}}€</li>
    </ul>
    <p></p>
</body>
</html>

