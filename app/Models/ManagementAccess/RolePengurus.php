<?php

namespace App\Models\ManagementAccess;

use App\Models\User\Pengurus;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\Permission;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ManagementAccess\RolePengurusPermission;

class RolePengurus extends Model
{
    use HasFactory;

    protected $table = 'role_pengurus';
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
    public function pengurus()
    {
        return $this->hasMany(Pengurus::class, 'id_role');
    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'rolepengurus_permission', 'id_role_pengurus', 'id_permission');
    }

    public function rolePengurusPermission()
    {
        return $this->hasMany(RolePengurusPermission::class, 'id_role_pengurus');
    }
}
