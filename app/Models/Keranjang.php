<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    protected $table = 'keranjang';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jumlah','total_harga','id_product','keterangan'
    ];


    public function product()
{
    return $this->belongsTo(Product::class, 'id_product');
}

public function pesanan()
    {
        return $this->hasMany(Pesanan::class, 'id_pesanan');
    }

} 