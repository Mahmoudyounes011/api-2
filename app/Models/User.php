<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory,HasApiTokens;

    protected $fillable =  ['first_name','last_name','image','email','password'];

    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }

    // public function bids()
    // {
    //     return $this->belongsToMany(Product::class,'actions')
    //     ->using(Action::class)
    //     ->withtimestamps()
    //     ->withpivot('price');
    // }

    public function favorite_products()
    {
        return $this->belongsToMany(Product::class, 'favorites')
        ->using(Favorite::class);
    }

    public function actions()
    {
        return $this->belongsToMany(Product::class,'actions')
        ->using(Action::class)
        ->withtimestamps()
        ->withpivot('price');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
