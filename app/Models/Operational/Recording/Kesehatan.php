<?php

namespace App\Models\Operational\Recording;

use App\Models\User\Pengurus;
use App\Models\Operational\Rusa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kesehatan extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'kesehatan';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
        'id_rusa' => 'string',
        'id_pengurus' => 'string',
    ];

    //* Attribute Accessors & Mutators
    protected function penyakit(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  strtoupper($value),
            set: fn ($value) =>  strtoupper($value),
        );
    }

    protected function jenisPenyakit(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  strtoupper($value),
            set: fn ($value) =>  strtoupper($value),
        );
    }

    protected function obat(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  strtoupper($value),
            set: fn ($value) =>  strtoupper($value),
        );
    }

    protected function penanganan(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  ucwords($value),
            set: fn ($value) =>  ucwords($value),
        );
    }

    //* Relationships
    public function rusa()
    {
        return $this->belongsTo(Rusa::class, 'id_rusa');
    }

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'id_pengurus');
    }
}
