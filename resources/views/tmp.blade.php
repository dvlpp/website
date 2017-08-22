<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>Invitation</title>

    @yield("meta")

    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <base href="{{ url("") }}">
    <link rel="shortcut icon" type="image/png" href="/img/favicon.png"/>
    <meta name="google-site-verification" content="4TD9uel8ORybF3xVAOOLSnHcnhg-AyzMqAKmPo2gPCU" />

    <link href="http://fonts.googleapis.com/css?family=Poly:400,400italic" rel="stylesheet" type="text/css">

    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ elixir("css/all.css") }}" rel="stylesheet">
</head>

<body>

<div class="header pts pbs">
    <div class="container">
        <h1 class="man plm">
            <span class="titre">Invitation</span>
        </h1>
    </div>
</div>


    <div class="container">
        <div class="grid-2-1">
            <ul style="font-size:1.5em;">
                <li class="mbs">
                    Ca commence à 19h. Oui c’est tôt, mais en même temps on sera dehors, il faut vite froid, et surtout si je me couche tard après je mets 8 jours à m’en remettre. Et puis il y a une tournoi de ping pong en attente.
                </li>
                <li class="mbs">
                    Il y a un thème : saucisses et vin rouge. Il faut donc rapporter soit du vin rouge, soit des saucisses.
                </li>
                <li class="mbs">
                    On fête ma quarantième année (oui il y a une différence), mais on a pas le droit de faire de cadeau. Sinon on vient pas. C’est soit on vient, soit on fait un cadeau.
                </li>
                <li class="mbs">
                    On doit dire avant demain, mercredi, 20h, si on vient. Si on vient pas, on n’a pas besoin de dire (on déteste les excuses). Et pour le dire, c’est par SMS.
                </li>
                <li class="mbs">
                    C’est au 13b rue de la gare, à Schiltigheim.
                </li>
            </ul>
        </div>
    </div>

</body>
</html>