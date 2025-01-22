<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = ['product_id', 'val', 'user_id', 'purchase_at'];

    public $timestamps = true;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
