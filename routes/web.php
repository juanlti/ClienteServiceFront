<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\ClientesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    $response = Http::get('http://127.0.0.1:8000/api/clientes');
    $data = $response->json();
   foreach ($data['data'] as $item) {
        echo $item['cliente']['name'].'  -  ' . $item['cliente']['email'] . "<br>";
}
});
*/

Route::get('/',[ClientesController::class,'index'])->name('clientes.index');
Route::get('/crearCliente',[ClientesController::class,'create'])->name('clientes.create');
Route::post('/crearCliente',[ClientesController::class,'store'])->name('clientes.store');
Route::get('/borrarCliente/{id}',[ClientesController::class,'destroy'])->name('cliente.destroy');
Route::get('/mostrarCliente/{id}',[ClientesController::class,'show'])->name('clientes.mostrarCliente');
Route::put('/actualizarCliente',[ClientesController::class,'update'])->name('cliente.update');
