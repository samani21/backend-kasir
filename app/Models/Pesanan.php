<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'total_bayar','id_keranjang'
    ];


    public function keranjang_pesanan()
{
    return $this->belongsTo(Keranjang::class, 'id_keranjang');
}
} 