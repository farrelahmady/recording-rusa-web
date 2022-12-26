<?php

namespace App\Models\Operational;

use App\Models\User\Pengurus;
use App\Models\Operational\Rusa;
use Illuminate\Database\Eloquent\Model;
use App\Models\User\Pemilik;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penangkaran extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'penangkaran';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
        'id_pemilik' => 'string',
    ];

    //* Attribute Accessors & Mutators
    protected function nama(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function alamat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    //* Relationships
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik');
    }

    public function rusa()
    {
        return $this->hasMany(Rusa::class, 'id_penangkaran');
    }

    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'id_penangkaran');
    }
}
