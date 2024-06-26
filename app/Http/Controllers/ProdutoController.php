<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::with('categoria')->paginate(7);
        // dd($produtos->count());
        return view('produtos.index', compact('produtos'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('produtos.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_nome' => 'required',
            'categoria_id' => 'required',
            // 'quantidade_estoque' => 'required|integer',
        ]);

        Produto::create($request->all());
        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso.');
    }

    public function show(Produto $produto)
    {
        return view('produtos.show', compact('produto'));
    }

    public function edit(Produto $produto)
    {
        $categorias = Categoria::all();
        return view('produtos.edit', compact('produto', 'categorias'));
    }

    public function update(Request $request, Produto $produto)
    {
        $request->validate([
            'produto_nome' => 'required',
            'categoria_id' => 'required',
            // 'quantidade_estoque' => 'required|integer',
        ]);

        if($produto->update($request->all())){
            return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso.');
        }else{
            return redirect()->route('produtos.index')->with('error', 'Erro ao atualizar o produto.');
        }
    }

    public function destroy(Produto $produto)
    {
        $produto->delete();
        return redirect()->route('produtos.index')->with('success', 'Produto excluído com sucesso.');
    }
}
