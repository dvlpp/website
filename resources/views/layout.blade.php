<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <title>@yield("title") Développlan, développement web et mobile — Philippe Lonchampt, Strasbourg</title>

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
            <a href="{{ route("accueil") }}" class="logo">CODE 16</a>
            (<span class="titre small">Développlan</span>)
        </h1>
    </div>
</div>

@yield("content")

<div class="contact">
    <div class="container pam">
        <div class="grid-3-small-1">
            <div>
                <h2>Contact</h2>
                <p>
                    Code 16 (Développlan)
                    <br/>SCM Gotham - 24 rue du Vieux marché aux vins
                    <br/>67000 Strasbourg
                </p>

                <p>06 63 91 16 10 / {!! HTML::mailto("philippe@code16.fr") !!}</p>

                <p>Github : <a href="https://github.com/code16" target="_blank">@code16</a>
                / <a href="https://github.com/dvlpp" target="_blank">@dvlpp</a></p>
            </div>

            <div class="flex-item-double">
                <div class="Map" id="map"></div>
            </div>
        </div>
    </div>
</div>

<div id="XS" class="tiny-visible"></div>

<script src="http://maps.google.com/maps/api/js?key=AIzaSyDaCJWqR5qj6AJbY3wQMcFyFyUtBso3Lfs&sensors=false"></script>
<script src="{{ elixir("js/app.js") }}"></script>

</body>
</html>
