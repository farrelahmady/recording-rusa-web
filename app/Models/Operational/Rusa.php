<?php

namespace App\Models\Operational;

use App\Models\User\Pemilik;
use App\Models\Operational\Penangkaran;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManagementAccess\FotoRusa;
use App\Models\Operational\Recording\Kesehatan;
use App\Models\Operational\Recording\Reproduksi;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Models\Operational\Recording\Administrasi;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rusa extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'rusa';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $with = [
        'foto',
    ];
    protected $casts = [
        'id' => 'string',
        'no_satwa' => 'string',
        'kode_satwa' => 'string',
        'id_tag' => 'string',
        'id_pemilik' => 'string',
        'id_penangkaran' => 'string',
        'induk_jantan' => 'string',
        'induk_betina' => 'string',
        'tanggal_lahir' => 'datetime:Y-m-d',
    ];

    //* Attribute Accessors & Mutators
    protected function noSatwa(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function kodeSatwa(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function idTag(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function nama(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => strtoupper($value),
            set: fn ($value) => strtoupper($value),
        );
    }

    protected function jenisKelamin(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value === 1 ? 'JANTAN' : 'BETINA',
            set: fn ($value) => (int)$value,
        );
    }

    protected function statusGen(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => "F{$value}",
            set: fn ($value) => (int)$value,
        );
    }

    protected function ciriKhusus(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => ucfirst($value),
        );
    }

    public function getRecordingAttribute()
    {
        return [
            "kesehatan" => Kesehatan::where('id_rusa', $this->id)->get(),
            "administrasi" => Administrasi::where('id_rusa', $this->id)->get(),
            "reproduksi" => Reproduksi::where('id_jantan', $this->id)->orWhere('id_betina', $this->id)->orWhere('id_anak', $this->id)->get(),
        ];
    }

    //* Relationships
    public function pemilik()
    {
        return $this->belongsTo(Pemilik::class, 'id_pemilik');
    }

    public function penangkaran()
    {
        return $this->belongsTo(Penangkaran::class, 'id_penangkaran');
    }

    public function indukJantan()
    {
        return $this->belongsTo($this, 'induk_jantan');
    }

    public function indukBetina()
    {
        return $this->belongsTo($this, 'induk_betina');
    }

    public function foto()
    {
        return $this->hasMany(FotoRusa::class, 'id_rusa');
    }

    public function administrasi()
    {
        return $this->hasMany(Administrasi::class, 'id_rusa');
    }


    public function reproduksiIndukJantan()
    {
        return $this->hasMany(Reproduksi::class, 'id_jantan');
    }

    public function reproduksiIndukBetina()
    {
        return $this->hasMany(Reproduksi::class, 'id_betina');
    }

    public function reproduksiAnak()
    {
        return $this->hasMany(Reproduksi::class, 'id_anak');
    }

    public function kesehatan()
    {
        return $this->hasMany(Kesehatan::class, 'id_rusa');
    }
}
