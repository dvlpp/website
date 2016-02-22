@extends("layout")

@section("title")
    {{ $projet->titre }} /
@endsection

@section("header-menu")
    <div class="grid-2-1 mlm">
        <h2 class="ma0">projet {{ $projet->titre }}</h2>
        <a href="{{ route("projet", $suivant->slug) }}" class="txtright">Projet suivant ></a>
    </div>
@endsection

@section("content")
    <div class="container">
        <div class="grid-2-1">
            <div class="pam">
                <h3 class="ma0">{{ $projet->soustitre }}</h3>

                <p><a href="{{ $projet->url }}" target="_blank">Voir le site</a></p>

            </div>
        </div>
    </div>

    @foreach(paragraphes(markdown($projet->texte)) as $paragraphe)

        @if($tag = is_bandeau_photos($paragraphe))
            <div class="grid-3-small-3-tiny-2 plm prm">
                @foreach($projet->screenshotsByTag($tag) as $photo)
                    <div class="mtm mbm ptm pbm">
                        <img src="sharp/thumbnails/screenshots/600-/{{ $photo->fichier }}">
                    </div>
                @endforeach
            </div>

        @else

            <div class="container">
                <div class="grid-2-1">
                    <div class="plm prm pts pbs">
                        <p class="h5-like">{!! $paragraphe !!}</p>
                    </div>
                </div>
            </div>

        @endif

    @endforeach

@endsection