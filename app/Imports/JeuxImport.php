<?php

namespace App\Imports;

use App\Jeux;
use Maatwebsite\Excel\Concerns\ToModel;

class JeuxImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jeux([
            'nom' => $row['nom'],
            'editeur_id' => $row['editeur_id'],
            'genre_id' => $row['genre_id'],
            'annee' => $row['annee'],
            'nbre_joueur_min' =>$row['nbre_joueur_min'],
            'duree_min' => $row['duree_min'],
            'duree_max' => $row['duree_max'],
            'nbre_joueur_max' => $row['nbre_joueur_max'],
            'age' => $row['age'],
            'date_maj' => $row['date_maj'],
            'created_at' => $row['created_at'],
            'descriptif' => $row['descriptif'],
        ]);
    }
}
