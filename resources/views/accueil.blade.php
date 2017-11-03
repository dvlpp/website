@extends("layout")

@section("content")

    <div class="container">
        <div class="grid-2-1">
            <div class="presentation pam">
                <p class="h4-like">
                    Nous<span class="color">*</span> concevons depuis 2007 des sites et des
                    applications basés sur des technologies open-source, avec
                    une approche d'artisan&nbsp;: le développement se fait sur-mesure,
                    l’idée étant d’avoir la main sur tout.
                    <br/>Notre domaine d'expertise technique est le développement d'applications web,
                    autour plus spécifiquement de <strong>Laravel</strong> et <strong>Vue.js</strong>
                    ces dernières années, et les applications mobiles multi-plateforme.
                </p>

                <p class="h4-like">
                    Nos clients ont un point commun&nbsp;: ils veulent une solution adaptée
                    à un problème qui n’est pas forcément standard, tout en bénéficiant d'un
                    système de gestion puissant qui les rende autonomes au quotidien.
                </p>

                <p class="note mtl">
                    * Nous, c'est trois développeurs : <strong>Philippe Lonchampt</strong>, fondateur
                    de l'entreprise, <strong>Rémi Collin</strong> et <strong>Antoine Guingand</strong>.
                    Nous nous entourons de spécialistes d'autres domaines quand le projet le demande,
                    comme par exemple les excellents graphistes strasbourgeois d'Atelier Poste 4.
                </p>

            </div>
        </div>
    </div>

    <div class="container pam">
        <h2>Quelques références récentes (2015 / 2017)</h2>

        <div class="grid-3-small-1">
            @foreach($projets->where("is_open_source", 0) as $projet)
                @include("_reference")
            @endforeach
        </div>

    </div>

    <div class="container pam">
        <h2>Contributions open-source</h2>

        <div class="grid-4-small-1">
            @foreach($projets->where("is_open_source", 1) as $projet)
                @include("_reference")
            @endforeach
        </div>
    </div>

    <div class="container pam">

        <h2>Et en ce moment...</h2>
        <div class="grid-2-1">
            <p>
                Nous travaillons notamment au
                <strong>développement d'un logiciel intranet / CRM</strong>
                pour l'Agence culturelle Grand Est, sur
                <strong>un site de réservation de matériel en ligne</strong>
                lié à une application de gestion existante, à la création d'une
                <strong>application iOS / Android de découverte touristique</strong>,
                ainsi qu’à la version 4 de notre <strong>framework de gestion de contenu
                <a href="https://github.com/code16/sharp">Sharp</a></strong>.
            </p>
        </div>

    </div>

    <div class="pam"></div>

@endsection