<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolePengurusPermission extends Model
{
    use HasFactory;

    protected $table = 'rolepengurus_permission';

    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $casts = [
        'id' => 'int',
    ];

    //* Relationships
    public function rolePengurus()
    {
        return $this->belongsTo(RolePengurus::class, 'id_role_pengurus');
    }

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'id_permission');
    }
}
