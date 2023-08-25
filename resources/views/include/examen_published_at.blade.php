@php
    $today = \Carbon\Carbon::parse(now())->formatLocaliZed('%Y-%m-%d');
    $jour_1 = \Carbon\Carbon::parse(now())->formatLocaliZed('%d');
    $mois_1 = \Carbon\Carbon::parse(now())->formatLocaliZed('%m');
    $annee_1 = \Carbon\Carbon::parse(now())->formatLocaliZed('%Y');

    $date = \Carbon\Carbon::parse($examen->created_at)->formatLocaliZed('%Y-%m-%d');
    $jour_2 = \Carbon\Carbon::parse($examen->created_at)->formatLocaliZed('%d');
    $mois_2 = \Carbon\Carbon::parse($examen->created_at)->formatLocaliZed('%m');
    $annee_2 = \Carbon\Carbon::parse($examen->created_at)->formatLocaliZed('%Y');
    $heure = \Carbon\Carbon::parse($examen->created_at)->formatLocaliZed('%H:%M:%S');
@endphp
<span class="text-muted">
    @if (($annee_1 == $annee_2) && ($mois_1 == $mois_2) && ($jour_1 == $jour_2))
        {{ ('Aujourdhui à') }} {{ $heure }}
    @elseif (($annee_1 == $annee_2) && ($mois_1 == $mois_2) && ($jour_1 == $jour_2 + 1))
        {{ ('Hier à') }} {{ $heure }}
    @elseif (($annee_1 == $annee_2) && ($mois_1 == $mois_2) && ($jour_1 == $jour_2 + 2))
        {{ ('Avant Hier à') }} {{ $heure }}
    @else
        {{ ('Publier le ') }} {{ $date }} {{ ('à') }} {{ $heure }}
    @endif
</span>