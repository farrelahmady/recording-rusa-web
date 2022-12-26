<?php

namespace App\Models\Operational\Recording;

use App\Models\User\Pengurus;
use App\Models\Operational\Rusa;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reproduksi extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'reproduksi';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $casts = [
        'id' => 'string',
        'id_jantan' => 'string',
        'id_betina' => 'string',
        'id_anak' => 'string',
        'id_pengurus' => 'string',
        'tanggal' => 'datetime:Y-m-d'
    ];

    //* Attribute Accessors & Mutators
    protected function status(): Attribute
    {
        return Attribute::make(
            get: function ($value) {
                switch ($value) {
                    case 1:
                        return 'MENGANDUNG';
                        break;
                    case 2:
                        return 'MELAHIRKAN';
                        break;
                    default:
                        return 'GAGAL';
                        break;
                }
            },
            set: fn ($value) => (int) $value,
        );
    }

    protected function tanggal(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
            set: fn ($value) => Carbon::parse($value)->format('Y-m-d'),
        );
    }

    //* Relationships
    public function pejantan()
    {
        return $this->belongsTo(Rusa::class, 'id_jantan');
    }

    public function betina()
    {
        return $this->belongsTo(Rusa::class, 'id_betina');
    }

    public function anak()
    {
        return $this->belongsTo(Rusa::class, 'id_anak');
    }

    public function pengurus()
    {
        return $this->belongsTo(Pengurus::class, 'id_pengurus');
    }
}
