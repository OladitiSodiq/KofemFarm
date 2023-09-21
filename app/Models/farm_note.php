<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farm_note extends Model
{
    protected $fillable=[
        'farm_id',
        'notes',
    ];

    public function farm2()
    {
        return $this->belongsTo(farm::class,'id');
}
}
