@extends("layout")

@section("title")
    {{ $projet->titre }} /
@endsection

@section("content")
    <div class="container">
        <div class="grid-2-1">
            <div class="pam">
                <h2 class="ma0">projet {{ $projet->titre }}</h2>
                <h4 class="ma0">{{ $projet->soustitre }}</h4>
            </div>
            <div class="txtright pam small-hidden">
                <a href="{{ route("projet", $suivant->slug) }}" class="btn btn-lien hvr-icon-forward">
                    Projet suivant
                </a>
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

    <div class="container">
        <div class="plm pbl mbl mtm">
            @if($projet->url)
                <p><a href="{{ $projet->url }}" target="_blank" class="btn btn-lien hvr-icon-forward">Voir le site</a></p>
            @endif
        </div>
    </div>

@endsection