<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Kategori;
use Dotenv\Validator;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return response()->json($kategori);
    }
    public function store(Request $request)
    {
        $kategori = Kategori::create([
            'nama'     => $request->input('nama'),
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
                'message' => 'kategori Gagal Disimpan!',
            ], 400);
        }
    
    }
} 