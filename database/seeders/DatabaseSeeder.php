<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\RusaSeeder;
use Database\Seeders\PemilikSeeder;
use Database\Seeders\PengurusSeeder;
use Database\Seeders\PenangkaranSeeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (Storage::allDirectories('public') as $dir) {
            Storage::deleteDirectory($dir);
        }

        $this->call([
            RoleSeeder::class,

            PemilikSeeder::class,
            PenangkaranSeeder::class,

            PengurusSeeder::class,

            RusaSeeder::class,
            FotoRusaSeeder::class,
        ]);
    }
}
