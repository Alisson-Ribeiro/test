<?php

namespace App\Http\Controllers;

use App\Models\GrupoEconomico;
use Illuminate\Http\Request;

class GrupoEconomicoController extends Controller
{
    /**
     * Lista todos os Grupos Econômicos.
     */
    public function index()
    {
        $grupo_economicos = GrupoEconomico::all();
        return view('grupo_economicos.index', compact('grupo_economicos'));
    }

    /**
     * Exibe o formulário de criação.
     */
    public function create()
    {
        return view('grupo_economicos.create');
    }

    /**
     * Armazena um novo Grupo Econômico.
     */
    public function store(Request $request)
    {
        // Validação
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255', 'unique:grupo_economicos,nome'],
        ]);

        // Criar o registro
        GrupoEconomico::create($attributes);

        return redirect()->route('grupo_economicos.index')->with('success', 'Grupo Econômico criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um Grupo Econômico.
     */
    public function show(GrupoEconomico $grupoEconomico)
    {
        return view('grupo_economicos.show', compact('grupoEconomico'));
    }

    /**
     * Exibe o formulário de edição.
     */
    public function edit(GrupoEconomico $grupoEconomico)
    {
        return view('grupo_economicos.edit', compact('grupoEconomico'));
    }

    /**
     * Atualiza um Grupo Econômico.
     */
    public function update(Request $request, GrupoEconomico $grupoEconomico)
    {
        // Validação
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255', 'unique:grupo_economicos,nome,' . $grupoEconomico->id],
        ]);

        // Atualizar o registro
        $grupoEconomico->update($attributes);

        return redirect()->route('grupo_economicos.index')->with('success', 'Grupo Econômico atualizado com sucesso!');
    }

    /**
     * Exclui um Grupo Econômico.
     */
    public function destroy(GrupoEconomico $grupoEconomico)
    {
        $grupoEconomico->delete();

        return redirect()->route('grupo_economicos.index')->with('success', 'Grupo Econômico excluído com sucesso!');
    }
}
