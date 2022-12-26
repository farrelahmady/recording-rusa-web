<?php

namespace Database\Seeders;

use App\Models\User\Pemilik;
use Illuminate\Database\Seeder;
use App\Models\User\SeksiKonservasi;
use App\Models\MasterData\JenisSurat;
use App\Models\Operational\Recording\Kesehatan;
use App\Models\Operational\Recording\Reproduksi;
use App\Models\Operational\Recording\Administrasi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdministrasiSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allKesehatan = Kesehatan::with('rusa')->get();
        $allReproduksi = Reproduksi::with(['anak', "betina", "pejantan"])->where("status", 2)->get();
        $allJenis = JenisSurat::all();
        $pemilik = Pemilik::first()->id;
        $seksiKonservasi = SeksiKonservasi::first()->id;
        $faker = fake("id_ID");
        if ($allKesehatan->count() > 0) {
            foreach ($allKesehatan as $index => $kesehatan) {
                Administrasi::create([
                    "id_seksi_konservasi" => $seksiKonservasi,
                    "nomor_surat" => "BA\\" . now()->format("Y") . "\\0" . $index + 1,
                    "id_jenis_surat" => $allJenis->firstWhere("id", 1)->id,
                    "deskripsi" => $kesehatan->rusa->nama . " menderita penyakit" . $kesehatan->penyakit,
                    "file" => $faker->imageUrl(),
                    "id_pemilik" => $pemilik,
                    "id_rusa" => $kesehatan->id_rusa,
                    "status" => 4
                ]);
            }
        }


        if ($allReproduksi->count() > 0) {
            foreach ($allReproduksi as $index => $reproduksi) {
                Administrasi::create([
                    "id_seksi_konservasi" => $seksiKonservasi,
                    "nomor_surat" => "SK\\" . now()->format("Y") . "\\0" . $index + 1,
                    "id_jenis_surat" => $allJenis->firstWhere("id", 1)->id,
                    "judul" => "Berita Acara Kelahiran " . $reproduksi->anak->nama,
                    "deskripsi" => $reproduksi->anak->nama . " telah lahir pada tanggal " . $reproduksi->tanggal . " dari induk " . $reproduksi->betina->nama . "(betina) dan " . $reproduksi->pejantan->nama . "(jantan).",
                    "file" => $faker->imageUrl(),
                    "id_pemilik" => $pemilik,
                    "id_rusa" => $reproduksi->anak->id,
                    "status" => 4
                ]);
            }
        }
    }
}
