<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SeksiKonservasi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pemilik';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $hidden = ['password'];
    protected $appends = ['ketua'];
    protected $casts = [
        'id' => 'string',
        'no_telp' => 'string',
        'wilayah' => 'string'
    ];

    //* Attribute Accessors & Mutators
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtolower($value),
            set: fn ($value) => strtolower($value),
        );
    }

    protected function namaDepanKetua(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function namaBelakangKetua(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function alamat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    public function getKetuaAttribute(): string
    {
        return "{$this->nama_depan_ketua} {$this->nama_belakang_ketua}";
    }

    //* Relationships
    public function rusa()
    {
        return $this->hasMany(Rusa::class, 'id_pemilik');
    }

    public function penangkaran()
    {
        return $this->hasMany(Penangkaran::class, 'id_pemilik');
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, 'id_pemilik');
    }
}
