<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Bandeira;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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

            'cnpj' => [
            'required', 
            'string', 
            'size:14', // CNPJ deve ter exatamente 14 caracteres
            'regex:/^\d{14}$/', // Apenas números
            'unique:unidades,cnpj',
            function ($attribute, $value, $fail) {
                if (!validarCNPJ($value)) {
                    $fail('O CNPJ informado é inválido.');
                }
            }
        ],

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
            
            'cnpj' => [
            'sometimes', 
            'string', 
            'size:14', // CNPJ deve ter exatamente 14 caracteres
            'regex:/^\d{14}$/', // Apenas números
            Rule::unique('unidades', 'cnpj')->ignore($unidade->id), // Permite o mesmo CNPJ do próprio registro
            function ($attribute, $value, $fail) {
                if (!validarCNPJ($value)) {
                    $fail('O CNPJ informado é inválido.');
                }
            }
        ],

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

function validarCNPJ($cnpj) {
    $cnpj = preg_replace('/[^0-9]/', '', $cnpj);

    if (strlen($cnpj) != 14) {
        return false;
    }

    $invalidos = [
        '00000000000000', '11111111111111', '22222222222222', '33333333333333',
        '44444444444444', '55555555555555', '66666666666666', '77777777777777',
        '88888888888888', '99999999999999'
    ];
    if (in_array($cnpj, $invalidos)) {
        return false;
    }

    // Cálculo do primeiro dígito verificador
    for ($t = 12; $t < 14; $t++) {
        $d = 0;
        $pos = $t - 7;
        for ($c = 0; $c < $t; $c++) {
            $d += $cnpj[$c] * $pos--;
            if ($pos < 2) {
                $pos = 9;
            }
        }
        $d = ($d % 11) < 2 ? 0 : 11 - ($d % 11);
        if ($cnpj[$c] != $d) {
            return false;
        }
    }

    return true;
}