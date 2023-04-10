<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function seller()
    {
        return $this->belongsTo(Product::class);
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

    public function end()
    {
        return Carbon::now()->gt($this->end_time);
    }

    public function visible($quary)
    {
        return $quary->where('end_time',false);

    }
}
