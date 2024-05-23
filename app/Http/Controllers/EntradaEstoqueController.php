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
        $entradas = EntradaEstoque::with('produto', 'user')->get();
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
            'quantidade' => 'required|integer',
            'data_entrada' => 'required|date',
            'user_id' => 'required',
        ]);

        EntradaEstoque::create($request->all());
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
            'quantidade' => 'required|integer',
            'data_entrada' => 'required|date',
            'user_id' => 'required',
        ]);

        $entrada->update($request->all());
        return redirect()->route('entradas.index')->with('success', 'Entrada de estoque atualizada com sucesso.');
    }

    public function destroy(EntradaEstoque $entrada)
    {
        $entrada->delete();
        return redirect()->route('entradas.index')->with('success', 'Entrada de estoque excluída com sucesso.');
    }
}
