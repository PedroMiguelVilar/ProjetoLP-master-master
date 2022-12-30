<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded =[];
    protected $fillable = [
        'user_id', 'name', 'description', 'category', 'quantity', 'price', 'hide', 'received'
      ];
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function user()
    {
      return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
