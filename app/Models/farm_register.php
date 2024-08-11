<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class farm_register extends Model
{
    // protected $fillable=[
        
    //     'farm_id',
    //     'farm_crop_id',
    //     'category_id',
    //     'total_cost',
    //     'description',
    //     'date_created',
    // ];

    protected $guarded = [];


    public function categoryparent()
    {
        return $this->belongsTo(category::class,'id');

}

    public function farmcrop()
    {
        return $this->belongsTo(farm_crop::class,'id');
}
}
