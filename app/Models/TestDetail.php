<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'test_details';

    protected $fillable = [
        'test_id',
        'kode_fakta',
        'is_true'
    ];

    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    public function fakta()
    {
        return $this->belongsTo(Fakta::class, 'kode_fakta', 'kode_fakta');
    }
}
