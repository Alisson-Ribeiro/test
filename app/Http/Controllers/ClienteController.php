<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ClienteController extends Controller
{
    
    /**
     * Lista todos os clientes.
     */
    public function index()
    {
        $cliente = Cliente::all();
        return view('clientes.index', compact('cliente'));
    }

    /**
     * Mostra o formulário de criação.
     */
    public function create()
    {
        return view('clientes.create');
    }


    /**
     * Armazena um novo cliente no banco.
     */
    public function store(Request $request)
    {
        // validacao dos dados
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:clientes,email'],
            'telefone' => ['string', 'max:20'],
            'cnpj' => ['required', 'string', 'size:14', 'regex:/^\d{14}$/', 'unique:clientes,cnpj'],
            'endereco' => ['string', 'max:255'],

        ]);

        // Cria o cliente
        Cliente::create($attributes);

        // // obtem o usuario autenticado
        // $user = Auth::user();

        // // envia o email para o usuario autenticado
        // Mail::to($user->email)->queue(
        //     new NewClienteCreated($cliente)
        // );

        // Redireciona para a listagem
        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
    }

    /**
     * Exibe os detalhes de um cliente específico.
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }


    /**
     * Mostra o formulário de edição.
     */
    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Atualiza um cliente no banco de dados.
     */
    public function update(Request $request, Cliente $cliente)
    {
        // validacao dos dados
        $attributes = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:clientes,email,' . $cliente->id],
            'telefone' => ['string', 'max:20'],
            'cnpj' => [
                'required', 
                'string', 
                'size:14', 
                'regex:/^\d{14}$/', 
                Rule::unique('colaboradores', 'cpf')->ignore($cliente->id), // Permite o mesmo CPF do próprio registro
                ],
            'endereco' => ['string', 'max:255'],
        
        ]);

            $cliente->update($attributes);

            return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }


    /**
     * Exclui um colaborador do banco de dados.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente excluído com sucesso!');
    }
}
