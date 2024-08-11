<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
protected $fillable=[
    'name',
    'description',
    'size',
    'location',
    'created_on',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($farm) {
            $farm->farm_no = self::generateFarmNo();
        });
    }

    private static function generateFarmNo()
    {
        do {
            $farm_no = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT);
        } while (self::where('farm_no', $farm_no)->exists());

        return $farm_no;
    }

    public function children()
    {
        return $this->hasMany(farmLease::class,'farm_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'staff_id');
    }
}
