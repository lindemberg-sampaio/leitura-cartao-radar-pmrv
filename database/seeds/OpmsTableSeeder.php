<?php

use Illuminate\Database\Seeder;

class OpmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Opm::class, 60)->create();
    }
}
