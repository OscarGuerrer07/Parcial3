<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FakeStoreController extends Controller
{
    protected $apiUrl;

    public function __construct()
    {
        $this->apiUrl = env('FAKESTORE_API_URL');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $client = new Client();
        $response = $client->get("{$this->apiUrl}/products");
        $products = json_decode($response->getBody(), true);

        return response()->json([
            'message' => 'productos consultados exitosamente.',
            'data' => $products,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $client = new Client();
        $response = $client->post("{$this->apiUrl}/products", [
            'json' => $request->all(),
        ]);
        $product = json_decode($response->getBody(), true);

        return response()->json([
            'message' => 'producto creado exitosamente.',
            'data' => $product,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $client = new Client();
        $response = $client->get("{$this->apiUrl}/products/{$id}");
        $product = json_decode($response->getBody(), true);

        return response()->json([
            'message' => 'producto consultado exitosamente.',
            'data' => $product,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = new Client();
        $response = $client->put("{$this->apiUrl}/products/{$id}", [
            'json' => $request->all(),
        ]);
        $product = json_decode($response->getBody(), true);

        return response()->json([
            'message' => 'producto actualizado exitosamente',
            'data' => $product,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $client = new Client();
        $response = $client->delete("{$this->apiUrl}/products/{$id}");
        $product = json_decode($response->getBody(), true);

        return response()->json([
            'message' => 'Producto eliminado exitosamente.',
            'data' => $product,
        ], 200);
    }
}



