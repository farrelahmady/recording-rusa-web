<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\Operational\Rusa;
use Illuminate\Support\Facades\Http;
use App\Models\Operational\Penangkaran;
use Illuminate\Support\Facades\Storage;
use App\Models\Operational\Recording\Reproduksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RusaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = fake("id_ID");
        $penangkaran = Penangkaran::with("pemilik")->first();
        $inisial = $penangkaran->pemilik->nama_depan[0] . $penangkaran->pemilik->nama_belakang[0];

        for ($i = 1; $i < 7; $i++) {
            $data = [
                "no_satwa" => "$inisial-$i",
                "id_tag" => Str::random(5),
                "id_penangkaran" => $penangkaran->id,
                "nama" => "Rusa $i",
                "jenis_kelamin" => $faker->numberBetween(1, 2),
                "tanggal_lahir" => $faker->date("Y-m-d", now()->subYears(2)),
            ];

            $data["kode_satwa"] = "$inisial-0" . $data['jenis_kelamin'] . "-$i";

            $jantan = Rusa::where("jenis_kelamin", 1)->where("status_gen", 0)->get();
            $betina = Rusa::where("jenis_kelamin", 2)->where("status_gen", 0)->get();

            if ($jantan->count() > 0 && $betina->count() > 0) {
                $indukJantan = $jantan->random();
                $indukBetina = $betina->random();
                $data["induk_jantan"] = $indukJantan->id;
                $data["induk_betina"] = $indukBetina->id;

                $data["tanggal_lahir"] =  Carbon::parse($indukJantan->tanggal_lahir)->isBefore(Carbon::parse($indukBetina->tanggal_lahir))
                    ? $data["tanggal_lahir"] = Carbon::parse($indukBetina->tanggal_lahir)->addYears($faker->randomNumber(1))->format("Y-m-d")
                    : $data["tanggal_lahir"] = Carbon::parse($indukJantan->tanggal_lahir)->addYears($faker->randomNumber(1))->format("Y-m-d");

                $data["status_gen"] = 1;
            }

            Rusa::create($data);
        }
    }
}
