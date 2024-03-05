<?php

namespace Database\Seeders;


use App\Models\Module\Module;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        Module::create([
            'Name' => 'backend',
            'Description' => 'Développement d\'un site web mettant en valeur nos compétences.',
            
        ]);

        Module::create([
            'Name' => 'frontend',
            'Description' => 'Création d\'une application web pour l\'évaluation des compétences.',
        ]);

        Module::create([
            'Name' => 'collaboration',
            'Description' => 'Création d\'une application web pour la gestion des patients de centre CNMH.',
        ]);
    }
}
