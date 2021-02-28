<?php

use App\Models\Plan;
use App\Models\Tenant;
use Illuminate\Database\Seeder;

class TenantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::first();

        $plan->tenants()->create([
            'cpf'   => '12345678911',
            'name'  => 'Fabinho Flauzino',
            'url'   => 'fabinhoflauzino',
            'email' => 'fabioflauzino@fabioflauzino.com',
        ]);
    }
}
