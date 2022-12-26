<?php

namespace App\Models\MasterData;

use App\Models\Operational\Recording\Administrasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $casts = [
        'id' => 'int',
    ];

    //* Attribute Accessors & Mutators
    protected function jenis(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  strtoupper($value),
            set: fn ($value) =>  strtoupper($value),
        );
    }

    //* Relationships
    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, 'id_jenis_surat');
    }
}
