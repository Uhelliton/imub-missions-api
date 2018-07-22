<?php

use Illuminate\Database\Seeder;
use Cartalyst\Sentinel\Roles\EloquentRole as Roles;
class RolesUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acl_roles')->delete();

        Roles::create([
            'slug' => 'admin',
            'name' => 'Admin',
        ]);
        Roles::create([
            'slug' => 'guest',
            'name' => 'Guest',
        ]);
        Roles::create([
            'slug' => 'recepcao',
            'name' => 'Recepção',
        ]);
        Roles::create([
            'slug' => 'lazer',
            'name' => 'Lazer',
        ]);
    }
}
