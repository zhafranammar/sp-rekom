<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jurusan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'jurusans';

    protected $primaryKey = 'kode_jurusan';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_jurusan',
        'nama_jurusan',
    ];

    public function ruleDetails()
    {
        return $this->hasMany(RuleDetail::class, 'kode_jurusan', 'kode_jurusan');
    }
}
