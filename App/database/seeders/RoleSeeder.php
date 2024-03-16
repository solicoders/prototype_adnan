<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'stagiaire', 'guard_name' => 'web']);
        Role::create(['name' => 'formateur', 'guard_name' => 'web']);

       
        
    }
}
