<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class)->create(['name' => 'admin', 'guard_name' => 'web']);
        factory(Role::class)->create(['name' => 'customer', 'guard_name' => 'web']);
    }
}
