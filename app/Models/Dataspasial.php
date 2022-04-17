<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dataspasial extends Model
{
    use HasFactory;

    protected $table = 'dataspasial';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $fillable = [
        'label',
        'kab',
        'provinsi',
        'latitude',
        'longitude'

    ];

}
