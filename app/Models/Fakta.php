<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fakta extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'faktas';

    protected $primaryKey = 'kode_fakta';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'kode_fakta',
        'deskripsi',
    ];
}
