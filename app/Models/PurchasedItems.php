<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchasedItems extends Model
{
    use HasFactory;

    public $table = "purchased_items";
    protected $fillable = [
        'user_id', 'product_id', 'shipped', 'received', 'updated_at'
      ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
