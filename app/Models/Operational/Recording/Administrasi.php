<?php

namespace App\Models\Operational\Recording;

use App\Models\MasterData\JenisSurat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Administrasi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'administrasi';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $appends = ['jenis'];
    protected $casts = [
        'id' => 'string',
    ];

    //* Attribute Accessors & Mutators
    protected function nomorSurat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  strtoupper($value),
            set: fn ($value) =>  strtoupper($value),
        );
    }

    protected function judul(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  ucwords($value),
            set: fn ($value) =>  ucwords($value),
        );
    }

    protected function deskripsi(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  ucwords($value),
            set: fn ($value) =>  ucwords($value),
        );
    }

    protected function file(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  asset("storage/$value"),
            set: fn ($value) =>  str_replace(asset('storage') . "/", "", $value),
        );
    }

    protected function status(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 1:
                        return 'DIAJUKAN';
                        break;
                    case 2:
                        return 'DITERIMA';
                        break;
                    case 3:
                        return 'DIPROSES';
                        break;
                    case 4:
                        return 'SELESAI';
                        break;
                    default:
                        return 'DITOLAK';
                        break;
                }
            },
            set: fn ($value) =>  (int)$value,
        );
    }

    public function getJenisAttribute(): string
    {
        return $this->jenisSurat->jenis;
    }

    //* Relationships
    public function seksiKonservasi()
    {
        return $this->belongsTo(SeksiKonservasi::class, 'id_seksi_konservasi');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'id_jenis_surat');
    }
}
