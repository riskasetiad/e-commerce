<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'cover', 'nama_produk', 'id_kategori', 'stok', 'harga', 'deskripsi'];
    public $timestamps = true;

     public function Kategori()
    {
        return $this->BelongsTo(kategori::class, 'id_kategori');
    }

    //hapus img
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/produk/' . $this->cover))) {
            return unlink(public_path('images/produk/' . $this->cover));
        }
    }
}
