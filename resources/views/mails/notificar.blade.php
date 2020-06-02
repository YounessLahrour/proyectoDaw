<!doctype html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificación de YuniTic</title>
    <style>

footer {
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
}
    </style>
</head>

<body>
    <p>Hola! {{$cliente->nombre}}, {{$cliente->apellido}}</p>
    <div>
        {{$mensaje}}
    </div>

    <p></p>
    
</body>
<footer>
    <table width="600" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #ffa300;">
        <tr>
            <td width="170" height="170" style="border:1px solid #ffa300; border-right: none; border-left: none;" align="right" valign="top">
                <a href="[ENLACE DE TU SITIO WEB]" target="_blank"><img src="./img/empleados/youness.jpg" width="150" height="180" style="padding-top:15px;"></a>
            </td>
            <td width="430" height="170" style="padding-left:25px; font-family: Helvetica, Arial, sans-serif; font-size:13px; border:1px solid #ffa300; border-left: none; border-right: none; line-height:16px;" valign="bottom">
                <p style="font-size:18px;"><b>Youness Lahrour</b></p>
                <p style="line-height:19px;">950632659 &middot; yunitic@yunitic.com &middot; www.yunitic.com<br></p>
                <p><b>Síguenos en:</b></p>
                <p><a href="[ENLACE A TU PÁGINA DE FACEBOOK]" target="_blank"><img src="[URL IMAGEN LOGO FACEBOOK]" width="30" height="30"></a>
                    <a href="[ENLACE A TWITTER]" target="_blank"><img src="[URL IMAGEN LOGO TWITTER]" width="30" height="30"></a>
                    <a href="[ENLACE A GOOGLE PLUS]" target="_blank"><img src="Captura.PNG" width="30" height="30"></a></p>
            </td>
        </tr>
    </table>
</footer>
</html>