<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto; // Importe o Model

class ProdutoController extends Controller
{
    // Método INDEX: agora busca dados e os envia para a view [cite: 14, 16]
    public function index()
    {
        $produtos = Produto::all(); // Busca todos os produtos
        return view('produtos', ['produtos' => $produtos]); // Envia a variável $produtos para a view
    }

    // Método STORE: responsável por salvar os dados do formulário [cite: 16, 30]
    public function store(Request $request)
    {
        // Validação básica (exigindo que o campo 'nome' esteja preenchido) [cite: 43, 49]
        $request->validate([
            'nome' => 'required'
        ]);

        // Salva no banco [cite: 29]
        Produto::create($request->all());

        // Redireciona de volta para a página de produtos
        // (O ideal é adicionar uma mensagem de sucesso) [cite: 44]
        return redirect('/produtos')->with('success', 'Produto salvo com sucesso!');
    }
}