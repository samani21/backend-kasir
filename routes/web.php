<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\KategoriControlle;
use App\Http\Controllers\KategoriController;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/kategori', 'KategoriController@index');
$router->post('/kategori/store', 'KategoriController@store');

$router->get('/product', 'ProductController@index');
$router->post('/product/store', 'ProductController@store');

$router->get('/keranjang', 'KeranjangController@index');
$router->post('/keranjang/store', 'KeranjangController@store');
$router->put('/keranjang/update/{id}', 'KeranjangController@updatestore');
$router->get('/keranjang/update', 'KeranjangController@update');
$router->put('/keranjang/update_detail/{id}', 'KeranjangController@updatedetail');
$router->delete('/keranjang/delete/{id}', 'KeranjangController@delete');

$router->post('/pesanan/store', 'PesananController@store');
