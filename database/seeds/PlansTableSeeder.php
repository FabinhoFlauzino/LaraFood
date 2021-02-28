<?php

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name'        => 'Businners',
            'url'         => 'businners',
            'price'       => 299.09,
            'description' => 'Plano Empresarial'
        ]);
    }
}
