@extends('layout.app')

@section('content')
<div class="demo-blog mdl-layout mdl-js-layout has-drawer is-upgraded">
        <main class="mdl-layout__content">
            <div class="demo-blog__posts mdl-grid">
                <div class="mdl-card coffee-pic mdl-cell mdl-cell--12-col z-depth-3">
                    <div class="mdl-card__media mdl-color-text--grey-50">
                        <h3>
                            <a href="{{ route('game_list') }}">Liste des jeux</a>
                        </h3>
                        <a href="{{ route('addGame') }}" class="mdl-button mdl-js-ripple-effect mdl-js-button mdl-button--fab mdl-color--accent" style="
                                                                                              position: relative;
                                                                                              top: 15px;
                                                                                              right: -300px">
                            <i class="material-icons mdl-color-text--white" role="presentation">add</i>
                            <span class="visuallyhidden">add</span>
                        </a>
                    </div>
                    <table id="show_game" class="table stripped centered responsive-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Nom</th>
                                <th>Genre</th>
                                <th>Nombre de joueur</th>
                                <th>Durée</th>
                                <th>Age</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        
                        @if ($gameLists)
                           @foreach ($gameLists as $gameList)
                           <tr>
                                <td>
                                    @if (!$gameList->lien)
                                        <img src="{{ asset('images/aucune-image-disponible.png') }}" width="100px" height="100px"/>
                                    @else 
                                       <img src="{{ asset('images').'/'.$gameList->lien }}" width="100px" height="100px"/>
                                    @endif
                                </td>
                                <td>{{ $gameList->nom }}</td>
                                <td>{{ $gameList->genre }}</td>
                                <td>{{ $gameList->nbre_joueur_min }}
                                    -
                                    {{ $gameList->nbre_joueur_max }}</td>
                                <td>{{ $gameList->duree_min }}
                                    -
                                    {{ $gameList->duree_max }}</td>
                                <td width="120px">{{ $gameList->age }} ans et +</td>
                                <td width="120px">
                                    <a class="tooltipped" data-position="bottom" data-tooltip="Zoom sur {{ $gameList->nom }}" href="{{ route('jeux.show', $gameList->id) }}">
                                        <i class="material-icons">zoom_in</i>
                                    </a>
                                    <a class="tooltipped delete_jeux" onclick="return confirm('Confirmer la suppression ?')" data-position="bottom" data-tooltip="Supprimer {{ $gameList->nom }}" href="{{ route('jeux.delete', $gameList->id) }}">
                                        <i class="material-icons">delete</i>
                                    </a>
                                    <a class="tooltipped ajouter_collection" data-id="{{ $gameList->id }}" data-position="bottom" data-tooltip="Ajouter {{ $gameList->nom }} à ma collection" href="#">
                                        <i class="material-icons">add</i>
                                    </a>
                                </td>
                            @endforeach                     
                        @else
                            <tr>
                                <td colspan="11">no records found</td>
                            </tr> 
                            
                        @endif
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('dashboard') }}" class="btn-floating btn-small waves-effect waves-light orange">
                    <i class="material-icons">arrow_back</i>
                </a>
            </div>
        </main>
    </div>
    <script>
        $(document).ready(function () {
            $('.tooltipped').tooltip();
            $('.ajouter_collection').each(function() {
                $(this).on('click', function (event) {
                    event.preventDefault();
                    var id = $(this).attr('data-id');
                    $.ajax({
                        method: "POST",
                        url: "ajax-add-collection",
                        data: {
                            id: id
                        },
                        success: function () {
                            alert(id);
                        }
                    });
                })
             })

            $('#show_game').DataTable({
                columnDefs: [
                    {
                        orderable: false,
                        targets: [0, 6]
                    }
                ],
                "pageLength": 10,
                ordering: true,
                language: {
                    processing: "Traitement en cours...",
                    search: "Rechercher&nbsp;:",
                    lengthMenu: "Afficher _MENU_ &eacute;l&eacute;ments",
                    info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                    infoEmpty: "Affichage de l'&eacute;lement 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                    infoFiltered: "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                    infoPostFix: "",
                    loadingRecords: "Chargement en cours...",
                    zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
                    emptyTable: "Aucune donnée disponible dans le tableau",
                    paginate: {
                        first: "Premier",
                        previous: "Pr&eacute;c&eacute;dent",
                        next: "Suivant",
                        last: "Dernier"
                    },
                    aria: {
                        sortAscending: ": activer pour trier la colonne par ordre croissant",
                        sortDescending: ": activer pour trier la colonne par ordre décroissant"
                    }
                }
            });
        });
    </script>

@endsection