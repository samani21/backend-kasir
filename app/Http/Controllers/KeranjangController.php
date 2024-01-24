<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\DB;
use Laravel\Lumen\Http\Request;

class KeranjangController extends Controller
{

    public function index(HttpRequest $request)
    {
        $id = $request->input('id');
        $keranjang = Keranjang::with('product')->get();
        // dd($kategori);>
        return response()->json($keranjang);
    }


    public function update(HttpRequest $request)
    {
        $id = $request->input('id');
        $keranjang = Keranjang::with('product')->whereRelation('product', 'id', '=', $id)->get();
        // dd($kategori);>
        return response()->json($keranjang);
    }

    public function store(HttpRequest $request)
    {
        $keranjang = Keranjang::create([
            'jumlah'     => $request->input('jumlah'),
            'total_harga'     => $request->input('total_harga'),
            'id_product'     => $request->input('id_product'),
            'keterangan'     => '-',
        ]);

        if ($keranjang) {
            return response()->json([
                'success' => true,
                'message' => 'keranjang Berhasil Disimpan!',
                'data' => $keranjang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'keranjang Gagal Disimpan!',
            ], 400);
        }
    }

    public function updatestore(HttpRequest $request, $id)
    {
        $keranjang = DB::table('keranjang')->where('id_product', $id)->update([
            'jumlah'     => $request->input('jumlah'),
            'total_harga'     => $request->input('total_harga'),
            // 'keterangan'     => '-',
        ]);

        if ($keranjang) {
            return response()->json([
                'success' => true,
                'message' => 'keranjang Berhasil Diupdate!',
                'data' => $keranjang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'keranjang Gagal Diupdate!',
            ], 400);
        }
    }

    public function updatedetail(HttpRequest $request, $id)
    {
        $keranjang = Keranjang::whereId($id)->update([
            'jumlah'     => $request->input('jumlah'),
            'total_harga'     => $request->input('total_harga'),
            'keterangan'     => $request->input('keterangan'),
        ]);

        if ($keranjang) {
            return response()->json([
                'success' => true,
                'message' => 'keranjang Berhasil Diupdate!',
                'data' => $keranjang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'keranjang Gagal Diupdate!',
            ], 400);
        }
    }

    public function Delete(HttpRequest $request, $id)
    {
        $keranjang = Keranjang::whereId($id)->first();
		
$keranjang->delete();
        if ($keranjang) {
            return response()->json([
                'success' => true,
                'message' => 'keranjang Berhasil Diupdate!',
                'data' => $keranjang
            ], 201);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'keranjang Gagal Diupdate!',
            ], 400);
        }
    }
}
