<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\RolePengurus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ManagementAccess\RolePengurusPermission;

class Permission extends Model
{
    use HasFactory;

    protected $table = 'permission';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $casts = [
        'id' => 'int',
    ];

    //* Attribute Accessors & Mutators
    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    //* Relationships
    public function rolePengurus()
    {
        return $this->belongsToMany(RolePengurus::class, 'rolepengurus_permission', 'id_permission', 'id_role_pengurus');
    }

    public function rolePengurusPermission()
    {
        return $this->hasMany(RolePengurusPermission::class, 'id_permission');
    }
}
