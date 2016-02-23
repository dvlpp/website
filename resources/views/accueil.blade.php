@extends("layout")

@section("content")

    <div class="container">
        <div class="grid-2-1">
            <div class="presentation pam">
                <p class="h4-like">
                    Nous concevons depuis 2007, à Strasbourg, des sites et des
                    applications basés sur des technologies open-source, avec
                    une approche d'artisan : le développement se fait sur-mesure,
                    l’idée étant d’avoir la main sur tout.
                </p>

                <p>
                    Nos clients ont un point commun : ils veulent une solution adaptée
                    à un problème qui n’est pas forcément standard.
                </p>

                <p>
                    Plusieurs projets sont développés de concert avec l’agence
                    de graphisme Atelier Poste 4, qui apporte ses compétences
                    en termes d’image, de communication et d’ergonomie.
                </p>
            </div>
        </div>
    </div>

    <div class="container pam">
        <h2>Quelques références récentes</h2>

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

@endsection