<?php

namespace App\Http\Controllers;

use App\Models\Bandeira;
use Illuminate\Http\Request;
use App\Models\GrupoEconomico;

class BandeiraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bandeiras = Bandeira::with('GrupoEconomico')->get();
        return view('bandeiras.index', compact('bandeiras'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $grupo_economicos = GrupoEconomico::all(); // Obtém todos os Grupos economicos do banco
        return view('bandeiras.create', compact('grupo_economicos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'grupo_economico_id' => ['required', 'exists:grupo_economicos,id'],
        ]);

        Bandeira::create($attributes);

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira criada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bandeira $bandeira)
    {
        return view('bandeiras.show', compact('bandeira'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $bandeira = Bandeira::findOrFail($id);
        $grupo_economicos = GrupoEconomico::all(); // Buscando todos os grupos econômicos

        return view('bandeiras.edit', compact('bandeira', 'grupo_economicos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bandeira $bandeira)
    {
        $attributes = $request->validate([
            'nome' => ['sometimes', 'required', 'string', 'max:255'],
            'grupo_economico_id' => ['sometimes', 'required', 'exists:grupo_economicos,id'],
        ]);

        $bandeira->update($attributes);

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bandeira $bandeira)
    {
        $bandeira->delete();

        return redirect()->route('bandeiras.index')->with('success', 'Bandeira excluída com sucesso!');
    }
}
