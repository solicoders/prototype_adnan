<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;




class UserSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
  
        $leaderPermissions = Permission::pluck('name')->toArray();

       $formateur =  User::create([
            'name' => 'formateur1234',
            'email' => 'formateur@solicode.com',
            'password' => Hash::make('formateur1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        $formateur->assignRole('formateur');
        $formateur->givePermissionTo($leaderPermissions);


        

        $user = User::create([
                'name' => 'stagiaire',
                'email' => 'stagiaire1234@solicode.com',
                'password' => Hash::make('stagiaire1234'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
        ])->assignRole('stagiaire');

        $user->givePermissionTo('index-CompetencesController', 'index-ModulesController', 'show-ModulesController', 'show-CompetencesController');
    }
}
