<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Bandeira;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unidades = Unidade::with('bandeira')->get();
        return view('unidades.index', compact('unidades')); // Retorna a view com a lista de unidades
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bandeiras = \App\Models\Bandeira::all(); // Obtém todas as bandeiras do banco
        return view('unidades.create', compact('bandeiras')); // Passa as bandeiras para a view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nome_fantasia' => ['required', 'string', 'max:255'],
            'razao_social' => ['required', 'string', 'max:255', 'unique:unidades,razao_social'],
            'cnpj' => ['required', 'string', 'size:14', 'unique:unidades,cnpj'],
            'bandeira' => ['required', 'exists:bandeiras,id'],
        ]);

        Unidade::create([
            'nome_fantasia' => $attributes['nome_fantasia'],
            'razao_social' => $attributes['razao_social'],
            'cnpj' => $attributes['cnpj'],
            'bandeira_id' => $attributes['bandeira'],
        ]);

        return redirect()->route('unidades.index')->with('success', 'Unidade criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unidade $unidade)
    {
        return view('unidades.show', compact('unidade')); // Retorna a view com os detalhes da unidade
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unidade $unidade)
    {
        $bandeiras = \App\Models\Bandeira::all(); // Obtém todas as bandeiras do banco
        return view('unidades.edit', compact('unidade', 'bandeiras')); // Retorna a view para editar a unidade
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unidade $unidade)
    {
        $attributes = $request->validate([
            'nome_fantasia' => ['required', 'string', 'max:255'],
            'razao_social' => ['required', 'string', 'max:255', 'unique:unidades,razao_social,' . $unidade->id],
            'cnpj' => ['required', 'string', 'size:14', 'unique:unidades,cnpj,' . $unidade->id],
            'bandeira' => ['required', 'exists:bandeiras,id'],
        ]);

        $unidade->update([
            'nome_fantasia' => $attributes['nome_fantasia'] ?? $unidade->nome_fantasia,
            'razao_social' => $attributes['razao_social'] ?? $unidade->razao_social,
            'cnpj' => $attributes['cnpj'] ?? $unidade->cnpj,
            'bandeira_id' => $attributes['bandeira'] ?? $unidade->bandeira_id,
        ]);


        return redirect()->route('unidades.index')->with('success', 'Unidade atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unidade $unidade)
    {
        $unidade->delete();
        return redirect()->route('unidades.index')->with('success', 'Unidade excluída com sucesso!');
    }
}
