<?php

namespace Database\Seeders;

use App\Models\User\SeksiKonservasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeksiKonservasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake("id_ID");

        SeksiKonservasi::create([
            "email" => "seksikonservasi@gmail.com",
            "password" => bcrypt("seksikonservasi123"),
            "nama_depan_ketua" => $faker->firstName,
            "nama_belakang_ketua" => $faker->lastName,
            'wilayah' => 1,
            "no_telp" => $faker->phoneNumber,
            "alamat" => $faker->address,
        ]);
    }
}
