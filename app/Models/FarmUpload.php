<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FarmUpload extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity_id',
        'type',
        'farm_id',
        'description',
        'file_path',
    ];
}
