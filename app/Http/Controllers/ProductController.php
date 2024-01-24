<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request as HttpRequest;
use Laravel\Lumen\Http\Request;

class ProductController extends Controller
{

    public function index(HttpRequest $request)
    {
        $kategori = $request->input('nama');
        $katego = Product::with('category')->whereRelation('category','nama','=', ''.$kategori.'')->get();
        // dd($kategori);>
        return response()->json($katego);
    }
    public function store(HttpRequest $request)
    {
        $kategori = Product::create([
            'kode'     => $request->input('kode'),
            'nama'     => $request->input('nama'),
            'harga'     => $request->input('harga'),
            'is_ready'     => $request->input('is_ready'),
            'gambar'     => $request->input('gambar'),
            'id_kategori'     => $request->input('id_kategori'),
        ]);

        if ($kategori) {
            return response()->json([
                'success' => true,
                'message' => 'kategori Berhasil Disimpan!',
                'data' => $kategori
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Post Gagal Disimpan!',
            ], 400);
        }
    
    }

    //
}
