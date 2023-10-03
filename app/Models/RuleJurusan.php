<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RuleJurusan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rule_jurusans';

    protected $fillable = [
        'KodeJurusan',
    ];

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'kode_jurusan', 'kode_jurusan');
    }

    public function rule_details()
    {
        return $this->hasMany(RuleDetail::class, 'rule_id');
    }
}
