<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria; // 1. Importamos o Model 'Categoria'

// 2. O nome da classe muda para 'CategoriaController'
class CategoriaController extends Controller
{
    /**
     * Método INDEX: busca dados e os envia para a view.
     */
    public function index()
    {
        // 3. Buscamos todas as 'Categorias'
        $categorias = Categoria::all(); 
        
        // 4. Retornamos a view 'categorias' e enviamos a variável '$categorias'
        return view('categorias', ['categorias' => $categorias]);
    }

    /**
     * Método STORE: responsável por salvar os dados do formulário.
     */
    public function store(Request $request)
    {
        // 5. A validação para 'nome' é a mesma
        $request->validate([
            'nome' => 'required'
        ]);

        // 6. Usamos o Model 'Categoria' para criar o registro
        Categoria::create($request->all());

        // 7. Redirecionamos para '/categorias' e mudamos a mensagem de sucesso
        return redirect('/categorias')->with('success', 'Categoria salva com sucesso!');
    }
}
