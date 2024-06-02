<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EntradaEstoque;
use App\Models\Produto;
use App\Models\User;

class EntradaEstoqueController extends Controller
{
    public function index()
    {
        $entradas = EntradaEstoque::with('produto', 'user')->paginate(7);
        // dd($entradas);
        return view('entradas.index', compact('entradas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        $usuarios = User::all();
        return view('entradas.create', compact('produtos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'entradas_estoque_quantidade' => 'required|integer',
            'entradas_estoque_data_entrada' => 'required|date',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        EntradaEstoque::create($data);
        return redirect()->route('entradas.index')->with('success', 'Entrada de estoque registrada com sucesso.');
    }

    public function show(EntradaEstoque $entrada)
    {
        return view('entradas.show', compact('entrada'));
    }

    public function edit(EntradaEstoque $entrada)
    {
        $produtos = Produto::all();
        $usuarios = User::all();
        return view('entradas.edit', compact('entrada', 'produtos', 'usuarios'));
    }

    public function update(Request $request, EntradaEstoque $entrada)
    {
        $request->validate([
            'produto_id' => 'required',
            'entradas_estoque_quantidade' => 'required|integer',
            'entradas_estoque_data_entrada' => 'required|date',
        ]);

        $data = $request->all();

        $novaQuantidade = $data['entradas_estoque_quantidade'];
        $quantidadeAtual = $entrada->entradas_estoque_quantidade;
        $produto = $entrada->produto;

        $diferenca = $novaQuantidade - $quantidadeAtual;

        if ($diferenca < 0) {
            if ($produto->podeSair(abs($diferenca))) {
                $data['user_id'] = auth()->user()->id;  
                $entrada->update($data);
                return redirect()->route('entradas.index')->with('success', 'Entrada de estoque atualizada com sucesso.');
            } else {
                return redirect()->back()->with('error', 'Quantidade insuficiente em estoque.');
            }
        } else {
            $data['user_id'] = auth()->user()->id;  
            $entrada->update($data);
            return redirect()->route('entradas.index')->with('success', 'Entrada de estoque atualizada com sucesso.');
        }
    }

    public function destroy(EntradaEstoque $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada de estoque excluída com sucesso.');
    }
}
