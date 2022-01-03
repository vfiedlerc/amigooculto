<?php

use Illuminate\Database\Seeder;

class SorteiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Sorteio::class, 3)->create();
    }
}
