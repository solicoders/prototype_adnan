<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $controllers = ['Competences', 'Modules', 'Stagiaires'];

        foreach ($controllers as $controller) {
            $this->createPermissionsForController($controller);
        }
    }

    private function createPermissionsForController($controller)
    {
        $actions = ['create', 'store', 'show', 'edit', 'update', 'destroy', 'index', 'export', 'import'];
    
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $controller . 'Controller';
            Permission::create(['name' => $permissionName, 'guard_name' => 'web']);
        }
    }
}
