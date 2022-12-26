<?php

namespace Database\Seeders;

use App\Models\Operational\Recording\Reproduksi;
use App\Models\Operational\Rusa;
use App\Models\User\Pengurus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReproduksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allRusa = Rusa::whereNotNull("induk_jantan")->whereNotNull("induk_betina")->get();

        if ($allRusa->count() == 0) {
            return;
        }

        foreach ($allRusa as $rusa) {
            Reproduksi::create([
                "id_jantan" => $rusa->induk_jantan,
                "id_betina" => $rusa->induk_betina,
                "id_anak" => $rusa->id,
                "status" => 2,
                "tanggal" => $rusa->tanggal_lahir,
                "id_pengurus" => Pengurus::first()->id,
            ]);
        }
    }
}
