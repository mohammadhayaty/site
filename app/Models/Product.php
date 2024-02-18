<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title',
        'body',
        'price',
        'image',
    ];

    public function getImageShowAttribute()
    {
        return url()->asset("storage/" . $this->image);
    }
    public function getHrefUrlAttribute()
    {
        return route("product.show" , ['product' => $this->id]);
    }
    public function getPriceShowAttribute()
    {
        return number_format($this->price);
    }
    public function getLeadAttribute()
    {
        return \Illuminate\Support\Str::limit(strip_tags($this->body), 150, ' ...');
    }
}
