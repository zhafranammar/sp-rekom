<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuleDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rule_details';

    protected $fillable = [
        'rule_id',
        'kode_fakta',
        'kode_jurusan'
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }

    public function fakta()
    {
        return $this->belongsTo(Fakta::class, 'kode_fakta', 'kode_fakta');
    }
}
