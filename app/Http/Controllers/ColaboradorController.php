<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Colaborador;
use Illuminate\Http\Request;

class ColaboradorController extends Controller
{
    /**
     * Lista todos os colaboradores.
     */
    public function index()
    {
        $colaborador = Colaborador::all();
        return view('colaborador.index', compact('colaborador'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        $unidades = Unidade::all(); // Pegando todas as unidades do banco
        return view('colaborador.create', compact('unidades'));
    }


    /**
     * Armazena um novo colaborador no banco.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:colaboradores,email'],
            'cpf' => ['required', 'string', 'unique:colaboradores,cpf'],
            'unidade_id' => ['required', 'integer', 'exists:unidades,id'],
        ]);

        Colaborador::create($attributes);

        return redirect()->route('colaborador.index')->with('success', 'Colaborador criado com sucesso!');
    }

    /**
     * Exibe os detalhes de um colaborador específico.
     */
    public function show(Colaborador $colaborador)
    {
        return view('colaborador.show', compact('colaborador'));
    }

    /**
     * Mostra o formulário de edição.
     */
    public function edit(Colaborador $colaborador)
    {
        $unidades = Unidade::all();
        return view('colaborador.edit', compact('unidades','colaborador'));
    }

    /**
     * Atualiza um colaborador no banco de dados.
     */
    public function update(Request $request, Colaborador $colaborador)
    {
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:colaboradores,email,' . $colaborador->id],
            'cpf' => ['required', 'string', 'unique:colaboradores,cpf,' . $colaborador->id],
            'unidade_id' => ['required', 'integer', 'exists:unidades,id'],
        ]);

        $colaborador->update($attributes);

        return redirect()->route('colaborador.index')->with('success', 'Colaborador atualizado com sucesso!');
    }

    /**
     * Exclui um colaborador do banco de dados.
     */
    public function destroy(Colaborador $colaborador)
    {
        $colaborador->delete();

        return redirect()->route('colaborador.index')->with('success', 'Colaborador excluído com sucesso!');
    }
}
