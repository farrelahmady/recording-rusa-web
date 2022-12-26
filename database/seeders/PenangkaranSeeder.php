<?php

namespace Database\Seeders;

use App\Models\User\Pemilik;
use Illuminate\Database\Seeder;
use App\Models\Operational\Penangkaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PenangkaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake("id_ID");

        Penangkaran::create([
            "nama" => $faker->company,
            "alamat" => $faker->address,
            "id_pemilik" => Pemilik::first()->id,
        ]);
    }
}
