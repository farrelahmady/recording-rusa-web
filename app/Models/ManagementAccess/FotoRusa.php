<?php

namespace App\Models\ManagementAccess;

use App\Models\Operational\Rusa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FotoRusa extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'foto_rusa';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
        'id_rusa' => 'string',
    ];

    //* Attribute Accessors & Mutators
    protected function foto(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  asset("storage/$value"),
            set: fn ($value) =>  str_replace(asset('storage') . "/", "", $value),
        );
    }

    //* Relationships
    public function rusa()
    {
        return $this->belongsTo(Rusa::class, 'id_rusa');
    }
}
