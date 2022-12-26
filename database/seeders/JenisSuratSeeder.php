<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MasterData\JenisSurat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class JenisSuratSeeder extends Seeder
{
    protected $jenis = [
        "Berita Acara",
        "Surat Kepemilikan"
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->jenis as $jenis) {
            JenisSurat::create([
                "jenis" => $jenis,
            ]);
        }
    }
}
