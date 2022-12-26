<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Operational\Rusa;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\ManagementAccess\FotoRusa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FotoRusaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allRusa = Rusa::all();

        foreach ($allRusa as $rusa) {
            $responses = Http::pool(function ($pool) use ($rusa) {
                for ($i = 0; $i < fake()->numberBetween(1, 3); $i++) {
                    $pool->get("https://source.unsplash.com/640x480?deer");
                }
            });

            foreach ($responses as $response) {
                $getImage = $response->body();
                $imageName = Str::random(12) . '.jpg';
                $location = "images/rusa/$imageName";
                Storage::disk('public')->put($location, $getImage);

                $rusa->foto()->create([
                    "foto" => $location,
                ]);
            }
        }
    }
}
