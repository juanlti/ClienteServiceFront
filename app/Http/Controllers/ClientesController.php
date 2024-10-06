<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

    public function create()
    {

        return view('cliente');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        // Obtengo la variable de entorno con la URL de la API
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8001/');
        // Envío la petición POST a la API
        $response = Http::post($url . '/clientes', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect()->route('clientes.index');


    }

    public function destroy($id)
    {
        //dd($id);
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8001/');
        // Obtengo la variable de entorno con la URL de la API
        $response = Http::delete($url . '/clientes/' . $id);
        return redirect()->route('clientes.index');

    }


    public function show($id)
    {
        //obtenemos el cliente
        $url = env('URL_SERVER_API', 'http://127.0.0.1:8001/');
        $response = Http::get($url . '/clientes/' . $id);
        $clienteJson = $response->json();

        return view('edith', ['cliente' => $clienteJson['cliente']]);

    }

    public function update(Request $request)
    {
        //dd($request->all());
        $idRequest = $request->id;
        //dd($idRequest);
        $clienteOld = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address
        ];

        $url = env('URL_SERVER_API', 'http://127.0.0.1:8001/');
        $response = Http::put($url . '/clientes/' . $idRequest, $clienteOld);
        //categorizacion del put para el backend
        //Http::put($url . '/clientes/' . $id(Request), $clienteOld(parametro));
        if ($response->successful()) {
            return redirect()->route('clientes.index');
        } else {
            // Handle error
            return redirect()->back()->withErrors(['msg' => 'Error updating client']);
        }
    }
}



