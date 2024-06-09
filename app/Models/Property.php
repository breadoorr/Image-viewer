<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 'description', 'published_date', 'price', 'type_id', 'area_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function area()
    {
        return $this->belongsTo(Area::class);
    }

    public function photos()
    {
        return $this->hasMany(PropertyPhoto::class);
    }
}
