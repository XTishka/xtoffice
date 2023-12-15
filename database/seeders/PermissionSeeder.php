<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Enums\PermissionGroup;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        $groups  = PermissionGroup::getKeysValues();
        $actions = ['create', 'read', 'update', 'delete'];

        Permission::create(['name' => 'N/A']);

        foreach ($groups as $key => $name) :
            foreach ($actions as $action) :
                Permission::create(['name' => $action . ': ' . $key]);
            endforeach;
        endforeach;
    }
}
