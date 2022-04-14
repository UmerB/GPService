<?php

namespace Database\Seeders;

use App\Models\RequestPrescription;
use Illuminate\Database\Seeder;


class RequestPrescriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        RequestPrescription::factory(10)->create();

    }
}
