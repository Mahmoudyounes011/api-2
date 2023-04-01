<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable =  ['name','description','price','end_time'];

    public function live()
    {
        return $this->hasOne(Live::class);
    }

    //you need editing
    public function seller()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function category()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function buyers()
    {
        return $this->belongsToMany(User::class,'actions')
        ->using(Action::class)
        ->withtimestamps()
        ->withpivot('price');
    }
    //you should add it
    public function favorite_products()
    {
        return $this->belongsToMany(User::class, 'favorites')
        ->using(Favorite::class);
    }

}
