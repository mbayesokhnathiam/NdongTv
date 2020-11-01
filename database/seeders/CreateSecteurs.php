<?php

namespace Database\Seeders;

use App\Models\Secteur;
use Illuminate\Database\Seeder;

class CreateSecteurs extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Secteur::create([
            'id' => 1,
            'numero' => 'D',
            'nom_secteur' => 'D',
            'adresse' => '',
            'responsable' => 'Dou'
        ]);


        Secteur::create([
            'id' => 2,
            'numero' => 'L',
            'nom_secteur' => 'L',
            'adresse' => '',
            'responsable' => 'Lamine'
        ]);


        Secteur::create([
            'id' => 3,
            'numero' => 'M',
            'nom_secteur' => 'M',
            'adresse' => '',
            'responsable' => 'Mouhamet'
        ]);

        Secteur::create([
            'id' => 4,
            'numero' => 'Z',
            'nom_secteur' => 'Z',
            'adresse' => '',
            'responsable' => 'Moussa'
        ]);
    }
}
