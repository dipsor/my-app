<?php

use Illuminate\Database\Seeder;
use App\Users\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = factory(User::class)->create([
            'name' => 'Miroslav  Masek',
            'email' => 'miroslav@digitonic.co.uk',
            'password' => 'password123'
        ]);

        $user->attachTeam(1);
        $user->assignRole('admin');
    }
}
