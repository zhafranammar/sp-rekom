<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tests';

    protected $fillable = [
        'nama',
        'nis',
        'usia',
        'jenis_kelamin',
        'hasil'
    ];

    public function details()
    {
        return $this->hasMany(TestDetail::class);
    }
}
