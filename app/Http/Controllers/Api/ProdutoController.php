<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Produto::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
        $request->validate([
            'nome' => 'required|string|max:255',
            'preco' => 'required|numeric|min:0', 
            'quantidade' => 'required|integer|min:0', 
            'fornecedor' => 'required|string|size:3', 
        ], [
            'fornecedor.size' => 'O código do fornecedor deve ter exatamente 3 dígitos.',
            'preco.numeric' => 'O preço deve ser um número válido.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
        ]);
        
       
        $produto = Produto::create($request->all());
        
        
        return response()->json($produto, 201);
    } catch (\Illuminate\Validation\ValidationException $e) {
        return response()->json([
            'message' => 'A validação falhou.',
            'errors' => $e->validator->errors(),
        ], 422);
    } catch (\Exception $e) {
        return response()->json([
            'message' => 'Um erro inesperado ocorreu.',
            'error' => $e->getMessage(),
        ], 500);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Produto::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $request->validate([
                'nome' => 'sometimes|required|string|max:255',
                'preco' => 'sometimes|required|numeric|min:0',
                'quantidade' => 'sometimes|required|integer|min:0',
                'fornecedor' => 'sometimes|required|string|size:3',
            ], [
                'fornecedor.size' => 'O código do fornecedor deve ter exatamente 3 dígitos.',
                'preco.numeric' => 'O preço deve ser um número válido.',
                'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            ]);
    
            $produto->update($request->all());
            return response()->json($produto);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'A validação falhou.',
                'errors' => $e->validator->errors(),
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Um erro inesperado ocorreu.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $produto = Produto::findOrFail($id);
            $produto->delete();
            return response()->json(['message' => "Produto $id excluído com sucesso."], 200); // Altera o código de status para 200
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Produto não encontrado.'], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Um erro inesperado ocorreu.'], 500);
        }
    }




}
