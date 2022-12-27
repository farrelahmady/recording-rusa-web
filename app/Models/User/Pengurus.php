<?php

namespace App\Models\User;

use App\Models\Operational\Penangkaran;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\RolePengurus;
use App\Models\Operational\Recording\Kesehatan;
use App\Models\Operational\Recording\Reproduksi;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Pengurus extends Authenticatable
{
    use HasFactory, HasUuids, HasApiTokens;

    protected $table = 'pengurus';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $hidden = ['password'];
    protected $appends = ['nama'];
    protected $casts = [
        'id' => 'string',
        'no_telp' => 'string',
        'id_role' => 'integer',
        'id_penangkaran' => 'string',
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
            get: fn ($value) => ucwords($value),
            set: fn ($value) => ucwords($value),
        );
    }

    public function getNamaAttribute(): string
    {
        return "{$this->nama_depan} {$this->nama_belakang}";
    }

    //* Relationships
    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class, 'id_pengurus');
    }

    public function reproduksi()
    {
        return $this->hasMany(Reproduksi::class, 'id_pengurus');
    }

    public function penangkaran()
    {
        return $this->belongsTo(Penangkaran::class, 'id_penangkaran');
    }

    public function role()
    {
        return $this->belongsTo(RolePengurus::class, 'id_role');
    }
}
