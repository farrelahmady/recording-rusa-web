<?php

namespace Database\Seeders;

use App\Models\ManagementAccess\RolePengurus;
use App\Models\Operational\Penangkaran;
use App\Models\User\Pengurus;
use Illuminate\Database\Seeder;

class PengurusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake("id_ID");
        Pengurus::create([
            "id_penangkaran" => Penangkaran::first()->id,
            "email" => "pengurus@gmail.com",
            "password" => bcrypt("pengurus123"),
            "nama_depan" => $faker->firstName,
            "nama_belakang" => $faker->lastName,
            "no_telp" => $faker->phoneNumber,
            "alamat" => $faker->address,
            "id_role" => RolePengurus::first()->id,
        ]);
    }
}
