<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'cover', 'username', 'telpon', 'jenis_kelamin', 'tempat_lahir', 'tgl_lahir', 'agama', 'alamat', 'id_hobi'];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function hobi()
    {
        return $this->belongsToMany(Hobi::class, 'hobi_profile', 'id_profile', 'id_hobi');
    }

    //hapus img
    public function deleteImage()
    {
        if ($this->cover && file_exists(public_path('images/cover/' . $this->cover))) {
            return unlink(public_path('images/cover/' . $this->cover));
        }
    }
}
