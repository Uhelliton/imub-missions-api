<?php

use Illuminate\Database\Seeder;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('acl_users')->delete();

        $credentials = [
            'email'    => 'yago@resortlatorre.com.br',
            'password' => 'yago',
        ];
        $user = \Sentinel::registerAndActivate($credentials);
        $role = \Sentinel::findRoleBySlug('admin');
        $role->users()->attach($user);
    }
}
