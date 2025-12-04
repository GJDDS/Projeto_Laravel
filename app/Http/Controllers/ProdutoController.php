<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cookie;

class ProdutoController extends Controller
{
    // READ (Listar) + Cookie
    public function index()
    {
        $produtos = Produto::all();
        
        [cite_start]// [cite: 1405] Requisito 5: Ler o cookie do último produto criado
        $ultimoProduto = Cookie::get('ultimo_produto');

        return view('produtos.index', [
            'produtos' => $produtos,
            'ultimoProduto' => $ultimoProduto
        ]);
    }

    // CREATE (Mostrar formulário)
    public function create()
    {
        return view('produtos.create');
    }

    // STORE (Salvar com Upload e Cookie)
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            [cite_start]'imagem' => 'nullable|image|mimes:jpeg,png|max:2048', // [cite: 1402] Requisito 4: PNG ou JPG
        ]);

        $dados = $request->all();

        [cite_start]// [cite: 1403] Upload da imagem para storage/app/public
        if ($request->hasFile('imagem')) {
            $caminho = $request->file('imagem')->store('produtos', 'public');
            $dados['imagem'] = $caminho;
        }

        $produto = Produto::create($dados);

        [cite_start]// [cite: 1405] Requisito 5: Criar cookie (dura 60 minutos)
        Cookie::queue('ultimo_produto', $produto->nome, 60);

        return redirect('/produtos')->with('success', 'Produto criado com sucesso!');
    }

    // UPDATE (Mostrar formulário de edição)
    public function edit($id)
    {
        $produto = Produto::findOrFail($id);
        return view('produtos.edit', ['produto' => $produto]);
    }

    // UPDATE (Salvar alterações)
    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        
        $dados = $request->all();

        if ($request->hasFile('imagem')) {
            // Apaga imagem antiga se existir
            if ($produto->imagem) {
                Storage::disk('public')->delete($produto->imagem);
            }
            $dados['imagem'] = $request->file('imagem')->store('produtos', 'public');
        }

        $produto->update($dados);

        return redirect('/produtos')->with('success', 'Produto atualizado!');
    }

    // DELETE (Excluir)
    public function destroy($id)
    {
        $produto = Produto::findOrFail($id);
        
        if ($produto->imagem) {
            Storage::disk('public')->delete($produto->imagem);
        }
        
        $produto->delete();

        return redirect('/produtos')->with('success', 'Produto excluído!');
    }
}