<?php

use Illuminate\Database\Seeder;
use Mpociot\Teamwork\TeamworkTeam;

class TeamsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Teamwork::class)->create([
            'owner_id' => 1,
            'name' => 'Devs Team',
        ]);

    }
}
