<?php

namespace App\Http\Controllers;

use App\Models\SaidaEstoque;
use App\Models\Produto;
use App\Models\Usuario;
use Illuminate\Http\Request;

class SaidaEstoqueController extends Controller
{
    public function index()
    {
        $saidas = SaidaEstoque::with('produto', 'user')->get();
        return view('saidas.index', compact('saidas'));
    }

    public function create()
    {
        $produtos = Produto::all();
        $usuarios = User::all();
        return view('saidas.create', compact('produtos', 'usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required|integer',
            'data_saida' => 'required|date',
            'user_id' => 'required',
        ]);

        SaidaEstoque::create($request->all());
        return redirect()->route('saidas.index')->with('success', 'Saída de estoque registrada com sucesso.');
    }

    public function show(SaidaEstoque $saida)
    {
        return view('saidas.show', compact('saida'));
    }

    public function edit(SaidaEstoque $saida)
    {
        $produtos = Produto::all();
        $usuarios = User::all();
        return view('saidas.edit', compact('saida', 'produtos', 'usuarios'));
    }

    public function update(Request $request, SaidaEstoque $saida)
    {
        $request->validate([
            'produto_id' => 'required',
            'quantidade' => 'required|integer',
            'data_saida' => 'required|date',
            'user_id' => 'required',
        ]);

        $saida->update($request->all());
        return redirect()->route('saidas.index')->with('success', 'Saída de estoque atualizada com sucesso.');
    }

    public function destroy(SaidaEstoque $saida)
    {
        $saida->delete();
        return redirect()->route('saidas.index')->with('success', 'Saída de estoque excluída com sucesso.');
    }
}