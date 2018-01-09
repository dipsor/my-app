<?php

use Illuminate\Database\Seeder;
use App\Users\Team;
class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Team::class)->create([
            'owner_id' => 1,
            'name' => 'Devs Team',
        ]);

    }
}
