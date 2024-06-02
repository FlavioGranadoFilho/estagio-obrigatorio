<?php

namespace App\Http\Controllers;

use App\Models\SaidaEstoque;
use App\Models\Produto;
use App\Models\User;
use Illuminate\Http\Request;

class SaidaEstoqueController extends Controller
{
    public function index()
    {
        $saidas = SaidaEstoque::with('produto', 'user')->paginate(7);
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
        // dd($request->all());
        $request->validate([
            'produto_id' => 'required',
            'saidas_estoque_quantidade' => 'required|integer',
            'saidas_estoque_data_saida' => 'required|date',
        ]);

        $data = $request->all();

        $produto = Produto::find($request->produto_id);

        if ($produto->podeSair($data['saidas_estoque_quantidade'])) {
            $data['user_id'] = auth()->user()->id;

            if(!SaidaEstoque::create($data)){
                return redirect()->back()->with('error', 'Erro ao registrar saída de estoque.');
            }
    
            return redirect()->route('saidas.index')->with('success', 'Saída de estoque registrada com sucesso.');
        }else{
            return redirect()->back()->with('error', 'Quantidade indisponível em estoque.');
        }
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
            'saidas_estoque_quantidade' => 'required|integer',
            'saidas_estoque_data_saida' => 'required|date',
        ]);

        $data = $request->all();

        $produto = Produto::find($request->produto_id);

        $diferenca = $request->saidas_estoque_quantidade - $saida->saidas_estoque_quantidade;

        if ($produto->podeSair($diferenca)) {
            $data['user_id'] = auth()->user()->id;
            if($saida->update($data)){
                return redirect()->route('saidas.index')->with('success', 'Saída de estoque atualizada com sucesso.');
            }else{
                return redirect()->route('saidas.index')->with('error', 'Erro ao atualizar saída de estoque.');
            }
        }else{	
            return redirect()->back()->with('error', 'Quantidade indisponível em estoque.');
        }
    }

    public function destroy(SaidaEstoque $saida)
    {
        $saida->delete();
        return redirect()->route('saidas.index')->with('success', 'Saída de estoque excluída com sucesso.');
    }
}