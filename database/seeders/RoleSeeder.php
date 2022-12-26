<?php

namespace Database\Seeders;

use App\Models\ManagementAccess\RolePengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RolePengurus::create([
            "title" => "Anak Kandang",
        ]);
    }
}
