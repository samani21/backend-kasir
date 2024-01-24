<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Pesanan;
use App\Models\Product;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Http\Request;

class PesananController extends Controller
{

    public function index()
    {
        $pesanan = Keranjang::with('product')->get();
        // dd($kategori);>
        return response()->json($pesanan);
    }

    public function store(HttpRequest $request)
    {
        $pesanan = Pesanan::create([
            'total_bayar'     => $request->input('total_bayar'),
        ]);

        if ($pesanan) {
            return response()->json([
                'success' => true,
                'message' => 'pesanan Berhasil Disimpan!',
                'data' => $pesanan
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'pesanan Gagal Disimpan!',
            ], 400);
        }
    }

    
}
