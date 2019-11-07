@extends('layout.app')
@section('content')

    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">
            <div class="demo-blog__posts mdl-grid">
                <div class="mdl-card mdl-cell mdl-cell--12-col z-depth-3">
                    <div class="mdl-card__media mdl-color-text--grey-50">
                        <h3 class="header">{{ $game[0]->nom }}</h3>
                        <div class="fixed-action-btn click-to-toggle direction-top direction-left menu-show" style="position: absolute;
                        right: 9px;
                        top: 14px;">
                                <a class="btn-floating btn-large blue-game">
                                  <i class="large material-icons">menu</i>
                                </a>
                                <ul>
                                <li><a href="" class="btn-floating blue-edit-game" style="opacity: 0; transform: scale(0.4) translateY(0px) translateX(40px);">
                                        <i class="material-icons">edit</i>
                                        </a></li>
            
                                  <li>include('jeux/_delete_form.html.twig') </li>
                                </ul>
                        </div>                        
                    </div>
                    <div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
                        <table class="table fiche_jeux">
                            <tbody>
                                <td>
                                    @if ($game[0]->lien == null)
                                        Aucune image disponible
                                    @else
                                        <img src="{{ asset('uploads/images/') }}/$game[0]->lien" width="300px" height="400px"/>
                                    @endif
                                </td>
                                <td>
                                    @if ($game[0]->video)
                                    <div class="video-container responsive-video">
                                        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{ $game[0]->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                    @endif
                                </td>
                            </tbody>
                            <tr>
                                <th>Nom</th>
                                <td>{{ $game[0]->nom }}</td>
                            </tr>
                            <tr>
                                <th>Année</th>
                                <td>{{ $game[0]->annee }}</td>
                            </tr>
                            <tr>
                                <th>Nombre de joueur</th>
                                <td>{{ $game[0]->nbreJoueurMin }}
                                    -
                                    {{ $game[0]->nbreJoueurMax }}</td>
                            </tr>
                            <tr>
                                <th>Age</th>
                                <td>à partir de
                                    {{ $game[0]->age }}
                                    ans</td>
                            </tr>
                        </td>
                        <tr>
                            <th>Description</th>
                            <td class="active" style="text-align: justify;">{{ $game[0]->descriptif }}</td>
                        </tr>
                        <tr>
                            <th>Durée</th>
                            <td>{{ $game[0]->dureeMin }}
                                -
                                {{ $game[0]->dureeMax }}
                                min</td>
                        </tr>
                        <tr>
                            <th>Nationalite</th>
                            <td>{{ $game[0]->nationalite }}</td>
                        </tr>
                        <tr>
                            <th>Lien vidéo</th>
                            <td>
                                <a href="{{ $game[0]->video }}" target="_blank">{{ $game[0]->video }}</a>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <br>
                <div class="row">
                    <div class="col s12 left">
                        <a href="{{ route('jeux') }}">
                            <i class="medium material-icons">arrow_back</i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</div>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.menu-show');
    var instances = M.FloatingActionButton.init(elems, {
        direction: 'left',
        hoverEnabled: false
    });
    });
</script>
@stop
