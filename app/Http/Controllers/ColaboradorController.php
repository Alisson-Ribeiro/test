<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use App\Models\Colaborador;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\NewColaboradorCreated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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
        // validacao dos dados
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],

            'email' => ['required', 'email', 'unique:colaboradores,email'],

            // 'email' => [
            // 'required', 
            // 'email:rfc,dns', // Valida emails reais verificando DNS
            // 'unique:colaboradores,email'],

            'cpf' => [
            'required', 
            'string', 
            'size:11', // CPF deve ter exatamente 11 caracteres
            'regex:/^\d{11}$/', // Apenas números
            'unique:colaboradores,cpf',
            function ($attribute, $value, $fail) {
                if (!validarCPF($value)) {
                    $fail('O CPF informado é inválido.');
                }
            }
        ],

            'unidade_id' => ['required', 'integer', 'exists:unidades,id'],
        ]);

        // cria o colaborador no banco de dados
        $colaborador = Colaborador::create($attributes);

        // obtem o usuario autenticado
        $user = Auth::user();

        // envia o email para o usuario autenticado
        Mail::to($user->email)->queue(
            new NewColaboradorCreated($colaborador)
        );

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

            // 'email' => [
            // 'sometimes', 
            // 'email:rfc,dns', // Valida emails reais verificando DNS
            // Rule::unique('colaboradores', 'email')->ignore($colaborador->id) // Permite o mesmo email do próprio registro
            // ],

            'cpf' => [
            'sometimes', 
            'string', 
            'size:11', // CPF deve ter exatamente 11 caracteres
            'regex:/^\d{11}$/', // Apenas números
            Rule::unique('colaboradores', 'cpf')->ignore($colaborador->id), // Permite o mesmo CPF do próprio registro
            function ($attribute, $value, $fail) {
                if (!validarCPF($value)) {
                    $fail('O CPF informado é inválido.');
                    }
                }
            ],

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

function validarCPF($cpf) {
    $cpf = preg_replace('/[^0-9]/', '', $cpf);

    if (strlen($cpf) != 11 || preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    for ($t = 9; $t < 11; $t++) {
        $d = 0;
        for ($c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }

    return true;
}