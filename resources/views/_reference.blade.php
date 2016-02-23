<div class="Reference mbm">
    <a href="{{ route("projet", [$projet->slug]) }}" class="Reference__cartel pam js-projet" data-target="js-fiche-{{ $projet->id }}">
        <h3 class="man">{{ $projet->titre }}</h3>
        <p class="mts mbs">—</p>
        <p class="man">{{ $projet->soustitre }}</p>
    </a>

    <div href="{{ route("projet", [$projet->slug]) }}" class="Reference__fiche pam js-fiche js-fiche-{{ $projet->id }}">
        <a class="Reference__close js-fiche-close">&times;</a>
        <div class="container">
            <div class="grid-3-small-2-tiny-1">
                <div class="plm prm flex-item-double">
                    <p>{!! premier_paragraphe(markdown($projet->texte)) !!}</p>
                </div>
                <div class="prm">
                    @if(sizeof($projet->technos))
                        <p>
                            <span class="Reference__techno small">
                                {!! implode('</span> <span class="Reference__techno small">', $projet->technos()->pluck("nom")->all()) !!}
                            </span>
                        </p>
                    @endif
                    <p>
                        <a href="{{ route("projet", [$projet->slug]) }}" class="btn btn-lien hvr-icon-forward">
                            Voir le projet
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>