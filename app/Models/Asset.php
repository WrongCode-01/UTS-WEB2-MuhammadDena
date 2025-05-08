<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Asset extends Model
{
    use HasFactory;

        protected $fillable = [
            'category_id',
            'name',
            'description',
            'serial_number',
            'purchase_date',
            'purchase_price',
            'status',
            'location',
        ];

        // Relasi many-to-one: Banyak Aset dimiliki oleh satu Kategori
        public function category()
        {
            return $this->belongsTo(Category::class);
        }
}
