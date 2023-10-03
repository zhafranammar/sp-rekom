<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jurusans';

    protected $primaryKey = 'KodeJurusan';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'KodeJurusan',
        'NamaJurusan',
    ];

    public function rule_jurusan()
    {
        return $this->hasMany(RuleJurusan::class, 'kode_jurusan', 'kode_jurusan');
    }
}
