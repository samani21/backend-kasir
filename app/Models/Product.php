<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode','nama','harga','is_ready','gambar','id_kategori'
    ];

//     public function kategori()
// {
//     return $this->hasMany(Kategori::class);
// }
public function category()
{
    return $this->belongsTo(Kategori::class, 'id_kategori');
}
public function keranjang()
    {
        return $this->hasMany(Keranjang::class, 'id_product');
    }
} 