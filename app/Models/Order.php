<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Relations\OrderRelations;

class Order extends Model
{
    use OrderRelations;

    protected $fillable =[
        "price" ,
        "address" ,
        "status" ,
        "t_id" ,
        "ref_id" ,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
