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
        'RuleID',
        'KodeFakta',
    ];

    public function rule_jurusan()
    {
        return $this->belongsTo(RuleJurusan::class, 'rule_id');
    }

    public function fakta()
    {
        return $this->belongsTo(Fakta::class, 'kode_fakta', 'kode_fakta');
    }
}
