<?php

namespace App\Models\User;

use App\Models\Operational\Rusa;
use App\Models\Operational\Penangkaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Operational\Recording\Administrasi;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Pemilik extends Authenticatable
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $table = 'pemilik';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $hidden = ['password'];
    protected $appends = ['nama'];
    protected $casts = [
        'id' => 'string',
        'no_telp' => 'string',
    ];

    //* Attribute Accessors & Mutators
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtolower($value),
            set: fn ($value) => strtolower($value),
        );
    }

    protected function namaDepan(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function namaBelakang(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function noTelp(): Attribute
    {
        return Attribute::make(
            set: function ($value) {
                $value = $value[0] == "0" ? substr_replace($value, "+62", 0, 1) : $value;
                return str_replace(array('(', ')', ' '), '', $value);
            },
        );
    }

    protected function alamat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    public function getNamaAttribute(): string
    {
        return "{$this->nama_depan} {$this->nama_belakang}";
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
