<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\Pemilik;
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
