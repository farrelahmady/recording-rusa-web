<?php

namespace Database\Seeders;

use App\Models\User\Pemilik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PemilikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake("id_ID");

        Pemilik::create([
            "email" => "pemilik@gmail.com",
            "password" => bcrypt("pemilik123"),
            "nama_depan" => $faker->firstName,
            "nama_belakang" => $faker->lastName,
            "no_telp" => $faker->phoneNumber,
            "alamat" => $faker->address,
        ]);
    }
}
