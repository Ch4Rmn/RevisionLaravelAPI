<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'completed', 'product_id'
    ];
    public function product()
    {
        // return $this->belongsTo(Product::class);

        return $this->belongsTo(Product::class, 'product_id');


        // return $this->belongsTo(Post::class, 'product', 'product_id');
    }
}
