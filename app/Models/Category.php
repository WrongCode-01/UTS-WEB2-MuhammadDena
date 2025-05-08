<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

        protected $fillable = [
            'name',
            'description',
        ];

        // Relasi one-to-many: Satu Kategori memiliki banyak Aset
        public function assets()
        {
            return $this->hasMany(Asset::class);
        }
}
