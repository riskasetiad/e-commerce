<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_kategori'];
    public $timestamps = true;

    public function Produk()
    {
        return $this->hasMany(produk::class);
    }
}
