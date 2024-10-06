<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClientesController extends Controller
{

    public function index()
    {
        // Obtengo la variable de entorno con la URL de la API
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8001/');

        // Obtengo la respuesta de la API
        $response = Http::get($url . '/clientes');
        $data = $response->json();

        // Accedemos a la clave 'data' donde están los clientes
        if (isset($data['data'])) {
            $clientes = collect($data['data'])->filter(function ($item) {
                return isset($item['cliente']);
            })->map(function ($item) {
                return $item['cliente']; // Retornamos solo los datos de 'cliente'
            })->all();
        } else {
            $clientes = []; // Si no existe 'data', devolvemos un array vacío
        }

        return view('clientes', compact('clientes'));
    }



}
