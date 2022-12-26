<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemilik extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'pemilik';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $hidden = ['password'];
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

    protected function alamat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
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
